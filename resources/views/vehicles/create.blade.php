<form action="{{ url('vehicles')}}" method="POST">
    @csrf
       <h3>Neues Fahrzeug hinzufügen</h3>
           <div>
               <label class="label" for="radioIdentificationPrefix">
               <input type="text" class="input-field" name="radioIdentificationPrefix" id="radioIdentificationPrefix" value="{{ old('radioIdentificationPrefix') }}">
               Kennung
               </label>
           </div>
           <div>
               <label class="label" for="radioIdentification">
               <input type="text" class="input-field" name="radioIdentification" id="radioIdentification" value="{{ old('radioIdentification') }}">
               Funkrufname
               </label>
           </div>
           <div>
               <input type="text" class="input-field" name="name" id="name" value="{{ old('name') }}">
               <label class="label" for="name">
               Fahrzeugbezeichnung
               </label>
           </div>
           <button type="submit">Fahrzeug hinzufügen</button>
       </fieldset>
   </form>
