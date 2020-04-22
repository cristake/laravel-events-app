<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
	<input 
		wire:model.debounce.500ms="search" 
		@keydown.escape.window="isOpen = false"
		@focus="isOpen = true"
		@keydown="isOpen = true"
		@keydown.shift.tab="isOpen = false"
		type="text" 
		class="bg-gray-800 rounded-full text-sm w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" 
		placeholder="{{ __('Search') }}"
		x-ref="search"
		@keydown.window="
			if(event.keyCode === 191) {
				event.preventDefault();
				$refs.search.focus();
			}
		"
	>
	<div class="absolute top-0">
		<svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
	</div>

	<div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

	@if( strlen($search) >= 2 )
		<div 
			x-show.transition.opacity="isOpen" 
			class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-4">
			<ul>
				@forelse ($searchResults as $result)
					<li class="border-b border-gray-700">
						<a 
							@if($loop->last) @keydown.tab="isOpen = false" @endif
							href="{{ $result['media_type'] === 'person'
								? route('actors.show', $result['id']) 
								: ($result['media_type'] === 'tv' ? route('tv.show', $result['id']) : route('movies.show', $result['id'])) 
							}}" 
							class="block hover:bg-gray-700 px-3 py-3 flex items-center">
							@if( isset($result['poster_path']) )
								<img class="w-8" src="https://images.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster">
							@elseif( isset($result['profile_path']) )
								<img class="w-8" src="https://images.tmdb.org/t/p/w92/{{ $result['profile_path'] }}" alt="poster">
							@else
								<img class="w-8" src="https://via.placeholder.com/50x75" alt="poster">
							@endif
							<span class="ml-4">{{ isset($result['title']) ? $result['title'] : $result['name'] }}</span>
						</a>
					</li>
				@empty
					<li class="border-b border-gray-700 px-3 py-3">
						{{ __("No results for ':search'", ['search' => $search]) }}
					</li>
				@endforelse
			</ul>
		</div>
	@endif
</div>