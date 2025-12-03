<div style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    <h1>Sign Up</h1>

    @if($errorMessage)
        <div style="padding: 10px; margin: 10px 0; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px; color: #721c24;">
            {{ $errorMessage }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div style="margin-bottom: 15px;">
            <label for="name">Name</label><br>
            <input wire:model.defer="name" id="name" type="text" style="width: 100%; padding: 8px; margin-top: 5px;" required>
            @error('name') <p style="color: red; font-size: 14px;">{{ $message }}</p> @enderror
        </div>

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
            <label for="password_confirmation">Confirm Password</label><br>
            <input wire:model.defer="password_confirmation" id="password_confirmation" type="password" style="width: 100%; padding: 8px; margin-top: 5px;" required>
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">
            Sign Up
        </button>
    </form>

    <p style="margin-top: 15px; text-align: center;">
        Already have an account? <a href="/login" style="color: #007bff;">Login here</a>
    </p>
</div>
