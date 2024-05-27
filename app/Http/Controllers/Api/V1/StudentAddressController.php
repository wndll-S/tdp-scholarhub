<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\StudentAddress;
use App\Http\Requests\StoreStudentAddressRequest;
use App\Http\Requests\UpdateStudentAddressRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\StudentAddressResource;
use App\Http\Resources\V1\StudentAddressCollection;
use App\Filters\V1\StudentAddressFilter;

class StudentAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new StudentAddressFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new StudentAddressCollection(StudentAddress::paginate());
        }else{
            $students = StudentAddress::where($queryItems)->paginate();
            return new StudentAddressCollection($students->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentAddressRequest $request)
    {
            $validatedData = $request->validated();
            $studentAddress = StudentAddress::create($validatedData);
            return response()->json($studentAddress, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAddress $studentAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAddress $studentAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentAddressRequest $request, StudentAddress $studentAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAddress $studentAddress)
    {
        //
    }
}
