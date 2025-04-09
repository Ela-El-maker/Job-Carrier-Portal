<?php

namespace Database\Seeders;

use App\Models\SocialPlatform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialPlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $socialPlatforms = [
            [
                'name' => 'LinkedIn',
                'type' => 'linkedin'
            ],
            ['name' => 'GitHub', 'type' => 'github'],
            ['name' => 'Twitter', 'type' => 'twitter'],
            ['name' => 'Facebook', 'type' => 'facebook'],
            ['name' => 'Instagram', 'type' => 'instagram'],
            ['name' => 'YouTube', 'type' => 'youtube'],
            ['name' => 'TikTok', 'type' => 'tiktok'],
            ['name' => 'Dribbble', 'type' => 'dribbble'],
            ['name' => 'Behance', 'type' => 'behance'],
            ['name' => 'Medium', 'type' => 'medium'],
            ['name' => 'Dev.to', 'type' => 'devto'],
            ['name' => 'Portfolio Website', 'type' => 'portfolio'],
            ['name' => 'Snapchat', 'type' => 'snapchat'],
            ['name' => 'Reddit', 'type' => 'reddit'],
            ['name' => 'Pinterest', 'type' => 'pinterest'],
            ['name' => 'WhatsApp', 'type' => 'whatsapp'],
            ['name' => 'Vimeo', 'type' => 'vimeo'],
            ['name' => 'Spotify', 'type' => 'spotify'],
            ['name' => 'Tumblr', 'type' => 'tumblr'],
            ['name' => 'Flickr', 'type' => 'flickr'],
            ['name' => 'Google+', 'type' => 'google-plus'],
            ['name' => 'Quora', 'type' => 'quora'],
            ['name' => 'Skype', 'type' => 'skype'],
            ['name' => 'Discord', 'type' => 'discord'],
            ['name' => 'Slack', 'type' => 'slack'],
            ['name' => 'Twitch', 'type' => 'twitch'],
            ['name' => 'Clubhouse', 'type' => 'clubhouse'],
            ['name' => 'Periscope', 'type' => 'periscope'],
            ['name' => 'WeChat', 'type' => 'wechat'],
            ['name' => 'Telegram', 'type' => 'telegram'],
            ['name' => 'Foursquare', 'type' => 'foursquare'],
            ['name' => 'StumbleUpon', 'type' => 'stumbleupon'],
            ['name' => 'Ask.fm', 'type' => 'askfm'],
            ['name' => 'MySpace', 'type' => 'myspace'],
            ['name' => 'Blogger', 'type' => 'blogger'],
            ['name' => 'WordPress', 'type' => 'wordpress'],
            ['name' => 'Line', 'type' => 'line'],
            ['name' => 'Weibo', 'type' => 'weibo'],
            ['name' => 'KakaoTalk', 'type' => 'kakaotalk'],
            ['name' => 'Yelp', 'type' => 'yelp'],
            ['name' => 'Mix', 'type' => 'mix'],
            ['name' => 'Meetup', 'type' => 'meetup'],
            ['name' => 'Houseparty', 'type' => 'houseparty'],
            ['name' => 'Fiverr', 'type' => 'fiverr'],
            ['name' => 'Upwork', 'type' => 'upwork'],
            ['name' => 'Mastodon', 'type' => 'mastodon'],
            ['name' => 'Patreon', 'type' => 'patreon'],
            ['name' => 'Roku', 'type' => 'roku'],
        ];

        foreach ($socialPlatforms as $platform) {
            // Create a new SocialPlatform model
            $data = new SocialPlatform();
            $data->name = $platform['name'];  // Use 'name' from the array
            $data->type = $platform['type'];  // Use 'type' from the array
            $data->save();
        }
    }
}
