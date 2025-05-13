<?php

use App\Models\Blog;
use App\Models\Job;
use App\Services\ViewTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/track-view', function (Request $request) {
    $data = $request->validate([
        'type' => 'required|in:blog,job',
        'id' => 'required|integer',
    ]);

    $model = match ($data['type']) {
        'blog' => Blog::findOrFail($data['id']),
        'job' => Job::findOrFail($data['id']),
    };

    app(\App\Services\ViewTracker::class)->track($model, $request);

    return response()->json(['success' => true]);
})->middleware('api');
