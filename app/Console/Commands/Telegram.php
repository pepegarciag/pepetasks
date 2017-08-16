<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram as TelegramApi;
use Cron\CronExpression;
use App\Task;

class Telegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:sendTasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fires up the tasks on due time';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*$updates = TelegramApi::commandsHandler();
        var_dump($updates);

        foreach ($updates  as $update) {
            echo $update->getMessage()->get('from')->get('id');
        }*/

        $tasks = Task::where('active', 1)->get();

        foreach ($tasks as $task) {
            $cron = CronExpression::factory($task->schedule);
            if ($cron->isDue()) {
                TelegramApi::sendMessage([
                    'chat_id' => '4357059',
                    'text' => $task->name,
                ]);
            }
            //$this->info('Display this on the screen');
        }
    }
}
