<?php

namespace App\TelegramCommands;

use App\Event;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 22:47
 */
class AddTask extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "add";

    /**
     * @var string Command Description
     */
    protected $description = "Add a new event";

    public function handle($arguments)
    {
        $data = explode(',', $arguments);
        $event = new Event();
        $event->name = $data[0];
        $event->description = trim($data[1]);
        $event->active = 1;
        $event->save();

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Evento {$event->name} guardado."]);
    }
}