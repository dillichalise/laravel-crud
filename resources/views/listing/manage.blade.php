<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>

                @unless ($lists->isEmpty())
                    @foreach ($lists as $list)
                        <tr class="border-gray-300">
                            <div>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/list-detail/{{ $list->id }}">
                                        {{ $list->title }}
                                    </a>
                                </td>
                                <td class="px-4
                            py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/list-detail/{{ $list->id }}" class="text-blue-400 px-6 py-2 rounded-xl">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="POST" action="/listing/{{ $list->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray300">
                        <td class="px-4 py-8 border-t border-b border-gray-coo">
                            <p class="xt-center">No Listings found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
