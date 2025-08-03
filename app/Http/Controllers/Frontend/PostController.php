<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Helper\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy("created_at", "desc")->paginate(10);
        $recentTags = $this->getRecentTags();
        return view("frontend.layout.community", compact("posts", "recentTags"));
    }

    public function getRecentTags()
    {
        $recentTags = Post::latest()
            ->take(10)
            ->get()
            ->pluck('tag')
            ->flatten()
            ->unique()
            ->slice(0, 10);
        return $recentTags;
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('frontend.layout.singlepost', compact('post'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('t-error', 'You need to login to post.');
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'title' => 'required',
            'tag' => 'required',
            'message' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $slug = Helper::makeSlug(Post::class, $request->title);

            $post = new Post();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->user_id = $request->user_id;

            $tags = json_decode($request->tag, true);
            $tagValues = array_map(function ($tag) {
                return $tag['value'];
            }, $tags);
            $post->tag = $tagValues;

            $post->message = $request->message;

            $randomString = Str::random(20);
            $post->image = Helper::fileUpload($request->file('image'), 'post', $slug . '_' . $randomString);

            $post->save();

            return redirect()->route('post.index')->with('t-success', 'Post created successfully');
        } catch (Exception) {
            return redirect()->route('post.index')->with('t-error', 'Post failed to create');
        }
    }
}
