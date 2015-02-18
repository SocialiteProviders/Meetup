<?php
namespace AndyWendt\Socialite\Meetup;

use Illuminate\Support\ServiceProvider;

class MeetupServiceProvider extends ServiceProvider {

    /**
     * {@inheritdoc}
     */
    protected $defer = true;

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->registerMeetupSocialite();
    }


    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // empty
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return ['Laravel\Socialite\Contracts\Factory'];
    }

    private function registerMeetupSocialite()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'meetup',
            function ($app) use ($socialite) {
                $config = $app['config']['services.meetup'];
                return $socialite->buildProvider('AndyWendt\Socialite\Meetup\MeetupProvider', $config);
            }
        );
    }
}
