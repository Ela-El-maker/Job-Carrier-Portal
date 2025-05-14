<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyDashboardController extends Controller
{
    //
    public function index(): View
    {
        $user = auth()->user();
        $company = $user?->company;
        $userPlan = UserPlan::where('company_id', auth()->user()?->company?->id)->first();
        return view('frontend.company-dashboard.dashboard', [
            'company' => $company,
            'completionPercentage' => $this->calculateProfileCompletion($company),
            'userPlan' => $userPlan
        ]);
    }

    protected function calculateProfileCompletion($company): int
    {
        $requiredFields = [
            'logo',
            'banner',
            'bio',
            'vision',
            'industry_type_id',
            'organization_type_id',
            'team_size_id',
            'establishment_date',
            'website',
            'phone',
            'address'
        ];

        $filledFields = 0;
        foreach ($requiredFields as $field) {
            if (!empty($company->$field)) {
                $filledFields++;
            }
        }

        return (int) round(($filledFields / count($requiredFields)) * 100);
    }
}
