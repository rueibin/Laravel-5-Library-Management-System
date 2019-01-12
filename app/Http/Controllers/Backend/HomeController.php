<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\HomeService;

class HomeController extends Controller
{
    protected $home;

    public function __construct(HomeService $homeService)
    {
        $this->home=$homeService;
    }

    //借閱排行榜
    public function index()
    {
        $home=$this->home->leaderboard();

        return view('backend.home', compact('home'));
    }
}
