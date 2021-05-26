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
            
        $notifications = $follow_notifications
            ->toBase()->merge($comment_notifications)
            ->toBase()->merge($vote_notifications)
            ->sortByDesc('creation_date');

        if($user->is_moderator){
            $partner_requests = PartnerRequest::all();
            $report_content_requests = ReportContent::all();
            $report_user_requests = ReportUser::all();
            $unban_appeals = UnbanAppeal::all();

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
