<x-app-layout pageTitle="Upload Certificate Template">

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload Certificate Template') }}
            </h2>

            <x-link-button href="{{ route('template.index') }}">Back </x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-primary">Upload</h1>

                <a href="#" class="px-4 py-1.5 text-sm bg-primary hover:bg-primary/90 text-white rounded-lg font-semibold transition">
                    Back
                </a>
            </div>

            <div class="mt-8 bg-white shadow rounded-lg p-6 space-y-5">
                <h3 class="font-semibold">Important Notice for Uploads!!</h3>

                <ul class="list-disc ms-8 text-sm leading-relaxed">
                    <li>You cannot upload templates with thesame name more than once</li>
                    <li>Upload the zip file containing the template design and assets</li>
                    <li>Download the sample for more details</li>
                </ul>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-8 mt-8">

                <div class="max-w-xl mb-5 gap-5 flex flex-col md:flex-row items-center justify-between">
                    <h2 class="text-lg font-semibold">Upload Template</h2>
                    <a class="px-4 py-1.5 text-sm bg-blue-600 hover:bg-blue-600/90 text-white rounded-lg font-semibold transition" href="{{ asset('sample/rabbitmaid.zip') }}">Download Sample</a>
                </div>

                <div class="max-w-xl">
                    <form action="{{ route('template.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".zip" required class="border p-2 rounded block w-full">
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />

                        {{-- Submit --}}
                        <div class="pt-4">
                            <x-primary-button class="w-full justify-center">{{ __('Upload') }}</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
