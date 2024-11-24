<?php

namespace App\Services\Firebase;

use Illuminate\Support\Facades\Http;
use App\Services\Firebase\FirebaseAccessTokenService;
use Illuminate\Support\Facades\Log;


class Notification
{
    public function send(array $deviceTokens, string $title, string $body, $actions = [])
    {
        $accessToken = $this->getToken();
        $icon = asset('assets/media/images/logo.png'); // Icono desde la carpeta public

        foreach ($deviceTokens as $deviceToken) {
            $payload = [
                'message' => [
                    'token' => $deviceToken,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'webpush' => [
                        'notification' => [
                            'title' => $title,
                            'body' => $body,
                            'icon' => $icon,
                            'requireInteraction' => true, // Campo válido en webpush.notification
                            'badge' => $icon,
                            'actions' => $actions,
                        ],
                        'headers' => [
                            'Urgency' => 'high',
                        ],
                    ],
                    'data' => [
                        'key1' => 'value1', // Ejemplo de datos personalizados
                        'key2' => 'value2',
                    ],
                ],
            ];

            $response = Http::withToken($accessToken)
                ->post('https://fcm.googleapis.com/v1/projects/dinamo-d33e5/messages:send', $payload);

            if ($response->failed()) {
                Log::error("Error al enviar la notificación", [
                    'deviceToken' => $deviceToken,
                    'error' => $response->json(),
                ]);
            }
        }

        return true;
    }


    private function getToken()
    {
        try {
            $accessToken = FirebaseAccessTokenService::getAccessToken();
            return $accessToken;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
