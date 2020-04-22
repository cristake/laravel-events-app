@extends('layouts.main')

@section('content')
	<div class="container mx-auto px-4 py-16">
		<div class="popular-actors">
			<h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ __('Popular Actors') }}</h2>

			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
				@foreach($popularActors as $actor)
					<div class="actor mt-8">
						<a href="{{ route('actors.show', $actor['id']) }}">
							<img src="{{ $actor['profile_path'] }}" alt="profile image" class="w-full hover:opacity-75 transitions ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
							<div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
						</div>
					</div>
				@endforeach
			</div>
		</div> {{-- end popular actors --}}

		<div class="page-load-status my-8">
			<div class="flex justify-center">
				<div class="spinner infinite-scroll-request my-8 text-4xl">&nbsp;</div>
				<p class="infinite-scroll-last">{{ __('End of content') }}</p>
				<p class="infinite-scroll-error">{{ __('There was an error, please refresh the page') }}</p>
			</div>
		</div>

		{{-- <div class="flex justify-between mt-16">
			@if($previous) <a href="/actori/pagina/{{ $previous }}">{{ __('Previous') }}</a> @else <div></div> @endif
			@if($next) <a href="/actori/pagina/{{ $next }}">{{ __('Next') }}</a> @else <div></div> @endif
		</div> --}}
	</div>
@endsection

@push('scripts')
	<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
	<script>
		var elem = document.querySelector('.grid');
		var infScroll = new InfiniteScroll( elem, {
			// options
			path: '/actori/pagina/@{{#}}',
			append: '.actor',
			status: '.page-load-status',
			history: false,
		});
	</script>
@endpush