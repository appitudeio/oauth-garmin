<?php
namespace techgyani\OAuth1\Client\Server;

use League\Oauth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;

class Garmin extends Server
{
    const API_URL       = "https://connectapi.garmin.com/";
    const AUTH_URL      = "https://connect.garmin.com/";
    const USER_API_URL  = "https://healthapi.garmin.com/wellness-api/rest/";

    /**
     * Get the URL for retrieving temporary credentials.
     *
     * @return string
     */
    public function urlTemporaryCredentials()
    {
        return self::API_URL . 'oauth-service/oauth/request_token';
    }

    /**
     * Get the URL for redirecting the resource owner to authorize the client.
     *
     * @return string
     */
    public function urlAuthorization()
    {
        return self::AUTH_URL . 'oauthConfirm';
    }

    /**
     * Get the URL retrieving token credentials.
     *
     * @return string
     */
    public function urlTokenCredentials()
    {
        return self::API_URL . 'oauth-service-1.0/oauth/access_token';
    }

    public function urlUserDetails()
    {
        return self::USER_API_URL . "user/id";
    }

    public function userDetails($data, TokenCredentials $tokenCredentials)
    {
    }

    public function userUid($data, TokenCredentials $tokenCredentials)
    {
        pre($data); die();
    }

    public function userEmail($data, TokenCredentials $tokenCredentials)
    {
    }

    public function userScreenName($data, TokenCredentials $tokenCredentials)
    {
    }
}
?>