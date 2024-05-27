<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\DocumentFilter;
use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DocumentResource;
use App\Http\Resources\V1\DocumentCollection;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new DocumentFilter();
        $filterItems = $filter->transform($request);

        $relationships = [];

        if ($request->query('includeStudent')) {
             $relationships[] = 'student';
        }
        if ($request->query('includeSchool')) {
             $relationships[] = 'school';
        }

        $document = Document::where($filterItems);

       if(!empty($relationships)){
            $document = $document->with($relationships);
       }

       return new DocumentCollection($document->paginate()->appends($request->query()));

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
    public function store(StoreDocumentRequest $request)
    {
        $validatedData = $request->validated();

        // Handle the file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents');
            $validatedData['file_path'] = $filePath;
        }

        $document = Document::create($validatedData);

        return response()->json($document, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        $relationships = [];

        if (request()->query('includeStudent')) {
             $relationships[] = 'student';
        }
        if (request()->query('includeSchool')) {
             $relationships[] = 'school';
        }

        if(!empty($relationships)){
            $document->loadMissing($relationships);
        }
        return new DocumentResource($document);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
