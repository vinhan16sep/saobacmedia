<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Event;
use App\Models\SubBanner;
use Illuminate\Http\Request;
use App\Models\HomeBlock;

class HomeController extends Controller
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
    public function index()
    {
        $banners = Banner::query()->where(["is_active" => 1])->get();
        $books = Book::query()->orderByDesc("created_at")->get()->toArray();
        $news = Event::query()->orderByDesc("created_at")->limit(10)->get();

        return view('home', [
            "banners" => $banners,
            "books" => $books,
            "news" => $news,
        ]);
    }
}
