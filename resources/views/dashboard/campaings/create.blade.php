<x-app-layout>
    @section('body')


<div class="bg-gray-100 m-12 p-6">

    <div class="p-12">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

    <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Create Project</h3>
          <p class="mt-1 text-sm text-gray-600">
            Please create your Campaign by filling the form
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="project_name" class="block text-sm font-medium text-gray-700">
                    Name of the project
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="text" name="name" id="project_name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{ old('name') }}">
                  </div>
                </div>
              </div>

              <div class="col-span-6">
                <div>
                  <label for="about" class="block text-sm font-medium text-gray-700">
                  Description
                  </label>
                  <div class="mt-1">
                    <textarea id="project_description" name="description" rows="10" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Description détaillée de votre projet">{{ old('description') }}</textarea>
                  </div>
                  <p class="mt-2 text-sm text-gray-500">
                    Description en détail de votre projet.
                  </p>
                </div>
              </div>


              <div class="col-span-6 sm:col-span-3">
                  <input type="hidden" name="owner_id" value="{{ auth()->user()->id}}">
              </div>


              <div class="col-span-6 sm:col-span-3">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount in XAF(FCFA)</label>
                <input type="number" name="amount" id="project_amount" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('amount') }}">
              </div>


              <div class="col-span-6 sm:col-span-3">
                <label for="project_days" class="block text-sm font-medium text-gray-700">Days</label>
                <input type="number" name="days" id="project_days" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('days') }}">
              </div>


            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>

  <script type="text/javascript" src="{{ asset('js/dashboard/ckeditor.js')}}"></script>

  <script>

      ClassicEditor
            .create( document.querySelector( '#project_description' ) , {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
            })
            .catch( error => {
                console.error( error );
            } );
  </script>


@endsection
</x-app-layout>
