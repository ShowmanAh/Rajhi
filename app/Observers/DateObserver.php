<?php

namespace App\Observers;

use App\Models\Date;


class DateObserver
{
    /**
     * Handle the date "created" event.
     *
     * @param  \App\Models\Date  $date
     * @return void
     */
    public function created(Date $date)
    {

    }

    /**
     * Handle the date "updated" event.
     *
     * @param  \App\Models\Date  $date
     * @return void
     */
    public function updated(Date $date)
    {

    }

    /**
     * Handle the date "deleted" event.
     *
     * @param  \App\Models\Date  $date
     * @return void
     */
    public function deleted(Date $date)
    {
        // delete times on date when delete date
        $date->times()->delete();
    }

    /**
     * Handle the date "restored" event.
     *
     * @param  \App\Models\Date  $date
     * @return void
     */
    public function restored(Date $date)
    {
        //
    }

    /**
     * Handle the date "force deleted" event.
     *
     * @param  \App\Models\Date  $date
     * @return void
     */
    public function forceDeleted(Date $date)
    {
        //
    }
}
