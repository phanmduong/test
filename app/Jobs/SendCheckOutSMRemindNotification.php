<?php

namespace App\Jobs;

use App\Repositories\NotificationRepository;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCheckOutSMRemindNotification extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $shift;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shift)
    {
        $this->shift = $shift;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notificationRepository = new NotificationRepository();
        $notificationRepository->sendRemindCheckOutSMNofication($this->shift);
    }
}
