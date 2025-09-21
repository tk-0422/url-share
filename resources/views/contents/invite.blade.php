<x-app-layout>
    <x-slot name="header">
        <x-header title="友達招待" />
    </x-slot>

    <div class="p-form-page">
        <h2 class="p-invite-u__title">招待するユーザー</h2>
        <div class="c-card">
            {{-- 招待フォーム(メールアドレス入力) --}}
            <form method="POST" action="{{ route('invite', ['content' => $content->id]) }}" class="c-form">
                @csrf
                メールアドレス
                <input
                    type="email"
                    name="email"
                    placeholder="メールアドレス入力"
                    class="c-form-input"
                />
                <button type="submit" class="c-button">送信</button>
            </form>
        </div>

        {{-- 招待メッセージ(成功/エラー) --}}
        @if (session("message"))
            <div>{{ session("message") }}</div>
        @elseif (session("error"))
            <div>{{ session("error") }}</div>
        @endif

        {{-- 招待済みユーザー表示 --}}
        <div class="p-invite-users">
            <h2 class="p-invite-users__title">招待済みユーザー</h2>
            <ul class="p-invite-users__list">
                @foreach ($content->users ?? [] as $user)
                    <li class="p-invite-users__item">
                        <span>{{ $user->name }}</span>
                        <form method="POST" action="{{ route('detach.user', ['content' => $content->id, 'user' => $user->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="c-button is-red" onclick="return confirm('本当に削除しますか？')">
                                退室
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- コンテンツ一覧へボタン --}}
        <div class="p-invite-back">
            <a href="{{ route('contents.index') }}" class="c-button is-gray">コンテンツ一覧へ</a>
        </div>
    </div>
</x-app-layout>
