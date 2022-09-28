<?php
namespace techgyani\OAuth1\Client\Server;

use League\Oauth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;
use League\OAuth1\Client\Credentials\TemporaryCredentials;
use GuzzleHttp\Exception\BadResponseException;
use League\OAuth1\Client\Credentials\CredentialsInterface;


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

    /**
     * Get the URL retrieving user details.
     *
     * @return string
     */
    public function urlUserDetails()
    {
        return self::USER_API_URL . "user/id";
    }    

   /* protected function protocolHeader($method, $uri, CredentialsInterface $credentials, array $bodyParameters = array())
    {
        $parameters = array_merge(
            $this->baseProtocolParameters(),
            $this->additionalProtocolParameters(),
            array(
                'oauth_token' => $credentials->getIdentifier(),

            ),
            $bodyParameters
        );
        $this->signature->setCredentials($credentials);

        $parameters['oauth_signature'] = $this->signature->sign(
            $uri,
            array_merge($parameters, $bodyParameters),
            $method
        );

        return $this->normalizeProtocolParameters($parameters);
    }*/

   /* public function getActivitySummary(TokenCredentials $tokenCredentials, $params)
    {
        $client = $this->createHttpClient();
        $query = http_build_query($params);
        $query = '/activities?' . $query;
        $headers = $this->getHeaders($tokenCredentials, 'GET', self::USER_API_URL . $query);
        try {
            $response = $client->get(self::USER_API_URL . $query, [
                'headers' => $headers
            ]);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $body = $response->getBody();
            $statusCode = $response->getStatusCode();

            throw new \Exception(
                "Received error [$body] with status code [$statusCode] when retrieving activity summary."
            );
        }
        return $response->getBody()->getContents();
    }*/

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
