<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\Firebase\FirebaseAccessTokenService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FirebaseTestController extends Controller
{
    public function sendNotification()
    {
        $accessToken = $this->getAccessToken(); 
        $title = 'Notificación de prueba 1';
        $body = 'Esta es una notificación de prueba';
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $deviceToken = $user->fcm_token;

        $response = Http::withToken($accessToken)
            ->post('https://fcm.googleapis.com/v1/projects/dinamo-d33e5/messages:send', [
                'message' => [
                    'token' => $deviceToken,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => [
                        'key1' => 'value1',
                        'key2' => 'value2',
                    ],
                ],
            ]);
    
       echo "Notificacion enviada";	
    }

    public function getAccessToken()
    {
        try {
            $accessToken = FirebaseAccessTokenService::getAccessToken();
            return $accessToken;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
