<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Einsätze
        </h2>
    </x-slot>

    <div class="flex-col flex-grow py-6 lg:py-12">
            @if($message = Session::get('success'))
                <div>
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Einsätze</h1>
            <div class="overflow-x-auto lg:overflow-x-visible">
                <table class="table-auto whitespace-nowrap lg:whitespace-normal">
                    <thead>
                        <th>ID</th>
                        <th>Stichwort</th>
                        <th>Beschreibung</th>
                        <th>Fahrzeuganzahl</th>
                        <th>Fahrzeuge</th>
                        @if(Auth::user())
                            <th>Aktionen</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach($incidents as $incident)
                            <tr>
                                <td>{{ $incident->id }}</td>
                                <td>{{ $incident->title }}</td>
                                <td>{{ $incident->description }}</td>
                                <td>{{ count($incident->vehicles) }}</td>
                                <td>{{ $incident->vehicles->map(function($vehicle) { return $vehicle->radioIdentification; })->join(", ") }}
                                </td>
                                @if(Auth::user())
                                    <td>
                                        <form action="{{ url('incidents/'.$incident->id) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="button" type="submit">Einsatz löschen</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</x-app-layout>
