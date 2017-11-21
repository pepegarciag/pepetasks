<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram as TelegramApi;
use Carbon\Carbon;
use App\Event;


class Telegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:sendEvents';

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
        $events = Event::where('active', 1)->get();

        foreach ($events as $event) {
            if ($event->date >= Carbon::now()) {
                TelegramApi::sendMessage([
                    'chat_id' => '4357059',
                    'text' => "{$event->name} | {$event->description}",
                ]);

                $event->active = FALSE;
                $event->save();
            }
        }

        return true;
    }
}
