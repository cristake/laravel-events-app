<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="scroll-behavior: smooth;">
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
<body class="font-sans bg-gray-900 text-white">
	@include('layouts.partials.nav')

	@yield('content')

	<livewire:scripts>
	@stack('scripts')
</body>
</html>