<x-app-layout pageTitle="All Certificate Submissions">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Certificate Submissions') }}
            </h2>

            <x-link-button href="{{ route('certificate.create') }}">Generate </x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-table.default search_route="">

                <thead class="bg-gray-50">
                    <tr>
                        <th>#</th>
                        <th>Batch</th>
                        <th>Template</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($certificateSubmissions as $submission)
                    <tr class="hover:bg-gray-50 transition">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $submission->internshipBatch->title }}</td>
                        <td>{{ $submission->template->name }}</td>
                        <td>
                            @if($submission->status === 'pending')
                            <x-badge type="slate"> {{ $submission->status  }} </x-badge>
                            @endif

                            @if($submission->status === 'incomplete')
                            <x-badge type="orange"> {{ $submission->status  }} </x-badge>
                            @endif

                            @if($submission->status === 'generated')
                            <x-badge type="green"> {{ $submission->status  }} </x-badge>
                            @endif

                            @if($submission->status === 'failed')
                            <x-badge type="red"> {{ $submission->status  }} </x-badge>
                            @endif

                        </td>
                        <td>{{ $submission->created_at->toDateTimeString() }}</td>

                        <td class="flex items-center justify-end gap-x-2">

                            <form action="{{ route('submission.generate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="submission_id" value="{{ $submission->id }}" />
                                <button type="submit" class="bg-yellow-500 uppercase  font-semibold text-xs tracking-widest py-1 px-2 rounded text-center hover:bg-yellow-500/80 hover:shadow-sm" title="Generate Certificates">
                                    Generate
                                </button>
                            </form>

                            <form id="delete-form-{{ $submission->id }}" action="{{ route('submission.destroy') }}" method="POST" class="delete-form inline">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" name="id" value="{{ $submission->id }}">

                                <button type="button" class="delete-button bg-red-600 text-white py-1 px-2 rounded text-center text-sm hover:underline hover:opacity-95 hover:shadow-sm">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM13.4142 13.9997L15.182 15.7675L13.7678 17.1817L12 15.4139L10.2322 17.1817L8.81802 15.7675L10.5858 13.9997L8.81802 12.232L10.2322 10.8178L12 12.5855L13.7678 10.8178L15.182 12.232L13.4142 13.9997ZM9 4V6H15V4H9Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">No Certificates Submissions found.</td>
                    </tr>
                    @endforelse

                </tbody>

                <tfoot class="bg-gray-50">
                    <tr>
                        <th>#</th>
                        <th>Batch</th>
                        <th>Template</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </tfoot>

            </x-table.default>

            <div class="mt-6">
                {{ $certificateSubmissions->links() }}
            </div>


        </div>
    </div>


</x-app-layout>
