<?php
/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 23:42
 */

namespace App\TelegramCommands;

use App\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class ListEvents extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "list";

    /**
     * @var string Command Description
     */
    protected $description = "List all the active events";

    public function handle($arguments)
    {
        $user = User::where('telegram_id', $this->getUpdate()->getMessage()->get('from')->get('id'))->get()->load(['events' => function( $query) {
            $query->where('active', true);
        }])->first();

        if ($user->events->isEmpty()) {
            $response = 'No tienes eventos activos';
        }
        else {
            $response = '';
            foreach ($user->events as $event) {
                $response .= sprintf('%s - %s | %s' . PHP_EOL, $event->id, $event->name, $event->date->format('d/m/Y H:i'));
            }
        }

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => $response]);
        //$this->replyWithMessage(['text' => $this->getUpdate()->getMessage()->get('from')->get('id')]);
    }
}