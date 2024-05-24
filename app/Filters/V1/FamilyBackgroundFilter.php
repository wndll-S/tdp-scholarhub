<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class FamilyBackgroundFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq'],
        'studentId' => ['eq'],
        'totalGrossIncome'  => ['eq', 'ne', 'gte', 'ne', 'lte', 'lt'],
        'numberOfSiblings'  => ['eq', 'ne', 'gte', 'ne', 'lte', 'lt'],
    ];

    protected $columnMap = [
        'studentId' => 'student_id',
        'totalGrossIncome' => 'total_gross_income',
        'numberOfSiblings' => 'number_of_siblings',
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