<?php

namespace App\Http\Controllers;


class NotificationController extends Controller
{
    //
    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(2);
        return response()->json($notifications);
    }
}
