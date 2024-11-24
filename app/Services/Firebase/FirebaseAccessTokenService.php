<?php

namespace App\Services\Firebase;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FirebaseAccessTokenService
{
    /**
     *
     * @return string
     */
    public static function getAccessToken()
    {
        $cacheKey = 'access_token';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $keyFilePath = storage_path('app/firebase/credentials.json');
        $credentials = json_decode(file_get_contents($keyFilePath), true);

        $now = time();
        $jwtHeader = [
            'alg' => 'RS256',
            'typ' => 'JWT',
        ];
        
        $jwtPayload = [
            'iss' => $credentials['client_email'],
            'sub' => $credentials['client_email'],
            'aud' => 'https://oauth2.googleapis.com/token',
            'iat' => $now,
            'exp' => $now + 3600,
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
        ];

        $jwt = base64_encode(json_encode($jwtHeader)) . '.' . base64_encode(json_encode($jwtPayload));
        openssl_sign($jwt, $signature, $credentials['private_key'], 'sha256');
        $jwt .= '.' . base64_encode($signature);

        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);

        if ($response->successful()) {
            $accessToken = $response->json()['access_token'];

            Cache::put($cacheKey, $accessToken, now()->addMinutes(55));

            return $accessToken;
        }

        throw new \Exception('Error al obtener el Access Token: ' . $response->body());
    }
}
