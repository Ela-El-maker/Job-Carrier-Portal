<div class="tab-pane fade" id="serviceSection" role="tabpanel" aria-labelledby="service-tab">


    <div style="margin-top: 40px;">
        <h3 style="color: #1e293b; font-weight: 600; margin-bottom: 8px; font-size: 20px; letter-spacing: -0.5px;">
            Services</h3>
        <p style="color: #64748b; margin-bottom: 16px; font-size: 14px;">Manage your professional services</p>

        <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
            <button onclick="$('#ServiceForm').trigger('reset'); serviceEditId = ''; serviceEditMode = false"
                data-toggle="modal" data-target="#myServiceModal"
                style="background-color: #3b82f6; color: white; padding: 10px 16px; border: none; text-decoration: none; border-radius: 6px; font-weight: 500; font-size: 14px; cursor: pointer; transition: all 0.2s ease; display: flex; align-items: center; gap: 8px; box-shadow: 0 2px 5px rgba(59, 130, 246, 0.3);">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Service
            </button>
        </div>

        <div
            style="background-color: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <thead style="background-color: #f1f5f9;">
                    <tr>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            #</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Icon</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Name</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            URL</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Status</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600; width: 140px;">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="service-tbody">
                    @forelse ($portfolioServices as $service)
                        <tr style="transition: background-color 0.15s ease;">
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $loop->iteration }}
                            </td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $service?->service_icon }}</td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $service?->service_name }}</td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $service?->service_url }}</td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                @if ($service?->service_visible === 1)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">
                                <a href="" class="btn-small btn btn-primary edit-client"
                                    style="background-color: #2ecc71; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; margin-right: 5px;"
                                    data-bs-toggle="modal" data-bs-target="#myClientModal">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn-small btn btn-danger delete-client"
                                    style="background-color: #e74c3c; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center"> No Results Found! </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 40px;">
        <h3 style="color: #1e293b; font-weight: 600; margin-bottom: 8px; font-size: 20px; letter-spacing: -0.5px;">
            Clients</h3>
        <p style="color: #64748b; margin-bottom: 16px; font-size: 14px;">Manage your clients' information</p>

        <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
            <button onclick="$('#ClientForm').trigger('reset'); clientEditId = ''; clientEditMode = false"
                data-toggle="modal" data-target="#myClientModal"
                style="background-color: #3b82f6; color: white; padding: 10px 16px; border: none; text-decoration: none; border-radius: 6px; font-weight: 500; font-size: 14px; cursor: pointer; transition: all 0.2s ease; display: flex; align-items: center; gap: 8px; box-shadow: 0 2px 5px rgba(59, 130, 246, 0.3);">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Client
            </button>
        </div>

        <div
            style="background-color: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <thead style="background-color: #f1f5f9;">
                    <tr>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            #</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Client Name</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Company</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Title</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600;">
                            Visible</th>
                        <th
                            style="padding: 14px 16px; text-align: left; color: #475569; border-bottom: 1px solid #e2e8f0; font-weight: 600; width: 140px;">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="client-tbody">
                    @foreach ($portfolioClients as $client)
                        <tr style="transition: background-color 0.15s ease;">
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">{{ $loop->iteration }}
                            </td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $client?->client_name }}
                            </td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $client?->client_company }}</td>
                            <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
                                {{ $client?->client_title }}</td>

                            <td style="padding:14px 16px;border-bottom:1px solid #e2e8f0;">
                                @if ($client?->client_visible === 1)
                                    <span class="badge text-bg-success">Visible</span>
                                @else
                                    <span class="badge text-bg-danger">Invisible</span>
                                @endif
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">
                                <a href="{{ route('candidate.portfolio.client.edit', $client->id) }}"
                                    class="btn-small btn btn-primary edit-client"
                                    style="background-color: #0b6fb6; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; margin-right: 5px;"
                                    data-bs-toggle="modal" data-bs-target="#myClientModal">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('candidate.portfolio.client.destroy', $client->id) }}"
                                    class="btn-small btn btn-danger delete-client"
                                    style="background-color: #e74c3c; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
