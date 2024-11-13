
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }} : {{ $user->name }} (id: {{ $user->id }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- form --}}
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        {{-- blade directive method --}}
                        @method('PUT')
                        @csrf 

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-2 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="off" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>  

                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-2 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        {{-- buttons --}}
                        <div class="mb-4">
                            <a href="{{ route('user.index') }}" class="userEditBackBtn btn btn-nuetral">BACK</a>
                            <button class="userEditSaveBtn btn btn-primary">SAVE</button>                  
                        </div>
                        {{-- buttons --}}

                    </form>
                    {{-- form --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
