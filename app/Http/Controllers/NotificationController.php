<?php

namespace App\Http\Controllers;


class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications = auth()->user()->notifications()->orderBy('created_at')->paginate(2);
        return response()->json($notifications);
    }
}
