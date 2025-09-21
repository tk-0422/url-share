<x-app-layout>
    <x-slot name="header">
        <x-header title="コンテンツ作成" />
    </x-slot>

    <div class="p-form-page">
        <div class="c-card">
            {{-- 作成フォーム(タイトル/説明欄) --}}
            <form method="POST" action="{{ route('contents.store') }}" class="c-form">
                @csrf
                {{-- タイトル --}}
                <div class="c-form-group">
                    <label for="title" class="c-form-label">タイトル</label>
                    <input
                        type="text"
                        name="title"
                        placeholder="タイトル入力"
                        class="c-form-input"
                    />
                </div>
                {{-- 説明 --}}
                <div class="c-form-group">
                    <label for="description" class="c-form-label">説明</label>
                    <textarea
                        name="description"
                        placeholder="説明入力"
                        class="c-form-input"
                    ></textarea>
                </div>
                <div class="c-card__actions">
                    {{-- 作成ボタン --}}
                    <button type="submit" class="c-button">作成する</button>
                    {{-- コンテンツ一覧へボタン --}}
                    <a href="{{ route('contents.index') }}" class="c-button is-gray">
                        コンテンツ一覧へ
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
