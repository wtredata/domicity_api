<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentCityController extends Controller
{
    public function index(Department $department)
    {
        $cities = $department->cities;
        return $this->successResponse($cities);
    }
}
