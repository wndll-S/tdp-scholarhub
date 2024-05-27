<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\AdminCollection;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\http\controllers\Controller;
use App\http\Resources\V1\AdminResource;
use Illuminate\Http\Request;
use App\Filters\V1\AdminFilter;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new AdminFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new AdminCollection(Admin::paginate());
        }else{
            $admin = Admin::where($queryItems)->paginate();
            return new AdminCollection($admin->appends($request->query()));
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
    public function store(StoreAdminRequest $request)
    {
            $validatedData = $request->validated();
            $admin = Admin::create($validatedData);
            return response()->json($admin, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
