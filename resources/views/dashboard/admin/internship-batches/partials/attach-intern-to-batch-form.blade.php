<section>
    <form method="post" action="{{ route('internship-batch.attach.store', $internshipBatch->id) }}" class="mt-6 space-y-6">
        @csrf
        <div class="w-full">
            <x-input-label for="title" :is_required="true" :value="__('Batch Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full disabled:bg-neutral-200" :value="$internshipBatch->title" disabled readonly />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div class="w-full">
            <x-input-label for="intern" :is_required="true" :value="__('Select Intern')" />
            <x-select-input name="intern_id" id="intern">
                <option disabled selected>Select Intern</option>
                @isset($interns)
                    @foreach($interns as $intern)
                        <option value="{{ $intern->id }}">{{ ucwords($intern->user->name) }} - {{ ucwords($intern->diploma) }}</option>
                    @endforeach
                @endif
            </x-select-input>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Attach') }}</x-primary-button>
        </div>
    </form>
</section>
