<x-app-layout>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Contact Details</h2>

        <!-- Back Button -->
        <a href="{{ route('contact.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Contacts
        </a>

        <!-- Edit Button -->
        <a href="{{ route('contact.edit', $contact->id) }}" rel="noopener noreferrer" class="flex flex-right mb-6">
            <button type="button" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </span>
                <span>Edit</span>
            </button>
        </a>

        <!-- Display Contact Information -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Name</label>
                <p class="border border-gray-300 p-2 rounded-lg">{{ $contact->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Contact Number</label>
                <p class="border border-gray-300 p-2 rounded-lg">{{ $contact->contact }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Note</label>
                <p class="border border-gray-300 p-2 rounded-lg">{{ $contact->note }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
