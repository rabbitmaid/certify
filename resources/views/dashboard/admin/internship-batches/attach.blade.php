<x-app-layout pageTitle="Add Intern to Batch">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Intern to Batch') }}
            </h2>
            <x-link-button href="{{ route('internship-batch.index') }}">Back</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.admin.internship-batches.partials.attach-intern-to-batch-form')
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="uppercase font-semibold mb-5">Batch Interns</h3>
                <div class=" text-gray-900">
                    <table class="w-full">

                        <thead class="bg-gray-50">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Matricule</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($attachedInterns as $intern)
                            <tr class="hover:bg-gray-50 transition">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $intern->user->name }}</td>

                                <td><strong>{{ $intern->matricule ?? '' }}</strong></td>
                                <td class="flex items-center justify-end gap-x-2">



                                    <form action="{{ route('internship-batch.detach', $internshipBatch->id)}}" method="POST" class="detach-form inline">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" name="intern_id" value="{{ $intern->id }}">

                                        <button type="button" class="detach-button bg-red-600 text-white py-1 px-2 rounded text-center text-sm hover:underline hover:opacity-95 hover:shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </button>
                                    </form>


                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">No interns found.</td>
                            </tr>
                            @endforelse

                        </tbody>

                        <tfoot class="bg-gray-50">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Matricule</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </tfoot>

                    </table>

                    <div class="mt-6">
                        {{ $attachedInterns->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
