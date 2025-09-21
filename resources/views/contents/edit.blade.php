<x-app-layout>
    <x-slot name="header">
        <x-header title="コンテンツ編集" />
    </x-slot>

    <div class="p-form-page">
        <div class="c-card">
            {{-- コンテンツ編集フォーム --}}
            <form method="POST" action="{{ route('contents.update', $content->id) }}" class="c-form">
                @csrf
                @method("PUT")
                <div class="c-form-group">
                    {{-- タイトル --}}
                    <label for="title" class="c-form-label">タイトル</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old("title", $content->title) }}"
                        class="c-form-input"
                    />
                </div>

                <div class="c-form-group">
                    {{-- 説明 --}}
                    <label for="title" class="c-form-label">説明</label>
                    <textarea name="description" class="c-form-input">{{ old("description", $content->description) }}</textarea>
                </div>

                <div class="c-card__actions">
                    {{-- 更新ボタン --}}
                    <button type="submit" class="c-button is-submit">更新する</button>
                    {{-- コンテンツ一覧へ --}}
                    <a href="{{ route('contents.index') }}" class="c-button is-gray">
                        コンテンツ一覧へ
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
