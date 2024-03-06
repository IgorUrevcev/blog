<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        // $tag = new Tag();
        // $tag->title = 'Курица';
        // $tag->save();
        return view ('admin.index');
    }
}
