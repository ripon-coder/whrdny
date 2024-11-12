<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Str;

class EventObserver
{

    /**
     * Handle the FoundRaise "created" event.
     */
    public function created(Event $event): void
    {
        $id    = $event->id;
        $title = $event->title;
        $slug  = Str::slug($title);

        $event->slug = $slug.'-'.$id;
        $event->save();
    }

    /**
     * Handle the FoundRaise "updated" event.
     */
    public function updated(Event $event): void
    {
        //
    }

    /**
     * Handle the FoundRaise "deleted" event.
     */
    public function deleted(Event $event): void
    {
        //
    }

    /**
     * Handle the FoundRaise "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the FoundRaise "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
}
