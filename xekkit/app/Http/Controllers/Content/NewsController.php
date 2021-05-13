<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\News;
use App\Models\Content;
use App\Models\Tag;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    /**
     * Shows the news for a given news_id.
     *
     * @param string $id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $this->authorize('view', $news);

        return view('pages.news', ['news' => $news]);
    }

    public function create(Request $request)
    {
        $this->authorize('create', News::class);

        $validator = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'image|mimes: jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $id = DB::transaction(function () use ($request) {
            // create content
            $content = new Content;

            $content->body = $request->input('body');
            $content->author_id = Auth::user()->id;

            $content->save();

            $id = $content->id;

            //create news
            $news = new News;
            $news->title = $request->input('title');

            if ($request->hasFile('image')) {
                $image_name = $content->id . '.' . $request->file('image')->extension();
                $request->file('image')->storeAs('/public/img/news/', $image_name);
                $news->image = $image_name;
            }

            $news->content_id = $id;
            $news->save();

            return $id;
        });

        // Find hashtags in body
        preg_match_all('/#(\w+)/', $request->input('body'), $hashtags);

        // Hashtags are stored in $hashtags[1]
        foreach ($hashtags[1] as $tag_text) {
            $tag = Tag::firstOrCreate(['name' => $tag_text]);
            $tag->news()->syncWithoutDetaching([$id]);
        }

        return redirect('/news/' . $id);
    }

    public function edit(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $this->authorize('update', $news);

        $validator = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'image|mimes: jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $news->content->body = $request->input('body');
        $news->title = $request->input('title');

        if ($request->hasFile('image')) {
            $image_name = $news->content->id . '.' . $request->file('image')->extension();

            if (!empty($news->image)) {
                Storage::delete('/public/img/news/' . $news->image);
            }

            $request->file('image')->storeAs('/public/img/news/', $image_name);
            $news->image = $image_name;
        }

        DB::transaction(function () use ($news) {
            $news->content->save();
            $news->save();
        });

        preg_match_all('/#(\w+)/', $request->input('body'), $hashtags);

        // clear all tags from news
        $news->tags()->sync([]);

        foreach ($hashtags[1] as $tag_text) {
            $tag = Tag::firstOrCreate(['name' => $tag_text]);
            $tag->news()->syncWithoutDetaching([$id]);
        }

        return redirect('/news/' . $id)->with('success', 'Your post was successfully updated.');
    }

    public function delete(Request $request, $id)
    {
        $validator = $request->validate([
            'password' => 'required|string',
        ]);

        $news = News::findOrFail($id);

        $this->authorize('delete', $news);

        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        if (!empty($news->image)) {
            Storage::delete('/public/img/news/' . $news->image);
        }

        $news->content->delete();

        return redirect('/')->with('success', 'The post was successfully deleted.');
    }
}
