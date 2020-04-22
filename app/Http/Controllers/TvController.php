<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularTv = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.baseUrl') . '/tv/popular?language=ro-RO&region=RO')
            ->json()['results'];

        $topRatedTv = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.baseUrl') . '/tv/top_rated?language=ro-RO&region=RO')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.baseUrl') . '/genre/tv/list?language=ro-RO&region=RO')
            ->json()['genres'];

        $viewModel = new TvViewModel(
            $popularTv,
            $topRatedTv,
            $genres,
        );

        return view('tv.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thshowData = Http::withToken(config('services.tmdb.token'))
            ->get(
                config('services.tmdb.baseUrl') . "/tv/{$id}?language=" . config('services.tmdb.language') . "&region=" . config('services.tmdb.region')
            )
            ->json();

        $appendToTvshow = Http::withToken(config('services.tmdb.token'))
            ->get(
                config('services.tmdb.baseUrl') . "/tv/{$id}?append_to_response=credits,videos,images"
            )
            ->json();

        $tvshow = array_merge(
            $thshowData,
            collect($appendToTvshow)->only(['credits', 'videos', 'images'])->toArray()
        );

        $viewModel = new TvShowViewModel($tvshow);

        // dump($tvshow);
        return view('tv.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
