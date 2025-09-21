<header class="l-header">
    <h1 class="l-header__title">
        {{ $title ?? "タイトル未定" }}
    </h1>

    @unless ($hideActions)
        <div class="l-header__actions">
            @if (isset($customButton))
                <a href="{{ $customButton["url"] }}" class="c-button is-blue">
                    {{ $customButton["label"] }}
                </a>
            @else
                <a href="{{ route("contents.create") }}" class="c-button">コンテンツ作成</a>
            @endif

            @auth
                <form method="POST" action="{{ route("logout") }}">
                    @csrf
                    <button type="submit" class="c-button is-red">ログアウト</button>
                </form>
            @endauth
        </div>
    @endunless
</header>
