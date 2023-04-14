<?php

namespace App\Listeners;

use App\Events\ElementCreated;
use App\Models\Link;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ElementLinkBinder
{
    public function handle(ElementCreated $event): void
    {
        if($event->element->linkable == 1)
        {
            Link::create([
                'url' => 'someRoute/' . $event->element->title,
                'keyWord' => $event->element->title
            ]);
        }
    }
}
