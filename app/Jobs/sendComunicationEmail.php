<?php

namespace ProPay\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ComunicationJobEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    private $recipient;
    private $fromR;
    private $subjectR;
    private $template;

    public function __construct($template, $data, $recipient, $from, $subject)
    {
        //
        $this->data = $data;
        $this->recipient = $recipient;
        $this->fromR = $from;
        $this->subjectR = $subject;
        $this->viewData = $data;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //new mailable classe created
        Mail::send(new Comunication($this->template, $this->data, $this->recipient, $this->fromR, $this->subjectR));
    }
    public function failed()
    {
        // Called when the job is failing...
        Log::alert('error in queue mail');

    }
}
