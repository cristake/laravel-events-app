<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
	public $trendingMovies;
	public $popularMovies;
	public $nowPlayingMovies;
	public $genres;

	public function __construct($trendingMovies, $popularMovies, $nowPlayingMovies, $genres)
	{
		$this->trendingMovies = $trendingMovies;
		$this->popularMovies = $popularMovies;
		$this->nowPlayingMovies = $nowPlayingMovies;
		$this->genres = $genres;
	}

	public function trendingMovies()
	{
		return $this->formatMovies(
			$this->trendingMovies
		);
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
		return collect($this->genres)->mapWithKeys(function ($genre) {
			return [
				$genre['id'] => $genre['name']
			];
		});
	}

	private function formatMovies($movies)
	{
		return collect($movies)->map(function ($movie) {
			$genresFormated = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
				return [
					$value => $this->genres()->get($value)
				];
			})->implode(', ');

			return collect($movie)->merge([
				'poster_path' => $movie['poster_path']
					? config('services.tmdb.imgPath') . '/w500/' . $movie['poster_path']
					: 'https://via.placeholder.com/500x750',
				'vote_average' => $movie['vote_average'] * 10 . '%',
				'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
				'genres' => $genresFormated,
				'route' => isset($movie['media_type'])
					? ($movie['media_type'] === 'tv'
						? route('tv.show', $movie['id'])
						: route('movies.show', $movie['id']))
					: route('movies.show', $movie['id'])
			]);
			// ->only([
			// 	'id', 'poster_path', 'vote_average', 'release_date', 'genre_ids', 'title', 'genres', 'media_type'
			// ]);
		});
	}
}
