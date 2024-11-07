<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Mail Info') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Initial mail settings') }}
    </x-slot>
    
    <x-slot name="form">

        <div class="col-span-6">
            <small>{{ __('Mail Name') }}</small></small>
            <x-jet-input id="mailName" type="text" class="mt-1 block w-full" min="10" wire:model.defer="state.mailName" />
            <x-jet-input-error for="state.mailName" class="mt-2" />
        </div>

        <div class="col-span-6">
            <small>{{ __('Mail From') }}</small></small>
            <x-jet-input id="mailFrom" type="text" class="mt-1 block w-full" min="10" wire:model.defer="state.mailFrom" />
            <x-jet-input-error for="state.mailFrom" class="mt-2" />
        </div>

        <div class="col-span-6">
            <small>{{ __('Mail Subject') }}</small></small>
            <x-jet-input id="mailSubject" type="text" class="mt-1 block w-full" min="10" wire:model.defer="state.mailSubject" />
            <x-jet-input-error for="state.mailSubject" class="mt-2" />
        </div>


        <div class="col-span-6">
            <x-jet-label for="mailDetails" value="{{ __('Mail Details') }}" />
            <div class="relative">
                <textarea class="form-input rounded-md shadow-sm mt-4 block w-full resize-y border" placeholder="" wire:model.defer="state.mailDetails"></textarea>
            </div>
            <x-jet-input-error for="state.mailDetails" class="mt-2" />
        </div>


        
        
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