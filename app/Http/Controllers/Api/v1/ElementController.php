<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\ElementCreated;
use App\Http\Controllers\Controller;
use App\Http\Resources\Element\ElementCollection;
use App\Http\Resources\Element\ElementResource;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ElementController extends Controller
{
    public function index()
    {
        return new ElementCollection(Cache::remember('all', 60, function () {
            return Element::all();
        }));
    }

    public function show($id)
    {
        return new ElementResource(Element::find($id));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => '',
            'image' => '',
            'linkable' => ''
        ]);

        $element = Element::create($data);

        event(new ElementCreated($element));

        return new ElementResource($element);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => '',
            'image' => '',
            'linkable' => ''
        ]);

        $element = Element::find($id);
        $element->update($data);

        return new ElementResource($element);
    }
}
