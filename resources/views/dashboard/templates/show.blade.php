@php $pageTitle = ucwords($template['slug']) . " Template" @endphp
<x-app-layout pageTitle="{{ $pageTitle }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(ucwords($template['slug']) . " Template") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="flex justify-end items-center mb-6">
                <x-link-button href="{{ route('template.index') }}">Back </x-link-button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                    
                    @if($dbTemplate->slug === $template['slug'])  

                        <div class="col-span-1 md:col-span-3 space-y-3 rounded-lg relative">

                            <div class="bg-white shadow-sm rounded-lg p-5">

                                @if($template['preview'] == "no-preview.png")

                                    <img class="w-full" src="{{ asset("images/{$template['preview']}") }}" alt="Preview" />
                        
                                @else
                                    @php 
                                        $previewPath = $template['slug'] . "/" .$template['preview']; 
                                    @endphp

                                    <img class="w-full" src="{{ Storage::disk('template')->url("$previewPath") }}" alt="Preview" />
                            
                                @endif
                           
                            </div>
                                     
                        </div>

                        <div class="col-span-1 bg-white overflow-hidden shadow-sm rounded-lg pb-5 relative h-fit">

                             @if($template['screenshot'] == "no-screenshot.png")

                                <img class="w-full" src="{{ asset("images/{$template['screenshot']}") }}" alt="Screenshot" />
                        
                            @else
                                @php 
                                    $screenShotPath = $template['slug'] . "/" .$template['screenshot']; 
                                @endphp

                                <img class="w-full h-[200px] object-cover" src="{{ Storage::disk('template')->url("$screenShotPath") }}" alt="Screenshot">
                            @endif

                            
                            <div class=" text-gray-900 px-5 my-3">
                                <h2 class="mb-2 text-lg font-semibold">  {{ __("Other Information") }}</h2>
                                
                                <ul class="space-y-3 mb-3">
                                    <li><strong>{{ __('Template Name') }} </strong> : <span>  {{ __($template['name']) }} </span></li>
                                    <li><strong>{{ __('Author') }}</strong> : <span> {{ __($template['author']) }}</span></li>
                                    <li><strong>{{ __('Email Address') }}</strong> : <span> {{ __($template['email']) }}</span></li>
                                    <li><strong>{{ __('Website') }}</strong> : <span> {{ __($template['website']) ?? '' }}</span></li>
                                    <li><strong>{{ __('Version') }}</strong> : <span> {{ $template['version'] }}</span></li>
                                </ul>

                                <p class="mb-5"> {{  $template['description'] }}</p>

                                 @if($dbTemplate->is_active) 
                                    <x-badge type="green"> Active </x-badge>
                                 @else
                                     <x-badge type="red"> Not Active </x-badge>
                                 @endif
                            </div>
                        </div>
                        
                    @endif
                
            </div>

        </div>
    </div>
</x-app-layout>
