<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class StudentAddressFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'studentId' => ['eq', 'ne'],
        'barangay'  => ['eq', 'ne'],
        'cityTown'  => ['eq', 'ne'],
        'district' => ['eq', 'ne', 'lt'],
        'zipCode' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'studentId' => 'student_id',
        'cityTown' => 'city_town',
        'zipCode' => 'zip_code',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

    
};