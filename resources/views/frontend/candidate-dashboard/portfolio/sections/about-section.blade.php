@php
    $count = 0;
@endphp

<div class="tab-pane" id="aboutSection">
    <form action="{{ route('candidate.portfolio.about.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="row align-items-start">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>About You *</label>
                            <textarea name="portfolio_about" class="{{ $errors->has('portfolio_about') ? 'is-invalid' : '' }}" id="editor"></textarea>
                            <x-input-error :messages="$errors->get('portfolio_about')" class="mt-2" />
                        </div>
                    </div>

                    <button type="button" id="add-social" class="btn btn-sm btn-success mb-3"
                        style="width: auto; padding: 5px 15px; margin-bottom: 10px;">➕ Add Social Link</button>
                    <div id="social-links-wrapper">
                        <div class="row mb-3 social-link-row">
                            <div class="col-md-4" style="margin-bottom: 10px; width: 30%;">
                                <select name="socials[{{ $count }}][type]"
                                    class="form-control form-icons selectpicker" data-live-search="true">
                                    @foreach ($socialPlatforms as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px; width: 30%;">
                                <input type="url" name="socials[{{ $count }}][url]" class="form-control"
                                    placeholder="https://example.com/username">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-row">X</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group pt30 nomargin" id="last">
            <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
        </div>
    </form>
</div>




<script>
    let count = 1;
    const platforms = @json($socialPlatforms);

    document.getElementById('add-social').addEventListener('click', function() {
        const wrapper = document.getElementById('social-links-wrapper');
        const row = document.createElement('div');
        row.className = 'row mb-3 social-link-row';

        let options = '';
        for (const [key, value] of Object.entries(platforms)) {
            options += `<option value="${key}">${value}</option>`;
        }

        row.innerHTML = `
        <div class="col-md-4" style="margin-bottom: 10px; width: 30%;">
            <select name="socials[${count}][type]" class="form-control form-icons selectpicker" data-live-search="true">
                ${options}
            </select>
        </div>
        <div class="col-md-6" style="margin-bottom: 10px; width: 30%;">
            <input type="url" name="socials[${count}][url]" class="form-control"
                   placeholder="https://example.com/username">
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger remove-row">X</button>
        </div>
    `;
        wrapper.appendChild(row);

        // Reinitialize selectpicker
        $('.selectpicker').selectpicker();

        count++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('.social-link-row').remove();
            // Reinitialize selectpicker after row removal if needed
            $('.selectpicker').selectpicker();
        }
    });
</script>
