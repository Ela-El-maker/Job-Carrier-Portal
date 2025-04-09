@php $count = 0; @endphp

<div class="tab-pane" id="aboutSection">
    <form action="{{ route('candidate.portfolio.about.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>About You *</label>
            <textarea name="portfolio_about" class="form-control {{ $errors->has('portfolio_about') ? 'is-invalid' : '' }}"
                id="editor">{!! $candidatePortfolio?->portfolio_about !!}</textarea>
            <x-input-error :messages="$errors->get('portfolio_about')" class="mt-2" />
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="github">GitHub *</label>
                <input type="url" name="github_url" value="{{ $candidatePortfolio?->github_url }}"
                    class="form-control {{ $errors->has('github_url') ? 'is-invalid' : '' }}" id="github"
                    placeholder="https://github.com/username">
            </div>
            <div class="col-md-3 mb-3">
                <label for="linkedin">LinkedIn *</label>
                <input type="url" name="linkedin_url" value="{{ $candidatePortfolio?->linkedin_url }}"
                    class="form-control {{ $errors->has('linkedin_url') ? 'is-invalid' : '' }}" id="linkedin"
                    placeholder="https://linkedin.com/in/username">
            </div>
            <div class="col-md-3 mb-3">
                <label for="instagram">Instagram *</label>
                <input type="url" name="instagram_url" value="{{ $candidatePortfolio?->instagram_url }}"
                    class="form-control {{ $errors->has('instagram_url') ? 'is-invalid' : '' }}" id="instagram"
                    placeholder="https://instagram.com/username">
            </div>
            <div class="col-md-3 mb-3">
                <label for="whatsapp">WhatsApp *</label>
                <input type="url" name="whatsapp_url" value="{{ $candidatePortfolio?->whatsapp_url }}"
                    class="form-control {{ $errors->has('whatsapp_url') ? 'is-invalid' : '' }}" id="whatsapp"
                    placeholder="https://wa.me/1234567890">
            </div>
            <div class="col-md-12 mb-3">
                <label for="website">Personal Website *</label>
                <input type="url" name="portfolio_url" class="form-control" placeholder="https://yourwebsite.com"
                    value=" {{ $candidatePortfolio?->portfolio_url }}">
            </div>
        </div>
        <hr>


        {{-- Submit --}}
        <div class="form-group">
            <button class="btn btn-blue btn-lg btn-block">Save All Changes</button>
        </div>
    </form>
</div>
