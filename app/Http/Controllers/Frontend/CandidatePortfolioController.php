<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatePortfolioAboutRequest;
use App\Http\Requests\CandidatePortfolioHeroRequest;
use App\Models\Candidate;
use App\Models\CandidatePortfolio;
use App\Models\CandidateSocial;
use App\Models\PortfolioClient;
use App\Models\PortfolioService;
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

    public function index(): View | RedirectResponse
    {
        $candidate = auth()->user()?->candidateProfile;

        if (!$candidate) {
            return redirect()->route('candidate.profile.basic-info.update')->with('error', 'Please complete your candidate profile.');
        }

        $candidatePortfolio = $candidate->portfolio;
        $socialPlatforms = SocialPlatform::all()->pluck('name', 'type');

        $portfolioServices = PortfolioService::where('candidate_id', $candidate->id)
            ->orderBy('id', 'DESC')
            ->get();

        $portfolioClients = PortfolioClient::where('candidate_id', $candidate->id)
            ->orderBy('id', 'DESC')
            ->get();

        // $socialLinks = CandidateSocial::where('candidate_id', $candidate->id)->get();
        // $socialLinks = CandidateSocial::with('social') // <- this ensures you get type name
        //     ->where('candidate_id', $candidate->id)
        //     ->get();
        // $socialLinks = CandidateSocial::with('social')
        //     ->where('candidate_id', 2) // Use an ID you know exists in your DB
        //     ->get();
        // // dd($socialLinks);
        // dd(\DB::table('candidate_socials')->get());

        // $socialLinks = $candidate->socialLinks;




        return view('frontend.candidate-dashboard.portfolio.index', compact(
            'socialPlatforms',
            'candidate',
            'portfolioServices',
            'portfolioClients',
            'candidatePortfolio',
        ));
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

    // function portfolioAboutUpdate(CandidatePortfolioAboutRequest $request): RedirectResponse
    // {

    //     // $data = [
    //     //     'portfolio_about' => $request->portfolio_about,

    //     // ];
    //     // $data = [];
    //     $data['portfolio_about'] = $request->portfolio_about;

    //     $this->updateCandidatePortfolio($data);

    //     $candidate = CandidatePortfolio::where('candidate_id', auth()->user()?->candidateProfile?->id)->first();
    //     if ($candidate) {
    //         $this->updateCandidateSocials($candidate, $request->socials);
    //     }

    //     // dd($request->all());

    //     Notify::updatedNotification();

    //     return redirect()->back()->with('success', 'Portfolio About updated successfully');
    // }

    public function portfolioAboutUpdate(CandidatePortfolioAboutRequest $request): RedirectResponse
    {
        $data['portfolio_about'] = $request->portfolio_about;
        $data['github_url'] = $request->github_url;
        $data['linkedin_url'] = $request->linkedin_url;
        $data['whatsapp_url'] = $request->whatsapp_url;
        $data['instagram_url'] = $request->instagram_url;
        $data['portfolio_url'] = $request->portfolio_url;

        $this->updateCandidatePortfolio($data);

        // $candidate = CandidatePortfolio::where('candidate_id', auth()->user()?->candidateProfile?->id)->first();

        // if ($candidate) {
        //     $this->updateCandidateSocials($candidate, $request->socials); // 💥 this handles the update
        // }

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
    // private function updateCandidateSocials($candidate, $socials): void
    // {
    //     // Remove old ones
    //     CandidateSocial::where('candidate_id', $candidate->id)->delete();

    //     foreach ($socials as $social) {
    //         // Skip if either value is missing
    //         if (empty($social['type']) || empty($social['url'])) continue;

    //         // Get the correct social platform ID from type
    //         $platform = SocialPlatform::where('type', $social['type'])->first();

    //         if ($platform) {
    //             CandidateSocial::create([
    //                 'candidate_id' => $candidate->id,
    //                 'social_id' => $platform->id,
    //                 'url' => $social['url'],
    //             ]);
    //         }
    //     }
    // }

    // private function updateCandidateSocials($candidate, $socials): void
    // {
    //     CandidateSocial::where('candidate_id', $candidate->id)->delete();

    //     foreach ($socials as $social) {
    //         if (empty($social['type']) || empty($social['url'])) continue;

    //         $platform = SocialPlatform::where('type', $social['type'])->first();

    //         if ($platform) {
    //             CandidateSocial::create([
    //                 'candidate_id' => $candidate->id,
    //                 'social_id' => $platform->id,
    //                 'url' => $social['url'],
    //             ]);
    //         }
    //     }
    // }






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
