<?php
namespace AndyWendt\Socialite\Meetup;

use AndyWendt\Socialite\Extender\SocialiteWasCalled;

class ExtendSocialite
{

    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialite = \App::make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'meetup',
            function ($app) use ($socialite) {
                $config = $app['config']['services.meetup'];
                return $socialite->buildProvider('AndyWendt\Socialite\Meetup\MeetupProvider', $config);
            }
        );
    }
}
