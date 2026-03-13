<x-app-layout pageTitle="Batch #{{ $internshipBatch->id }}">

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Batch #".$internshipBatch->id) }}
            </h2>

            <x-link-button href="{{ route('internship-batch.index') }}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content -->
            <main class="space-y-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Batch Information</h1>

                    <div class="mt-4 grid grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Title </p>
                                <p class="text-lg">{{ $internshipBatch->title }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Category </p>
                                <p class="text-lg">{{ $internshipBatch->category }}</p>
                            </div>
                            
                        </div>
                        <div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">End Date</p>
                                <p class="text-lg">{{ $internshipBatch->created_at->toFormattedDayDateString() ?? '--' }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Description</h1>

                    <div class="mt-4 gap-4 text-gray-700">
                        <div>
                            <p class="text-lg">{{ $internshipBatch->description ?? '--' }}</p>
                        </div>
                    </div>
                </div>
            </main>


        </div>
    </div>
</x-app-layout>
