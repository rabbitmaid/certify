<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certificate Themes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                @forelse ($templates as $template)

                
                @foreach ($dbTemplates as $dbTemplate )
                    
                    @if($dbTemplate->slug === $template['slug'])  

                        <div class="bg-white overflow-hidden shadow-sm rounded-lg pb-5 relative">

                            @if($template['screenshot'] == "no-screenshot.png")
                                <img class="w-full" src="{{ asset("images/{$template['screenshot']}") }}" alt="Screenshot" />
                            @else
                                @php 
                                    $screenShotPath = $template['slug'] . "/" .$template['screenshot']; 
                                @endphp

                                <img src="{{ Storage::disk('template')->url("$screenShotPath") }}" alt="Screenshot">
                            @endif

                            <div class=" text-gray-900 px-3 my-5">
                                <h2 class="mb-2 text-lg font-semibold flex items-center justify-between gap-x-3">  
                                    {{ __($template['name']) }}
                                    @if($dbTemplate->is_active) 
                                        <x-badge type="green"> Active </x-badge>
                                    @else
                                        <x-badge type="red"> Not Active </x-badge>
                                    @endif
                                </h2>
                                <p> {{  Str::limit(__($template['description']), 40) }}</p>
                            </div>

                            <div class="px-3 flex justify-start gap-x-2">

                                @if($dbTemplate->is_active)
                                    <form action="">
                                        <x-danger-button>
                                            {{ __('Deactivate') }}
                                        </x-danger-button>
                                    </form>

                                    @else

                                        <form action="">
                                            <x-primary-button>
                                                {{ __('Activate') }}
                                            </x-primary-button>
                                        </form>

                                    @endif

                        
                                    <a href="{{ route('template.show', $template['slug']) }}" class="bg-blue-500 text-white py-1 px-2 rounded text-center text-sm hover:underline hover:opacity-95 hover:shadow-sm block w-fit flex items-center" title="View">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path></svg>
                                </a>
                             
                          </div>
                           
                        </div>
                        
                    @endif

                    @endforeach
                @empty
                    
                    <p>No templates Available at the Moment</p>
                    
                @endforelse
                
            </div>

        </div>
    </div>
</x-app-layout>
