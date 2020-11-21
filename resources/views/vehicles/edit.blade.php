<form action="{{ url('vehicles/'.$vehicle->id)}}" method="POST">
    @method('PUT')
    @csrf
           <div>
               <label class="label" for="radioIdentificationPrefix">
               <input type="text" class="input-field" name="radioIdentificationPrefix" id="radioIdentificationPrefix" value="{{ old("radioIdentificationPrefix", $vehicle->radioIdentificationPrefix) }}">
               Kennung
               </label>
           </div>
           <div>
               <label class="label" for="radioIdentification">
               <input type="text" class="input-field" name="radioIdentification" id="radioIdentification" value="{{ old("radioIdentification", $vehicle->radioIdentification) }}">
               Funkrufname
               </label>
           </div>
           <div>
              <label class="label" for="name">
                Fahrzeugbezeichnung
                </label>
               <input type="text" class="input-field" name="name" id="name" value="{{ old("name", $vehicle->name) }}">
           </div>
           <button type="submit">Fahrzeug bearbeiten</button>
       </fieldset>
   </form>
