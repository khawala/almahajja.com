<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobRequest;
use App\User;

class StatsController extends Controller
{
    //
    public function index()
    {
        $requestByJob         = JobRequest::stats('job_id')->get();
        $requestByStatus      = JobRequest::stats('status')->get();
        $requestByNationality = JobRequest::with('nationality')->stats('nationality_id')->get();

        $userByStatus      = User::stats('status');
        $userByRole        = User::stats('role');
        $userByNationality = User::with('nationality')->stats('nationality_id');
        $userByGender      = User::stats('gender');


        // return $userByGender;
        return view('admin.stats.index', compact('requestByJob', 'requestByStatus', 'requestByNationality', 'userByStatus', 'userByRole', 'userByGender', 'userByNationality'));
    }
}
