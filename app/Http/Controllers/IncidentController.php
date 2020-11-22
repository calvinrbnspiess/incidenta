<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Vehicle;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    private function validateRequest($request) {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'date' => 'required|before:now',
            'participants' => 'required|min:0',
            'participantsPA' => 'required|min:0',
            'duration' => 'required|gt:0',
            'zipcode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'category' => 'required',
        ]);
    }

    private function saveVehicles(Incident $incident, $vehicles){
        $incident->vehicles()->detach();
        foreach($vehicles as $vehicle) {
            if($vehicle === 0) {
                continue;
            }

            $vehicleEloquent = Vehicle::find($vehicle);

            if(isset($vehicleEloquent)) {
                $incident->vehicles()->save($vehicleEloquent);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incidents.index', array("incidents" => Incident::all()->sortByDesc("date")));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return response('Forbidden.', 403);
        }

        return view('incidents.edit', array("title" => "Einsatz erstellen", "url" => url('incidents'), "method" => "POST", "incident" => null, "vehicles" => Vehicle::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $incident = Incident::create($request->except("vehicles"));

        $this->saveVehicles($incident, $request->vehicles);

        return redirect()->route('incidents.show', [$incident->id])
            ->with('success', 'Einsatz erfolgreich angelegt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        return view('incidents.show', array("incident" => $incident));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function edit(Incident $incident)
    {
        return view('incidents.edit', array("title" => "Einsatz bearbeiten", "url" => url("incidents/".$incident->id), "method" => "PATCH", "incident" => $incident, "vehicles" => Vehicle::all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        $this->validateRequest($request);

        $incident->update($request->except("vehicles"));
        $this->saveVehicles($incident, $request->vehicles);

        return redirect()->route('incidents.show', [$incident->id])
            ->with('success', 'Einsatz wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect()->route('incidents.index')
            ->with('success', 'Einsatz wurde entfernt.');
    }
}