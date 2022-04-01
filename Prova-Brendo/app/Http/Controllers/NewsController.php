<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\ExceptionMessage;

class NewsController extends Controller
{
    /**
     * redirect to login page
     */
    public function index()
    {
        return view('news.news-list', [
            'news' => News::all(),
            'edit_page' => false
        ]);
    }

    public function editNews()
    {
    }
    public function manageNews()
    {
        return view('news.news-list', News::all());
    }
    public function createNews()
    {
    }
    public function deleteNews()
    {
    }
    public function authorizeNews()
    {
    }
}
