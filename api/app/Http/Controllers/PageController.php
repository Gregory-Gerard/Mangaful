<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Page;
use App\Http\Resources\Page as PageResource;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Chapter $chapter)
    {
        return PageResource::collection($chapter->pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Chapter $chapter)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter, Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter, Page $page)
    {
        //
    }
}
