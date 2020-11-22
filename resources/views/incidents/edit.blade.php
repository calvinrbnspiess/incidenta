<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <form method="post" action="{{ $url }}" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all max-h-screen overflow-y-scroll sm:my-4 sm:align-middle sm:max-w-2xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        @method($method)
        @csrf
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h2 class="subtitle">{{ $title }}</h2>
            <label class="label" for="title">
                Titel
            <input type="text" class="input-field" name="title" id="title" value="{{ old('title', optional($incident)->title) }}">
            </label>
            <label class="label" for="description">
                Kategorie
                <input type="text" class="input-field" name="category" id="category" placeholder="z.b. Brandeinsatz" value="{{ old('category', optional($incident)->category) }}">
            </label>
            <label class="label" for="title">
                Datum und Uhrzeit
            <input type="datetime-local" class="input-field" name="date" id="date" value="{{ old('date', isset($incident) ? date('Y-m-d\TH:i:s', strtotime($incident->date)) : null ) }}">
            </label>
            <label class="label" for="title">
                Einsatzdauer in Stunden
                <input type="number" class="input-field" name="duration" id="duration" step=0.5 min="0" value="{{ old('duration', optional($incident)->duration) }}">
            </label>
            <label class="label" for="description">
                Einsatzort
                <div class="grid lg:grid-flow-col gap-2">
                    <input type="text" class="input-field" name="zipcode" id="zipcode" placeholder="Postleitzahl" value="{{ old('zipcode', optional($incident)->zipcode) }}">
                    <input type="text" class="input-field" name="city" id="city" placeholder="Stadt" value="{{ old('city', optional($incident)->city) }}">
                    <input type="text" class="input-field" name="street" id="street" placeholder="Straße" value="{{ old('street', optional($incident)->street) }}">
                </div>
            </label>
            <label class="label" for="title">
                Einsatzkräfte und PA-Träger
                <div class="grid lg:grid-flow-col gap-2">
                    <input type="number" class="input-field" placeholder="Einsatzkräfte" name="participants" id="participants" value="{{ old('participants', optional($incident)->participants) }}">
                    <input type="number" class="input-field" placeholder="PA-Träger" name="participantsPA" id="participantsPA" value="{{ old('participantsPA', optional($incident)->participantsPA) }}">
                </div>
            </label>
            <label class="label" for="title">
                Fahrzeuge
                <select id="vehicles" name="vehicles[]" multiple class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" {{ isset($incident) && $incident->vehicles()->count() === 0 ? "selected" : "" }}>Keine Fahrzeuge</option>
                    @foreach($vehicles as $vehicle)
                     <option value="{{ $vehicle->id }}" {{ isset($incident) && $incident->vehicles->contains($vehicle) ? "selected" : "" }}>{{ $vehicle->name }} ({{ $vehicle->radioIdentificationPrefix }} {{ $vehicle->radioIdentification }})</option>
                    @endforeach
                  </select>
            </label>
            <label class="label" for="description">
                Beschreibung
                <textarea class="input-field h-36" name="description" id="description">{{ old('description', optional($incident)->description) }}</textarea>
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
