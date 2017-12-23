<?php

namespace App\TelegramCommands;

use App\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

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
