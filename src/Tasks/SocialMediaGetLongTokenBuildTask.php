<?php

namespace Goldfinch\SocialMedia\Tasks;

use SilverStripe\Dev\BuildTask;
use Goldfinch\SocialMedia\Services\SocialMeta;

class SocialMediaGetLongTokenBuildTask extends BuildTask
{
    private static $segment = 'SocialMediaToken';

    protected $enabled = true;

    protected $title = 'Social Media - long-lived token';

    protected $description = 'Get long-lived token of Facebook/Instagram';

    public function run($request)
    {
        $service = new SocialMeta();

        $service->FacebookGetLongLiveToken();
        $service->InstagramGetLongLiveToken();
    }
}
