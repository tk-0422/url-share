<x-app-layout>
    <x-slot name="header">
        <x-header title="URL一覧" />
    </x-slot>

    <!-- コンテンツ詳細表示 -->
    <div class="p-url-meta">
        <h2 class="p-url-index__title">コンテンツ名: {{ $content->title }}</h2>
        <p class="c-card__body">
            <span class="c-label">説明:</span>
            {{ $content->description }}
        </p>
    </div>

    <!-- URL無しの場合 -->
    @if ($urls->isEmpty())
        <div class="c-card">
            <p>投稿したURLはありません。</p>
            <div class="c-button-group is-right">
                {{-- URLを投稿するボタン --}}
                <a href="{{ route('contents.url.create', $content) }}" class="c-button is-gray">
                    URLを投稿する
                </a>
                {{-- コンテンツ一覧へボタン --}}
                <a href="{{ route('contents.index') }}" class="c-button is-gray">
                    コンテンツ一覧へ
                </a>
                {{-- 友達招待ボタン --}}
                <a href="{{ route('invite.form', ['content' => $content->id]) }}" class="c-button is-gray">
                    友達招待
                </a>
            </div>
        </div>
    @else

        <!-- URL一覧 -->
        <div class="p-url-index p-list-grid">
            @foreach ($urls as $url)
                <div class="c-card">
                    <h4 class="c-card__title">{{ $url->title }}</h4>
                    <p class="c-card__body"><a href="{{ $url->url }}">{{ $url->url }}</a></p>

                    <div class="c-card__actions">
                        <!--コンテンツ編集ボタン　-->
                        <a class="c-button" href="{{ route('contents.url.edit', ['content' => $content->id, 'url' => $url->id]) }}">
                            編集
                        </a>
                        <!--コンテンツ削除フォーム　-->
                        <form method="POST" action="{{ route('contents.url.destroy', ['content' => $content->id, 'url' => $url->id]) }}">
                            @csrf
                            @method("DELETE")
                            {{-- 削除ボタン --}}
                            <button class="c-button is-red" type="submit" onclick="return confirm('本当に削除しますか？')">
                                削除
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!--URL投稿ボタン　-->
        <div class="c-card__action">
            <div class="c-button-group is-left">
                <a href="{{ route('contents.url.create', ['content' => $content->id]) }}" class="c-button is-gray">
                    URL投稿
                </a>

                <!--コンテンツ一覧ボタン　-->
                <a href="{{ route("contents.index") }}" class="c-button is-gray">
                    コンテンツ一覧
                </a>

                <!--友達招待ボタン　-->
                <a href="{{ route('invite.form', ['content' => $content->id]) }}" class="c-button is-gray">
                    友達招待
                </a>
            </div>
        </div>
    @endif
</x-app-layout>
