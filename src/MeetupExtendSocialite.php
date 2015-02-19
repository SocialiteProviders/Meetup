<?php
namespace AndyWendt\Socialite\Meetup;

use AndyWendt\Socialite\Extender\SocialiteWasCalled;

class MeetupExtendSocialite
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('meetup', 'AndyWendt\Socialite\Meetup\MeetupProvider');
    }
}
