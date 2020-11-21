<x-app-layout>
    <div class="flex-col flex-grow">
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
    <button class="button my-4" id="create-vehicle">Neues Fahrzeug</button>
</div>
<div id="modal"></div>
<script>
    document.querySelector("#create-vehicle").addEventListener("click", () => {
        fetch("/vehicles/create").then(res => res.text()).then((text) => {
            document.querySelector("#modal").innerHTML = text;

            document.querySelector("#modal-cancel").addEventListener("click", () => {
                console.log("click")
                document.querySelector("#modal").innerHTML = "";
            })
        })
    })
</script>
</x-app-layout>
