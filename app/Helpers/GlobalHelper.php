<?php

/**
 *
 * Check Input errror
 *
 */

use App\Models\Candidate;
use App\Models\Company;

if (!function_exists('hasError')) {
    function hasError($errors, string $name): ?String
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}

/*** Set sidebar active */

if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes): ?String
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return null;
    }
}

/*** Company Profile Completion Percentage */
/*** Check profile completion and calculate percentage */

if (!function_exists('getCompanyProfileCompletion')) {
    function getCompanyProfileCompletion(): int
    {
        $requiredFields = [
            'logo',
            'banner',
            'bio',
            'vision',
            'name',
            'industry_type_id',
            'organization_type_id',
            'team_size_id',
            'establishment_date',
            'phone',
            'email',
            'country',
            'website',
            'address',
            'map_link'
        ];

        $companyProfile = Company::where('user_id', auth()->user()->id)->first();

        // Initialize counters
        $totalFields = count($requiredFields);
        $completedFields = 0;

        // Count how many fields are completed
        foreach ($requiredFields as $field) {
            if (!empty($companyProfile->{$field})) {
                $completedFields++;
            }
        }

        // Calculate percentage
        $completionPercentage = ($completedFields / $totalFields) * 100;

        return (int) $completionPercentage; // Return as an integer (rounded down)
    }
}


/*** Candidate Profile Completion Percentage */
/*** Check profile completion and calculate percentage */

if (!function_exists('getCandidateProfileCompletion')) {
    function getCandidateProfileCompletion(): int
    {
        $requiredFields = [
            'experience_id',
            'profession_id',
            'title',
            'image',
            'cv',
            'full_name',
            'birth_date',
            'gender',
            'status',
            'marital_status',
            'bio',
            'country',
            'state',
            'city',
            'address',
            'phone_one',
            'phone_two',
            'email',
        ];

        $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();

        // Initialize counters
        $totalFields = count($requiredFields);
        $completedFields = 0;

        // Count how many fields are completed
        foreach ($requiredFields as $field) {
            if (!empty($candidateProfile->{$field})) {
                $completedFields++;
            }
        }

        // Calculate percentage
        $completionPercentage = ($completedFields / $totalFields) * 100;

        return (int) $completionPercentage; // Return as an integer (rounded down)
    }
}

/*** Format date */

if (!function_exists('formatDate')) {
    function formatDate(string $date): ?String
    {
        return date('d M Y', strtotime($date));
    }
}
