<nav>
    <div class="px-5 hidden lg:flex sticky top-0 z-40 h-24">
        <div class="w-full my-auto">
            <div class="flex items-center justify-end h-16">
                <div class="flex items-center">
                    <div class="flex items-baseline space-x-4">
                        @foreach($menus as $menu)
                            @if($menu->hasChild()) 
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex flex-row items-center w-full px-3 py-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline hover:bg-gray-200 hover:bg-opacity-20">
                                    <span>{{ __($menu->name) }}</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                                    <div class="px-2 py-2 bg-white rounded-lg shadow dark-mode:bg-gray-800">
                                        @foreach($menu->getChild() as $child)
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-gray-900 hover:bg-gray-100 focus:bg-gray-100 bg-opacity-20 focus:outline-none" href="{{ $child->link }}" target="{{ $child->target }}">{{ __($child->name) }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                                @if($menu->parent_id === null)
                                <a href="{{ $menu->link }}" class="px-3 py-2 text-sm font-semibold text-left bg-transparent {{ url()->current() === $menu->link ? 'bg-gray-200 bg-opacity-20' : '' }} rounded-lg md:w-auto md:inline hover:bg-gray-200 hover:bg-opacity-20" target="{{ $menu->target }}">{{ __($menu->name) }}</a>
                                @endif
                            @endif
                        @endforeach
                        @if(Auth::check() && Auth::user()->role == 7)
                            <a href="{{ route('admin') }}" class="px-3 py-2 text-sm font-semibold text-left bg-transparent border-dashed border-2 border-red-500 text-red-500 rounded-lg md:w-auto md:inline hover:bg-red-100 bg-opacity-20">{{ __('Admin') }}</a>
                        @endif
                    </div>
                </div>
                <div class="flex items-center">
                    <div>
                        @foreach(config('app.settings.socials') as $social)
                        <a href="{{ $social['link'] }}" target="_blank" class="ml-2 text-lg" rel="noopener noreferrer"><i class="{{ $social['icon'] }}"></i></a>
                        @endforeach
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="relative">
                            <form action="{{ route('locale', '') }}" id="locale-form" method="post">
                                @csrf
                                <select class="block appearance-none bg-white text-black cursor-pointer py-1 rounded-md focus:outline-none" name="locale" id="locale">
                                    @foreach(config('app.locales') as $locale)
                                    <option {{ (app()->getLocale() == $locale ) ? "selected" : "" }}>{{ $locale }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>

                    
                        <div class="sm:flex sm:items-center sm:ml-6 prio_dropdown">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('images/profile_pic.png') }}"
                                            alt="{{ (Auth::check()) ? Auth::user()->name : '' }}" />
                                    </button>
                                </x-slot>
                        
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    
                        
                                    {{-- @if(Auth::check() && Auth::user()->role == 1)
                        
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('appLogout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('appLogout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                    @endif --}}

                                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        <div class="py-2 text-xs text-gray-400">{{ __('You are You are signed in as') }}</div>
                                        {{ $emailProfileName }} <br>
                                        <span wire:click="showPasswordToggle" x-data="{ showPasswordLive: @entangle('showPassword') }" 
                                        @click.prevent @click.stop="setTimeout(() => showPasswordLive = false, 10000);"
                                        
                                        >Password: <span :class="{ 'blur_pass': !showPasswordLive }">{{ $password }}</span></span>
                                    </span>

                                    <x-jet-dropdown-link href="/profile">
                                        <i class="fas fa-user"></i> {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    {{-- <div class="accountList">
                                        @foreach($emails as $item)
                                            @if ($item['email'] != $emailProfileName)
                                                <x-jet-dropdown-link href="{{ route('switch', $item) }}">
                                                    <div class="flex min-w-0 gap-x-4">
                                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $item['emailPic'] }}" /> 
                                                        
                                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $item['email'] }}</p>
                                                    </div>
                                                    
                                                
                                                </x-jet-dropdown-link>
                                            @endif
                                        @endforeach
                                    </div> --}}

                                    <x-jet-dropdown-link href="/ulogin">
                                        <i class="fas fa-user"></i> {{ __('Login') }}
                                    </x-jet-dropdown-link>

                                    {{-- <x-jet-dropdown-link wire:click="triggerActionCreateAccount">
                                        {{ __('Create Account') }}
                                    </x-jet-dropdown-link> --}}

                                    <x-jet-dropdown-link href="/usignup">
                                        <i class="fas fa-user-plus"></i> {{ __('Create Account') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link wire:click="logoutEmail">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </x-jet-dropdown-link>

                                   
                                    <x-jet-dropdown-link>
                                        <dd class="flex items-baseline mt-1 text-sm"><span class="text-gray-600 dark:text-indigo-400 leading-5">
                                                {{ $storageUsed }} MB
                                            </span> <span class="ml-2 dark:text-gray-300 text-gray-500 font-medium leading-5">
                                                / 40 MB
                                            </span></dd>
                                    
                                        <dd class="mt-2">
                                            <div class="flex mb-4 h-2 text-xs bg-gray-200 dark:bg-gray-600 rounded overflow-hidden">
                                                <div class="flex flex-col justify-center text-center text-white whitespace-nowrap bg-gray-500 dark:bg-indigo-400 shadow-none"
                                                    style="width: {{ $storageUsedPercentage }}%;"></div>
                                            </div>
                                        </dd>
                                    </x-jet-dropdown-link>



                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    


                </div>
            </div>
        </div>
    </div>
    <div class="lg:hidden" x-data="{ open: false }">
        <div @click="open = true" class="toggle absolute top-6 right-6 w-8 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </div>
        
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false" class="flex-col lg:hidden fixed top-0 left-0 min-h-screen w-full bg-black bg-opacity-75 z-nav">
            <div @click="open = false" class="absolute top-6 right-6 w-8 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="w-full mx-auto mt-20">
                <div class="flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center space-y-2">
                        @foreach($menus as $menu)
                            @if($menu->hasChild()) 
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex flex-row items-center w-full px-3 py-2 text-sm text-white font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline focus:bg-gray-600 focus:outline-none">
                                    <span>{{ __($menu->name) }}</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-10">
                                    <div class="px-2 py-2 text-center bg-white text-black rounded-lg shadow dark-mode:bg-gray-800">
                                        @foreach($menu->getChild() as $child)
                                        <a class="block text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:bg-gray-500 focus:outline-none" href="{{ $child->link }}" target="{{ $child->target }}">{{ __($child->name) }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                                @if($menu->parent_id === null)
                                <a href="{{ $menu->link }}" class="px-3 py-2 text-sm font-semibold text-left bg-transparent text-white {{ url()->current() === $menu->link ? 'bg-gray-600' : '' }} rounded-lg md:w-auto md:inline focus:bg-gray-600 focus:outline-none" target="{{ $menu->target }}">{{ __($menu->name) }}</a>
                                @endif
                            @endif
                        @endforeach
                        @if(Auth::check() && Auth::user()->role == 7)
                            <a href="{{ route('admin') }}" class="px-3 py-2 text-sm font-semibold text-left bg-transparent border-dashed border-2 border-red-400 text-red-400 rounded-lg md:w-auto md:inline hover:bg-red-100">{{ __('Admin') }}</a>
                        @endif
                    </div>
                    <div class="flex flex-col items-center space-y-2 mt-10">
                        <div class="text-white space-x-2">
                            @foreach(config('app.settings.socials') as $social)
                            <a href="{{ $social['link'] }}" target="_blank" class="text-lg" rel="noopener noreferrer"><i class="{{ $social['icon'] }}"></i></a>
                            @endforeach
                        </div>
                        
                    </div>


                </div>
            </div>
        </div>

        <div class="mobile_lan flex items-center mt-4">
            <div class="relative">
                <form action="{{ route('locale', '') }}" id="locale-form-mobile" method="post">
                    @csrf
                    <select class="block appearance-none bg-black cursor-pointer py-1 rounded-md focus:outline-none" name="locale" id="locale-mobile">
                        @foreach(config('app.locales') as $locale)
                        <option {{ (app()->getLocale() == $locale ) ? "selected" : "" }}>{{ $locale }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>


        <div class="sm:flex sm:items-center sm:ml-6 prio_dropdown">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('images/profile_pic.png') }}"
                            alt="{{ (Auth::check()) ? Auth::user()->name : '' }}" />
                    </button>
                </x-slot>
        
                <x-slot name="content">
                    <!-- Account Management -->
                    
        
                    {{-- @if(Auth::check() && Auth::user()->role == 1)
        
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('appLogout') }}">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('appLogout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                    @endif --}}

                    <span class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                        <div class="py-2 text-xs text-gray-400">{{ __('You are You are signed in as') }}</div>
                        {{ $emailProfileName }} <br>
                        <span wire:click="showPasswordToggle" x-data="{ showPasswordLive: @entangle('showPassword') }" 
                        @click.prevent @click.stop="setTimeout(() => showPasswordLive = false, 10000);"
                        
                        >Password: <span :class="{ 'blur_pass': !showPasswordLive }">{{ $password }}</span></span>
                    </span>
{{-- 
                    <div class="accountList">
                        @foreach($emails as $item)
                            @if ($item['email'] != $emailProfileName)
                                <x-jet-dropdown-link href="{{ route('switch', $item) }}">
                                    <div class="flex min-w-0 gap-x-4">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $item['emailPic'] }}" /> 
                                        
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $item['email'] }}</p>
                                    </div>
                                    
                                
                                </x-jet-dropdown-link>
                            @endif
                        @endforeach
                    </div> --}}

                    <x-jet-dropdown-link href="/profile">
                        <i class="fas fa-user"></i> {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link href="/ulogin">
                        <i class="fas fa-user"></i> {{ __('Login') }}
                    </x-jet-dropdown-link>

                    {{-- <x-jet-dropdown-link wire:click="triggerActionCreateAccount">
                        {{ __('Create Account') }}
                    </x-jet-dropdown-link> --}}

                    <x-jet-dropdown-link href="/usignup">
                        <i class="fas fa-user-plus"></i> {{ __('Create Account') }}
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link wire:click="logoutEmail">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </x-jet-dropdown-link>

                   
                    <x-jet-dropdown-link>
                        <dd class="flex items-baseline mt-1 text-sm"><span class="text-gray-600 dark:text-indigo-400 leading-5">
                                {{ $storageUsed }} MB
                            </span> <span class="ml-2 dark:text-gray-300 text-gray-500 font-medium leading-5">
                                / 40 MB
                            </span></dd>
                    
                        <dd class="mt-2">
                            <div class="flex mb-4 h-2 text-xs bg-gray-200 dark:bg-gray-600 rounded overflow-hidden">
                                <div class="flex flex-col justify-center text-center text-white whitespace-nowrap bg-gray-500 dark:bg-indigo-400 shadow-none"
                                    style="width: {{ $storageUsedPercentage }}%;"></div>
                            </div>
                        </dd>
                    </x-jet-dropdown-link>



                </x-slot>
            </x-jet-dropdown>
        </div>


    </div>
</nav>