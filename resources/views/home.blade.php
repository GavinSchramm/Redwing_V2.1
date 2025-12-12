<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Home</title>
</head>
<body>
    <div style="max-width: 800px; margin: 50px auto; padding: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #ddd;">
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="padding: 8px 16px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>

        <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; text-align: center;">
            <h2>Dashboard</h2>
            <p style="color: #6c757d;">Your homepage content will go here.</p>
        </div>
    </div>
</body>
</html>
