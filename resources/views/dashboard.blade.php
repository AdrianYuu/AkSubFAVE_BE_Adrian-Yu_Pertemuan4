<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="mx-20 my-10">
            @if(Cookie::has('email'))
                <h1 class="mb-5">Welcome back, {{ Cookie::get('email') }} !</h1>
            @endif

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item Picture
                            </th>
                            @if(Auth::user()->is_admin == 1)
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($itemList as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->description }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ $item->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/images/' . $item->picture) }}" alt="itemPicture" style="width:150px; height:150px">
                                </td>
                                @if(Auth::user()->is_admin == 1)
                                <td class="px-6 py-4 flex gap-8">
                                    <a href="{{ route('edit', $item->id) }}" class="font-medium text-blue-600 dark:text-yellow-500 hover:underline">Edit</a>
                                    <a href="{{ route('delete', $item->id) }}" class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <h1 class="mb-4">There is no item!</h1>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
