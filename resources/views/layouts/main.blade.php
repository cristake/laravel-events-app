<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Movie App</title>

	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<livewire:styles>

	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	{{-- <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}
	{{-- <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script> --}}
</head>
<body id="top" class="font-sans bg-blue-900 text-white" x-data="{ atTop: true }">
	@include('layouts.partials.nav')

	@yield('content')

	<a href="#top" x-show="!atTop" class="fixed w-6 h-6 items-center z-10 right-16 bottom-16">
		<svg class="bg-blue-800 rounded-md shadow-lg p-5" viewBox="0 0 20 20"><path d="M2.582 13.891c-.272.268-.709.268-.979 0s-.271-.701 0-.969l7.908-7.83a.697.697 0 01.979 0l7.908 7.83a.68.68 0 010 .969.695.695 0 01-.978 0L10 6.75l-7.418 7.141z"/></svg>
	</a>

	<livewire:scripts>
	@stack('scripts')
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script>
		// Select all links with hashes
		$('a[href*="#"]')
		// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.click(function(event) {
			// On-page links
			if (
				location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
				&& location.hostname == this.hostname
			) {
				// Figure out element to scroll to
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				// Does a scroll target exist?
				if (target.length) {
					// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					$('html, body').animate({
						scrollTop: target.offset().top-48
					}, 1000);
				}
			}
		});
	</script>
</body>
</html>