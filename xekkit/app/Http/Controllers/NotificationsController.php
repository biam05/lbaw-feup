<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\FollowNotification;
use App\Models\CommentNotification;
use App\Models\VoteNotification;

class NotificationsController extends Controller
{
    public function show(Request $request)
    {      
        $notifications = array();

        $follow_notifications = FollowNotification::where('users_id', Auth::id())
            ->orderBy('')
            ->get();
        $comment_notifications = CommentNotification::where('users_id', Auth::id())
            ->get();
        $vote_notifications = VoteNotification::where('author_id', Auth::id())
            ->get();

        array_push($notifications, $follow_notifications);
        array_push($notifications, $comment_notifications);
        array_push($notifications, $vote_notifications);
        

        return view('pages.notifications', [
            'notifications' => $notifications,
        ]);
    }
}
