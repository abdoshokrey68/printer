@extends('app')

@section('content')
    <div class="container">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Web OTP API Simplest</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                div {
                    font-family: sans-serif;
                }
            </style>
        </head>

        <body>
            <h1>
                The simplest Web OTP API demo
            </h1>
            <div>
                Send an SMS that includes
                <pre><code>@web-otp.glitch.me #12345</code></pre> at the last line to this phone.
            </div>
            <div style="border:1px solid; padding: 5px; 10px; margin: 10px 0;">
                <form action="/post" method="post">
                    Enter OTP here:
                    <input type="text" autocomplete="one-time-code" inputmode="numeric" name="one-time-code">
                    <input type="submit" value="Submit">
                </form>
            </div>
        </body>

        </html>

    </div>
@endsection

@section('script')
    @parent

    <script>
        if ('OTPCredential' in window) {
            console.log('running ... ')
            window.addEventListener('DOMContentLoaded', e => {
                const input = document.querySelector('input[autocomplete="one-time-code"]');
                if (!input) return;
                const ac = new AbortController();
                const form = input.closest('form');
                if (form) {
                    form.addEventListener('submit', e => {
                        ac.abort();
                    });
                }
                navigator.credentials.get({
                    otp: {
                        transport: ['sms']
                    },
                    signal: ac.signal
                }).then(otp => {
                    input.value = otp.code;
                    if (form) form.submit();
                }).catch(err => {
                    console.log(err);
                });
            });
        }
    </script>
@endsection
