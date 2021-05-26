<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\FollowNotification;
use App\Models\CommentNotification;
use App\Models\VoteNotification;

use App\Models\PartnerRequest;
use App\Models\ReportContent;
use App\Models\Reportuser;
use App\Models\UnbanAppeal;

class NotificationsController extends Controller
{
    public function show(Request $request)
    {              
        $notifications = array();
        $mod_notifications = array();

        $user = Auth::user();

        $follow_notifications = $user->followNotifications;
        $comment_notifications = $user->commentNotifications;
        $vote_notifications = $user->voteNotifications;

        foreach($follow_notifications as $n){
            $n->type = "follow";
        }
        foreach($comment_notifications as $n){
            $n->type = "comment";
        }
        foreach($vote_notifications as $n){
            $n->type = "vote";
        }
            
        $notifications = $follow_notifications
            ->toBase()->merge($comment_notifications)
            ->toBase()->merge($vote_notifications)
            ->sortByDesc('creation_date');

        if($user->is_moderator){
            $partner_requests = PartnerRequest::all();
            $report_content_requests = ReportContent::all();
            $report_user_requests = ReportUser::all();
            $unban_appeals = UnbanAppeal::all();

            foreach($partner_requests as $n){
                $n->type = "partner_request";
            }
            foreach($report_content_requests as $n){
                $n->type = "report_content";
            }
            foreach($report_user_requests as $n){
                $n->type = "report_user";
            }
            foreach($unban_appeals as $n){
                $n->type = "unban_appeal";
            }

            $mod_notifications = $partner_requests
                ->toBase()->merge($report_content_requests)
                ->toBase()->merge($report_user_requests)
                ->toBase()->merge($unban_appeals);
        }
        
        
        return view('pages.notifications', [
            'notifications' => $notifications,
            'mod_notifications' => $mod_notifications
        ]);
    }
}
