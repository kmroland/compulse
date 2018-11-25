<?php

namespace App\Http\Controllers;

use App\Article;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'non-admin'])->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Returns the welcome pages.
     *
     * @return View
     */
    public function welcome()
    {
        $articles = Article::published()->latest()->limit(3)->get();

        return view('welcome', compact('articles'));
    }
}
