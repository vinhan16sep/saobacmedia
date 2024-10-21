<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BookController extends Controller
{
    const SORTS = [
        "date" => [
            "column" => "created_at",
            "sort" => "desc",
            "title" => "Mới nhất"
        ],
        "price" => [
            "column" => "price",
            "sort" => "asc",
            "title" => "Giá từ thấp đến cao"
        ],
        "price-desc" => [
            "column" => "price",
            "sort" => "desc",
            "title" => "Giá từ cao xuống thấp"
        ],
    ];
    const STEP_PRICE = 500000;
    const DEFAULT_MAX_PRICE = 10000000;

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
        return view('product-list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $book = Book::where(["slug" => $slug])->first()->toArray();

        if (!$book) {
            return redirect(route("home"));
        }

        $books = Book::query()
            ->where("slug", "!=", $slug)->limit(16)->get();

        return view('book-show', [
            "book" => $book,
            "books" => $books,
        ]);
    }

    public function list(Request $request, $slug = null) {
        $books = Book::query()->orderByDesc("created_at")->get();
        return view('book-list', [
            "books" => $books,
            "sorts" => self::SORTS,
        ]);
    }
}
