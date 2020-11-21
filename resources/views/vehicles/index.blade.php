<x-app-layout>
    <div class="flex-col flex-grow py-6 lg:py-12">
    <h1>Fahrzeuge</h1>
    <div class="grid grid-template grid-cols-1 lg:grid-cols-2 gap-2 gap-y-4">
    @foreach($vehicles as $vehicle)
        <div class="border-gray-900 border px-4 py-2 rounded-md flex flex-col justify-between">
            <div class="flex items-center">
                <h3 class="text-lg font-bold">{{ $vehicle->name }}</h3>
                <div class="tag ml-2">{{ $vehicle->radioIdentificationPrefix }} {{ $vehicle->radioIdentification }}</div>
            </div>
            <div>Kennung: {{ $vehicle->radioIdentificationPrefix }}</div>
            <div>Funkrufename: {{ $vehicle->radioIdentification }}</div>
            <div class="flex w-full mt-2">
                <button class="button flex-grow">Bearbeiten</button>
                <form action="{{ url('vehicles/'.$vehicle->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="button button--danger w-36 ml-2">Löschen</button>
                </form>
            </div>
        </div>
    @endforeach
    </div>
    <button class="button my-4">Neues Fahrzeug</button>
</div>
</x-app-layout>
