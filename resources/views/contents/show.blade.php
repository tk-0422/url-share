{{-- <x-app-layout>
    {{ $content->title ?? "タイトルなし" }}
    {{ $content->id ?? "(idなし)" }}
    {{ $content->description ?? "(説明なし)" }}

    @if (Auth::id() === $content->user_id)
        <a href="{{ route('invite.form', ['content' => $content->id]) }}">ユーザーを招待する</a>
    @endif

    <a href="{{ route('contents.index') }}">コンテンツ一覧へ</a>

    <a href="{{ route('contents.url.index', ['content' => $content->id]) }}">URL一覧を見る</a>
</x-app-layout> --}}
