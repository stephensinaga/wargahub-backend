<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReportStatusNotification extends Notification
{
    use Queueable;

    public $status, $report;

    public function __construct($status, $report)
    {
        $this->status = $status;
        $this->report = $report;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Status Laporan Anda Diperbarui')
            ->line('Status laporan Anda telah diperbarui menjadi: ' . ucfirst($this->status))
            ->action('Lihat Laporan', url('/laporan/' . $this->report->id))
            ->line('Terima kasih telah melaporkan!');
    }

    public function toArray($notifiable)
    {
        return [
            'report_id' => $this->report->id,
            'status' => $this->status,
            'message' => 'Status laporan Anda telah diperbarui menjadi: ' . ucfirst($this->status),
        ];
    }
}
