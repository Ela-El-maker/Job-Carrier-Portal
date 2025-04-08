<div class="tab-pane fade" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">

    <!-- Trigger the modal with a button -->


    <div
        style="font-family: 'Arial', sans-serif; max-width: 1200px; margin: 0 auto; background-color: #f4f6f9; padding: 20px; border-radius: 8px;">
        <div class="row"
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12" style="flex-grow: 1;">
                <h3 class="text-black" style="color: #2c3e50; font-weight: 600; margin: 0; font-size: 24px;">Experience.
                </h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12" style="flex-shrink: 0;">
                <a href="#" class="btn btn-blue btn-effect"
                    style="background-color: #3498db; color: white; padding: 10px 15px; text-decoration: none; border-radius: 6px; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'"
                    onclick="$('#ExperienceForm').trigger('reset'); editId = ''; editMode = false" data-toggle="modal"
                    data-target="#myModal">Add Experience</a>
            </div>
        </div>

        <div class="table-responsive"
            style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <table class="table table-striped table-sm" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f1f4f8;">
                    <tr>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">#
                        </th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Company</th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Department</th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Designation</th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Period</th>
                        <th
                            style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed; width:30%">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="experience-tbody">
                    @forelse ($candidateExperiences as $experience)
                        <tr style="transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#f9fafb'"
                            onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">#</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $experience?->company }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $experience?->department }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $experience?->designation }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $experience?->start }} -
                                {{ $experience?->currently_working === 1 ? 'Current' : $experience?->end }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">
                                <a href="{{ route('candidate.experience.edit', $experience->id) }}"
                                    class="btn-small btn btn-primary edit-experience"
                                    style="background-color: #2ecc71; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; margin-right: 5px;"
                                    data-bs-toggle="modal" data-bs-target="#myModal">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('candidate.experience.destroy', $experience->id) }}"
                                    class="btn-small btn btn-danger delete-experience"
                                    style="background-color: #e74c3c; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 20px; color: #7f8c8d;">No data found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin: 20px 0; border-bottom: 1px solid #e0e6ed;"></div>

        <div class="row"
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <!-- Column -->
            <div class="col-md-10 col-sm-9 col-xs-12" style="flex-grow: 1;">
                <h3 class="text-black" style="color: #2c3e50; font-weight: 600; margin: 0; font-size: 24px;">Education.
                </h3>
            </div>

            <!-- Column -->
            <div class="col-md-2 col-sm-3 col-xs-12" style="flex-shrink: 0;">
                <a href="#" class="btn btn-blue btn-effect"
                    style="background-color: #3498db; color: white; padding: 10px 15px; text-decoration: none; border-radius: 6px; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'"
                    onclick="$('#EducationForm').trigger('reset'); editId = ''; editMode = false" data-toggle="modal"
                    data-target="#myEducationModal">Add Education</a>
            </div>
        </div>

        <div class="table-responsive"
            style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <table class="table table-striped table-sm" style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #f1f4f8;">
                    <tr>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">#
                        </th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Year</th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Level</th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Degree</th>
                        <th style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed;">
                            Note</th>
                        <th
                            style="padding: 12px; text-align: left; color: #2c3e50; border-bottom: 2px solid #e0e6ed; width:30%">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="education-tbody">
                    @forelse ($candidateEducations as $education)
                        <tr style="transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#f9fafb'"
                            onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">#</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $education?->year }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $education?->level }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $education?->degree }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">{{ $education?->note }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e0e6ed;">
                                <a href="{{ route('candidate.education.edit', $education->id) }}"
                                    class="btn-small btn btn-primary edit-education"
                                    style="background-color: #2ecc71; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; margin-right: 5px;"
                                    data-bs-toggle="modal" data-bs-target="#myEducationModal">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('candidate.education.destroy', $education->id) }}"
                                    class="btn-small btn btn-danger delete-education"
                                    style="background-color: #e74c3c; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 20px; color: #7f8c8d;">No data
                                found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
