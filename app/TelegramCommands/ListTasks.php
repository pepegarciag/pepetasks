<?php
/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 23:42
 */

namespace App\TelegramCommands;

use App\Task;
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
    protected $description = "List all the active tasks";

    public function handle($arguments)
    {
        $tasks = Task::where('active', 1)->get();
        $response = '';
        foreach ($tasks as $task) {
            $response .= sprintf('%s - %s' . PHP_EOL, $task->id, $task->name);
        }

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => $response]);
        //$this->replyWithMessage(['text' => $this->getUpdate()->getMessage()->get('from')->get('id')]);
    }
}