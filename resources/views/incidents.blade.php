@extends('app')

@section('content')
    <h1>Einsätze</h1>

    @if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="overflow-x-auto lg:overflow-visible">
    <table class="table-auto whitespace-nowrap lg:whitespace-normal">
        <thead>
            <th>ID</th>
            <th>Stichwort</th>
            <th>Beschreibung</th>
            <th>Fahrzeuganzahl</th>
            <th>Fahrzeuge</th>
            <th>Aktionen</th>
        </thead>
        <tbody>
            @foreach($incidents as $incident)
            <tr>
                <td>{{ $incident->id }}</td>
                <td>{{ $incident->title }}</td>
                <td>{{ $incident->description }}</td>
                <td>{{ count($incident->vehicles) }}</td>
                <td>{{ $incident->vehicles->map(function($vehicle) { return $vehicle->radioIdentification; })->join(", ") }}</td>
                <td>
                    <form action="{{ url('incidents/'.$incident->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="button" type="submit">Einsatz löschen</button>
                   </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
@endsection
