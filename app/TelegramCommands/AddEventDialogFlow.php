<?php

namespace App\TelegramCommands;

use App\Event;
use App\User;
use Carbon\Carbon;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use BotDialogs\Dialogs;

/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 22:47
 */
class AddEventDialogFlow extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "add";

    protected $key;

    protected $dialogs;

    /**
     * @var string Command Description
     */
    protected $description = "Add a new event in: name, description, 10/09/2017 00:00 format.";

    function __construct(Dialogs $dialogs)
    {
        $this->key = env('DIALOGFLOW_CLIENT');
        $this->dialogs = $dialogs;
    }

    public function handle($arguments)
    {
        $user = User::where('telegram_id', $this->getUpdate()->getMessage()->get('from')->get('id'))->get()->first();

        try {
            $client = new Client($this->key);

            $query = $client->get('query', [
                'query' => 'Pasado mañana tengo que recoger un pedido a las 12:45',
                'lang' => 'es',
                'timezone' => 'Europe/Madrid',
                'sessionId' => $user->telegram_token,
            ]);
            $response = json_decode((string) $query->getBody(), true);
            $parameters = $response['result']['parameters'];

            $event = new Event();
            $event->description = '';
            $event->date = Carbon::createFromformat('Y-m-d H:i:s', $parameters['date'] . ' ' . $parameters['time']);
            $event->active = true;
            $user->events()->save($event);

            if (!empty($parameters['Acciones'])) {
                $event->name = str_replace('tengo que ', '', $parameters['Acciones']);
            }
            else {
                $this->dialogs->add(new \EventDialog());
            }
        } catch (\Exception $error) {
            echo $error->getMessage();
        }

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Evento guardado."]);
    }
}
