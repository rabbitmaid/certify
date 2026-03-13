<section>
    <form method="post" action="{{ route('internship-batch.update', $internshipBatch->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="w-full">
            <x-input-label for="title" :is_required="true" :value="__('Title')" />
            <x-text-input 
                id="title" 
                name="title" 
                type="text" 
                class="mt-1 block w-full" 
                :value="old('title', $internshipBatch->title)" 
                required 
                autofocus 
            />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        
       <div class="w-full">
            <x-input-label for="internship_session" :is_required="true" :value="__('Select Internship Session')" />
            <x-select-input name="internship_session_id" id="internship_session">
                <option disabled selected>Select Session</option>
                @isset($internshipSessions)
                    @foreach($internshipSessions as $internshipSession)
                        @if($internshipSession->id === $internshipBatch->internshipSession->id || old('internship_session_id') === $internshipSession->id)
                            <option value="{{ $internshipSession->id }}" selected>{{ ucwords($internshipSession->title) }}</option>
                        @else
                            <option value="{{ $internshipSession->id }}">{{ ucwords($internshipSession->title) }}</option>
                        @endif
                    @endforeach
                @endif
            </x-select-input>
        </div>

        <div class="w-full">
            <x-input-label for="category" :value="__('Category (Degree, HND, etc)')" />
            <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category', $internshipBatch->category)" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('category')" />
        </div>



        <div class="w-full">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" name="description" class="mt-1 block w-full">
                {{ old('description', $internshipBatch->description) }}
            </x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>
    </form>
</section>