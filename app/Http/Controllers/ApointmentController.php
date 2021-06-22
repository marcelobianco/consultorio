<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\DataTables\ApointmentsDataTable;

class ApointmentController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApointmentsDataTable $dataTable)
    {
        return $dataTable->render('Apointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('Apointments.create', [
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor' => ['required'],
            'patient' => ['required'],
            'date' => ['required', 'date'],
        ]);

        Apointment::create([
            'doctor_id' => $request['doctor'],
            'patient_id' => $request['patient'],
            'date' => $request['date'],
        ]);

        return redirect()->route('Apointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apointment $apointment)
    {
        return view('apointments.show', compact('apointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apointment $apointment)
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('Apointments.edit', [
            'apointment' => $apointment,
            'doctors' => $doctors,
            'patients' => $patients
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        $validated = $request->validate([
            'doctor' => ['required'],
            'patient' => ['required'],
            'date' => ['required', 'date'],
        ]);

        $apointment = Apointment::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

        $apointment->update($dados);

        return redirect()->route('apointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $apointment = Apointment::findOrFail($id);

        $apointment->delete();

        return redirect()->route('apointments.index');
    }
}
