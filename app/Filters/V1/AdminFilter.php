<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class AdminFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'username' => ['eq', 'ne'],
        'emailAddress'  => ['eq', 'ne'],
        'password'  => ['eq'],
        'role' => ['eq', 'ne'],
        'status' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'emailAddress' => 'email_address',
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