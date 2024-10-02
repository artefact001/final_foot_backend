<?php
// app/Http/Controllers/NotificationController.php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    // Méthode pour récupérer les notifications
    public function index(): JsonResponse
    {
        $notifications = auth()->user()->notifications;

        return response()->json($notifications);
    }
}
