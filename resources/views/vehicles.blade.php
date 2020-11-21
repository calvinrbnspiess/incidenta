<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Fahrzeuge
        </h2>
    </x-slot>
    <div class="flex-col flex-grow py-6 lg:py-12">
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
    <h1>Fahrzeuge</h1>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Funkrufname</th>
            <th>Bezeichnung</th>
            <th>Bearbeiten</th>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->radioIdentificationPrefix }} {{ $vehicle->radioIdentification }}</td>
                <td>{{ $vehicle->name }}</td>
                <td>
                    <form action="{{ url('vehicles/'.$vehicle->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                               <div>
                                   <label for="radioIdentificationPrefix">
                                   <input type="text" name="radioIdentificationPrefix" id="radioIdentificationPrefix" value="{{ old("radioIdentificationPrefix", $vehicle->radioIdentificationPrefix) }}">
                                   Kennung
                                   </label>
                               </div>
                               <div>
                                   <label for="radioIdentification">
                                   <input type="text" name="radioIdentification" id="radioIdentification" value="{{ old("radioIdentification", $vehicle->radioIdentification) }}">
                                   Funkrufname
                                   </label>
                               </div>
                               <div>
                                   <input type="text" name="name" id="name" value="{{ old("name", $vehicle->name) }}">
                                   <label for="name">
                                   Fahrzeugbezeichnung
                                   </label>
                               </div>
                               <button type="submit">Fahrzeug bearbeiten</button>
                           </fieldset>
                       </form>
                       <form action="{{ url('vehicles/'.$vehicle->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Fahrzeug löschen</button>
                       </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ url('vehicles')}}" method="POST">
     @csrf
        <h3>Neues Fahrzeug hinzufügen</h3>
            <div>
                <label for="radioIdentificationPrefix">
                <input type="text" name="radioIdentificationPrefix" id="radioIdentificationPrefix" value="{{ old('radioIdentificationPrefix') }}">
                Kennung
                </label>
            </div>
            <div>
                <label for="radioIdentification">
                <input type="text" name="radioIdentification" id="radioIdentification" value="{{ old('radioIdentification') }}">
                Funkrufname
                </label>
            </div>
            <div>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                <label for="name">
                Fahrzeugbezeichnung
                </label>
            </div>
            <button type="submit">Fahrzeug hinzufügen</button>
        </fieldset>
    </form>
</div>
</x-app-layout>
