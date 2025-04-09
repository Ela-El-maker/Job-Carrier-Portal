<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatePortfolioAboutRequest;
use App\Http\Requests\CandidatePortfolioHeroRequest;
use App\Models\Candidate;
use App\Models\CandidatePortfolio;
use App\Models\CandidateSocial;
use App\Models\SocialPlatform;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidatePortfolioController extends Controller
{
    use FileUploadTrait;
    //

    function index(): View
    {
        $candidate = Candidate::where('user_id', auth()->user()?->id)->first();
        $socialPlatforms = SocialPlatform::all()->pluck('name', 'type');
        return view('frontend.candidate-dashboard.portfolio.index', compact('socialPlatforms', 'candidate'));
    }

    function portfolioHeroUpdate(CandidatePortfolioHeroRequest $request): RedirectResponse
    {


        $data = $this->handleFileUploads($request);
        $data['hero_title'] = $request->hero_title;
        $data['sub_description'] = $request->sub_description;

        $this->updateCandidatePortfolio($data);
        // $this->updatePortfolioStatus();

        Notify::updatedNotification();

        return redirect()->back()->with('success', 'Portfolio Hero updated successfully');
    }

    function portfolioAboutUpdate(CandidatePortfolioAboutRequest $request): RedirectResponse
    {

        // $data = [
        //     'portfolio_about' => $request->portfolio_about,

        // ];
        // $data = [];
        $data['portfolio_about'] = $request->portfolio_about;

        $this->updateCandidatePortfolio($data);

        $candidate = CandidatePortfolio::where('candidate_id', auth()->user()?->candidateProfile?->id)->first();
        if ($candidate) {
            $this->updateCandidateSocials($candidate, $request->socials);
        }

        Notify::updatedNotification();

        return redirect()->back()->with('success', 'Portfolio About updated successfully');
    }



    //Private Functions
    /**
     * Update the candidate portfolio.
     */
    private function updateCandidatePortfolio(array $data): void
    {
        CandidatePortfolio::updateOrCreate(
            ['candidate_id' => auth()->user()->candidateProfile->id],
            $data
        );
        // dd($one);
    }

    /**
     * Update candidate Socials.
     */
    private function updateCandidateSocials($candidate, $socials): void
    {
        // Remove old ones
        CandidateSocial::where('candidate_id', $candidate->id)->delete();

        foreach ($socials as $social) {
            // Skip if either value is missing
            if (empty($social['type']) || empty($social['url'])) continue;

            // Get the correct social platform ID from type
            $platform = SocialPlatform::where('type', $social['type'])->first();

            if ($platform) {
                CandidateSocial::create([
                    'candidate_id' => $candidate->id,
                    'social_id' => $platform->id,
                    'url' => $social['url'],
                ]);
            }
        }
    }





    private function handleFileUploads($request): array
    {
        $data = [];
        $imagePath = $this->uploadFile($request, 'background_image');
        $resumePath = $this->uploadFile($request, 'resume');

        if (!empty($imagePath)) $data['background_image'] = $imagePath;
        if (!empty($resumePath)) $data['resume'] = $resumePath;

        return $data;
    }

    // public function showSocialPlatforms()
    // {
    //     $socialPlatforms = SocialPlatform::all()->pluck('name', 'type');
    //     return view('', compact('socialPlatforms'));
    // }
}
