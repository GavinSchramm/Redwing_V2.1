<div style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h1>Login</h1>

    @if($errorMessage)
        <div style="padding: 10px; margin: 10px 0; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px; color: #721c24;">
            {{ $errorMessage }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div style="margin-bottom: 15px;">
            <label for="email">Email</label><br>
            <input wire:model.defer="email" id="email" type="email" style="width: 100%; padding: 8px; margin-top: 5px;" required>
            @error('email') <p style="color: red; font-size: 14px;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password</label><br>
            <input wire:model.defer="password" id="password" type="password" style="width: 100%; padding: 8px; margin-top: 5px;" required>
            @error('password') <p style="color: red; font-size: 14px;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" wire:model="remember">
                Remember me
            </label>
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
            Sign in
        </button>
    </form>

    <p style="margin-top: 15px; text-align: center;">
        Don't have an account? <a href="/signup" style="color: #007bff;">Sign up here</a>
    </p>
</div>
