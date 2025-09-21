<x-app-layout>
    <x-slot name="header">
        <x-header title="URL共有アプリ" :hideActions="true" />
    </x-slot>

    {{-- 概要 --}}
    <section class="p-landing">
        <div class="c-card p-landing__hero">
            <h1 class="p-landing__title">URLを集めて、チームで共有。</h1>
            <p class="p-landing__lead">
                コンテンツ単位でURLを整理し、友だちを招待して共同管理できます。
            </p>
            {{-- ログインボタン、新規作成ボタン --}}
            <div class="c-button-group">
                <a href="{{ route("register") }}" class="c-button is-green">新規作成</a>
                <a href="{{ route("login") }}" class="c-button is-gray">ログイン</a>
            </div>
        </div>

        {{-- 主な機能説明欄 --}}
        <div class="p-landing__features">
            <div class="c-card">
                <h2>主な機能</h2>
                <ul class="p-landing__list">
                    <li>URLの投稿・編集・削除（カード表示）</li>
                    <li>コンテンツに友達を招待（多対多で権限管理）</li>
                    <li>Laravel Breeze 認証、FLOCSS設計</li>
                </ul>
            </div>
        </div>
    </section>
</x-app-layout>
