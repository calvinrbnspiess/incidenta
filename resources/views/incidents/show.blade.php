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
                        <div class="flex">
                            @foreach($incident->vehicles->map(function($vehicle) { return $vehicle->radioIdentification; }) as $vehicle)
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
            {{ $incident->description }}
        </p>
        @if(Auth::user())
        <div class="my-4">
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
