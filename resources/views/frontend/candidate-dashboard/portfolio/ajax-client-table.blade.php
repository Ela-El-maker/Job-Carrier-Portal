@foreach ($services as $service)
    <tr>
        <td>#</td>
        <td>{{ $service?->company }}</td>
        <td>{{ $service?->department }}</td>
        <td>{{ $service?->designation }}</td>
        <td>{{ $service?->start }} - {{ $service?->currently_working === 1 ? 'Current' : $service?->end }}</td>
        <td>
            <a href="{{ route('candidate.portfolio.service.edit', $service->id) }}"
                class="btn-small btn btn-primary edit-service" data-bs-toggle="modal" data-bs-target="#myServiceModal">
                <i class="fas fa-edit"></i>
            </a>
            <a href="{{ route('candidate.portfolio.service.destroy', $service->id) }}"
                class="btn-small btn btn-danger delete-service">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>
@endforeach
