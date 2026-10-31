@extends('layouts.app')
@section('title', 'Sign in | Nivritti')
@section('content')
<section class="grid min-h-[680px] bg-ivory pt-24 lg:min-h-[780px] lg:grid-cols-2">
    <div class="relative hidden overflow-hidden bg-ink lg:block"><img src="{{ asset('images/hero/hero-bg2.jpg') }}" alt="Textile maker working with colour and fabric" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-ink/45"></div>
        <div class="reveal absolute bottom-14 left-12 right-12 text-ivory">
            <p class="text-xs uppercase tracking-[.25em] text-ivory/70">A Nivritti account</p>
            <h1 class="serif mt-4 max-w-lg text-5xl leading-tight">A little closer to the things you love.</h1>
            <p class="mt-5 max-w-md text-sm leading-7 text-ivory/75">Keep your collection, enquiries and updates together.</p>
        </div>
    </div>
    <div class="flex items-center justify-center px-5 py-12 sm:px-10">
        <div class="reveal w-full max-w-md rounded-2xl border border-ink/10 bg-sand p-6 sm:p-9"><a href="/" class="text-sm font-semibold tracking-[.28em] text-ink">NIVRITTI</a>
            <p class="mt-12 text-xs uppercase tracking-[.25em] text-brass-deep">Welcome back</p>
            <h2 class="serif mt-3 text-4xl text-ink">Sign in to your account.</h2>
            <p class="mt-4 text-sm text-muted">Enter your details to continue.</p>
            <form class="mt-8" onsubmit="event.preventDefault();this.querySelector('[role=status]').classList.remove('hidden');">
                <div><label for="login-email" class="text-xs text-ink">Email address</label><input id="login-email" name="email" type="email" autocomplete="email" required class="mt-2 w-full border-b border-ink/20 bg-transparent py-3 text-sm text-ink outline-none focus:border-brass"></div>
                <div class="mt-6"><label for="login-password" class="text-xs text-ink">Password</label><input id="login-password" name="password" type="password" autocomplete="current-password" required class="mt-2 w-full border-b border-ink/20 bg-transparent py-3 text-sm text-ink outline-none focus:border-brass"></div>
                <div class="mt-5 flex items-center justify-between gap-4 text-xs"><label class="flex items-center gap-2 text-ink"><input type="checkbox" name="remember" class="accent-brass"> Remember me</label><a href="#forgot-password" class="text-muted underline underline-offset-4">Forgot password?</a></div><button type="submit" class="mt-8 w-full rounded-full bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16] px-6 py-4 text-sm font-semibold text-ink transition hover:bg-gradient-to-r from-[#D99A16] via-[#E8B52F] to-[#D49A16]-deep">Sign in</button>
                <p role="status" class="mt-4 hidden text-sm text-muted">This sign in screen is a frontend preview.</p>
            </form>
            <p class="mt-8 text-center text-sm text-muted">New to Nivritti? <a class="text-brass-deep underline underline-offset-4" href="#register">Create an account</a></p>
        </div>
    </div>
</section>
@endsection