<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * redirect to login page
     */
    public function index()
    {
        return view('news.news-list', [
            'all_news' => News::where('activated', true)->get(),
            'edit_page' => false,
            'admin' => false
        ]);
    }
    /**
     * wainting for implementation
     */
    public function editNews()
    {
        return redirect()->intended();
    }
    /**
     * verify de user group and sent de correct page for managing News
     */
    public function manageNews()
    {
        if (UserControler::checkAdmin(User::find(Auth::id()))) {
            return view('news.news-list', [
                'all_news' => News::all(),
                'edit_page' => true,
                'admin' => true
            ]);
        } else {
            return view('news.news-list', [
                'all_news' => News::all(),
                'edit_page' => true,
                'admin' => false
            ]);
        }
    }
    /**
     * redirect to Create News form Page
     */
    public function createNews()
    {
        return view('news.news-create', [
            'user_id' => Auth::id(),
        ]);
    }
    /**
     * hendle form page data for create a new news
     */
    public function createNewsConfirm(Request $req)
    {
        $file = $req->file('img')->store('images');

        $data = $req->all();
        $new = News::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'img_path' => $file,
            'activated' => false,
            'user_editor_id' => $data['user_id'],
        ]);
        return redirect('/manage-news');
    }
    /**
     * delete a News
     */
    public function deleteNews(Request $req)
    {
        $data = $req->all();
        News::destroy($data['news_id']);
        return redirect('/manage-news');
    }
    /**
     * authorize news to be listed in frontPage
     * first check if the user loged-in is an admin
     */
    public function authorizeNews(Request $req)
    {
        if (UserControler::checkAdmin(User::find(Auth::id()))) {
            $data = $req->all();

            $news = News::find($data['news_id']);
            $news->activated = true;
            $news->save();
            return redirect('/manage-news');
        } else {
            return redirect('/manage-news');
        }
    }
}
