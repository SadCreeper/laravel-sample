<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class StaticPagesController extends Controller
{
  public function home()
  {
    $feed_items = [];
    if (Auth::check()) {
        $feed_items = Auth::user()->feed()->paginate(30);
    }
    return view('static-pages/home', compact('feed_items'));
  }

  public function help()
  {
    return view('static-pages/help');
  }

  public function about()
  {
    return view('static-pages/about');
  }
}
