<div class="mt-8">
	<a 
		href="{{ $movie['route'] }}">
		<img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full hover:opacity-75 transition ease-in-out duration-150">
	</a>
	<div class="mt-2">
		<a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
		@unless( Request::is('actori/*') )
			<div class="flex items-center text-gray-400 text-sm mt-1">
				<svg class="fill-current text-orange-500 w-4" viewBox="0 -51.747 27.857 26.568"><path d="M27.857-41.45c0 .245-.145.513-.435.803l-6.077 5.926 1.44 8.37c.01.079.016.19.016.335a.986.986 0 01-.175.595c-.118.162-.288.242-.511.242-.212 0-.435-.067-.67-.2L13.93-29.33l-7.517 3.95c-.246.134-.469.201-.67.201-.234 0-.41-.08-.527-.242a.986.986 0 01-.176-.595c0-.067.011-.178.034-.334l1.44-8.371-6.094-5.926c-.28-.302-.419-.57-.419-.804 0-.413.313-.67.938-.77l8.404-1.222 3.766-7.617c.212-.458.486-.687.82-.687.335 0 .609.23.82.687l3.768 7.617 8.404 1.222c.625.1.937.357.937.77zm0 0"/></svg>
				<span class="ml-1">{{ $movie['vote_average'] }}</span>
				<span class="mx-2">|</span>
				<span>{{ $movie['release_date'] }}</span>
			</div>
			<div class="text-gray-400 text-sm">{{ $movie['genres'] }}</div>
		@else
			<small class="text-gray-600">({{ $movie['release_year'] }})</small>
			<div class="text-gray-400 text-sm">{{ __('as') }} {{ $movie['character'] }}</div>
		@endunless
	</div>
</div>