<section>

    <form method="post" action="{{ route('submit.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name (As on Birth Certificate)*')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" placeholder="Ex. John Doe" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="idCardNumber" :value="__('ID Card Number*')" />
            <x-text-input id="idCardNumber" name="idCardNumber" type="text" class="mt-1 block w-full" :value="old('idCardNumber')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('idCardNumber')" />
        </div>

         <div>
            <x-input-label for="portfolio_link" :value="__('Portfolio Link*')" />
            <x-text-input id="portfolio_link" name="portfolio_link" type="url" class="mt-1 block w-full" :value="old('portfolio_link')" required autofocus placeholder="https://example.com" />
            <x-input-error class="mt-2" :messages="$errors->get('portfolio_link')" />
        </div>

        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full lg:basis-2/3">
                <x-input-label for="email" :value="__('Email*')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" placeholder="john@example.com" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="w-full lg:basis-1/3">
                <x-input-label for="phone" :value="__('Telephone Number*')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700">Gender *</label>
            <div class="radio-group flex items-center gap-x-3 flex-wrap">
                <div class="item flex-shrink-0">
                    <input type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    <x-input-label for="male" class="inline-block cursor-pointer" :value="__('Male')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <x-input-label for="female" class="inline-block cursor-pointer" :value="__('Female')" />
                </div>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>


        <div>
            <x-input-label for="otherInformation" :value="__('Tell us why you need this*')" />
            <x-textarea id="otherInformation" name="otherInformation" class="mt-1 block w-full">{{ old('otherInformation') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('otherInformation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit Certificate Request') }}</x-primary-button>
        </div>
    </form>
</section>
