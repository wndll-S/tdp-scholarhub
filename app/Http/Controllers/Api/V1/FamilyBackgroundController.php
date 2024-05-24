<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\FamilyBackgroundFilter;
use App\Http\Resources\V1\FamilyBackgroundResource;
use App\Models\FamilyBackground;
use App\Http\Requests\StoreFamilyBackgroundRequest;
use App\Http\Requests\UpdateFamilyBackgroundRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FamilyBackgroundCollection;
use Illuminate\Http\Request;

class FamilyBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new FamilyBackgroundFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new FamilyBackgroundCollection(FamilyBackground::paginate());
        }else{
            $familyBackground = FamilyBackground::where($queryItems)->paginate();
            return new FamilyBackgroundCollection($familyBackground->appends($request->query()));
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
    public function store(StoreFamilyBackgroundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FamilyBackground $familyBackground)
    {
        return new FamilyBackgroundResource($familyBackground);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyBackground $familyBackground)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamilyBackgroundRequest $request, FamilyBackground $familyBackground)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyBackground $familyBackground)
    {
        //
    }
}
