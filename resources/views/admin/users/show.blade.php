@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header d-flex justify-content-between align-items-center">
            <h1>User Details</h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Users
            </a>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @php
                        $avatar = $user->avatar;

                        if (!$avatar && $user->role === 'candidate') {
                            $avatar = $user->candidateProfile->image ?? null;
                        } elseif (!$avatar && $user->role === 'company') {
                            $avatar = $user->company->logo ?? null;
                        }

                        $avatarUrl = $avatar ? asset($avatar) : asset('images/default-avatar.png');
                    @endphp

                    <div class="text-center mb-4">
                        <img src="{{ $avatarUrl }}" alt="User Avatar" class="rounded-circle"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </div>

                    {{-- USER BASIC DETAILS --}}
                    <h4 class="mb-3">Basic Information</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>{{ ucfirst($user->role) }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @if ($user->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Email Verified:</th>
                            <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Registered:</th>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                        </tr>
                    </table>

                    {{-- CANDIDATE PROFILE --}}
                    @if ($user->role === 'candidate' && $user->candidateProfile)
                        <hr>
                        <h4 class="mt-4">Candidate Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Full Name:</th>
                                <td>{{ $user->candidateProfile->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Title:</th>
                                <td>{{ $user->candidateProfile->title }}</td>
                            </tr>
                            <tr>
                                <th>Website:</th>
                                <td>
                                    @if ($user->candidateProfile->website)
                                        <a href="{{ $user->candidateProfile->website }}"
                                            target="_blank">{{ $user->candidateProfile->website }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $user->candidateProfile->phone_one }}</td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td>
                                    {{ $user->candidateProfile->candidateCity->name ?? '' }},
                                    {{ $user->candidateProfile->candidateState->name ?? '' }},
                                    {{ $user->candidateProfile->candidateCountry->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Profession:</th>
                                <td>{{ $user->candidateProfile->profession->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Bio:</th>
                                <td>{!! $user->candidateProfile->bio !!}</td>
                            </tr>
                        </table>
                    @endif

                    {{-- COMPANY PROFILE --}}
                    @if ($user->role === 'company' && $user->company)
                        <hr>
                        <h4 class="mt-4">Company Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Company Name:</th>
                                <td>{{ $user->company->name }}</td>
                            </tr>
                            <tr>
                                <th>Website:</th>
                                <td>
                                    @if ($user->company->website)
                                        <a href="{{ $user->company->website }}"
                                            target="_blank">{{ $user->company->website }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->company->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $user->company->phone }}</td>
                            </tr>
                            <tr>
                                <th>Industry Type:</th>
                                <td>{{ $user->company->industryType->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Organization Type:</th>
                                <td>{{ $user->company->organizationType->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Team Size:</th>
                                <td>{{ $user->company->teamSize->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td>
                                    {{ $user->company->companyCity->name ?? '' }},
                                    {{ $user->company->companyState->name ?? '' }},
                                    {{ $user->company->companyCountry->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Bio:</th>
                                <td>{!! $user->company->bio !!}</td>
                            </tr>
                            <tr>
                                <th>Vision:</th>
                                <td>{!! $user->company->vision !!}</td>
                            </tr>
                        </table>
                    @endif

                    {{-- ACTION BUTTONS --}}
                    <div class="mt-4 text-right">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
