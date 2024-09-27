<div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">

    <!-- Trigger the modal with a button -->


    <div class="row ">

        <!-- Column -->
        <div class="col-md-10 col-sm-9 col-xs-12">
            <h3 class="text-black">Experience.</h3>
        </div>

        <!-- Column -->
        <div class="col-md-2 col-sm-3 col-xs-12">
            <a href="#" class="btn btn-blue btn-effect"
                onclick="$('#ExperienceForm').trigger('reset'); editId = ''; editMode = false" data-toggle="modal"
                data-target="#myModal">Add Experience</a>
        </div>

    </div>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Period</th>
                    <th style="width:30%">Action</th>

                </tr>
            </thead>
            <tbody class="experience-tbody">
                @foreach ($candidateExperiences as $experience)
                    <tr>
                        <td>#</td>
                        <td>{{ $experience?->company }}</td>
                        <td>{{ $experience?->department }}</td>
                        <td>{{ $experience?->designation }}</td>
                        <td>{{ $experience?->start }} -
                            {{ $experience?->currently_working === 1 ? 'Current' : $experience?->end }}</td>

                        <td>
                            <a href="{{ route('candidate.experience.edit',$experience->id) }}" class="btn-small btn btn-primary edit-experience" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('candidate.experience.destroy',$experience->id) }}" class="btn-small btn btn-danger delete-experience">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
