<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $news = Event::where(["is_active" => 1, "slug" => $slug])->first();

        if (!$news) {
            return redirect(route("home"));
        }

        $highlightNews = Event::where(["is_active" => 1, "is_highlight" => 1])
            ->where("id", "!=", $news->id)->orderByDesc("created_at")->limit(5)->get();
        $allNews = Event::where(["is_active" => 1])
            ->where("id", "!=", $news->id)->orderByDesc("created_at")->limit(5)->get();

        return view('new-show', [
            "news" => $news,
            "highlightNews" => $highlightNews,
            "allNews" => $allNews,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $news = Event::query()->where("is_active", 1)->orderByDesc("created_at")->limit(5)->get();
        $highlightNews = Event::query()->where(["is_active" => 1, "is_highlight" => 1])->orderByDesc("created_at")->limit(5)->get();

        return view('new-list', [
            "news" => $news,
            "highlightNews" => $highlightNews,
        ]);
    }
}
