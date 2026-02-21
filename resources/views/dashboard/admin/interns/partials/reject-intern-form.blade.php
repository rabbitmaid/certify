<section>
    <form method="post" action="{{ route('intern.reject') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
    
        <input type="hidden" name="id" value="{{ $intern->id }}" />

        <div class="w-full">
            <x-input-label for="rejection_reason" :value="__('Rejection Reason (leave empty incase of no reason)')" />
            <x-textarea id="rejection_reason" name="rejection_reason" class="mt-1 block w-full">{{ old('rejection_reason') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('rejection_reason')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Reject') }}</x-primary-button>
        </div>
    </form>
</section>
