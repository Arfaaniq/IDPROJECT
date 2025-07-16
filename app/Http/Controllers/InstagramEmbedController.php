<?php

namespace App\Http\Controllers;

use App\Models\InstagramEmbed;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InstagramEmbedController extends Controller
{
    /**
     * Display the main page with form and embeds
     */
    public function index()
{
    $reels = InstagramEmbed::latest()->get();
    return view('admin.Instagram', compact('reels'));
}


    /**
     * Store a new Instagram embed
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->url;

        // Validate Instagram URL
        if (!InstagramEmbed::isValidInstagramUrl($url)) {
            return response()->json([
                'success' => false,
                'message' => 'URL bukan Instagram Reel/Post yang valid'
            ], 400);
        }

        // Check if URL already exists
        if (InstagramEmbed::where('url', $url)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'URL Instagram sudah ada dalam database'
            ], 400);
        }

        $embed = InstagramEmbed::create([
            'url' => $url,
            'posted_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Instagram embed berhasil ditambahkan',
            'embed' => [
                'id' => $embed->id,
                'url' => $embed->url,
                'embed_url' => $embed->embed_url,
                'username' => $embed->username,
                'posted_at' => $embed->formatted_posted_at
            ]
        ]);
    }

    /**
     * Show edit form
     */
    public function edit(InstagramEmbed $embed)
    {
        return response()->json([
            'success' => true,
            'embed' => [
                'id' => $embed->id,
                'url' => $embed->url,
                'posted_at' => $embed->posted_at->format('Y-m-d\TH:i')
            ]
        ]);
    }

    /**
     * Update an existing embed
     */
    public function update(Request $request, InstagramEmbed $embed)
    {
        $request->validate([
            'url' => 'required|url',
            'posted_at' => 'required|date'
        ]);

        $url = $request->url;

        // Validate Instagram URL
        if (!InstagramEmbed::isValidInstagramUrl($url)) {
            return response()->json([
                'success' => false,
                'message' => 'URL bukan Instagram Reel/Post yang valid'
            ], 400);
        }

        // Check if URL already exists (except current record)
        if (InstagramEmbed::where('url', $url)->where('id', '!=', $embed->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'URL Instagram sudah ada dalam database'
            ], 400);
        }

        $embed->update([
            'url' => $url,
            'posted_at' => Carbon::parse($request->posted_at)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Instagram embed berhasil diupdate'
        ]);
    }

    /**
     * Delete an embed
     */
    public function destroy(InstagramEmbed $embed)
    {
        $embed->delete();

        return response()->json([
            'success' => true,
            'message' => 'Instagram embed berhasil dihapus'
        ]);
    }
}