<div x-data="{ in_app: {{ $in_app ? 'true' : 'false' }} }" >
    <div class="lg:hidden">
        <div x-show.transition.in="in_app" class="app-action mt-4 px-8" style="display: none;">
            @if(count($emails) > 0 && $in_app)
            <div class="lg:max-w-72 lg:mx-auto">
                <a href="{{ route('mailbox') }}" class="block appearance-none w-full rounded-md my-5 py-3 px-5 bg-white bg-opacity-25 text-white text-sm cursor-pointer focus:outline-none"><i class="fas fa-angle-double-left"></i><span class="ml-2">{{ __('Get back to MailBox') }}</span></a>
            </div>
            @endif
            <form wire:submit.prevent="create" class="lg:max-w-72 lg:mx-auto" method="post">
                @if(config('app.settings.captcha') == 'hcaptcha' || config('app.settings.captcha') == 'recaptcha2')
                <x-captcha field="captcha" />
                @endif
                <input class="block appearance-none w-full border-0 rounded-md py-4 px-5 bg-white text-white bg-opacity-10 focus:outline-none placeholder-white placeholder-opacity-30" type="text" id="user" name="user" wire:model.defer="user" placeholder="{{ __('Recovery Mail') }}">
                <div class="divider mt-5"></div>
                <div class="relative">
                    <x-jet-dropdown width="w-full">
                        <x-slot name="trigger">
                            <input x-ref="domain" type="text" class="block appearance-none w-full border-0 bg-white text-white py-4 px-5 pr-8 bg-opacity-10 rounded-md cursor-pointer focus:outline-none select-none placeholder-white placeholder-opacity-30" placeholder="{{ __('Select Domain') }}" name="domain" wire:model="domain" readonly>
                        </x-slot>
                        <x-slot name="content">
                            @foreach($domains as $domain)
                            <a x-on:click="$refs.domain.value = '{{ $domain }}'; $wire.setDomain('{{ $domain }}')" class='block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'>{{ $domain }}</a>
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div class="divider mt-5"></div>
                <input class="block appearance-none w-full rounded-md py-4 px-5 bg-teal-500 text-white cursor-pointer focus:outline-none" style="background-color: {{ config('app.settings.colors.secondary') }}" type="submit" value="{{ __('Create') }}">
                <div class="divider my-8 flex justify-center">
                    <div class="border-t-2 w-2/3 border-white border-opacity-25"></div>
                </div>
            </form>
            <form wire:submit.prevent="random" class="lg:max-w-72 lg:mx-auto" method="post">
                <input class="block appearance-none w-full rounded-md py-4 px-5 bg-yellow-500 text-white cursor-pointer focus:outline-none" style="background-color: {{ config('app.settings.colors.tertiary') }}" type="submit" value="{{ __('Random') }}">
            </form>
            @if(!$in_app)
            <div class="lg:max-w-72 lg:mx-auto">
                <button x-on:click="in_app = false" class="block appearance-none w-full rounded-md mt-5 py-2 px-5 bg-white bg-opacity-10 text-white text-sm cursor-pointer focus:outline-none">{{ __('Cancel') }}</button>
            </div>
            @endif
        </div>
        <div x-show.transition.in="!in_app" class="head_mobile in-app-actions mt-4 px-8" style="display: none;">
            <form class="lg:max-w-72 lg:mx-auto my-select-box" action="#" method="post">
                <div class="relative">
                    <x-jet-dropdown align="top" width="w-full">
                        <x-slot name="trigger">
                            <div class="head_email block appearance-none w-full bg-white text-white py-4 px-5 pr-8 bg-opacity-10 rounded-md cursor-pointer focus:outline-none select-none" id="email_id">{{ $email }}</div>
                        </x-slot>
                        <x-slot name="content">
                            @foreach($emails as $item)
                            <x-jet-dropdown-link href="{{ route('switch', $item) }}">
                                {{ $item }}
                            </x-jet-dropdown-link>
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </form>
            <div class="divider mt-5"></div>
            <div class="text_box_area grid grid-cols-4 lg:grid-cols-4 gap-2 lg:gap-6 lg:max-w-72 lg:mx-auto">
                <div class="btn_copy bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl mx-auto">
                        <i class="far fa-copy"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info">{{ __('Copy') }}</div>
                </div>
                <div onclick="this.querySelector('.refresh').classList.remove('pause-spinner')" wire:click="$emit('fetchMessages')" class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl mx-auto">
                        <i class="refresh fas fa-sync-alt fa-spin"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info">{{ __('Refresh') }}</div>
                </div>
                {{-- <div x-on:click="in_app = true" class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl mx-auto">
                        <i class="far fa-plus-square"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info">{{ __('New') }}</div>
                </div> --}}
                <form wire:submit.prevent="random" class="flex" method="post">
                    <button class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer w-full" type="submit" value="{{ __('Create a Random Email') }}">
                        <div class="text-xl lg:text-3xl mx-auto">
                            <i class="far fa-plus-square"></i>
                        </div>
                        <div class="text-xs lg:text-base pt-5 text-info">{{ __('New Mail') }}</div>
                    </button>
                </form>
                <div wire:click="deleteEmail" class="bg-white bg-opacity-10 text-white rounded-md py-5 lg:py-10 text-center hover:bg-opacity-25 cursor-pointer">
                    <div class="text-xl lg:text-3xl  mx-auto">
                        <i class="far fa-trash-alt"></i>
                    </div>
                    <div class="text-xs lg:text-base pt-5 text-info">{{ __('Delete Mail') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block">
        <div x-show.transition.in="in_app" class="app-action mt-4 px-8" style="display: none;">
            @if(config('app.settings.captcha') == 'hcaptcha' || config('app.settings.captcha') == 'recaptcha2')
            <div class="flex items-center justify-center">
                <x-captcha field="captcha" />
            </div>
            @endif
            <form wire:submit.prevent="create" method="post">
                <div class="max-w-screen-lg mx-auto flex space-x-2 items-center">
                    @if(count($emails) > 0 && $in_app)
                    <a href="{{ route('mailbox') }}" class="appearance-none rounded-md py-3 px-5 bg-white bg-opacity-25 text-white text-sm cursor-pointer focus:outline-none"><i class="fas fa-angle-double-left"></i></a>
                    @endif
                    <div class="flex-1 bg-white text-white bg-opacity-20 rounded-md flex items-center">
                        <input class="appearance-none bg-transparent flex-1 border-0 rounded-md py-4 px-5 focus:outline-none placeholder-white placeholder-opacity-30" type="text" name="user" wire:model.defer="user" placeholder="{{ __('Enter Username') }}">
                        <div class="border-l-2 h-4 border-gray-200"></div>
                        <input class="appearance-none bg-transparent flex-1 border-0 rounded-md py-4 px-5 focus:outline-none placeholder-white placeholder-opacity-30" type="text" name="password" wire:model.defer="password" placeholder="{{ __('Password') }}">
                        <div class="border-l-2 h-4 border-gray-200"></div>
                        <input class="appearance-none bg-transparent flex-1 border-0 rounded-md py-4 px-5 focus:outline-none placeholder-white placeholder-opacity-30" type="text" name="recoveryMail" wire:model.defer="recoveryMail" placeholder="{{ __('Please insert valid mail') }}">
                        <div class="relative hidden">
                            <x-jet-dropdown width="w-full">
                                <x-slot name="trigger">
                                    <input x-ref="domain" type="text" class="block appearance-none bg-transparent border-0 w-full py-4 px-5 pr-8 cursor-pointer focus:outline-none select-none rounded-md placeholder-white placeholder-opacity-30" placeholder="{{ __('Select Domain') }}" name="domain" wire:model="domain" readonly>
                                </x-slot>
                                <x-slot name="content">
                                    @foreach($domains as $domain)
                                    <a x-on:click="$refs.domain.value = '{{ $domain }}'; $wire.setDomain('{{ $domain }}')" class='block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'>{{ $domain }}</a>
                                    @endforeach
                                </x-slot>
                            </x-jet-dropdown>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-gray-200">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        <input class="block appearance-none rounded-r-md py-4 px-5 bg-teal-500 text-white cursor-pointer focus:outline-none" style="background-color: {{ config('app.settings.colors.secondary') }}" type="submit" value="{{ __('Create') }}">
                    </div>
                </div>
            </form>
            <div class="py-2 text-gray-200 text-center">{{ __('or') }}</div>
            <form wire:submit.prevent="random" class="flex justify-center mb-1" method="post">
                <input class="appearance-none rounded-md py-2 px-5 bg-yellow-500 text-white cursor-pointer focus:outline-none" style="background-color: {{ config('app.settings.colors.tertiary') }}" type="submit" value="{{ __('Create a Random Email') }}">
                @if(!$in_app)
                <button type="button" x-on:click="in_app = false" class="ml-2 appearance-none rounded-md py-2 px-5 bg-white bg-opacity-10 text-white text-sm cursor-pointer focus:outline-none"><i class="fas fa-times"></i></button>
                @endif
            </form>
        </div>
        <div x-show.transition.in="!in_app" class="in-app-actions mt-4 px-8" style="display: none;">
            <form class="my-box max-w-screen-lg mx-auto" action="#" method="post">
                <div class="relative">
                    <x-jet-dropdown align="top" width="w-full">
                        <x-slot name="trigger">
                            <div class="block appearance-none w-full bg-white text-white py-4 px-5 pr-8 bg-opacity-10 rounded-md cursor-pointer focus:outline-none select-none">{{ $email }}</div>
                        </x-slot>
                        <x-slot name="content">
                            @foreach($emails as $item)
                            <x-jet-dropdown-link href="{{ route('switch', $item) }}">
                                {{ $item }}
                            </x-jet-dropdown-link>
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </form>
            <div class="divider mt-5"></div>
            <div class="grid grid-cols-4 gap-2 max-w-screen-lg mx-auto">
                <div class="btn_copy bg-white bg-opacity-10 text-white rounded-md py-2 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2">
                    <i class="far fa-copy"></i>
                    <div>{{ __('Copy') }}</div>
                </div>
                <div onclick="this.querySelector('.refresh').classList.remove('pause-spinner')" wire:click="$emit('fetchMessages')" class="bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer  flex justify-center items-center space-x-2">
                    <i class="refresh fas fa-sync-alt fa-spin"></i>
                    <div>{{ __('Refresh') }}</div>
                </div>
                {{-- <div x-on:click="in_app = true" class="bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2">
                    <i class="far fa-plus-square"></i>
                    <div>{{ __('New') }}</div>
                </div> --}}

                <form wire:submit.prevent="random" class="flex justify-center items-center space-x-2" method="post">
                    <button class="cursor-pointer focus:outline-none bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2 w-full" type="submit" value="{{ __('Create a Random Email') }}"><i class="far fa-plus-square"></i> <div>{{ __('New Mail') }}</div></button>
                </form>

                <div wire:click="deleteEmail" class="bg-white bg-opacity-10 text-white rounded-md py-5 text-center hover:bg-opacity-25 cursor-pointer flex justify-center items-center space-x-2">
                    <i class="far fa-trash-alt"></i>
                    <div>{{ __('Delete Mail') }}</div>
                </div>
            </div>
        </div>
    </div>
    @if(config('app.settings.captcha') == 'recaptcha3')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('app.settings.recaptcha3.site_key') }}"></script>
    <script>
        const handle = (e) => {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('app.settings.recaptcha3.site_key') }}', { action: 'submit' }).then(function(token) {
                    Livewire.emit('checkReCaptcha3', token, e.target.id);
                });
            });
        }
        document.getElementById('create').addEventListener('click', handle);
        document.getElementById('random').addEventListener('click', handle);
    </script>
    @endif
</div>