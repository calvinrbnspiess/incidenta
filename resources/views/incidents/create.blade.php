<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <form method="post" action="{{ url('incidents')}}" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        @method('POST')
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h2 class="subtitle">Neuen Einsatz anlegen</h2>
            <label class="label" for="title">
                Titel
            <input type="text" class="input-field" name="title" id="title" value="{{ old('title') }}">
            </label>
            <label class="label" for="description">
                Kategorie
                <input type="text" class="input-field" name="category" id="category" placeholder="z.b. Brandeinsatz" value="{{ old('category') }}">
            </label>
            <label class="label" for="title">
                Datum und Uhrzeit
            <input type="datetime-local" class="input-field" name="date" id="date" value="{{ old('date') }}">
            </label>
            <label class="label" for="title">
                Einsatzdauer in Stunden
                <input type="number" class="input-field" name="duration" id="duration" step=0.5 min="0" value="{{ old('duration') }}">
            </label>
            <label class="label" for="description">
                Einsatzort
                <div class="grid lg:grid-flow-col gap-2">
                    <input type="text" class="input-field" name="zipcode" id="zipcode" placeholder="Postleitzahl" value="{{ old('zipcode') }}">
                    <input type="text" class="input-field" name="city" id="city" placeholder="Stadt" value="{{ old('city') }}">
                    <input type="text" class="input-field" name="street" id="street" placeholder="Straße" value="{{ old('street') }}">
                </div>
            </label>
            <label class="label" for="title">
                Einsatzkräfte und PA-Träger
                <div class="grid lg:grid-flow-col gap-2">
                    <input type="number" class="input-field" placeholder="Einsatzkräfte" name="participants" id="participants" value="{{ old('participants') }}">
                    <input type="number" class="input-field" placeholder="PA-Träger" name="participantsPA" id="participantsPA" value="{{ old('participantsPA') }}">
                </div>
            </label>
            <label class="label" for="description">
                Beschreibung
                <textarea class="input-field" name="description" id="description" value="{{ old('description') }}"></textarea>
            </label>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex justify-end">
            <button type="button" id="modal-cancel" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Abbrechen
            </button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Fertigstellen
          </button>
        </div>
      </div>
    </form>
  </div>
