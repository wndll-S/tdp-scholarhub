<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class GuardianParentFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'familyBackgroundId' => 'eq',
        'firstName' => ['eq'],
        'middleName'  => ['eq'],
        'lastName'  => ['eq'],
        'address' => ['eq'],
        'contactNumber' => ['eq'],
        'occupation' => ['eq'],
        'employerName' => ['eq'],
        'employerAddress' => ['eq', 'ne'],
        'annualGrossIncome' => ['eq', 'ne', 'gte', 'lte', 'lt', 'gt'],
        'status' => ['eq'],
        'relationship' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'familyBackgroundId' => 'family_background_id',
        'firstName' => 'first_name',
        'middleName' => 'middle_name',
        'lastName' => 'last_name',
        'contactNumber' => 'contact_number',
        'employerName' => 'employer_name',
        'employerAddress' => 'employer_address', 
        'annualGrossIncome' => 'annual_gross_income',
        
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