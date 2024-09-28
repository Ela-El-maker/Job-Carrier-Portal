<div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">

    <!-- Trigger the modal with a button -->


    <div>
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
                    @forelse ($candidateExperiences as $experience)
                    <tr>
                        <td>#</td>
                        <td>{{ $experience?->company }}</td>
                        <td>{{ $experience?->department }}</td>
                        <td>{{ $experience?->designation }}</td>
                        <td>{{ $experience?->start }} -
                            {{ $experience?->currently_working === 1 ? 'Current' : $experience?->end }}</td>

                        <td>
                            <a href="{{ route('candidate.experience.edit', $experience->id) }}"
                                class="btn-small btn btn-primary edit-experience" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('candidate.experience.destroy', $experience->id) }}"
                                class="btn-small btn btn-danger delete-experience">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No data found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <hr>
    <br>
    <div>
        <div class="row ">

            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12">
                <h3 class="text-black">Education.</h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="#" class="btn btn-blue btn-effect"
                    onclick="$('#EducationForm').trigger('reset'); editId = ''; editMode = false" data-toggle="modal"
                    data-target="#myEducationModal">Add Education</a>
            </div>

        </div>


        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Year</th>
                        <th>Level</th>
                        <th>Degree</th>
                        <th>Note</th>
                        <th style="width:30%">Action</th>
                    </tr>
                </thead>
                <tbody class="education-tbody">
                    @forelse ($candidateEducations as $education)
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
                @empty
                <tr>
                    <td colspan="5" class="text-center">No data found!</td>
                </tr>
                @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>
