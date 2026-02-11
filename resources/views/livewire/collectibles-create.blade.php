<div style="max-width:700px;margin:0 auto;padding:30px 20px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h1 style="margin:0;">@if($collectibleId) Edit Collectible @else Add Collectible @endif</h1>
        <a href="{{ route('home') }}" style="text-decoration:none;color:#555;">Back</a>
    </div>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:10px;border-radius:6px;margin-bottom:12px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="background:#f8d7da;color:#721c24;padding:10px;border-radius:6px;margin-bottom:12px;">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <div style="margin-bottom:12px;">
            <label style="display:block;font-weight:600;margin-bottom:6px;">Name</label>
            <input type="text" wire:model.defer="name" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;" />
            @error('name') <div style="color:#c12f2f;margin-top:6px;font-size:13px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom:12px;">
            <label style="display:block;font-weight:600;margin-bottom:6px;">Description</label>
            <textarea wire:model.defer="description" rows="5" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;"></textarea>
            @error('description') <div style="color:#c12f2f;margin-top:6px;font-size:13px;">{{ $message }}</div> @enderror
        </div>

        <div style="display:flex;gap:8px;">
            <button type="submit" style="padding:10px 16px;background:#007bff;color:white;border:none;border-radius:4px;">@if($collectibleId) Update @else Create @endif</button>
            <a href="{{ route('home') }}" style="padding:10px 16px;background:#6c757d;color:white;border-radius:4px;text-decoration:none;">Cancel</a>
        </div>
    </form>
</div>
