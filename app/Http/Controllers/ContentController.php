<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;
use App\Models\User;

class ContentController extends Controller
{
   //一覧表示
    public function index()
    {
        // ログイン中ユーザ取得
        $user = Auth::user();

        // 自分が作ったコンテンツを取得
        $myContents = Content::where('contents.user_id',$user->id)->get();
        // 他の人が作成したコンテンツに招待されたコンテンツを取得
        $inviteContents = $user->contents()->where('contents.user_id','!=',$user->id)->get();

        return view('contents.index',compact('myContents','inviteContents'));

    }

    ///作成フォーム
    public function create()
    {
        return view('contents.create');
    }

    //登録処理
    public function store(Request $request)
    {
        // 必須事項
        $request->validate([
            'title' => 'required|max:500',
            'description' => 'nullable|max:500',
        ]);

        // 新規作成
        $content = new Content();
        $content->title = $request ->title;
        $content->description =$request ->description;
        $content->user_id = Auth::id();
        $content->save();

        return redirect()->route('contents.index')->with('message','コンテンツ作成しました！');


    }

    //編集フォーム
    public function edit(content $content)
    {
        // 認可(コンテンツ作成者以外は編集不可)
        if ($content->user_id !== Auth::id()) {
            abort(403);
        }
        return view('contents.edit',compact('content'));
    }

    //更新処理
    public function update(Request $request, Content $content)
    {
        // 認可(コンテンツ作成者以外は更新不可)
        if ($content->user_id !== Auth::id()) {
            abort(403);
        }
        // 必須事項
        $validated = $request ->validate([
            'title' => 'required|max:500',
            'description' => 'nullable|max:500',
        ]);

        $content->update($validated);

        return redirect()
        ->route('contents.index')
        ->with('message','更新しました！');

    }

    //削除処理
    public function destroy(content $content)
    {
        // 認可(コンテンツ作成者以外は編集不可)
        if ($content->user_id !== Auth::id()) {
            abort(403);
        }
        $content -> delete();
        return redirect()->route('contents.index')->with('message','削除しました。');
    }


    // 招待ページ
    public function invite(Request $request, Content $content)
    {
        if(Auth::id() !==$content->user_id){
            abort(403);
        }

        $email = $request -> email;

        $user = User::where('email', $email)->first();

        // 招待処理
        if(!$user){
            return redirect()->back()->with('error','ユーザーが見つかりませんでした。');
        //ユーザが既に参加している場合
        }elseif($content->users->contains($user->id)){
            return redirect()->back()->with('error','このユーザー既に参加しています');
        //ユーザが見つかり不参加の場合(contentのユーザーに上記で代入したアドレスのユーザーを追加する)
        }else{
            $content->users()->attach($user->id);
            return redirect()->back()->with('message','招待しました！');
        }
    }

    // 招待フォーム
    public function inviteForm(Content $content)
    {
        if(Auth::id() !==$content->user_id){
            abort(403);
        }
        return view('contents.invite',compact('content'));
    }

    //　参加者解除
    public function detachUser(Content $content, User $user)
    {
        $content->users()->detach($user->id);

        return redirect()->back()->with('message','解除しました！');
    }

}
