<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class SchoolFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'name' => ['eq'],
        'address'  => ['eq'],
        'schoolType'  => ['eq'],
        'emailAddress' => ['eq'],
        'contactNumber' => ['eq'],
        'password' => ['eq'],
    ];

    protected $columnMap = [
        'schoolType' => 'school_type',
        'emailAddress' => 'email_address',
        'contactNumber' => 'contact_number',
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