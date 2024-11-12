<?php

namespace App\Observers;

use App\Models\FoundRaise;
use Illuminate\Support\Str;

class FundRaiseObserver
{

    /**
     * Handle the FoundRaise "created" event.
     */
    public function created(FoundRaise $foundRaise): void
    {
        $id    = $foundRaise->id;
        $title = $foundRaise->title;
        $slug  = Str::slug($title);

        $foundRaise->slug = $slug.'-'.$id;
        $foundRaise->save();
    }

    /**
     * Handle the FoundRaise "updated" event.
     */
    public function updated(FoundRaise $foundRaise): void
    {
        //
    }

    /**
     * Handle the FoundRaise "deleted" event.
     */
    public function deleted(FoundRaise $foundRaise): void
    {
        //
    }

    /**
     * Handle the FoundRaise "restored" event.
     */
    public function restored(FoundRaise $foundRaise): void
    {
        //
    }

    /**
     * Handle the FoundRaise "force deleted" event.
     */
    public function forceDeleted(FoundRaise $foundRaise): void
    {
        //
    }
}
