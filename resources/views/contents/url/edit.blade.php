<x-app-layout>
    <x-slot name="header">
        <x-header title="URl編集" />
    </x-slot>

    <div class="p-form-page">
        <div class="c-card">
            {{-- URL編集フォーム(タイトル/URL) --}}
            <form method="POST" action="{{ route('contents.url.update', ['content' => $content->id, 'url' => $url->id]) }}">
                @csrf
                @method("PUT")
                {{-- タイトル --}}
                <div class="c-form-group">
                    <label class="c-form-label">タイトル</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old("title", $url->title) }}"
                        class="c-form-input"
                    />
                </div>

                {{-- URL --}}
                <div class="c-form-group">
                    <label class="c-form-label">URL</label>
                    <input
                        type="url"
                        name="url"
                        value="{{ old("url", $url->url) }}"
                        class="c-form-input"
                    />
                </div>

                <div class="c-card__actions">
                    {{-- 更新ボタン --}}
                    <button type="submit" class="c-button is-submit">更新する</button>
                    {{-- URL一覧へボタン --}}
                    <a href="{{ route('contents.url.index', ['content' => $content->id]) }}" class="c-button is-gray">
                        URL一覧へ
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
