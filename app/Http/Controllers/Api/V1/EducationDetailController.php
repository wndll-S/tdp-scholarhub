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
        $filterItems = $filter->transform($request);

        $relationships = [];

            if ($request->query('includeSchool')) {
                $relationships[] = 'school';
            }
            if ($request->query('includeStudent')) {
                $relationships[] = 'student';
            }

        $educationDetail = EducationDetail::where($filterItems);

        if(!empty($relationships)){
                $educationDetail = $educationDetail->with($relationships);
        }

        return new EducationDetailCollection($educationDetail->paginate()->appends($request->query()));
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
        $relationships = [];

            if (request()->query('includeSchool')) {
                $relationships[] = 'school';
            }
        
        if(!empty($relationships)){
            $educationDetail->loadMissing($relationships);
        }
        if (request()->query('includeStudent')) {
            $relationships[] = 'student';
        }
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
