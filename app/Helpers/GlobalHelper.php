<?php

/**
 *
 * Check Input errror
 *
 */

use App\Models\Company;

if (!function_exists('hasError')) {
    function hasError($errors, string $name): ?String
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}

/*** Set sidebar active */

if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes) : ?String
    {
        foreach($routes as $route)
        {
            if(request()->routeIs($route))
            {
                return 'active';
            }
        }
        return null;
    }
}

/*** Profile Completion Percentage */
/*** Check profile completion and calculate percentage */

if (!function_exists('getCompanyProfileCompletion')) {
    function getCompanyProfileCompletion(): int
    {
        $requiredFields = [
            'logo',
            'banner',
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
