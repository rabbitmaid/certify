<section>
    <form method="post" action="{{ route('internship-batch.store') }}" class="mt-6 space-y-6">
        @csrf
        <div class="w-full">
            <x-input-label for="title" :is_required="true" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div class="w-full">
            <x-input-label for="internship_session" :is_required="true" :value="__('Select Internship Session')" />
            <x-select-input name="internship_session_id" id="internship_session">
                <option disabled selected>Select Session</option>
                @isset($internshipSessions)
                    @foreach($internshipSessions as $internshipSession)
                        <option value="{{ $internshipSession->id }}">{{ ucwords($internshipSession->title) }}</option>
                    @endforeach
                @endif
            </x-select-input>
        </div>

        <div class="w-full">
            <x-input-label for="category" :value="__('Category (Degree, HND, etc)')" />
            <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category')" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('category')" />
        </div>

        <div class="w-full">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>
        </div>
    </form>
</section>
