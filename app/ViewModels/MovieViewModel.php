<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;
use Stichoza\GoogleTranslate\GoogleTranslate;

class MovieViewModel extends ViewModel
{
	public $movie;

	public function __construct($movie)
	{
		$this->movie = $movie;
	}

	public function movie()
	{
		return collect($this->movie)->merge([
			'poster_path' => isset($this->movie['poster_path'])
				? config('services.tmdb.imgPath') . '/w500/' . $this->movie['poster_path']
				: 'https://via.placeholder.com/500x750?text=' . $this->movie['title'],
			'vote_average' => isset($this->movie['vote_average']) ? $this->movie['vote_average'] * 10 . '% (' . __('out of') . ' ' .  number_format($this->movie['vote_count'], 0, ',', '.') . ' ' . __('votes') . ')' : '',
			'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
			'vote_count' => number_format($this->movie['vote_count'], 0, ',', '.'),
			'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
			'crew' => collect($this->movie['credits']['crew'])->take(3),
			'cast' => collect($this->movie['credits']['cast'])->take(10),
			'backdrops' => collect($this->movie['images']['backdrops'])->take(9),
			'overview' => GoogleTranslate::trans(
				html_entity_decode($this->movie['overview']),
				'ro'
			),
			'route' => isset($this->movie['media_type'])
				? ($this->movie['media_type'] === 'tv'
					? route('tv.show', $this->movie['id'])
					: route('movies.show', $this->movie['id']))
				: route('movies.show', $this->movie['id'])
		]);
		// ->only([
		// 	'id', 'poster_path', 'vote_average', 'release_date', 'vote_count', 'genre_ids', 'title', 'overview', 'genres', 'credits', 'images', 'videos', 'crew', 'cast', 'backdrops', 'media_type'
		// ]);
	}
}
