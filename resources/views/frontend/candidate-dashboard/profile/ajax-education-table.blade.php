@foreach ($candidateEducations as $education)
<tr>
    <td>#</td>
    <td>{{ $education?->year }}</td>
    <td>{{ $education?->level }}</td>
    <td>{{ $education?->degree }}</td>
    <td>{{ $education?->note }} </td>
    <td>
        <a href="{{ route('candidate.education.edit', $education->id) }}"
            class="btn-small btn btn-primary edit-education" data-bs-toggle="modal"
            data-bs-target="#myEducationModal">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('candidate.education.destroy', $education->id) }}"
            class="btn-small btn btn-danger delete-education">
            <i class="fas fa-trash-alt"></i>
        </a>
    </td>
</tr>
@endforeach
