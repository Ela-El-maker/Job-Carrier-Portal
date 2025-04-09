@foreach ($portfolioServices as $service)
    <tr style="transition: background-color 0.15s ease;">
        <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">{{ $loop->iteration }}
        </td>
        <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
            <i class="{{ $service?->service_icon }}"></i>
        </td>
        <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
            {{ $service?->service_name }}</td>
        <td style="padding: 14px 16px; border-bottom: 1px solid #e2e8f0;">
            {{ $service?->service_url }}</td>
        <td style="padding:14px 16px;border-bottom:1px solid #e2e8f0;">
            @if ($service?->service_visible === 1)
                <span class="badge text-bg-success">Visible</span>
            @else
                <span class="badge text-bg-danger">Invisible</span>
            @endif
        </td>
        <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">
            <a href="{{ route('candidate.portfolio.service.edit', $service->id) }}"
                class="btn-small btn btn-primary edit-service"
                style="background-color: #0b6fb6; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; margin-right: 5px;"
                data-bs-toggle="modal" data-bs-target="#myServiceModal">
                <i class="fas fa-edit"></i>
            </a>
            <a href="{{ route('candidate.portfolio.service.destroy', $service->id) }}"
                class="btn-small btn btn-danger delete-service"
                style="background-color: #e74c3c; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px;">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>
@endforeach
