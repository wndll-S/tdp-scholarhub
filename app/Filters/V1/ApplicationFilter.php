<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class ApplicationFilter extends ApiFilter{
    protected $safeParms = [
        'id' => 'eq',
        'studentId' => ['eq'],
        'rankingPoints'  => ['eq', 'lt', 'lte', 'gte','gt'],
        'status'  => ['eq'],
    ];

    protected $columnMap = [
        'studentId' => 'student_id',
        'rankingPoints' => 'ranking_pts',
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