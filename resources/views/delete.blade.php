<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="mx-20 my-20">
                <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex">
                    <img src="{{ asset('storage/images/' . $item->picture) }}" class="card-img-top" alt="picture" style="width:300px; height:300px">
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->description }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp {{ $item->price }}</p>
                        <form action="{{ route('destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="flex">
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                <a href="{{ route('dashboard') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
