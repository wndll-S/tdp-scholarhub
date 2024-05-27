<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\ApplicationFilter;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ApplicationResource;
use App\Http\Resources\V1\ApplicationCollection;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ApplicationFilter();
        $filterItems = $filter->transform($request);

        $relationships = [];

        if ($request->query('includeStudent')) {
             $relationships[] = 'student';
        }

        $application = Application::where($filterItems);

       if(!empty($relationships)){
            $application = $application->with($relationships);
       }

       return new ApplicationCollection($application->paginate()->appends($request->query()));

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
    public function store(StoreApplicationRequest $request)
    {
        $validatedData = $request->validated();
        $application = Application::create($validatedData);
        return response()->json($application, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $relationships = [];

        if (request()->query('includeStudent')) {
             $relationships[] = 'student';
        }
        if(!empty($relationships)){
            $application->loadMissing($relationships);
       }
        return new ApplicationResource($application);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
