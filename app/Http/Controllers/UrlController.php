<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    //一覧表示
    public function index(Content $content)
    {
        $userId = Auth::id();

        // オーナーでもメンバーでもなければ 403
        if ($content->user_id !== $userId
        && ! $content->users()->whereKey($userId)->exists()) {
        abort(403);
    }

        $urls = $content -> urls;

       return view('contents.url.index', compact('urls','content'));
    }
    
    //作成フォーム
    public function create(Content $content)
    {
        $userId = Auth::id();

        // オーナーでもメンバーでもなければ 403
        if ($content->user_id !== $userId
        && ! $content->users()->whereKey($userId)->exists()) {
        abort(403);
    }

        return view('contents.url.create',compact('content'));
    }

    //登録処理
    public function store(Request $request, Content $content)
    {
        $userId = Auth::id();

        // オーナーでもメンバーでもなければ 403
        if ($content->user_id !== $userId
        && ! $content->users()->whereKey($userId)->exists()) {
        abort(403);
    }

        // 必須事項
        $request->validate([
            'title' => 'required|max:255', //タイトル必須255文字
            'url' => ['required','url','max2048'], //URL必須URLのみ
        ]);

        // 新規作成
        $url = new Url();
        $url->title = $request -> title;
        $url->url =$request ->url;
        $url->user_id =Auth::id();
        $url->content_id = $content->id;
        $url->save(); //DBに保存

        return redirect()->route('contents.url.index',$content->id)->with('message','URLを投稿しました!');
    }

    //編集フォーム
    public function edit(Content $content, Url $url)
    {
        // 認可(投稿者以外は編集不可/親子不一致404はルートに定義)
        if($url->user_id !==auth()->id()) abort(403);

        return view('contents.url.edit',compact('content','url'));
    }

    //更新処理
    public function update(Request $request, Content $content, Url $url)
    {
        // 認可(投稿者以外は更新不可/親子不一致404はルートに定義)
        if($url->user_id !==auth()->id()) abort(403);

        $validated = $request->validate([
            'title' => ['required','string','max:255'],
            'url'   => ['required','url','max:2048'],
        ]);

        $url->update($validated);

        return redirect()
        ->route('contents.url.index', ['content' => $content->id])
        ->with('message', '更新しました!');

    }

    //削除処理
    public function destroy(Content $content, Url $url)
    {
         // 認可(投稿者以外は削除不可/親子不一致404はルートに定義)
        if($url->user_id !==auth()->id()) abort(403);

        $url->delete();
        return redirect()->route('contents.url.index',['content'=>$url->content_id])->with('message','URLを削除しました');
    }
}