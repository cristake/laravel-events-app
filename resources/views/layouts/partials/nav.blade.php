<header
	@scroll.window="atTop = (window.pageYOffset > 30) ? false : true"
	class="w-full mt-0 top-0 py-4 px-4 md:px-8 lg:px-16 z-10 border-b border-blue-800 md:flex md:items-center"
	x-data="{ isOpen: false }"
>
	<!-- LEFT SIDE -->
	<nav class="flex justify-between items-center"> <!-- STEP 1: aliniem sigla si hamburgaer-ul -->
		<div class="logo m-0 p-0">
			<a href="{{ route('movies.index') }}">
				<svg class="w-56" viewBox="0 0 280.8 50"><path d="M24,21A2.85,2.85,0,0,1,26.07,22a2.82,2.82,0,0,1,1.07,2.06.63.63,0,0,0,1.26,0A2.87,2.87,0,0,1,29.47,22,2.85,2.85,0,0,1,31.53,21a.63.63,0,1,0,0-1.25,2.87,2.87,0,0,1-2.06-1.07,2.87,2.87,0,0,1-1.07-2.06.63.63,0,1,0-1.26,0,2.87,2.87,0,0,1-1.07,2.06A2.87,2.87,0,0,1,24,19.7.63.63,0,1,0,24,21ZM27,19.52a7.24,7.24,0,0,0,.81-.95,7.24,7.24,0,0,0,.81.95,6.63,6.63,0,0,0,1,.81,5.56,5.56,0,0,0-1,.81,6.47,6.47,0,0,0-.81.94,5.44,5.44,0,0,0-.81-.94,5.44,5.44,0,0,0-.94-.81A6.47,6.47,0,0,0,27,19.52Z" transform="translate(-9.59 -10)" fill="#ed8936"/><path d="M17.74,47.28c-1.77,0-2.53-.27-2.69-.44s-.44-.92-.44-2.69a.63.63,0,0,0-.63-.63.63.63,0,0,0-.63.63c0,1.77-.28,2.53-.44,2.69s-.92.44-2.69.44a.63.63,0,0,0-.63.63.63.63,0,0,0,.63.63,5,5,0,0,1,2.69.44,5,5,0,0,1,.44,2.69.63.63,0,0,0,1.26,0A5,5,0,0,1,15.05,49c.16-.16.92-.44,2.69-.44a.63.63,0,0,0,.63-.63A.63.63,0,0,0,17.74,47.28Zm-3.58.81-.18.23a2.31,2.31,0,0,0-.18-.23,2.31,2.31,0,0,0-.23-.18,2.31,2.31,0,0,0,.23-.18A2.31,2.31,0,0,0,14,47.5a1.41,1.41,0,0,0,.18.23,2.31,2.31,0,0,0,.23.18A2.31,2.31,0,0,0,14.16,48.09Z" transform="translate(-9.59 -10)" fill="#ed8936"/><path d="M46.54,39.76a4.41,4.41,0,0,1-3.3-1.09,4.46,4.46,0,0,1-1.07-3.3.63.63,0,0,0-1.25,0,4.49,4.49,0,0,1-1,3.3,4.55,4.55,0,0,1-3.34,1.09.63.63,0,0,0-.63.63.63.63,0,0,0,.63.63,4.61,4.61,0,0,1,3.38,1.16,4.07,4.07,0,0,1,1,3.19.63.63,0,0,0,1.25,0,4.06,4.06,0,0,1,1.07-3.19A4.34,4.34,0,0,1,46.54,41a.63.63,0,0,0,.63-.63A.63.63,0,0,0,46.54,39.76ZM42.39,41.3a4.5,4.5,0,0,0-.79,1.06,4.5,4.5,0,0,0-.79-1.06,4.72,4.72,0,0,0-1.24-.89,4.34,4.34,0,0,0,1.2-.85,4.28,4.28,0,0,0,.79-1.09,4.28,4.28,0,0,0,.79,1.09,4.41,4.41,0,0,0,1.22.86A5,5,0,0,0,42.39,41.3Z" transform="translate(-9.59 -10)" fill="#ed8936"/><path d="M29.89,40.32A18,18,0,0,1,27,39.49a28.21,28.21,0,0,1,4.54-1.11c4-.78,8.18-1.57,8.18-4.89V29.12h0c0-3.06-4.3-5.65-9.4-5.65a.63.63,0,0,0-.63.63v5a.63.63,0,0,0,.63.62A10.89,10.89,0,0,1,36.2,31.2a22.34,22.34,0,0,1-5.12,1.42c-3.78.74-7.7,1.52-7.7,4.63v4.39c0,2.38,1.79,3.41,3.74,4-2,.35-3.74.83-3.74,2.29v5a.63.63,0,0,0,1.26,0c0-.68,2.23-1.09,3.87-1.39,2.88-.52,6.16-1.12,6.16-3.63V43.53h0C34.67,41.41,32.24,40.86,29.89,40.32Zm1-15.59c4.34.2,7.52,2.4,7.52,4.37,0,.48-.57,1-1.1,1.36a11.32,11.32,0,0,0-6.42-2Zm.42,9.12c2.4-.48,4.89-1,6.34-2.08h0l.23-.17c.17-.12.35-.26.53-.41v2.3c0,2.28-3.65,3-7.17,3.65a20.85,20.85,0,0,0-5.63,1.59c-.64-.46-1-.79-1-1.48C24.64,35.17,28,34.5,31.33,33.85Zm-6.69,7.79V39.55l.39.29.2.14h0a12.43,12.43,0,0,0,4.38,1.57c2.3.52,3.8.94,3.8,2h0c0,.81-1.07,1.1-2.84,1.48l-.16,0-.69-.14C26.74,44.35,24.64,43.79,24.64,41.64Zm3.64,8.67a15.2,15.2,0,0,0-3.64.95V47.91c0-.64,2.26-1,3.76-1.23.72-.11,1.46-.23,2.13-.38h0l.28-.06a10.11,10.11,0,0,0,2.58-.79v2.46C33.41,49.37,30.69,49.87,28.28,50.31Z" transform="translate(-9.59 -10)" fill="#ed8936"/><path d="M25.89,29.1a.63.63,0,0,0-.63-.62c-5.86,0-6.89-1-6.89-6.9a.63.63,0,1,0-1.26,0c0,5.8-1.09,6.9-6.89,6.9a.63.63,0,1,0,0,1.25c5.8,0,6.89,1.1,6.89,6.9a.63.63,0,0,0,1.26,0c0-5.93,1-6.9,6.89-6.9A.63.63,0,0,0,25.89,29.1Zm-8.18,2.58a4.27,4.27,0,0,0-2.62-2.58,4.3,4.3,0,0,0,2.64-2.61,4.14,4.14,0,0,0,2.55,2.6A4.09,4.09,0,0,0,17.71,31.68Z" transform="translate(-9.59 -10)" fill="#ed8936"/><text transform="translate(49.64 39.38)" font-size="47.27" fill="#fff" font-family="Kefa-Bold, Kefa" font-weight="700">events<tspan x="146.94" y="0" fill="#ed8936">hall</tspan></text></svg>
			</a>
		</div>

		<div class="hamburger-btn md:hidden">
			<button @click="isOpen = !isOpen" class="block text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none" type="button">
				<svg class="fill-current w-6 h-6" viewBox="0 0 32 32">
					<path x-show="isOpen" d="M7.219 5.781L5.78 7.22 14.563 16 5.78 24.781l1.44 1.439L16 17.437l8.781 8.782 1.438-1.438L17.437 16l8.782-8.781L24.78 5.78 16 14.563z"/>
					<path x-show="!isOpen" d="M4 7v2h24V7zm0 8v2h24v-2zm0 8v2h24v-2z"/>
				</svg>
			</button>
		</div>
	</nav>

	<!-- RIGHT SIDE -->
	<div :class="{ 'hidden': !isOpen }" class="md:flex md:flex-auto md:items-center md:justify-between md:ml-8 lg:ml-16 py-4"> <!-- STEP 2: facem sa apara cu md:block sau md:flex; mutal search in dreapta cu md:justify-between -->
		<ul class="menu md:flex"> <!-- STEP 3: aliniem meniurile cu md:flex -->
			<!-- <li class="inline-block sm:w-full relative md:ml-16 mt-3 md:mt-0" x-data="{ isOpen: false }" @click.away.debounce.100ms="isOpen = false">
				<button 
					@mouseover.debounce.100ms="isOpen = true"
					@click.debounce.100ms="isOpen = !isOpen"
					class="inline-block focus:outline-none">
					{{ __('Cinema & TV') }}
				</button>
				<ul 
					x-show.transition.opacity="isOpen"
					class="absolute w-48 mt-2 z-50 bg-blue-800 rounded overflow-hidden shadow-md">
					<li class="border-b border-blue-700">
						<a class="block hover:bg-blue-700 px-3 py-3 flex items-center" href="{{ route('movies.index') }}" class="hover:text-blue-300">{{ __('Movies') }}</a>
					</li>
					<li class="border-b border-blue-700">
						<a class="block hover:bg-blue-700 px-3 py-3 flex items-center" href="{{ route('tv.index') }}" class="hover:text-blue-300">{{ __('TV Shows') }}</a>
					</li>
					<li>
						<a class="block hover:bg-blue-700 px-3 py-3 flex items-center" href="{{ route('actors.index') }}" class="hover:text-blue-300">{{ __('Actors') }}</a>
					</li>
				</ul>
			</li> -->
			<li class="mr-4 py-1">
				<a class="inline-block focus:ouline-none" href="{{ route('movies.index') }}" class="hover:text-blue-300">{{ __('Movies') }}</a>
			</li>
			<li class="mr-4 py-1">
				<a class="inline-block focus:ouline-none" href="{{ route('tv.index') }}" class="hover:text-blue-300">{{ __('TV Shows') }}</a>
			</li>
			<li class="mr-4 py-1">
				<a class="inline-block focus:ouline-none" href="{{ route('actors.index') }}" class="hover:text-blue-300">{{ __('Actors') }}</a>
			</li>
		</ul>

		<div class="search">
			<livewire:search-dropdown>
			
			<!-- <div class="md:ml-4 mt-3 md:mt-0">
				<a href="#">
					<img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
				</a>
			</div> -->
		</div>
	</div>
</header>