<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form
            class="space-y-4"
            method="POST"
            action="{{ route('jobs.update', $job) }}"
        >
            @csrf
            @method('patch')
            <div>
                <label
                    for="title"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Job Title</label>
                <div class="mt-2">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                        placeholder="Fullstack Developer"
                        value="{{ old('title', $job->title) }}"
                    />
                    <x-input-error :messages="$errors->get('title')" class="mt-1" />
                </div>
            </div>
            <div>
                <label
                    for="location"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Job Location</label>
                <div class="mt-2">
                    <input
                        type="text"
                        name="location"
                        id="location"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                        placeholder="Basel/Bern/Zürich/Remote"
                        value="{{ old('location', $job->location) }}"
                    />
                    <x-input-error :messages="$errors->get('location')" class="mt-1" />
                </div>
            </div>
            <div>
                <label
                    for="url"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >URL to Application</label>
                <div class="mt-2">
                    <input
                        type="text"
                        name="url"
                        id="url"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                        placeholder="https://yourcompany.com/careers"
                        value="{{ old('url', $job->url) }}"
                    />
                    <x-input-error :messages="$errors->get('url')" class="mt-1" />
                </div>
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('jobs.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
