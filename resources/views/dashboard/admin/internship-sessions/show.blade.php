<x-app-layout pageTitle="Session #{{ $internshipSession->id }}">

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Session #".$internshipSession->id) }}
            </h2>

            <x-link-button href="{{ route('internship-session.index') }}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content -->
            <main class="space-y-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Session Information</h1>

                    <div class="mt-4 grid grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Title </p>
                                <p class="text-lg">{{ $internshipSession->title }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Status </p>
                                <p class="text-lg">
                                    @if($internshipSession->status === 'upcoming')
                                        <x-badge type="orange"> {{ $internshipSession->status  }} </x-badge>
                                    @endif

                                    @if($internshipSession->status === 'active')
                                        <x-badge type="green"> {{ $internshipSession->status  }} </x-badge>
                                    @endif

                                    @if($internshipSession->status === 'completed')
                                        <x-badge type="blue"> {{ $internshipSession->status  }} </x-badge>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div>

                            <div>
                                <p class="text-sm font-semibold text-gray-500">Start Date</p>
                                <p class="text-lg">{{ $internshipSession->start_date->toFormattedDayDateString() ?? '--' }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-gray-500">End Date</p>
                                <p class="text-lg">{{ $internshipSession->end_date->toFormattedDayDateString() ?? '--' }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Description</h1>

                    <div class="mt-4 gap-4 text-gray-700">
                        <div>
                            <p class="text-lg">{{ $internshipSession->description ?? '--' }}</p>
                        </div>
                    </div>
                </div>
            </main>


        </div>
    </div>
</x-app-layout>
