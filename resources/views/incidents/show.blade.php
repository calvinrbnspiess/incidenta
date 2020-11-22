<x-app-layout>
    <div class="flex-col flex-grow py-6 lg:py-12">
        <a class="button" href="/incidents">Zurück</a>
        <h1 class="pb-0">{{ $incident->title }}</h1>
        <h2 class="py-4">{{ date("d.m.Y H:m", strtotime($incident->date)) }} Uhr</h2>
        <table class="my-2">
            <tbody>
                <tr>
                    <td>Einsatzstelle</td>
                    <td>{{ $incident->zipcode }} {{ $incident->city }}, {{ $incident->street }}</td>
                </tr>
                <tr>
                    <td>
                        Einsatzkategorie
                    </td>
                    <td>
                        {{ $incident->category }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Dauer
                    </td>
                    <td>
                        {{ $incident->duration }}h
                    </td>
                </tr>
                <tr>
                    <td>
                        Einsatzkräfte
                    </td>
                    <td>
                        {{ $incident->participants }} ({{{ $incident->participantsPA }}} mit PA)
                    </td>
                </tr>
                <tr>
                    <td>
                        Fahrzeuge
                    </td>
                    <td>
                        <div class="flex flex-col lg:flex-row">
                            @foreach($incident->vehicles->map(function($vehicle) { return $vehicle->radioIdentificationPrefix." ".$vehicle->radioIdentification; }) as $vehicle)
                                <span class="tag m-2">
                                    {{ $vehicle }}
                                </span>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <h2 class="subtitle">Beschreibung</h2>
        <p>
            @if($incident->description)
                {{ $incident->description }}
            @else
                <i>Keine Beschreibung hinterlegt</i>
            @endif
        </p>
        @if(Auth::user())
        <div class="my-4 flex">
            <button class="button mr-2" data-type="modal-trigger" data-url="{{ url('incidents/'.$incident->id."/edit") }}">Einsatz bearbeiten</button>
            <form action="{{ url('incidents/'.$incident->id) }}"
                method="POST">
                @method('DELETE')
                @csrf
                <button class="button button--danger" type="submit">Einsatz löschen</button>
            </form>
        </div>
    @endif
    </div>
</x-app-layout>
