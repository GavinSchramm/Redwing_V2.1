<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    @livewireStyles
</head>
<body style="margin: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">
    @auth
        <header style="background: #343a40; color: white; padding: 15px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
                <a href="/home" style="color: white; text-decoration: none; font-size: 20px; font-weight: bold;">
                    Collectibles Manager
                </a>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <span style="color: #adb5bd;">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background: #dc3545; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-size: 14px;">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>
    @endauth
    
    {{ $slot }}
    
    @livewireScripts
</body>
</html>
