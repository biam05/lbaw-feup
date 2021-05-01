<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;

use App\Models\News;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{

    use UploadTrait;

    /**
     * Shows the news for a given news_id.
     *
     * @param string $id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $news = News::find($id);
        if (empty($news) || empty($news->content->author_id)) {
            throw new NotFoundHttpException();
        }
        $author = User::find($news->content->author_id);
        if (empty($author)) {
            throw new NotFoundHttpException();
        }

        return view('pages.news', ['news' => $news, 'author' => $author]);
    }

    public function create(Request $request)
    {
        echo "<pre>";
        print_r($request);
        echo "</pre>";
        die;
        try {
            $news = new news;
            $news->content->author_id = Auth::user()->id;
            $news->content->body = $request->input('body');
            $news->title = $request->input('title');
            $image = $request->file('news_image');
            $name = Str::slug($request->input('title')) . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $news->image = $filePath;
            $news->save();
            Session::flash('message', 'Successfully created post!');
        } catch (Exception $e) {
            Session::flash('message', 'Error on create post!');
        }

        return redirect('/');
    }

    public function edit(Request $request, $id)
    {
        try {
            $news = News::find($id);
            if ($news->content->author_id === Auth::user()->id) {
                $news->content->body = $request->input('News-modal-description');
                $news->title = $request->input('News-modal-title');
                $image = $request->file('fileToUpload');
                $name = Str::slug($request->input('title')) . '_' . time();
                $folder = '/uploads/images/';
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $news->image = $filePath;
                $news->save();
                Session::flash('message', 'Successfully updated post!');
            }
        } catch (Exception $e) {
            Session::flash('message', 'Error on update post!');
        }

        return redirect('/news/' . $id);
    }

    public function delete($id)
    {
        try {
            $news = News::find($id);
            if ($news->content->author_id === Auth::user()->id) {
                $this->authorize('delete', $news);
                $news->delete();
                Session::flash('message', 'Successfully deleted post!');
            } else {
                Session::flash('message', 'Error on delete post!');

                return redirect('/news/' . $id);
            }
        } catch (Exception $e) {
            Session::flash('message', 'Error on delete post!');

            return redirect('/news/' . $id);
        }

        return redirect('/');
    }
}
