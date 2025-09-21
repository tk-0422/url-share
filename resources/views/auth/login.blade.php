<x-app-layout>
    <x-slot name="header">
        <x-header title="ログイン画面" :hideActions="true" />
    </x-slot>

    <div class="p-form-page">
        <div class="c-card">
            <h2>ログイン</h2>

            {{-- セッションメッセージ --}}
            @if (session("status"))
                <div class="c-alert">
                    {{ session("status") }}
                </div>
            @endif

            {{-- ログインフォーム --}}
            <form method="POST" action="{{ route("login") }}" class="c-form">
                @csrf

                {{-- メールアドレス --}}
                <div class="c-form-group">
                    <label for="email" class="c-form-label">メールアドレス</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="c-form-input"
                        value="{{ old("email") }}"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                {{-- パスワード --}}
                <div class="c-form-group">
                    <label for="password" class="c-form-label">パスワード</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="c-form-input"
                        required
                        autocomplete="password"
                    />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                {{-- ログインボタン・新規登録ボタン --}}
                <div class="c-card__actions">
                    <a href="{{ route("register") }}" class="c-button">新規登録</a>
                    <button type="submit" class="c-button">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
