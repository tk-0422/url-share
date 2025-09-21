<x-app-layout>
    <x-slot name="header">
        {{-- 右上ログインボタン --}}
        <x-header title="アカウント作成" :customButton="['url' =>route('login'),'label'=>'ログイン画面']"/>
    </x-slot>

    <div class="p-form-page">
        <div class="c-card">
            <h2>新規作成</h2>

            {{-- 登録フォーム(名前/メール/パスワード) --}}
            <form method="POST" action="{{ route("register") }}" class="c-form">
                @csrf

                <!-- 名前入力欄 -->
                <div class="c-form-group">
                    <x-input-label
                        for="name"
                        :value="__('Name')"
                    />
                    <x-text-input
                        id="name"
                        class="c-form-input"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- メールアドレス入力欄 -->
                <div class="c-form-group">
                    <x-input-label
                        for="email"
                        :value="__('Email')"
                    />
                    <x-text-input
                        id="email"
                        class="c-form-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- パスワード入力欄 -->
                <div class="c-form-group">
                    <x-input-label
                        for="password"
                        :value="__('Password')"
                    />

                    <x-text-input
                        id="password"
                        class="c-form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- 確認用パスワード：入力ミス防止用に2回目 -->
                <div class="c-form-group">
                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm Password')"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="c-form-input"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                    />
                </div>

                {{-- アカウント作成ボタン --}}
                <div class="c-card__actions">
                    <x-primary-button class="c-button is-green">
                        アカウント作成
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
