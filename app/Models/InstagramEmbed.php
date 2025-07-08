<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InstagramEmbed extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'posted_at',
        'username' // Add this if you want to store username separately
    ];

    protected $casts = [
        'posted_at' => 'datetime'
    ];

    /**
     * Get the Instagram username from URL or stored value
     */
    public function getUsernameAttribute()
    {
        // If username is stored in database, return it
        if (isset($this->attributes['username']) && !empty($this->attributes['username'])) {
            return $this->attributes['username'];
        }

        // Try to extract from URL patterns
        $patterns = [
            // For profile URLs: instagram.com/username/
            '/instagram\.com\/([^\/\?\#]+)\/?$/',
            // For post URLs with username: instagram.com/username/p/postid
            '/instagram\.com\/([^\/\?\#]+)\/[pr]/',
            // Fallback pattern
            '/instagram\.com\/([^\/\?\#]+)/'
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $this->url, $matches)) {
                $username = $matches[1];
                // Filter out common non-username paths
                if (!in_array($username, ['p', 'reel', 'tv', 'stories', 'explore', 'accounts'])) {
                    return $username;
                }
            }
        }

        return 'unknown';
    }

    /**
     * Get the embed URL for iframe
     */
    public function getEmbedUrlAttribute()
    {
        // Convert Instagram reel URL to embed format
        $pattern = '/instagram\.com\/(p|reel)\/([A-Za-z0-9_-]+)/';
        if (preg_match($pattern, $this->url, $matches)) {
            $postId = $matches[2];
            return "https://www.instagram.com/p/{$postId}/embed/";
        }
        return null;
    }

    /**
     * Check if URL is valid Instagram reel/post
     */
    public static function isValidInstagramUrl($url)
    {
        return preg_match('/instagram\.com\/(p|reel)\/[A-Za-z0-9_-]+/', $url);
    }

    /**
     * Get formatted posted date
     */
    public function getFormattedPostedAtAttribute()
    {
        return $this->posted_at->format('d M Y, H:i');
    }

    /**
     * Get the post ID from Instagram URL
     */
    public function getPostIdAttribute()
    {
        $pattern = '/instagram\.com\/(p|reel)\/([A-Za-z0-9_-]+)/';
        if (preg_match($pattern, $this->url, $matches)) {
            return $matches[2];
        }
        return null;
    }

    /**
     * Check if this is a reel or regular post
     */
    public function getIsReelAttribute()
    {
        return strpos($this->url, '/reel/') !== false;
    }
}