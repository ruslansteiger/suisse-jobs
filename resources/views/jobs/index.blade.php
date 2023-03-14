<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form
            class="space-y-8 divide-y divide-gray-200"
            method="POST"
            action="{{ route('jobs.store') }}"
        >
            @csrf
            <div class="space-y-4">
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
                            value="{{ old('title') }}"
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
                            value="{{ old('location') }}"
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
                            value="{{ old('url') }}"
                        />
                        <x-input-error :messages="$errors->get('url')" class="mt-1" />
                    </div>
                </div>
            </div>
            <div class="pt-5 flex justify-end">
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md bg-blue-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Post a Job
                </button>
            </div>
        </form>

        <div class="mt-6 space-y-4">
            @foreach ($jobs as $job)
                <div class="">
                    <a
                        class="p-6 flex space-x-2 bg-white hover:bg-blue-50 shadow-sm rounded-lg"
                        href="{{ $job->url }}"
                        target="_blank"
                    >
                        <svg class="h-6 w-6 text-gray-600 -scale-x-100"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800">{{ $job->user->name }}</span>
                                    <small class="ml-2 text-sm text-gray-600">{{ $job->created_at->format('j M Y, G:i') }}</small>
                                </div>
                                @unless ($job->created_at->eq($job->updated_at))
                                    <small class="text-sm text-gray-600">{{ __('edited') }}</small>
                                @endunless
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $job->title }}</p>
                            <p class="mt-2 text-base text-gray-900">{{ $job->location }}</p>
                        </div>
                    </a>
                    @if ($job->user->is(auth()->user()))
                        <div class="flex justify-between">
                            <a class="p-1 hover:text-blue-500" href="{{ route('jobs.edit', $job) }}">
                                {{ __('Edit') }}
                            </a>

                            <form method="POST" action="{{ route('jobs.destroy', $job) }}">
                                @csrf
                                @method('delete')
                                <button class="p-1 hover:text-red-500" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
