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

// if (!function_exists('getCandidateProfileCompletion')) {
//     function getCandidateProfileCompletion(): int
//     {
//         $requiredFields = [
//             'experience_id',
//             'profession_id',
//             'title',
//             'image',
//             'cv',
//             'full_name',
//             'birth_date',
//             'gender',
//             'status',
//             'marital_status',
//             'bio',
//             'country',
//             'address',
//             'phone_one',
//             'phone_two',
//             'email',
//         ];

//         $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();

//         // Initialize counters
//         $totalFields = count($requiredFields);
//         $completedFields = 0;

//         // Count how many fields are completed
//         foreach ($requiredFields as $field) {
//             if (!empty($candidateProfile->{$field})) {
//                 $completedFields++;
//             }
//         }

//         // Calculate percentage
//         $completionPercentage = ($completedFields / $totalFields) * 100;

//         return (int) $completionPercentage; // Return as an integer (rounded down)
//     }
// }

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
            'address',
            'phone_one',
            'phone_two',
            'email',
        ];

        // Fetch the candidate profile
        $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();

        // Return 0 if profile not found
        if (!$candidateProfile) {
            return 0;
        }

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

// if (!function_exists('getCandidateProfileCompletion')) {
//     function getCandidateProfileCompletion(): int
//     {
//         $requiredFields = [
//             'experience_id',
//             'profession_id',
//             'title',
//             'image',
//             'cv',
//             'full_name',
//             'birth_date',
//             'gender',
//             'status',
//             'marital_status',
//             'bio',
//             'country',
//             'address',
//             'phone_one',
//             'phone_two',
//             'email',
//         ];

//         // Fetch the candidate profile
//         $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();

//         // Debug: Check if the candidate profile exists
//         if (!$candidateProfile) {
//             echo '<pre>Candidate profile not found!</pre>'; // Debug output
//             return 0;
//         }

//         // Debug: Print the candidate profile data
//         echo '<pre>';
//         print_r($candidateProfile->toArray()); // Debug output
//         echo '</pre>';

//         // Initialize counters
//         $totalFields = count($requiredFields);
//         $completedFields = 0;

//         // Count how many fields are completed
//         foreach ($requiredFields as $field) {
//             $value = $candidateProfile->{$field};
//             if (!empty($value)) {
//                 $completedFields++;
//             }
//             // Debug: Print field name and value
//             echo "<pre>Field: $field, Value: " . ($value ?? 'NULL') . "</pre>"; // Debug output
//         }

//         // Calculate percentage
//         $completionPercentage = ($completedFields / $totalFields) * 100;

//         // Debug: Print the completion percentage
//         echo "<pre>Completion Percentage: $completionPercentage%</pre>"; // Debug output

//         return (int) $completionPercentage; // Return as an integer (rounded down)
//     }
// }

/*** Format date */

if (!function_exists('formatDate')) {
    function formatDate(?string $date): ?String
    {
        if ($date) {
            return date('d M Y', strtotime($date));
        }
        return null;
    }
}

/**
 * Store plan info in session
 */

if (!function_exists('storePlanInformation')) {
    function storePlanInformation()
    {
        session()->forget('user_plan');
        session([
            'user_plan' => isset(auth()->user()->company?->userPlan) ? auth()->user()->company?->userPlan : []
        ]);
    }
}



/**
 * Format Location
 */

if (!function_exists('formatLocation')) {
    function formatLocation($country = null, $state = null, $city = null, $address = null): ?string
    {
        $location = '';

        if ($address) {
            $location .= $address . ', '; // Add a space after address
        }
        if ($city) {
            $location .= ($address ? ', ' : '') . $city;
        }
        if ($state) {
            $location .= ($city ? ', ' : '') . $state;
        }
        if ($country) {
            $location .= ($state ? ', ' : '') . $country;
        }

        return trim($location); // Trim any trailing spaces
    }
}



if (!function_exists('relativeTime')) {
    /**
     * Format a timestamp as a relative time string (e.g., "4 mins ago" or "in 2 days").
     *
     * @param string $timestamp The timestamp to format.
     * @return string
     */
    function relativeTime($timestamp)
    {
        $now = new DateTime();
        $then = new DateTime($timestamp);
        $diff = $now->diff($then);

        $isFuture = $then > $now;

        $suffix = $isFuture ? 'from now' : 'ago';

        if ($diff->y > 0) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . " $suffix";
        } elseif ($diff->m > 0) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . " $suffix";
        } elseif ($diff->d > 0) {
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . " $suffix";
        } elseif ($diff->h > 0) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . " $suffix";
        } elseif ($diff->i > 0) {
            return $diff->i . ' min' . ($diff->i > 1 ? 's' : '') . " $suffix";
        } else {
            return $isFuture ? 'In a moment' : 'Just now';
        }
    }
}


if (!function_exists('getJobTypeClassAndLabel')) {
    /**
     * Get the CSS class and label for a job type.
     *
     * @param string $type The job type (e.g., "Full-time", "Part-time").
     * @return array An array containing the CSS class and label.
     */
    function getJobTypeClassAndLabel($type)
    {
        // Map job types to their respective CSS classes and labels
        $jobTypeMap = [
            'Full-time' => ['class' => 'btn-full-time', 'label' => 'Full Time'],
            'Part-time' => ['class' => 'btn-part-time', 'label' => 'Part Time'],
            'Contract' => ['class' => 'btn-contract', 'label' => 'Contract'],
            'Temporary' => ['class' => 'btn-temporary', 'label' => 'Temporary'],
            'Remote' => ['class' => 'btn-remote', 'label' => 'Remote'],
            'Freelance' => ['class' => 'btn-freelance', 'label' => 'Freelance'],
            'Internship' => ['class' => 'btn-internship', 'label' => 'Internship'],
            'Entry-level' => ['class' => 'btn-entry-level', 'label' => 'Entry Level'],
            'Mid-level' => ['class' => 'btn-mid-level', 'label' => 'Mid Level'],
            'Senior-level' => ['class' => 'btn-senior-level', 'label' => 'Senior Level'],
            'Volunteer' => ['class' => 'btn-volunteer', 'label' => 'Volunteer'],
            'Apprenticeship' => ['class' => 'btn-apprenticeship', 'label' => 'Apprenticeship'],
            'Commission-based' => ['class' => 'btn-commission-based', 'label' => 'Commission Based'],
            'Seasonal' => ['class' => 'btn-seasonal', 'label' => 'Seasonal'],
            'Consulting' => ['class' => 'btn-consulting', 'label' => 'Consulting'],
            'Gig Work' => ['class' => 'btn-gig-work', 'label' => 'Gig Work'],
            'Shift-based' => ['class' => 'btn-shift-based', 'label' => 'Shift Based'],
            'Per Diem' => ['class' => 'btn-per-diem', 'label' => 'Per Diem'],
            'Self-employed' => ['class' => 'btn-self-employed', 'label' => 'Self Employed'],
            'Casual' => ['class' => 'btn-casual', 'label' => 'Casual'],
            'On-call' => ['class' => 'btn-on-call', 'label' => 'On Call'],
            'Hybrid' => ['class' => 'btn-hybrid', 'label' => 'Hybrid'],
            'Rotational' => ['class' => 'btn-rotational', 'label' => 'Rotational'],
            'Fixed-term' => ['class' => 'btn-fixed-term', 'label' => 'Fixed Term'],
            'Probationary' => ['class' => 'btn-probationary', 'label' => 'Probationary'],
            'Flexible Hours' => ['class' => 'btn-flexible-hours', 'label' => 'Flexible Hours'],
            'Overtime' => ['class' => 'btn-overtime', 'label' => 'Overtime'],
            'Job Sharing' => ['class' => 'btn-job-sharing', 'label' => 'Job Sharing'],
            'Night Shift' => ['class' => 'btn-night-shift', 'label' => 'Night Shift'],
            'Weekend Shift' => ['class' => 'btn-weekend-shift', 'label' => 'Weekend Shift'],
        ];

        // Default class and label if the job type is not found
        $default = ['class' => 'btn-full-time', 'label' => 'Full Time'];

        // Return the mapped values or the default
        return $jobTypeMap[$type] ?? $default;
    }
}


if (!function_exists('calculateDeadline')) {
    /**
     * Calculate the deadline status, styling class, and icon.
     *
     * @param string $deadline The deadline date (e.g., "2025-03-31 23:59:59").
     * @return array An array containing the status message, class, and icon.
     */
    function calculateDeadline($deadline)
    {
        // Use Carbon to parse the deadline date
        $deadlineDate = \Carbon\Carbon::parse($deadline);
        $now = \Carbon\Carbon::now();

        // Calculate the difference
        $diff = $now->diff($deadlineDate);

        if ($now < $deadlineDate) {
            // Determine the most relevant time unit to display
            if ($diff->y > 0) {
                $message = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' to go';
            } elseif ($diff->m > 0) {
                $message = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' to go';
            } elseif ($diff->d > 0) {
                $message = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' to go';
            } elseif ($diff->h > 0) {
                $message = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' to go';
            } elseif ($diff->i > 0) {
                $message = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' to go';
            } else {
                $message = $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' to go';
            }

            return [
                'message' => $message,
                'class' => 'deadline-approaching', // Green for approaching deadline
                'icon' => 'fa fa-hourglass-half', // Icon for approaching deadline
            ];
        } else {
            return [
                'message' => 'Deadline passed',
                'class' => 'deadline-passed', // Red for passed deadline
                'icon' => 'fa fa-hourglass-end', // Icon for passed deadline
            ];
        }
    }
}
if (!function_exists('calculateAge')) {
    /**
     * Calculate detailed age (e.g., "2 years, 3 months", "6 months, 12 days").
     *
     * @param string|null $dob Date of birth in Y-m-d or similar format.
     * @return string
     */
    function calculateAge(?string $dob): string
    {
        if (!$dob) {
            return 'Unknown';
        }

        try {
            $birthDate = \Carbon\Carbon::parse($dob);
            $now = \Carbon\Carbon::now();

            // If DOB is today
            if ($birthDate->isToday()) {
                return 'Just born';
            }

            $diff = $birthDate->diff($now);

            $parts = [];

            if ($diff->y > 0) {
                $parts[] = $diff->y . ' year' . ($diff->y > 1 ? 's' : '');
            }

            if ($diff->m > 0) {
                $parts[] = $diff->m . ' month' . ($diff->m > 1 ? 's' : '');
            }

            if ($diff->d > 0 && $diff->y === 0) { // Only show days if under 1 year
                $parts[] = $diff->d . ' day' . ($diff->d > 1 ? 's' : '');
            }

            return implode(', ', $parts);
        } catch (\Exception $e) {
            return 'Invalid date';
        }
    }
}

