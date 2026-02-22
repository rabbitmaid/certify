<x-app-layout pageTitle="Intern #{{ $intern->id }}">

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Intern #".$intern->id) }}
            </h2>

            <x-link-button href="{{ route('intern.index') }}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content -->
            <main class="space-y-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Account Information</h1>

                    <div class="mt-4 grid grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <p class="text-sm font-semibold text-gray-500">Full Name </p>
                            <p class="text-lg">{{ $intern->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-500">Email Address</p>
                            <p class="text-lg font-bold">{{ $intern->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-500">Gender</p>
                            <p class="text-lg">{{ $intern->user->gender ?? "--" }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Email Verified</p>
                            <p class="text-lg">{{ $intern->user?->email_verified_at ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">User ID</p>
                            <p class="text-lg">#{{ $intern->user?->id ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Created</p>
                            <p class="text-lg">{{ $intern->user?->created_at ?? '--' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Personal Information</h1>

                    <div class="mt-4 grid grid-cols-3 gap-4 text-gray-700">
                        <div>
                            <p class="text-sm font-semibold text-gray-500">Salutation</p>
                            <p class="text-lg">{{ $intern->salutation ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500 ">Matricule </p>
                            <p class="text-xl font-bold text-gray-900">{{ $intern->matricule }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-500">ID Card Number</p>
                            <p class="text-lg font-bold">{{ $intern->id_card_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-500">Status</p>
                            <p class="text-lg font-bold">
                                @if($intern->status === 'pending')
                                <x-badge type="orange"> {{ $intern->status  }} </x-badge>
                                @endif

                                @if($intern->status === 'active')
                                <x-badge type="green"> {{ $intern->status  }} </x-badge>
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-500">Phone Number</p>
                            <p class="text-lg">{{ $intern->phone_number ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Date of Birth</p>
                            <p class="text-lg">{{ $intern->date_of_birth ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Prefered Language</p>
                            <p class="text-lg">{{ $intern->language ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">School</p>
                            <p class="text-lg">{{ $intern->school ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Diploma</p>
                            <p class="text-lg">{{ $intern->diploma ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Department</p>
                            <p class="text-lg">{{ $intern->department ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Level</p>
                            <p class="text-lg">{{ $intern->level ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Internship Duration</p>
                            <p class="text-lg">{{ $intern->duration ?? '--' }} {{ $intern->duration > 1 ? 'weeks' : 'week' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Internship Starts</p>
                            <p class="text-lg">{{ $intern->start_date->toDateString() ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Internship Ends</p>
                            <p class="text-lg">{{ $intern->end_date->toDateString() ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Profile ID</p>
                            <p class="text-lg">#{{ $intern->id ?? '--' }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500">Created</p>
                            <p class="text-lg">{{ $intern->created_at ?? '--' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-[#2b3990]">Other Information</h1>

                    <div class="mt-4 gap-4 text-gray-700">
                        <div>
                            <p class="text-lg">{{ $intern->other_information ?? '--' }}</p>
                        </div>
                    </div>
                </div>
            </main>


        </div>
    </div>
</x-app-layout>
