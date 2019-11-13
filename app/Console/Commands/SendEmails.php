<?php

namespace App\Console\Commands;

use App\Message;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails at a certain time';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $messages = Message::all();
        if(!$messages->isEmpty()) {
            try {
                foreach ($messages as $message) {
                    $offset = $message['timezone'];
                    $toUser = $message['to_user'];
                    $sendAt = $toUser = $message['to_user'];

                    $timezone = timezone_name_from_abbr(null, intval($offset) * 3600, TRUE);
                    $dateTime = new \DateTime();
                    $dateTime->setTimeZone(new \DateTimeZone($timezone));
                    $actualTime = $dateTime;

                    $serverTimeZone = timezone_name_from_abbr(null, 2 * 3600, TRUE);
                    $dateTime->setTimeZone(new \DateTimeZone($serverTimeZone));
                    $sendAt =  $dateTime->createFromFormat("Y-m-d H:i:s", $sendAt );
                    if($sendAt <= $actualTime){
                        Mail::to($toUser);
                        //For testing
                        if(!file_exists("send_{$toUser}_{$sendAt}.txt"))
                        file_put_contents("/tmp/send_{$toUser}_{$sendAt}" . ".txt", $message, FILE_APPEND);
                    }
                }
            } catch (\Exception $exception)
            {
                file_put_contents("/tmp/sendError" . microtime(1) . ".txt", $exception->getMessage(), FILE_APPEND);
            }
        }
    }
}
