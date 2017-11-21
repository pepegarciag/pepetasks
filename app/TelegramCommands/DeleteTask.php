<?php
/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 27/6/17
 * Time: 19:44
 */

namespace App\TelegramCommands;

use App\Event;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class DeleteTask extends Command
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
        $event = Event::find($arguments);
        $event->delete();

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Task: {$event->name} deleted"]);
        //$this->replyWithMessage(['text' => $this->getUpdate()->getMessage()->get('from')->get('id')]);
    }
}