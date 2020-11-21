<x-app-layout>
    <div class="flex-col flex-grow">
             <div class="flex items-center py-4">
                <h1 class="pt-0 pb-0">Einsätze</h1>
                @if(Auth::user())
                <button class="button ml-4" id="create-incident">Neuen Einsatz anlegen</button>
                @endif
             </div>
            <div class="overflow-x-auto lg:overflow-x-visible">
                <table class="table-auto whitespace-nowrap lg:whitespace-normal w-full">
                    <thead>
                        <th>Nr</th>
                        <th>Datum/Unhrzeit</th>
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
            </div>
    </div>
    <div id="modal"></div>
    <script>
        document.querySelector("#create-incident").addEventListener("click", () => {
            fetch("/incidents/create").then(res => res.text()).then((text) => {
                document.querySelector("#modal").innerHTML = text;

                document.querySelector("#modal-cancel").addEventListener("click", () => {
                    console.log("click")
                    document.querySelector("#modal").innerHTML = "";
                })
            })
        })
    </script>
</x-app-layout>
