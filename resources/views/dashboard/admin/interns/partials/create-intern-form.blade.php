<section>
    <form method="post" action="{{ route('intern.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <h4 class="block font-medium text-sm text-gray-700">Salutation <span class="required">*</span></h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">
                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="miss" value="miss" {{ old('salutation') == 'miss' ? 'checked' : '' }}>
                    <x-input-label for="miss" class="inline-block cursor-pointer" :value="__('Miss')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="mr" value="mr" {{ old('salutation') == 'mr' ? 'checked' : '' }}>
                    <x-input-label for="mr" class="inline-block cursor-pointer" :value="__('Mr')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="mrs" value="mrs" {{ old('salutation') == 'mrs' ? 'checked' : '' }}>
                    <x-input-label for="mrs" class="inline-block cursor-pointer" :value="__('Mrs')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="dr" value="dr" {{ old('salutation') == 'dr' ? 'checked' : '' }}>
                    <x-input-label for="dr" class="inline-block cursor-pointer" :value="__('Dr')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="prof" value="prof" {{ old('salutation') == 'prof' ? 'checked' : '' }}>
                    <x-input-label for="prof" class="inline-block cursor-pointer" :value="__('Prof')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="chief" value="chief" {{ old('salutation') == 'chief' ? 'checked' : '' }}>
                    <x-input-label for="chief" class="inline-block cursor-pointer" :value="__('Chief')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="engr" value="engr" {{ old('salutation') == 'engr' ? 'checked' : '' }}>
                    <x-input-label for="engr" class="inline-block cursor-pointer" :value="__('Engr')" />
                </div>

            </div>

            <x-input-error class="mt-2" :messages="$errors->get('salutation')" />

        </div>


        <div class="w-full">
            <x-input-label for="user" :is_required="true" :value="__('Select User Account')" />
            <x-select-input name="user_id" id="user">
                <option disabled selected>Select User</option>
               @isset($users)
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ ucwords($user->name) }}</option>
                    @endforeach
               @endif
            </x-select-input>
        </div>

        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="idCardNumber" :is_required="true" :value="__('ID Card Number')" />
                <x-text-input id="idCardNumber" name="id_card_number" type="text" class="mt-1 block w-full" :value="old('id_card_number')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('id_card_number')" />
            </div>

            <div class="w-full">
                <x-input-label for="phone" :is_required="true" :value="__('Telephone Number')" />
                <x-text-input id="phone" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number')" />
                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
            </div>

            <div class="w-full">
                <x-input-label for="dateOfBirth" :is_required="true" :value="__('Date of Birth')" />
                <x-text-input id="dateOfBirth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth')" required />
                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>
        </div>


        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="school" :value="__('School')" />
                <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" :value="old('school')" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="w-full">
                <x-input-label for="level" :value="__('Current Level')" />
                <x-text-input id="level" name="level" type="text" class="mt-1 block w-full" :value="old('level')" />
                <x-input-error class="mt-2" :messages="$errors->get('level')" />
            </div>
        </div>


        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="diploma" :value="__('Academic Diploma (HND, Bsc, BTecH, MTecH, Msc, ...etc)')" />
                <x-text-input id="diploma" name="diploma" type="text" class="mt-1 block w-full" :value="old('diploma')" required />
                <x-input-error class="mt-2" :messages="$errors->get('diploma')" />
            </div>

            <div class="w-full">
                <x-input-label for="department" :value="__('Department (Software Engineering, Computer Networking, ...etc)')" />
                <x-text-input id="department" name="department" type="text" class="mt-1 block w-full" :value="old('department')" />
                <x-input-error class="mt-2" :messages="$errors->get('department')" />
            </div>
        </div>


        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="duration" :is_required="true" :value="__('Internship Duration (weeks)')" />
                <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full" :value="old('duration')" required />
                <x-input-error class="mt-2" :messages="$errors->get('duration')" />
            </div>


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


        <div class="flex flex-col gap-y-8 lg:gap-y-0 lg:flex-row lg:items-center lg:justify-start gap-x-32">
            <div>
                <h4 class="block font-medium text-sm text-gray-700">Preferred Language <span class="required">*</span></h4>
                <div class="radio-group flex items-center gap-x-3 flex-wrap">
                    <div class="item flex-shrink-0">
                        <input type="radio" name="language" id="english" value="english" {{ old('language') == 'english' ? 'checked' : '' }}>
                        <x-input-label for="english" class="inline-block cursor-pointer" :value="__('English')" />
                    </div>

                    <div class="item flex-shrink-0">
                        <input type="radio" name="language" id="french" value="french" {{ old('language') == 'french' ? 'checked' : '' }}>
                        <x-input-label for="french" class="inline-block cursor-pointer" :value="__('French')" />
                    </div>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('language')" />
            </div>
        </div>


        <div class="w-full">
            <x-input-label for="otherRelevantInformation" :value="__('Other Relevant Information (Professional experiences, ...etc)')" />
            <x-textarea id="otherRelevantInformation" name="other_information" class="mt-1 block w-full">{{ old('other_information') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('other_information')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Complete Registration') }}</x-primary-button>
        </div>
    </form>
</section>
