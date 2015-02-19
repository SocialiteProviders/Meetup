<?php
namespace SocialiteProviders\Meetup;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class MeetupProvider extends AbstractProvider implements ProviderInterface {

    protected $grantType = 'authorization_code';
    protected $version = '2';
    protected $scopes = ['ageless'];


    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://secure.meetup.com/oauth2/authorize', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return 'https://secure.meetup.com/oauth2/access';
    }


    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        // http://www.meetup.com/meetup_api/auth/#oauth2-resources
        $response = $this->getHttpClient()->get(
            'https://api.meetup.com/' . $this->version . '/member/self?access_token=' . $token,
            [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]
        );

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code)
    {
        // see http://www.meetup.com/meetup_api/auth/#oauth2server-access
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => $this->grantType,
            'code' => $code,
            'redirect_uri' => $this->redirectUrl,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => $user['name'],
            'name' => $user['name'],
            'avatar' => array_key_exists('photo', $user) ? $user['photo']['photo_link'] : null,
        ]);
    }
}
