<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Manga;
use App\Http\Resources\Chapter as ChapterResource;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Manga $manga)
    {
        return ChapterResource::collection($manga->chapters);
    }

    /**
     * Affiche les derniers chapitres sortis
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function lastReleases()
    {
        return ChapterResource::collection(Chapter::with(['manga', 'manga.authors'])->orderBy('created_at', 'desc')->limit(15)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Manga $manga)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return ChapterResource
     */
    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manga  $manga
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manga $manga, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manga  $manga
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga, Chapter $chapter)
    {
        //
    }
}
