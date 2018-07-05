<?php

namespace App\Http\Controllers\home;

use App\model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Article;
use Auth;

class ArticleController extends Controller
{
    //文章列表页
    public function index()
    {
        $data = Article::orderBy('created_at', 'desc')->withCount("comments")->paginate(5);
        return view('home.list', compact('data'));
    }

    //文章详情页
    public function detail(Article $article)
    {
        //预加载article模型里面的comments方法
        $article->load('comments');
        return view('home.detail', compact('article'));
    }

    //文章创建页
    public function create()
    {
        return view('home.create');
    }

    //文章创建操作
    public function doCreate(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|string|max:100|min:5',
                'content' => 'required|string|min:10',
            ]);

            $res = Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => Auth::id(),
            ]);

            if ($res) {
                return redirect('article/');
            } else {
                return back()->withInput();
            }

        }
    }

    //文章编辑页
    public function edit(Article $article)
    {
        return view('home.edit', compact('article'));
    }

    //文章编辑操作
    public function doEdit(Request $request)
    {
        if ($request->isMethod('post')) {
//            权限
            $this->authorize('update', Article::find($request->id));

            $this->validate($request, [
                'title' => 'required|string|max:100|min:5',
                'content' => 'required|string|min:10',
            ]);


            $article = Article::find($request->id);
            $article->title = $request->title;
            $article->content = $request->content;
            $res = $article->save();

            if ($res) {
                return redirect('article/');
            } else {
                return back()->withInput();
            }
        }
    }

    //文章删除操作
    public function delete(Request $request)
    {
        if ($request->isMethod('get')) {
//            权限
            $this->authorize('delete', Article::find($request->id));
            $res = Article::destroy($request->id);
            if ($res) {
                return redirect('article/');
            } else {
                return back()->withErrors('删除失败！');
            }
        }
    }

    public function comment(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'content' => 'required|min:5'
            ]);

          $res = Comment::create(['article_id' => $request->article_id, 'content' => $request->content, 'user_id' => Auth::id()]);

          if ($res) {
              return back();
          } else {
              return back()->withInput()->withErrors('评论失败！');
          }
        }
    }
}
