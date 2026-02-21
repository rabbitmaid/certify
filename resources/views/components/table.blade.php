  @props(['bulk_route' => '', 'search_route' => ''])

  <div class="overflow-x-auto bg-white shadow rounded-lg">

      
      <form action="{{ $bulk_route }}" method="POST" id="bulkForm">
             @csrf
      </form>
      
      <div class="my-5 flex flex-col md:flex-row space-y-5 md:space-y-0 justify-between items-center px-5">
          
         <div class="flex gap-2 w-full md:w-fit">
                  <x-select-input name="bulk_option" id="bulk-form-select" form="bulkForm">
                      <option disabled selected>Bulk Options</option>
                      <option value="approve">Approve</option>
                      <option value="unapprove">Unapprove</option>
                      <option value="delete">Delete</option>
                  </x-select-input>
                  <x-primary-button type="submit" form="bulkForm" class="bulk-button">Execute</x-primary-button>
         </div>

          <div class="w-full md:w-fit">

              <form action="{{ $search_route }}" method="POST">
                  @csrf
                  <div class="flex gap-2 w-full">
                      <x-text-input id="search" class="tableSearch block mt-1 w-full" type="text" name="search" :value="old('search')" target="listTable" placeholder='Search...' required autofocus />
                      <x-primary-button type="submit">Search</x-primary-button>
                  </div>
              </form>
          </div>

      </div>

        <table id="listTable" class="min-w-full divide-y divide-gray-200">
            {{ $slot }}
        </table>
   
  </div>
