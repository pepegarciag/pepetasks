<?php

namespace App\TelegramCommands;

use App\Event;
use App\User;
use Carbon\Carbon;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 22:47
 */
class AddEvent extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "add";

    /**
     * @var string Command Description
     */
    protected $description = "Add a new event in: name, description, 10/09/2017 00:00 format.";

    public function handle($arguments)
    {
        $user = User::where('telegram_id', $this->getUpdate()->getMessage()->get('from')->get('id'))->get()->first();
        $data = explode(',', $arguments);

        $event = new Event();
        $event->name = $data[0];
        $event->description = empty(trim($data[1])) ? '' : trim($data[1]);
	    $event->date = Carbon::createFromformat('d/m/Y H:i', trim($data[2]));
        $event->active = true;
        $user->events()->save($event);

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Evento {$event->name} guardado."]);
    }
}
