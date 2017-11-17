<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 8/15/15
 * Time: 5:17 PM
 */

namespace App\Mailing;

use Illuminate\Contracts\Mail\Mailer as LaravelMailer;


abstract class Mailer {

    /**
     * @var LaravelMailer
     */
    private $laravelMailer;

    public function __construct(LaravelMailer $laravelMailer)
    {
        $this->laravelMailer = $laravelMailer;
    }

    protected function sendTo($to, $from, $subject, $view, $data, $attachments = [])
    {
        $this->laravelMailer->send($view, $data, function($message) use ($to, $from, $subject, $attachments)
        {
            $message->to($to)->subject($subject);
            foreach($attachments as $filename)
            {
                $message->attach($filename);
            }
            if($from !== '')
            {
                $message->from($from);
            }
        });
    }


}