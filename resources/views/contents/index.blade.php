<x-app-layout>
    <x-slot name="header">
        <x-header title="コンテンツ一覧" />
    </x-slot>

    {{-- 作成したコンテンツ --}}
    <section>
        <h3 class="p-contents-index__title">作成したコンテンツ</h3>

        {{--　コンテンツがない場合 --}}
        @if ($myContents->isEmpty())
            <div class="c-card">
                <p>作成したコンテンツはありません。</p>

                <div class="c-button-group is-right">
                    <a href="{{ route('contents.create') }}" class="c-button is-red">
                        コンテンツを作成する！
                    </a>
                </div>
            </div>
        @else
            {{-- コンテンツ表示 --}}
            <div class="p-contents-index p-list-grid">
                @foreach ($myContents as $content)
                    <div class="c-card">
                        <h3 class="p-contents-index__title">{{ $content->title }}</h3>

                        @if (! empty($content->description))
                            <p class="c-card__body">{{ $content->description }}</p>
                        @endif

                        <div class="c-button-group">
                            {{-- 編集 --}}
                            <a href="{{ route('contents.edit', $content->id) }}" class="c-button">
                                編集
                            </a>

                            {{-- 削除ボタン --}}
                            <form method="POST" action="{{ route('contents.destroy', $content->id) }}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" onclick="return confirm('本当に削除しますか？')" class="c-button is-red">
                                    削除
                                </button>
                            </form>

                            {{-- URL一覧へボタン --}}
                            <a
                                href="{{ route('contents.url.index', ['content' => $content->id]) }}" class="c-button is-green">
                                URL一覧へ
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- 招待されたページ一覧 --}}
    <section>
        <h3 class="p-contents-index__title">招待されたページ一覧</h3>

        {{-- 招待されたコンテンツがない場合 --}}
        @if ($inviteContents->isEmpty())
            <p>招待されたコンテンツはありません</p>
        @else
            {{-- 招待コンテンツ表示 --}}
            <div class="p-contents-index p-list-grid">
                @foreach ($inviteContents as $content)
                    <div class="c-card">
                        <h3 class="p-contents-index__title">{{ $content->title }}</h3>

                        @if (! empty($content->description))
                            <p class="c-card__body">{{ $content->description }}</p>
                        @endif

                        {{-- URL一覧へ --}}
                        <div class="c-button-group">
                            <a href="{{ route('contents.url.index', ['content' => $content->id]) }}" class="c-button is-green">
                                URL一覧へ
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</x-app-layout>
