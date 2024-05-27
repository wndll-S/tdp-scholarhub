<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Student;
use App\Http\Requests\V1\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use App\http\Resources\V1\StudentResource;
use App\http\Resources\V1\StudentCollection;
use Illuminate\Http\Request;
use App\Filters\V1\StudentFilter;
use App\Models\Application;
use App\Models\LoginDetail;
use App\Models\StudentAddress;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    
     public function index(Request $request)
     {
         $filter = new StudentFilter();
         $filterItems = $filter->transform($request);
     
         // Define relationships to be loaded
         $relationships = [];
     
         $relationshipMapping = [
             'includeApplication' => 'applications',
             'includeStudentAddress' => 'student_address',
             'includeFamilyBackground' => 'family_background',
             'includeLoginDetail' => 'login_detail',
             'includeDocuments' => 'documents',
             'includeEducationDetail' => 'education_detail',
             'includeAnnouncementRecipient' => 'announcement_recipient',
             'includeGuardianParent' => 'family_background.guardian_parent',
             'includeSchool' => 'education_detail.school',
         ];
     
         foreach ($relationshipMapping as $queryParam => $relationship) {
             if ($request->query($queryParam)) {
                 $relationships[] = $relationship;
             }
         }
     
         $studentQuery = Student::query();
     
         // Apply the filters
         if ($filterItems) {
             foreach ($filterItems as $filterItem) {
                 $studentQuery->where($filterItem['column'], $filterItem['operator'], $filterItem['value']);
             }
         }
     
         // Filter by application status if specified
         if ($request->query('status')) {
             $studentQuery->whereHas('applications', function ($query) use ($request) {
                 $query->where('status', $request->query('status'));
             });
         }
     
         // Apply eager loading if relationships are specified
         if (!empty($relationships)) {
             $studentQuery->with($relationships);
         }
     
         return new StudentCollection($studentQuery->paginate()->appends($request->query()));
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
    public function register(StoreStudentRequest $request)
    {
        DB::beginTransaction();

        try {
            // Create the student
            $studentData = $request->only(['first_name', 'middle_name', 'last_name', 'name_ext', 'birthday', 'birth_place', 'sex', 'citizenship', 'civil_status', 'ip_affiliation']);
            $student = Student::create($studentData);

            // Create the student address
            $addressData = $request->only(['barangay', 'city_town', 'district', 'zip_code']);
            $addressData['student_id'] = $student->id;
            StudentAddress::create($addressData);

            // Create the login details
            $loginData = $request->only(['email_address', 'mobile_number', 'password']);
            $loginData['student_id'] = $student->id;
            LoginDetail::create($loginData);

            // Create the application
            $applicationData = $request->only(['status', 'ranking_pts']);
            $applicationData['student_id'] = $student->id;
            Application::create($applicationData);

            DB::commit();

            return response()->json(['message' => 'Student registered successfully', 'student' => $student], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Registration failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $relationships = [];

       if(request()->query('includeApplication')){
            $relationships[] = 'applications';
       }
       if(request()->query('includeStudentAddress')){
            $relationships[] = 'student_address';
       }
       if(request()->query('includeFamilyBackground')){
            $relationships[] = 'family_background';
       }
       if(request()->query('includeLoginDetail')){
            $relationships[] = 'login_detail';
       }
       if(request()->query('includeDocuments')){
            $relationships[] = 'documents';
       }
       if(request()->query('includeEducationDetail')){
            $relationships[] = 'education_detail';
       }
       if(request()->query('includeAnnouncementRecipient')){
            $relationships[] = 'announcement_recipient';
       }
       if(request()->query('includeGuardianParent')){
            $relationships[] = 'family_background.guardian_parent';
       }
       if(request()->query('includeSchool')){
            $relationships[] = 'education_detail.school';
       }

       if(!empty($relationships)){
            $student->loadMissing($relationships);
       }

        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
