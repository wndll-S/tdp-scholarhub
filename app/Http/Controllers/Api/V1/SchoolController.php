<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\SchoolResource;
use App\Http\Resources\V1\SchoolCollection;
use App\Filters\V1\SchoolFilter;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new SchoolFilter();
        $filterItems = $filter->transform($request);

          // Define an array to hold the relationships to include
        $relationships = [];

        // Check each query parameter and add the corresponding relationship to the array
        if ($request->query('includeEducationalDetail')) {
            $relationships[] = 'education_details';
        }
        if ($request->query('includeDocument')) {
            $relationships[] = 'documents';
        }
        if ($request->query('includeAnotherRelationship')) {
            $relationships[] = 'announcements'; // Replace with the actual relationship name
        }
        if ($request->query('includeStudent')) {
            $relationships[] = 'education_details.student'; // Replace with the actual relationship name
        }
        // Add more conditions here for other relationships

        $school = School::where($filterItems);

        // Include the relationships if any were specified
        if (!empty($relationships)) {
            $school = $school->with($relationships);
        }

        return new SchoolCollection($school->paginate()->appends($request->query()));

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
    public function store(StoreSchoolRequest $request)
    {
            $validatedData = $request->validated();
            $schools = School::create($validatedData);
            return response()->json($schools, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        // Define an array to hold the relationships to include
    $relationships = [];

/*
In this code:
    1. `filter_var with FILTER_VALIDATE_BOOLEAN is used to correctly convert the query parameter value to a boolean. It also handles case insensitivity for "true" and "false".
    2. If the query parameter is not present or cannot be interpreted as a boolean, FILTER_NULL_ON_FAILURE ensures the value is null.
    3. The relationships are only included if the corresponding query parameter evaluates to true.
*/
/*
    $includeEducationalDetail = filter_var(request()->query('includeEducationalDetail'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    $includeDocument = filter_var(request()->query('includeDocument'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    $includeAnotherRelationship = filter_var(request()->query('includeAnotherRelationship'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
*/

    if (request()->query('includeEducationalDetail')) {
        $relationships[] = 'education_details';
    }
    if (request()->query('includeDocument')) {
        $relationships[] = 'documents';
    }
    if (request()->query('includeAnotherRelationship')) {
        $relationships[] = 'another_relationship'; // Replace with the actual relationship name
    }
    
    if (request()->query('includeStudent')) {
        $relationships[] = 'education_details.student'; // Replace with the actual relationship name
    }
    // Add more conditions here for other relationships

    // Load the relationships if any were specified
    if (!empty($relationships)) {
        $school->loadMissing($relationships);
    }

        
        return new SchoolResource($school);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
