<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\HealthFacility;
use App\Http\Controllers\Controller;

class HealthFacilityController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $healthFacilities = HealthFacility::with('type')->get();
        return view('health_facilities.index', [
            'title' => 'Health Facilities',
            'user' => $user,
            'healthFacilities' => $healthFacilities,
        ]);
    }
}
