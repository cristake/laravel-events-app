@extends('layouts.main')

@section('content')
	<div class="movie-info border-b border-gray-800">
		<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
			<img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
			<div class="md:ml-24">
				<h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>

				<div class="flex flex-wrap items-center text-gray-400 text-sm">
					<svg class="fill-current text-orange-500 w-4" viewBox="0 -51.747 27.857 26.568"><path d="M27.857-41.45c0 .245-.145.513-.435.803l-6.077 5.926 1.44 8.37c.01.079.016.19.016.335a.986.986 0 01-.175.595c-.118.162-.288.242-.511.242-.212 0-.435-.067-.67-.2L13.93-29.33l-7.517 3.95c-.246.134-.469.201-.67.201-.234 0-.41-.08-.527-.242a.986.986 0 01-.176-.595c0-.067.011-.178.034-.334l1.44-8.371-6.094-5.926c-.28-.302-.419-.57-.419-.804 0-.413.313-.67.938-.77l8.404-1.222 3.766-7.617c.212-.458.486-.687.82-.687.335 0 .609.23.82.687l3.768 7.617 8.404 1.222c.625.1.937.357.937.77zm0 0"/></svg>
					<span class="ml-1">{{ $movie['vote_average'] }}</span>
					<span class="mx-2">|</span>
					<span>{{ $movie['release_date'] }}</span>
					<span class="mx-2">|</span>
					<span>{{ $movie['genres'] }}</span>
				</div>
				
				<p class="text-gray-300 mt-8">{{ $movie['overview'] }}</p>

				<div class="mt-12">
					<h4 class="text-white font-semibold">{{ __('Featured Crew') }}</h4>
					<div class="flex mt-4">
						@foreach ($movie['crew'] as $crew)
							<div class="mr-8">
								<div>{{ $crew['name'] }}</div>
								<div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
							</div>
						@endforeach
					</div>
				</div>

				<div x-data="{ isOpen: false }">
					@if( count($movie['videos']['results']) > 0 )
						<div class="mt-12">
							<button 
								@click="isOpen = true" 
								class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
								<svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
								<span class="ml-2">{{ __('Play Trailer') }}</span>
							</button>
						</div>

						<template x-if="isOpen">
							<div
								style="background-color: rgba(0, 0, 0, .5);"
								class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
							>
								<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
									<div class="bg-gray-900 rounded">
										<div class="flex justify-end pr-4 pt-2">
											<button
												@click="isOpen = false"
												@keydown.escape.window="isOpen = false"
												class="text-3xl leading-none hover:text-gray-300">&times;
											</button>
										</div>
										<div class="modal-body px-8 py-8">
											<div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
												<iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
						</template>
					@endif
				</div>
			</div>
		</div>
	</div> {{-- end movie-info --}}

	<div class="movie-cast border-b border-gray-800">
		<div class="container mx-auto px-4 py-16">
			<h2 class="text-4xl font-semibold">{{ __('Cast') }}</h2>

			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach ($movie['cast'] as $actor)
					<div class="mt-8">
						<a href="{{ route('actors.show', $actor['id']) }}">
							@if( $actor['profile_path'] )
								<img src="{{ 'https://image.tmdb.org/t/p/w300/'.$actor['profile_path'] }}" alt="{{ $actor['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
							@else
								<img src="https://via.placeholder.com/221x332.jpg&text={{ __('Photo not available') }}" alt="{{ __('Photo not available') }}" class="hover:opacity-75 transition ease-in-out duration-150">
							@endif
						</a>
						<div class="mt-2">
							<a href="{{ route('actors.show', $actor['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $actor['name'] }}</a>
							<div class="text-sm text-gray-400">
								{{ $actor['character'] }}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div> {{-- end movie-cast --}}

	<div class="movie-images" x-data="{ isOpen: false, image: ''}">
		@if( count($movie['images']['backdrops']) > 0 )
			<div class="container mx-auto px-4 py-16">
				<h2 class="text-4xl font-semibold">{{ __('Images') }}</h2>
			
				<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
					@foreach ($movie['backdrops'] as $image)
						<div class="mt-8">
							<a
								@click.prevent="
									isOpen = true
									image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
								"
								href="#"
							>
								<img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
							</a>
						</div>
					@endforeach
				</div>

				<div
					style="background-color: rgba(0, 0, 0, .5);"
					class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
					x-show.transition.opacity="isOpen"
				>
					<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
						<div class="bg-gray-900 rounded">
							<div class="flex justify-end pr-4 pt-2">
								<button
									@click="isOpen = false"
									@keydown.escape.window="isOpen = false"
									class="text-3xl leading-none hover:text-gray-300">&times;
								</button>
							</div>
							<div class="modal-body px-8 py-8">
								<img :src="image" alt="poster">
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
	</div> {{-- end movie-images --}}
@endsection