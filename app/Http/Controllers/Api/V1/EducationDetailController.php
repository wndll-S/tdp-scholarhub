<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\EducationDetailFilter;
use App\Models\EducationDetail;
use App\Http\Requests\StoreEducationDetailRequest;
use App\Http\Requests\UpdateEducationDetailRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EducationDetailCollection;
use App\Http\Resources\V1\EducationDetailResource;
use Illuminate\Http\Request;

class EducationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new EducationDetailFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new EducationDetailCollection(EducationDetail::paginate());
        }else{
            $education = EducationDetail::where($queryItems)->paginate();
            return new EducationDetailCollection($education->appends($request->query()));
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
    public function store(StoreEducationDetailRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(EducationDetail $educationDetail)
    {
        return new EducationDetailResource($educationDetail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationDetail $educationDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationDetailRequest $request, EducationDetail $educationDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationDetail $educationDetail)
    {
        //
    }
}
