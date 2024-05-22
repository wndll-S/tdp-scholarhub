<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class DocumentFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'studentId' => ['eq'],
        'schoolId'  => ['eq'],
        'documentType'  => ['eq'],
        'filePath' => ['eq'],
    ];

    protected $columnMap = [
        'studentId' => 'student_id',
        'schoolId' => 'school_id',
        'documentType' => 'document_type',
        'filePath' => 'file_path',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',

    ];

    
};