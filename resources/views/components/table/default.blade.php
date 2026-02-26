  @props(['search_route' => ''])

  <div class="overflow-x-auto bg-white shadow rounded-lg">

      <div class="my-5 flex flex-col md:flex-row space-y-5 md:space-y-0 justify-end items-center px-5">
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
