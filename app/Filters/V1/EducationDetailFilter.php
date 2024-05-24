<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class EducationDetailFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'studentId' => ['eq'],
        'schoolId'  => ['eq'],
        'lrn'  => ['eq'],
        'course' => ['eq'],
        'major' => ['eq'],
        'yearLevel' => ['eq', 'ne', 'gt', 'lt', 'lte', 'gte'],
    ];

    protected $columnMap = [
        'studentId' => 'student_id',
        'schoolId' => 'school_id',
        'yearLevel' => 'year_level',
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