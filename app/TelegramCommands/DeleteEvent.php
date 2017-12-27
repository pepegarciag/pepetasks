<?php
/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 27/6/17
 * Time: 19:44
 */

namespace App\TelegramCommands;

use App\Event;
use App\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class DeleteEvent extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "delete";

    /**
     * @var string Command Description
     */
    protected $description = "Delete a given event by its ID";

    public function handle($arguments)
    {
        $user = User::where('telegram_id', $this->getUpdate()->getMessage()->get('from')->get('id'))->get()->first();
        $event = Event::find($arguments);

        if ($event->user->email == $user->email) {
            $event->delete();
            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => "Evento: {$event->name} borrado"]);
        }

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Ese evento no te pertenece!"]);
    }
}