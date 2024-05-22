<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class StudentFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'firstName' => ['eq'],
        'middleName'  => ['eq'],
        'lastName'  => ['eq'],
        'nameExtension' => ['eq'],
        'birthday' => ['eq'],
        'birthPlace' => ['eq'],
        'sex' => ['eq'],
        'civilStatus' => ['eq', 'ne'],
        'citizenship' => ['eq', 'ne'],
        'ipAffiliation' => ['eq'],
    ];

    protected $columnMap = [
        'firstName' => 'first_name',
        'middleName' => 'middle_name',
        'lastName' => 'last_name',
        'nameExtension' => 'name_ext',
        'birthPlace' => 'birth_place',
        'civilStatus' => 'civil_status', 
        'ipAffiliation' => 'ip_affiliation',
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