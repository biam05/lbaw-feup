<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Shows the user for a given username.
     *
     * @param  string  $username
     * @return Response
     */
    public function show($username)
    {
      $user = User::find($username);
      $this->authorize('show', $user);
      return view('pages.user', ['user' => $user]);
    }







    //----------------------------------------
    /**
     * Creates a new card.
     *
     * @return User The card created.
     */
    public function create(Request $request)
    {
      $user = new User();

      $this->authorize('create', $user);

      $user->name = $request->input('name');
      $user->user_id = Auth::user()->id;
      $user->save();

      return $user;
    }

    public function delete(Request $request, $id)
    {
      $user = User::find($id);

      $this->authorize('delete', $user);
      $user->delete();

      return $user;
    }
}
