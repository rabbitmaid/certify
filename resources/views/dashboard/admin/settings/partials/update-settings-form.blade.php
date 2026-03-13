<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Settings Information') }}
        </h2>
    </header>

    <form method="post" action="{{ route('setting.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Company Name --}}
        <div>
            <x-input-label for="company_name" :value="__('Company Name')" />
            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $settings['company_name'] ?? '')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
        </div>

        {{-- Matricule Prefix --}}
        <div>
            <x-input-label for="matricule_prefix" :value="__('Matricule Prefix')" />
            <x-text-input id="matricule_prefix" name="matricule_prefix" type="text" class="mt-1 block w-full" :value="old('matricule_prefix', $settings['matricule_prefix'] ?? '')" required />
            <x-input-error class="mt-2" :messages="$errors->get('matricule_prefix')" />
        </div>

        {{-- Matricule Seperator --}}
        <div>
            <x-input-label for="matricule_seperator" :value="__('Matricule Seperator')" />
            <x-text-input id="matricule_seperator" name="matricule_seperator" type="text" class="mt-1 block w-full" :value="old('matricule_seperator', $settings['matricule_seperator'] ?? '')" required />
            <x-input-error class="mt-2" :messages="$errors->get('matricule_seperator')" />
        </div>

        {{-- Authorization --}}
        <div>
            <x-input-label for="authorization" :value="__('Authorization')" />
            <x-text-input id="authorization" name="authorization" type="text" class="mt-1 block w-full" :value="old('authorization', $settings['authorization'] ?? '')" required />
            <x-input-error class="mt-2" :messages="$errors->get('authorization')" />
        </div>


        <div>
            <x-input-label for="logo" :value="__('Logo')" />
            <input type="file" name="logo" accept=".png,.jpg,.jpeg" required class="border p-2 rounded block w-full">
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>

        <div>
            <h3 class="block font-medium text-sm text-gray-700 uppercase">
                Current Logo
            </h3>

            <div class="w-full bg-neutral-300 overflow-hidden h-[300px] flex items-center justify-center rounded-lg border border-primary-dark p-10">

                @if(!empty($settings['logo']))
                    <img id="letterHeadPreview" src="{{ asset('storage/' . $settings['logo']) }}" class="max-h-full w-full object-contain" alt="Current Image" />
                @else
                    <img id="letterHeadPreview" src="{{ asset('images/no-image.png') }}" class="max-h-full w-full object-contain" alt="No Image Found" />
                @endif

            </div>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                {{ __('Saved.') }}
            </p>
            @endif
        </div>

    </form>
</section>
