@extends('app')

@section('content')
<div class="container">
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

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Stichwort</th>
            <th>Beschreibung</th>
            <th>Fahrzeuganzahl</th>
            <th>Fahrzeuge</th>
        </thead>
        <tbody>
            @foreach($incidents as $incident)
            <tr>
                <td>{{ $incident->id }}</td>
                <td>{{ $incident->title }}</td>
                <td>{{ $incident->description }}</td>
                <td>{{ count($incident->vehicles) }}</td>
                <td>{{ $incident->vehicles->map(function($vehicle) { return $vehicle->radioIdentification; })->join(", ") }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
