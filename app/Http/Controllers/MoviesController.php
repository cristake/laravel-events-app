<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$popularMovies = Http::withToken(config('services.tmdb.token'))
			->get(config('services.tmdb.baseUrl') . "/movie/popular?language=".config('services.tmdb.language')."&region=".config('services.tmdb.region'))
			->json()['results'];

		$nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
			->get(config('services.tmdb.baseUrl') . "/movie/now_playing?language=".config('services.tmdb.language')."&region=".config('services.tmdb.region'))
			->json()['results'];

		$genres = Http::withToken(config('services.tmdb.token'))
			->get(config('services.tmdb.baseUrl') . "/genre/movie/list?language=".config('services.tmdb.language')."&region=".config('services.tmdb.region'))
			->json()['genres'];

		$viewModel = new MoviesViewModel($popularMovies, $nowPlayingMovies, $genres);

		// dump($popularMovies);
		return view('movies.index', $viewModel);
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
		$movieData = Http::withToken(config('services.tmdb.token'))
			->get(
				config('services.tmdb.baseUrl') . "/movie/{$id}?language=".config('services.tmdb.language')."&region=".config('services.tmdb.region')
			)
			->json();

		$appendToMovie = Http::withToken(config('services.tmdb.token'))
			->get(
				config('services.tmdb.baseUrl') . "/movie/{$id}?append_to_response=credits,videos,images"
			)
			->json();
		
		$movie = array_merge(
			$movieData, 
			collect($appendToMovie)->only(['credits', 'videos', 'images'])->toArray()
		);

		$viewModel = new MovieViewModel($movie);

		// dump($movie);
		return view('movies.show', $viewModel);
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
