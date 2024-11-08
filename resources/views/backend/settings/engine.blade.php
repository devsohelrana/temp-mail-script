<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Engine') }}
    </x-slot>

    <x-slot name="description">
        {{ __('You can select which engine to use with Priyo Mail. You can either use self-managed IMAP or use our dedicated product Priyo Mail Delivery.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="engine" value="{{ __('Engine') }}" />
            <div class="relative">
                <select class="form-input rounded-md shadow-sm mt-1 block w-full cursor-pointer"
                    wire:model="state.engine">
                    <option value="delivery">{{ __('PriyoMail Delivery') }}</option>
                    <option value="imap">{{ __('IMAP') }}</option>
                </select>
            </div>
            <x-jet-input-error for="state.engine" class="mt-2" />
        </div>
        @if ($state['engine'] == 'delivery')
            <a class="col-span-6 sm:col-span-4 px-5 py-3 rounded-md flex items-center justify-between font-bold"
                href="#" target="_blank" rel="noopener noreferrer"
                style="background-color: #383C72; color: #FFC145">
                <div class="flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="animate-bounce w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M14.615 1.595a.75.75 0 01.359.852L12.982 9.75h7.268a.75.75 0 01.548 1.262l-10.5 11.25a.75.75 0 01-1.272-.71l1.992-7.302H3.75a.75.75 0 01-.548-1.262l10.5-11.25a.75.75 0 01.913-.143z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __('Register for Priyo Mail Delivery') }}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M4.72 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 010-1.06zm6 0a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 010-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <div x-data="{ show: false }" class="col-span-6 sm:col-span-4">
                <x-jet-label for="delivery_key" value="{{ __('Delivery Authentication Key') }}" />
                <div class="relative">
                    <x-jet-input id="delivery_key" x-bind:type="show ? 'text' : 'password'"
                        class="mt-1 block w-full bg-gray-200 pr-28" autocomplete="off"
                        wire:model.defer="state.delivery.key" disabled />
                    <div class="flex items-center gap-2 absolute inset-y-0 right-0 uppercase text-xs mr-3">
                        <div id="delivery-copy-btn" data-copied="{{ __('Copied') }}" data-copy="{{ __('Copy') }}"
                            data-key="{{ $state['delivery']['key'] }}" class="cursor-pointer">{{ __('Copy') }}</div>
                        <div x-on:click="show = !show" x-text="show ? 'HIDE' : 'SHOW'" class="cursor-pointer"></div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
