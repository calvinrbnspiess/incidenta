<x-app-layout>
    <div class="flex-col flex-grow">
             <div class="flex items-center py-4">
                <h1 class="pt-0 pb-0">Einsätze</h1>
                @if(Auth::user())
                <button class="button ml-4" data-type="modal-trigger" data-url="/incidents/create">Neuen Einsatz anlegen</button>
                @endif
             </div>
            <div class="overflow-x-auto lg:overflow-x-visible">
                @if(count($incidents) === 0)
                <td>Noch keine Einsätze vorhanden</td>
                @else
                <table class="table-auto whitespace-nowrap lg:whitespace-normal w-full">
                    <thead>
                        <th>Nr</th>
                        <th>Datum/Uhrzeit</th>
                        <th>Stichwort</th>
                        <th>Einsatzstelle</th>
                        <th>Dauer</th>
                        @if(Auth::user())
                            <th>Aktionen</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach($incidents as $incident)
                            <tr>
                                <td class="w-1">{{ count($incidents) - $loop->index }}</td>
                                <td>{{ date("d.m.y/H:m", strtotime($incident->date)) }}</td>
                                <td>{{ $incident->title }}</td>
                                <td>{{ $incident->zipcode }} {{ $incident->city }}, {{ $incident->street }}</td>
                                <td class="w-1">{{ $incident->duration }}h</td>
                                <td>
                                    <a class="button flex justify-center" href="/incidents/{{$incident->id}}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
    </div>
</x-app-layout>
