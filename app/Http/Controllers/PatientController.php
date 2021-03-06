<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Resources\Patient as PatientResource;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PatientResource::collection(Patient::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatientCreateRequest  $request
     * @return PatientResource
     */
    public function store(PatientCreateRequest $request)
    {
        $patient = Patient::create($request->validated());

        return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PatientUpdateRequest  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        $patient->forceFill($request->validated())->save();

        return new PatientResource($patient);
    }
}
