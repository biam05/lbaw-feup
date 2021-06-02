<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Requests;
use App\Models\PartnerRequest;
use App\Models\ReportUser;
use App\Models\News;
use App\Models\Content;
use App\Models\Follow;
use App\Models\UnbanAppeal;

class UserController extends Controller
{
    /**
     * Shows the user for a given username.
     *
     * @param  string  $username
     * @return view
     */
    public function show($username)
    {
        $this->authorize('viewAny', User::class);

        $user = User::getUser($username);

        if($user == null){
            return view('errors.404');
        }

        $posts = $user->news();

        $recentPosts = $posts->sortByDesc('content.date');
        $topPosts = $posts->sortByDesc('content.nr_votes');
        $trendingPosts = $posts->sortByDesc('trending_score');

        $following = $user->following;

        return view('pages.user', [
            'user' => $user,
            'recentPosts' => $recentPosts,
            'topPosts' => $topPosts,
            'trendingPosts' => $trendingPosts,
            'following' => $following
        ]);
    }

    /**
     * Shows the edit page.
     *
     * @param  string  $username
     * @return view
     */
    public function showEditPage($username)
    {
        $user = User::getUser($username);
        $this->authorize('update', $user);
        return view('pages.edit_user');
    }

    /**
     * Updates user password.
     *
     * @param  Request  $request
     * @return view
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'confirmNewPassword' => 'required|same:newPassword'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if(! Hash::check($request->oldPassword, Auth::user()->password)) {
            return back()->withErrors([
                'oldPassword' => ['The provided password does not match our records.']
            ]);
        }

        Auth::user()->password = bcrypt($request->newPassword);
        Auth::user()->save();

        return view('pages.edit_user');
    }

    /**
     * Updates user information.
     *
     * @param  Request  $request
     * @return view
     */
    public function updateUser(Request $request)
    {
        $this->authorize('update', Auth::user());

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:16|unique:users,username,'.(string)Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,'.(string)Auth::id(),
            'birthdate' => 'required|date|before:-13 years',
            'gender' => 'required|string',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        Auth::user()->username = $request->username;
        Auth::user()->email = $request->email;
        Auth::user()->birthdate = $request->birthdate;
        Auth::user()->gender = $request->gender;
        Auth::user()->description = $request->description;
        Auth::user()->save();
        return view('pages.edit_user');
    }

    /**
     * Updates user as deleted.
     *
     * @param  Request  $request
     * @return view
     */
    public function deleteUser(Request $request)
    {
        $this->authorize('delete', Auth::user());

        if(! Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        Auth::user()->is_deleted = true;
        Auth::user()->save();

        Auth::logout();
        return redirect('/');
    }

    public function report(Request $request, $id)
    {

        $validator = $request->validate([
            'body' => 'required|string',
        ]);

        $user = User::findOrFail($id);


        DB::transaction(function () use ($request, $id) {
            // create request
            $db_request = new Requests;

            $db_request->reason = $request->input('body');
            $db_request->from_id = Auth::user()->id;

            $db_request->save();

            $request_id = $db_request->id;

            //create report
            $report = new ReportUser();
            $report->request_id=$request_id;
            $report->to_users_id=$id;

            $report->save();

            return $request_id;
        });

        return redirect()->back();
    }

    /**
     * Create partner request.
     *
     * @param  Request  $request
     * @return view
     */
    public function partnerRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reason' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::transaction(function () use ($request) {
            // create request
            $db_request = new Requests;

            $db_request->reason = $request->reason;
            $db_request->from_id = Auth::id();

            $db_request->save();

            $request_id = $db_request->id;

            //create partner request
            $partner_request = new PartnerRequest();
            $partner_request->request_id=$request_id;

            $partner_request->save();
        });

        return view('pages.edit_user');
    }

    public function stop_partnership(Request $request, $username)
    {
        if(! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        $user = User::where('username','=',$username)->first();
        User::findOrFail($user->id);
        $user->is_partner=false;
        $user->save();
        return redirect("/user/".$username);
    }

    public function follow(Request $request){

        $validator = Validator::make($request->all(), [
            'users_id' => 'required|integer',
            'follower_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator);
        }

        $user = User::findOrFail($request->follower_id);

        $user->following()->attach($request->users_id);

        $response = [
            'status' => true,
            'message' => "Follow OK",
            'users_id' => $request->users_id
        ];

        return response()->json($response);
    }

    public function unfollow(Request $request){

        $validator = Validator::make($request->all(), [
            'users_id' => 'required|integer',
            'follower_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator);
        }

        $user = User::findOrFail($request->follower_id);

        $user->following()->detach($request->users_id);

        $response = [
            'status' => true,
            'message' => "Unfollow OK",
            'users_id' => $request->users_id
        ];

        return response()->json($response);
    }

    public function unban_appeal(Request $request, $username)
    {

        $user = User::where('username','=',$username)->first();

        User::findOrFail($user->id);

        DB::transaction(function () use ($request, $user) {
            // create request
            $db_request = new Request;

            $db_request->reason = $request->input('body');
            $db_request->from_id = Auth::user()->id;

            $db_request->save();

            $request_id = $db_request->id;

            //create report
            $unban_appeal = new UnbanAppeal();
            $unban_appeal->request_id=$request_id;
            $unban_appeal->ban_id=$user->currentBan();
            $unban_appeal->save();

            return $unban_appeal;
        });

        return redirect()->back();
    }


}
