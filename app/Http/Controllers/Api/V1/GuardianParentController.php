<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\GuardianParentFilter;
use App\Http\Resources\V1\GuardianParentResource;
use App\Models\GuardianParent;
use App\Http\Requests\StoreGuardianParentRequest;
use App\Http\Requests\UpdateGuardianParentRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GuardianParentCollection;
use Illuminate\Http\Request;

class GuardianParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new GuardianParentFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new GuardianParentCollection(GuardianParent::paginate());
        }else{
            $guardianParent = GuardianParent::where($queryItems)->paginate();
            return new GuardianParentCollection($guardianParent->appends($request->query()));
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
    public function store(StoreGuardianParentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GuardianParent $guardianParent)
    {
        return new GuardianParentResource($guardianParent);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuardianParent $guardianParent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuardianParentRequest $request, GuardianParent $guardianParent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuardianParent $guardianParent)
    {
        //
    }
}
