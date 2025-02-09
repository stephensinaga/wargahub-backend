<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReportStatusNotification extends Notification
{
    use Queueable;

    private $status;
    private $report;

    public function __construct($status, $report)
    {
        $this->status = $status;
        $this->report = $report;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Laporan Anda telah $this->status",
            'report' => $this->report->id,
        ];
    }
}
