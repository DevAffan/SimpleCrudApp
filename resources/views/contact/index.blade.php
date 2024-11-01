<x-app-layout>

{{-- If User has No contacts --}}
@if(empty($contacts->items()))
<div class="flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">It seems like you haven't added any contacts yet.</h1>
        <a href="{{ route('contact.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
            Add New Contact
        </a>
    </div>
</div>


@else

    <div class="container mx-auto mt-10 flex justify-end items-center">
            <!-- Create Button -->
        <a href="{{ route('contact.create') }}" class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Contact
        </a>
    </div>


    <div class="container mx-auto grid grid-cols-2 gap-6 mt-10">
        @foreach ($contacts as $contact)
        <!-- Card -->
        <div class="h-50 w-full rounded-lg bg-white ">
            <!-- Header -->
            <div class="flex items-center justify-between border-b bg-slate-200">
                <a href="{{route('contact.show', $contact->id)}}" rel="noopener noreferrer">
                    <div class="p-3 text-gray-700 text-lg font-bold">{{ $contact->name }}</div>
                </a>
                <div class="p-3 flex">
                    <a href="{{ route('contact.edit', $contact->id) }}" rel="noopener noreferrer">
                        <button type="button" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </span>
                            <span>Edit</span>
                        </button>
                    </a>

                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-slate-800 hover:text-red-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </span>
                            <span>Delete</span>
                        </button>
                    </form>

                </div>
            </div>
            <div class="p-3 text-lg text-gray-600">
                {{ $contact->contact }}
            </div>
            <div class="p-3 border-t text-lg text-gray-600">
                Note: {{ $contact->note }}
            </div>
        </div>
        {{-- <h2>{{ $contact->name }}</h2> --}}
        @endforeach
    </div>

    <div class="container mt-6 mx-auto">
        {{ $contacts->links() }}
    </div>

@endif
</x-app-layout>
