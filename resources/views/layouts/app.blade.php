<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        <div class="l-wrapper">
             {{-- ヘッダー（x-header)--}}
            @isset($header)
                {{ $header }}
            @endisset

            {{-- メインの中身 --}}
            <main class="l-main">
                <div class="c-alerts">
                    @if (session("status"))
                        <div class="c-alert is-success">{{ session("status") }}</div>
                    @endif

                    @if (session("message"))
                        <div class="c-alert is-success">{{ session("message") }}</div>
                    @endif

                    @if (session("error"))
                        <div class="c-alert is-error">{{ session("error") }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="c-alert is-error">
                            <ul style="margin: 0; padding-left: 1rem">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                {{-- 各ページ固有の内容 --}}
                {{ $slot }}
            </main>

            {{-- フッター --}}
            <footer class="l-footer">&copy; {{ date("Y") }} MyApp. All rights reserved.</footer>
        </div>
    </body>
</html>
