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

        $follow_notifications = Auth::user()->followNotifications;
        $comment_notifications = Auth::user()->commentNotifications;
        $vote_notifications = Auth::user()->voteNotifications;

        foreach($follow_notifications as $not){
            $not->type = "follow";
        }
        foreach($comment_notifications as $not){
            $not->type = "comment";
        }
        foreach($vote_notifications as $not){
            $not->type = "vote";
        }
            
        $notifications = $follow_notifications
            ->toBase()->merge($comment_notifications)
            ->toBase()->merge($vote_notifications)
            ->sortByDesc('creation_date');
        
        return view('pages.notifications', [
            'notifications' => $notifications,
        ]);
    }
}
