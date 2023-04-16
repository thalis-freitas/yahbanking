<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight break-word">
                Atualizar Informações do Cliente: {{ $client->getFullName() }}
            </h2>
            @if ($client->avatar)
                <img class="rounded-full w-16 sm:w-12 md:w-16" alt="{{ $client->name . 'avatar' }}"
                    src="{{ $client->getAvatarUrl() }}">
            @else
                <img class="w-16 sm:w-12 md:w-16" alt="{{ $client->name . 'avatar' }}"
                    src="/img/avatardefault.svg">
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
            @if($errors->any())
            <div class="bg-red-700 text-white p-4 rounded font-bold mb-10">
                Não foi possível atualizar o cadastro.
            </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('clients.update', $client->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Nome</label>
                        <input type="text" class="w-full rounded" name="name" value="{{ $client->name }}">
                        @error('name')
                            <span class="text-red-600"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Sobrenome</label>
                        <input type="text" class="w-full rounded" name="last_name" value="{{ $client->last_name }}">
                        @error('last_name')
                            <span class="text-red-600"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">E-mail</label>
                        <input type="text" class="w-full rounded" name="email" value="{{ $client->email }}">
                        @error('email')
                            <span class="text-red-600"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="avatar" class="block text-white font-bold mb-2">Avatar</label>
                        <div class="relative">
                            <input type="file" class="opacity-0 absolute inset-0 w-full h-full" name="avatar"
                                   id="avatar">
                            <div class="flex items-center justify-center w-full h-12 border rounded
                                        hover:bg-gray-100">
                                <span class="text-gray-500 font-semibold">Selecionar arquivo</span>
                            </div>
                        </div>
                        @error('avatar')
                            <span class="text-red-600"> {{ $message }} </span>
                        @enderror
                    </div>
                    <button class="px-4 py-2 shadow text-white font-bold
                                    bg-green-700 hover:bg-green-900 rounded
                                    transition ease-in-out duration-500">
                        Atualizar Dados
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
