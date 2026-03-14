<section>
     <h3 class="mb-5 font-semibold">Create Certificates</h3>

    <div class="flex items-center flex-col lg:flex-row gap-3">
        <div class="w-full">
            <x-input-label for="internship_batch" :is_required="true" :value="__('Select Internship Batch')" />
            <x-select-input name="internship_batch_id" id="internship_batch" class="searchable">
                <option disabled selected>Select Batch</option>
                @isset($internshipBatches)
                    @foreach($internshipBatches as $internshipBatch)
                        <option value="{{ $internshipBatch->id }}">{{ ucwords($internshipBatch->title) }}</option>
                    @endforeach
                @endif
            </x-select-input>
        </div>


        <div class="w-full">
            <x-input-label for="template" :is_required="true" :value="__('Select Certificate Template')" />
            <x-select-input name="template_id" id="template" class="searchable">
                <option disabled selected>Select Template</option>
                @isset($templates)
                    @foreach($templates as $template)
                        <option value="{{ $template->id }}">{{ ucwords($template->name) }}</option>
                    @endforeach
                @endif
            </x-select-input>
        </div>
    </div>
</section>
