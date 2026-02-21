<x-app-layout pageTitle="Interns">
    <x-slot name="header">
        <div class="flex justify-between items-center">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Interns') }}
            </h2>

            <x-link-button href="{{ route('intern.create') }}">Add New </x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
            <x-table search_route="" bulk_route="{{ route('intern.bulk.actions') }}">

                    <thead class="bg-gray-50">
                        <tr>
                            <th><input type="checkbox" id="selectAllCheckBoxes"></th>
                            <th>Name</th>                     
                            <th>Status</th>                     
                            <th>Matricule</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($interns as $intern)
                            <tr class="hover:bg-gray-50 transition">
                                <td>
                                    <input type="checkbox" name="interns[]" class="selectCheckBox" value="{{ $intern->id }}" form="bulkForm">
                                </td>
                                <td>{{ $intern->user->name }}</td>
                                <td>
                                    @if($intern->status === 'pending')
                                        <x-badge type="orange"> {{ $intern->status  }} </x-badge>
                                    @endif

                                    @if($intern->status === 'approved')
                                        <x-badge type="green"> {{ $intern->status  }} </x-badge>
                                    @endif

                                    @if($intern->status === 'rejected')
                                        <x-badge type="red"> {{ $intern->status  }} </x-badge>
                                    @endif

                                </td>
                                <td><strong>{{ $intern->matricule ?? '' }}</strong></td>
                                <td class="flex items-center justify-end gap-x-2">

                                    @if($intern->status === "rejected")
                                          <form action="{{ route('intern.approve') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="id" value="{{ $intern->id }}" />
                                            <button type="submit" class="bg-green-600 uppercase text-white font-semibold text-xs tracking-widest py-1 px-2 rounded text-center hover:bg-green-600/80 hover:shadow-sm" title="Approve">
                                                Approve
                                            </button>
                                        </form>
                                    @endif

                                    @if($intern->status === "pending")
                                        <form action="{{ route('intern.approve') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="id" value="{{ $intern->id }}" />
                                            <button type="submit" class="bg-green-600 uppercase text-white font-semibold text-xs tracking-widest py-1 px-2 rounded text-center hover:bg-green-600/80 hover:shadow-sm" title="Approve">
                                                Approve
                                            </button>
                                        </form>

                                            <a href="{{ route('intern.reject.reason', $intern->id) }}" class=" bg-red-600 uppercase text-white font-semibold text-xs tracking-widest py-1 px-2 rounded text-center hover:bg-red-600/80 hover:shadow-sm" title="Reject">
                                                Reject
                                            </a>
                                       
                                    @endif

                                    @if($intern->status === "approved")

                                        <form action="{{ route('intern.unapprove') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="id" value="{{ $intern->id }}" />
                                            <button type="submit" class="bg-yellow-500 uppercase  font-semibold text-xs tracking-widest py-1 px-2 rounded text-center hover:bg-yellow-500/80 hover:shadow-sm" title="Approve">
                                                Unapprove
                                            </button>
                                        </form>

                                    @endif
    
                                    <a href="{{ route('intern.show', $intern->id) }}" class="bg-gray-800 text-white py-1 px-2 rounded text-center text-sm hover:underline hover:opacity-95 hover:shadow-sm" title="View">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path></svg>
                                    </a>
    
                                    <a href="{{ route('intern.edit', $intern->id) }}" class="bg-yellow-500 py-1 px-2 rounded text-center text-sm hover:underline hover:opacity-95 hover:shadow-sm" title="Edit">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16.7574 2.99678L14.7574 4.99678H5V18.9968H19V9.23943L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>
                                    </a>                               

                                    <form id="delete-form-{{ $intern->id }}" 
                                        action="{{ route('intern.destroy') }}"  
                                        method="POST" 
                                        class="delete-form inline">
                                        @csrf
                                        @method('DELETE')
    
                                        <input type="hidden" name="id" value="{{ $intern->id }}">
    
                                        <button type="button"
                                            class="delete-button bg-red-600 text-white py-1 px-2 rounded text-center text-sm hover:underline hover:opacity-95 hover:shadow-sm">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM13.4142 13.9997L15.182 15.7675L13.7678 17.1817L12 15.4139L10.2322 17.1817L8.81802 15.7675L10.5858 13.9997L8.81802 12.232L10.2322 10.8178L12 12.5855L13.7678 10.8178L15.182 12.232L13.4142 13.9997ZM9 4V6H15V4H9Z"/>
                                            </svg>
                                        </button>
                                    </form> 
    
    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">No interns found.</td>
                            </tr>
                        @endforelse
    
                    </tbody>

                    <tfoot class="bg-gray-50">
                        <tr>
                            <th>#</th>
                            <th>Name</th>                     
                            <th>Status</th>
                            <th>Matricule</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </tfoot>

            </x-table>
    
            <div class="mt-6">
                {{ $interns->links() }}
            </div>

    
        </div>
    </div>


</x-app-layout>
