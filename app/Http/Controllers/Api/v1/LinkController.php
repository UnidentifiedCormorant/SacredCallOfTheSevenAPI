<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Link\LinkCollection;
use App\Http\Resources\Link\LinkResource;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return new LinkCollection(Link::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'url' => '',
            'keyWord' => ''
        ]);
        $link = Link::create($data);
        return new LinkResource($link);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
