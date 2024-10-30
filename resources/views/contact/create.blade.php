<x-app-layout>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create Contact</h2>

        <!-- Back Button -->
        <a href="{{ route('contact.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Contacts
        </a>

        <!-- Create Contact Form -->
        <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="contact" class="block text-gray-700 font-semibold">Contact Number</label>
                <input type="text" id="contact" name="contact" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="note" class="block text-gray-700 font-semibold">Note</label>
                <textarea id="note" name="note" class="w-full border border-gray-300 p-2 rounded-lg" rows="3"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Add Contact
            </button>
        </form>
    </div>
</x-app-layout>
