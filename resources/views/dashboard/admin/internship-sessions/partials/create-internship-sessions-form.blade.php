<section>
    <form method="post" action="{{ route('internship-session.store') }}" class="mt-6 space-y-6">
        @csrf
        <div class="w-full">
            <x-input-label for="title" :is_required="true" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-y-5 md:gap-y-0 md:gap-x-5">
            <div class="w-full">
                <x-input-label for="startDate" :is_required="true" :value="__('Internship Start Date')" />
                <x-text-input id="startDate" name="start_date" type="date" class="mt-1 block w-full" :value="old('start_date')" required />
                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
            </div>

            <div class="w-full">
                <x-input-label for="endDate" :is_required="true" :value="__('Internship End Date')" />
                <x-text-input id="endDate" name="end_date" type="date" class="mt-1 block w-full" :value="old('end_date')" required />
                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
            </div>
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
