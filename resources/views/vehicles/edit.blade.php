<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <form method="post" action="{{ $url }}" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        @method($method)
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h2 class="subtitle">{{ $title }}</h2>
            <label class="label" for="name">
                Fahrzeugbezeichnung
            <input type="text" class="input-field" name="name" id="name" value="{{ old('name', optional($vehicle)->name) }}">
            </label>
            <label class="label" for="radioIdentificationPrefix">
                Funkrufname
                <div class="grid lg:grid-flow-col gap-2">
                    <input type="text" class="input-field" name="radioIdentificationPrefix" id="radioIdentificationPrefix" placeholder="Kennung" value="{{ old('radioIdentificationPrefix', optional($vehicle)->radioIdentificationPrefix) }}">
                    <input type="text" class="input-field" name="radioIdentification" id="radioIdentification" placeholder="Rufname" value="{{ old('radioIdentification', optional($vehicle)->radioIdentification) }}">
                </div>
            </label>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex justify-end">
            <button type="button" data-type="modal-cancel" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Abbrechen
            </button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Fertigstellen
          </button>
        </div>
      </div>
    </form>
  </div>
