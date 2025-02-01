<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\ScholarshipApplicant;
use App\Models\ScholarshipAppMap;
class HomeController extends Controller
{
    //
    public function index()
    {
        // Fetch data for visualizations
        $activeScholarships = Scholarship::where('active', 1)->count();
        $totalApplicants = ScholarshipApplicant::count();
        $applicationsPerScholarship = ScholarshipAppMap::selectRaw('job_id, COUNT(*) as count')
            ->groupBy('job_id')
            ->get();
    // Additional data for new charts
    $genderDistribution = ScholarshipApplicant::selectRaw('gender, COUNT(*) as count')
        ->groupBy('gender')
        ->pluck('count', 'gender');

    $monthlyApplications = ScholarshipAppMap::selectRaw('MONTH(apply_date) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');

    $scholarshipActivity = Scholarship::selectRaw('active, COUNT(*) as count')
        ->groupBy('active')
        ->pluck('count', 'active');
        // Pass data to view
        return view('welcome', [
            'activeScholarships' => $activeScholarships,
            'totalApplicants' => $totalApplicants,
            'applicationsPerScholarship' => $applicationsPerScholarship,
            'activeScholarships' => $activeScholarships,
            'totalApplicants' => $totalApplicants,
            'applicationsPerScholarship' => $applicationsPerScholarship,
            'genderDistribution' => $genderDistribution,
            'monthlyApplications' => $monthlyApplications,
            'scholarshipActivity' => $scholarshipActivity,
        ]);
    }

}
