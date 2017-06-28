<?php
/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 27/6/17
 * Time: 19:44
 */

namespace App\TelegramCommands;

use App\Task;
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
    protected $description = "Delete a given task by its ID";

    public function handle($arguments)
    {
        $task = Task::find($arguments);
        $task->delete();

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Task: {$task->name} deleted"]);
        //$this->replyWithMessage(['text' => $this->getUpdate()->getMessage()->get('from')->get('id')]);
    }
}