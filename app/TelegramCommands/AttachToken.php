<?php

namespace App\TelegramCommands;

use App\Event;
use App\User;
use Carbon\Carbon;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: pepegarciag
 * Date: 26/6/17
 * Time: 22:47
 */
class AttachToken extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "token";

    /**
     * @var string Command Description
     */
    protected $description = "Attach a token to an account";

    public function handle($arguments)
    {
        $user = User::where('telegram_token', $arguments)->get()->first();
        $user->telegram_id = $this->getUpdate()->getMessage()->get('from')->get('id');
        $user->save();

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => "Sincronizada la cuenta {$user->email}"]);
    }
}
