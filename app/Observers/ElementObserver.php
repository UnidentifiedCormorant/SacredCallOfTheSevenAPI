<?php

namespace App\Observers;

use App\Models\Element;
use App\Models\Link;

class ElementObserver
{
    /**
     * Handle the Element "created" event.
     */
    public function created(Element $element): void
    {
        if($element->linkable == 1)
        {
            Link::create([
                'url' => 'someRoute/' . $element->title,
                'keyWord' => $element->title
            ]);
        }
    }

    /**
     * Handle the Element "updated" event.
     */
    public function updated(Element $element): void
    {
        if($element->linkable == 1)
        {
            Link::firstOrCreate([
                'url' => 'someRoute/' . $element->title,
                'keyWord' => $element->title
            ]);
        }
    }

    /**
     * Handle the Element "deleted" event.
     */
    public function deleted(Element $element): void
    {
        //
    }

    /**
     * Handle the Element "restored" event.
     */
    public function restored(Element $element): void
    {
        //
    }

    /**
     * Handle the Element "force deleted" event.
     */
    public function forceDeleted(Element $element): void
    {
        //
    }
}
