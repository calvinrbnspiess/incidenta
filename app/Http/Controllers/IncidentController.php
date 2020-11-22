<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
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

        return view('incidents.edit', array("title" => "Einsatz erstellen", "url" => url('incidents'), "method" => "POST", "incident" => null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'present|string',
            'date' => 'required|before:now',
            'participants' => 'required|gt:0',
            'participantsPA' => 'required|gt:0',
            'duration' => 'required|gt:0',
            'zipcode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'category' => 'required'
        ]);

        Incident::create($request->all());

        return redirect()->route('incidents.index')
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
        return view('incidents.edit', array("title" => "Einsatz bearbeiten", "url" => url("incidents/".$incident->id), "method" => "PATCH", "incident" => $incident));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'participants' => 'required',
            'participantsPA' => 'required',
            'duration' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'street' => 'required',
            'category' => 'required'
        ]);

        $incident->update($request->all());

        return redirect()->route('incidents.index')
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