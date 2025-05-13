<?php

namespace App\Services;

use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Torann\GeoIP\Facades\GeoIP;

class ViewTracker
{
    public function track($model, Request $request)
    {
        // Skip tracking for admin users
        if (auth('admin')->check()) {
            return;
        }

        $cacheKey = $this->getCacheKey($model, $request);

        // Use remember() instead of separate has/put to avoid race conditions
        Cache::remember($cacheKey, now()->addHours(2), function () use ($model, $request) {
            $this->storeView($model, $request);
            return true;
        });
    }

    protected function getCacheKey($model, Request $request): string
    {
        $userId = auth()->id() ?? 'guest';
        return "view_{$model->getTable()}_{$model->id}_" . md5($userId . $request->ip() . $request->userAgent());
    }

    protected function storeView($model, Request $request)
    {
        try {
            $geoData = $this->getGeoData($request);

            $model->views()->create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'user_id' => auth()->id(),
                'referrer' => $request->headers->get('referer'),
                'country' => $geoData['country'],
                'city' => $geoData['city'],
            ]);

            $model->increment('views');
        } catch (\Exception $e) {
            Log::error('View tracking failed for ' . get_class($model) . ' ID ' . $model->id . ': ' . $e->getMessage());
        }
    }

    protected function getGeoData(Request $request): array
    {
        // Default values for local development or when GeoIP fails
        $defaults = [
            'country' => config('app.env') === 'local' ? 'Local' : 'Unknown',
            'city' => config('app.env') === 'local' ? 'Development' : 'Unknown',
        ];

        if (config('app.env') === 'local' || $request->ip() === '127.0.0.1') {
            return $defaults;
        }

        try {
            $geo = GeoIP::getLocation($request->ip());
            return [
                'country' => $geo->country ?? $defaults['country'],
                'city' => $geo->city ?? $defaults['city'],
            ];
        } catch (\Exception $e) {
            Log::warning('GeoIP lookup failed: ' . $e->getMessage());
            return $defaults;
        }
    }
}
