<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mail Account') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-50 text-gray-800 px-20 py-10">
                    <div class="alert alert-success">
                        {{ session()->get('status') ?: '' }}
                    </div>

                    <h2>{{ $log->email }}</h2>
                    <form action="{{ route('mail.update', $log->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="intro-y box p-5">
                            
                            
                            <div>
                                <label for="recoveryMail" class="form-label">Recovery Mail</label>
                                <input id="recoveryMail" name="recoveryMail" type="text" class="form-control w-full @error('recoveryMail') border-theme-6  @enderror" placeholder="Recovery Mail" value="{{ old('recoveryMail', $log->recoveryMail) }}">
                            
                                @error('recoveryMail')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            
                            </div>

                            <div class="mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="text" class="form-control w-full @error('password') border-theme-6  @enderror" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                                
                                <i>Keep it blank if you don't want to change the password</i>
                            
                                
                            
                            </div>

            
                            <div class="flex justify-between mt-5">
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-600 transition ease-in-out duration-150">Update</button>
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>