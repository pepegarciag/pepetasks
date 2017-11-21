<?php
/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 23:42
 */

namespace App\TelegramCommands;

use App\Event;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class ListTasks extends Command
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
        $events = Event::where('active', 1)->get();
        $response = '';
        foreach ($events as $event) {
            $response .= sprintf('%s - %s' . PHP_EOL, $event->id, $event->name);
        }

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => $response]);
        //$this->replyWithMessage(['text' => $this->getUpdate()->getMessage()->get('from')->get('id')]);
    }
}