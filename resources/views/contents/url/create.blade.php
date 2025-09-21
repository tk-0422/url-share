<x-app-layout>
    <x-slot name="header">
        <x-header title="URL投稿" />
    </x-slot>

    <div class="p-form-page">
        <div class="c-card">
            {{-- URL作成フォーム(タイトル/URL) --}}
            <form method="POST" action="{{ route('contents.url.store', ['content' => $content->id]) }}" class="c-form">
                @csrf
                {{-- タイトル --}}
                <div class="c-form-group">
                    <label for="title" class="c-form-label">タイトル</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="タイトル入力"
                        class="c-form-input"
                    />
                </div>

                {{-- URL --}}
                <div class="c-form-group">
                    <label for="url" class="c-form-label">URL</label>
                    <input
                        type="url"
                        id="url"
                        name="url"
                        placeholder="URL入力"
                        class="c-form-input"
                    />
                </div>
                <div class="c-card__actions">
                    {{-- 投稿ボタン --}}
                    <button type="submit" class="c-button is-submit">投稿</button>
                    {{-- コンテンツ一覧に戻るボタン --}}
                    <a href="{{ route('contents.url.index', ['content' => $content->id]) }}"class="c-button is-gray">
                        戻る
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
