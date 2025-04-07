<section
    style="padding: 50px 0; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; background-color: #f5f7fa;">
    <div style="max-width: 1180px; margin: 0 auto; padding: 0 20px;">
        <div style="display: flex; flex-wrap: wrap; gap: 30px;">
            <!-- Main Job Listings Column -->
            <div style="flex: 1 1 65%; min-width: 300px;">
                <!-- Header -->
                <div style="display: flex; align-items: center; margin-bottom: 25px;">
                    <div
                        style="background-color: #2563eb; width: 40px; height: 40px; border-radius: 10px; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fa fa-briefcase" style="color: white; font-size: 18px;"></i>
                    </div>
                    <h2 style="margin: 0; font-size: 22px; font-weight: 700; color: #111827;">Latest Jobs</h2>
                </div>

                <!-- Job Listings -->
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    @forelse ($topJobs as $job)
                        <!-- Single Job Card -->
                        <div style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05); transition: all 0.2s ease;"
                            onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';"
                            onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.05)';">
                            <div style="display: flex; align-items: center; padding: 20px;">
                                <!-- Company Logo -->
                                <div
                                    style="flex: 0 0 80px; height: 80px; display: flex; justify-content: center; align-items: center; background-color: #f8fafc; border-radius: 10px; padding: 10px;">
                                    <a href="{{ route('companies.show', $job?->company?->slug) }}">
                                        <img src="{{ asset($job?->company?->logo) }}" alt="{{ $job?->company?->name }}"
                                            style="max-height: 50px; max-width: 60px; object-fit: contain;">
                                    </a>
                                </div>

                                <!-- Job Details -->
                                <div style="flex: 1; padding: 0 20px;">
                                    <h3 style="margin: 0 0 8px 0; font-size: 18px; font-weight: 600;">
                                        <a href="{{ route('jobs.show', $job?->slug) }}"
                                            style="color: #111827; text-decoration: none;"
                                            onmouseover="this.style.color='#2563eb';"
                                            onmouseout="this.style.color='#111827';">{{ $job?->title }}</a>
                                    </h3>
                                    <div
                                        style="display: flex; flex-wrap: wrap; gap: 16px; font-size: 14px; color: #4b5563;">
                                        <div style="display: flex; align-items: center;">
                                            <i class="fa fa-building-o" style="margin-right: 6px; color: #6b7280;"></i>
                                            <span>{{ $job?->company?->name }}</span>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <i class="fa fa-map-marker" style="margin-right: 6px; color: #6b7280;"></i>
                                            <span>{{ formatLocation($job?->company?->companyCountry?->name, $job?->company?->companyState?->name) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Type Badge -->
                                <div>
                                    {{-- @php
                                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                                        $badgeColors = [
                                            'btn-red' => ['bg' => '#fee2e2', 'text' => '#b91c1c'],
                                            'btn-green' => ['bg' => '#dcfce7', 'text' => '#15803d'],
                                            'btn-blue' => ['bg' => '#dbeafe', 'text' => '#1d4ed8'],
                                            'default' => ['bg' => '#f3e8ff', 'text' => '#7e22ce'],
                                        ];
                                        $colors = $badgeColors[$jobType['class']] ?? $badgeColors['default'];
                                    @endphp
                                    <span
                                        style="display: inline-block; padding: 6px 12px; font-size: 12px; font-weight: 500; color: {{ $colors['text'] }}; background-color: {{ $colors['bg'] }}; border-radius: 6px;">
                                        {{ $jobType['label'] }}
                                    </span> --}}
                                    @php
                                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                                    @endphp
                                    <a href="javascript:;" class="btn btn-small btn-effect {{ $jobType['class'] }}"
                                        style="margin-top: 10px;">
                                        {{ $jobType['label'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Empty State -->
                        <div
                            style="background-color: white; border-radius: 12px; padding: 40px 20px; text-align: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div
                                style="width: 60px; height: 60px; background-color: #f3f4f6; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 20px auto;">
                                <i class="fa fa-search" style="font-size: 24px; color: #9ca3af;"></i>
                            </div>
                            <h3 style="margin: 0 0 10px 0; font-size: 18px; font-weight: 600; color: #111827;">No Jobs
                                Found</h3>
                            <p style="margin: 0; color: #6b7280; font-size: 14px;">We don't have any active job listings
                                at the moment. Please check back soon.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Sidebar -->
            <div style="flex: 1 1 30%; min-width: 280px;">
                <!-- Golden Jobs Section -->
                <div style="margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; margin-bottom: 25px;">
                        <div
                            style="background-color: #eab308; width: 40px; height: 40px; border-radius: 10px; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                            <i class="fa fa-star" style="color: white; font-size: 18px;"></i>
                        </div>
                        <h2 style="margin: 0; font-size: 22px; font-weight: 700; color: #111827;">Golden Jobs</h2>
                    </div>

                    @forelse ($goldenJobs as $job)
                        <!-- Premium Job Card -->
                        <div style="background-color: white; border-radius: 12px; overflow: hidden; margin-bottom: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); position: relative; transition: all 0.2s ease;"
                            onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';"
                            onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.05)';">
                            <!-- Premium Tag -->
                            <div
                                style="position: absolute; top: 0; right: 20px; background-color: #eab308; color: white; font-size: 12px; font-weight: 500; padding: 4px 10px; border-radius: 0 0 6px 6px;">
                                Premium</div>

                            <!-- Company Logo -->
                            <div style="padding: 25px 20px 15px; text-align: center; border-bottom: 1px solid #f3f4f6;">
                                <img src="{{ asset($job?->company?->logo) }}" alt="{{ $job?->company?->name }}"
                                    style="max-height: 50px; max-width: 120px; object-fit: contain;">
                            </div>

                            <!-- Job Details -->
                            <div style="padding: 20px;">
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                                    <h3 style="margin: 0; font-size: 16px; font-weight: 600; color: #111827;">
                                        {{ $job?->title }}</h3>
                                    {{-- @php
                                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                                        $badgeColors = [
                                            'btn-red' => ['bg' => '#fee2e2', 'text' => '#b91c1c'],
                                            'btn-green' => ['bg' => '#dcfce7', 'text' => '#15803d'],
                                            'btn-blue' => ['bg' => '#dbeafe', 'text' => '#1d4ed8'],
                                            'default' => ['bg' => '#f3e8ff', 'text' => '#7e22ce'],
                                        ];
                                        $colors = $badgeColors[$jobType['class']] ?? $badgeColors['default'];
                                    @endphp
                                    <span
                                        style="font-size: 12px; padding: 4px 8px; color: {{ $colors['text'] }}; background-color: {{ $colors['bg'] }}; border-radius: 6px;">
                                        {{ $jobType['label'] }}
                                    </span> --}}
                                    @php
                                        $jobType = getJobTypeClassAndLabel($job?->jobType?->name);
                                    @endphp
                                    <a href="javascript:;" class="btn btn-small btn-effect {{ $jobType['class'] }}"
                                        style="margin-top: 10px;">
                                        {{ $jobType['label'] }}
                                    </a>
                                </div>

                                <div style="margin-bottom: 15px; font-size: 14px; color: #4b5563;">
                                    <div style="display: flex; align-items: center; margin-bottom: 6px;">
                                        <i class="fa fa-building-o"
                                            style="width: 16px; margin-right: 8px; color: #6b7280;"></i>
                                        <span>{{ $job?->company?->name }}</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <i class="fa fa-map-marker"
                                            style="width: 16px; margin-right: 8px; color: #6b7280;"></i>
                                        <span>{{ formatLocation($job?->company?->companyCountry?->name, $job?->company?->companyState?->name) }}</span>
                                    </div>
                                </div>

                                <p
                                    style="margin: 0 0 20px 0; color: #4b5563; font-size: 14px; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ Str::limit(strip_tags($job?->description), 100, '...') }}
                                </p>

                                <a href="{{ route('jobs.show', $job?->slug) }}"
                                    style="display: block; width: 100%; padding: 10px; background-color: #7e22ce; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; transition: background-color 0.2s ease;"
                                    onmouseover="this.style.backgroundColor='#9333ea';"
                                    onmouseout="this.style.backgroundColor='#7e22ce';">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @empty
                        <!-- Empty State -->
                        <div
                            style="background-color: white; border-radius: 12px; padding: 20px; text-align: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <p style="margin: 0; color: #6b7280; font-style: italic; font-size: 14px;">No premium jobs
                                available</p>
                        </div>
                    @endforelse
                </div>

                <!-- Upload Resume Widget -->
                <div
                    style="background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                    <div
                        style="height: 60px; background: linear-gradient(to right, #3b82f6, #2563eb); position: relative; display: flex; justify-content: center; align-items: center;">
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.1; background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSIjZmZmIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjMiLz48Y2lyY2xlIGN4PSIwIiBjeT0iMjAiIHI9IjMiLz48Y2lyY2xlIGN4PSI0MCIgY3k9IjIwIiByPSIzIi8+PC9nPjwvc3ZnPg=='); background-repeat: repeat;">
                        </div>
                        <i class="fa fa-cloud-upload" style="color: white; font-size: 24px;"></i>
                    </div>
                    <div style="padding: 25px 20px; text-align: center;">
                        <h3 style="margin: 0 0 15px 0; font-size: 18px; font-weight: 600; color: #111827;">Upload Your
                            Resume</h3>
                        <p style="margin: 0 0 20px 0; color: #4b5563; font-size: 14px; line-height: 1.6;">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry...
                        </p>
                        <a href="{{ route('candidate.profile.index') }}"
                            style="display: inline-block; padding: 10px 20px; background-color: #2563eb; color: white; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; transition: background-color 0.2s ease;"
                            onmouseover="this.style.backgroundColor='#1d4ed8';"
                            onmouseout="this.style.backgroundColor='#2563eb';">
                            Upload Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
