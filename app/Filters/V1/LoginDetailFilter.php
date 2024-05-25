<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class LoginDetailFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'studentId' => ['eq'],
        'emailAddress'  => ['eq'],
        'mobileNumber'  => ['eq'],
        'password' => ['eq'],
    ];

    protected $columnMap = [
        'studentId' => 'student_id',
        'emailAddress' => 'email_address',
        'mobileNumber' => 'mobile_number',
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