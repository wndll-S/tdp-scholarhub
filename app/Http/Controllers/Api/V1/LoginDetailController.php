<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\LoginDetailFilter;
use App\Models\LoginDetail;
use App\Http\Requests\StoreLoginDetailRequest;
use App\Http\Requests\UpdateLoginDetailRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LoginDetailResource;
use App\Http\Resources\V1\LoginDetailCollection;
use Illuminate\Http\Request;

class LoginDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new LoginDetailFilter();
        $filterItems = $filter->transform($request);

        $relationships = [];

            if ($request->query('includeStudent')) {
                $relationships[] = 'student';
            }
            if ($request->query('includeApplication')) {
                $relationships[] = 'student.applications';
            }
        
            
        $loginDetail = LoginDetail::where($filterItems);

        if(!empty($relationships)){
            $loginDetail = $loginDetail->with($relationships);
        }
     
        return new LoginDetailCollection($loginDetail->paginate()->appends($request->query()));
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
    public function store(StoreLoginDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoginDetail $loginDetail)
    {
        $relationships = [];

            if (request()->query('includeStudent')) {
                $relationships[] = 'student';
            }
            if (request()->query('includeApplication')) {
                $relationships[] = 'student.applications';
            }
            if(!empty($relationships)){
                $loginDetail->loadMissing($relationships);
            }

            return new LoginDetailResource($loginDetail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoginDetail $loginDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoginDetailRequest $request, LoginDetail $loginDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoginDetail $loginDetail)
    {
        //
    }
}
