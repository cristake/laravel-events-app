<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
	public $popularMovies;
	public $nowPlayingMovies;
	public $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
		$this->nowPlayingMovies = $nowPlayingMovies;
		$this->genres = $genres;
	}
	
	public function popularMovies()
	{
		return $this->formatMovies(
			$this->popularMovies
		);
	}
	
	public function nowPlayingMovies()
	{
		return $this->formatMovies(
			$this->nowPlayingMovies
		);
	}
	
	public function genres()
	{
		return collect($this->genres)->mapWithKeys(function($genre) {
			return [
				$genre['id'] => $genre['name']
			];
		});
	}

	private function formatMovies($movies)
	{
		return collect($movies)->map(function($movie) {
			$genresFormated = collect($movie['genre_ids'])->mapWithKeys(function($value) {
				return [
					$value => $this->genres()->get($value)
				];
			})->implode(', ');

			return collect($movie)->merge([
				'poster_path' => config('services.tmdb.imgPath') . '/w500' . $movie['poster_path'],
				'vote_average' => $movie['vote_average'] * 10 . '%',
				'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
				// 'vote_count' => number_format($movie['vote_count'], 0, ',', '.'),
				'genres' => $genresFormated
			])
			->only([
				'id', 'poster_path', 'vote_average', 'release_date', /*'vote_count',*/ 'genre_ids', 'title', 'overview', 'genres'
			]);
		});
	}
}
