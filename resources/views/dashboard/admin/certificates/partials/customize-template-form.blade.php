<section class="space-y-6">

   <div>
        <h3 class=" font-semibold">Customize Certificate Design</h3>
        <p class="text-red-500 text-sm">To get the best result modify only what is needed</p>
   </div>

    {{-- Certificate Heading --}}
    <div class="w-full">
        <x-input-label for="heading" :is_required="true" :value="__('Certificate Heading')" />
        <x-textarea id="heading" name="heading" class="mt-1 block w-full" rows="3" required>{!! old('heading', $heading) !!}</x-textarea>
        <x-input-error class="mt-2" :messages="$errors->get('heading')" />
    </div>


    {{-- Intro --}}
    <div class="w-full">
        <x-input-label for="intro" :is_required="true" :value="__('Certificate Intro')" />

        <x-textarea id="intro" name="intro" class="mt-1 block w-full" rows="2" required>{!! old('intro', $intro) !!}</x-textarea>
        <x-input-error class="mt-2" :messages="$errors->get('intro')" />
    </div>


    {{-- Year --}}
    <div class="w-full">
        <x-input-label for="year" :is_required="true" :value="__('Year')" />
        <x-text-input id="year" name="year" type="number" class="mt-1 block w-full" :value="old('year', $year)" required />
        <x-input-error class="mt-2" :messages="$errors->get('year')" />
    </div>



    {{-- Description --}}
    <div class="w-full">
        <x-input-label for="description" :is_required="true" :value="__('Certificate Description')" />
        <x-textarea id="description" name="description" class="mt-1 block w-full" rows="5" required>{!! old('description', $description) !!}</x-textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>


    {{-- Notice --}}
    <div class="w-full">
        <x-input-label for="notice" :is_required="true" :value="__('Certificate Notice')" />
       <x-textarea id="notice" name="notice" class="mt-1 block w-full" rows="5"  required>{!! old('notice', $notice) !!}</x-textarea>
        <x-input-error class="mt-2" :messages="$errors->get('notice')" />
    </div>

</section>
