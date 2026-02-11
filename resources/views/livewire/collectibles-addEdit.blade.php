<div>
    <h1 class="text-xl font-bold mb-4">
        {{ $isEditing ? 'Edit Collectible' : 'Add Collectible' }}
    </h1>

    <form wire:submit.prevent="save">
        <!-- Name -->
        <div>
            <label>Name</label>
            <input type="text" wire:model.defer="name">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label>Description</label>
            <textarea wire:model.defer="description"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Acquisition Date -->
        <div>
            <label>Acquisition Date</label>
            <input type="date" wire:model.defer="acquisition_date">
            @error('acquisition_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Condition -->
        <div>
            <label>Condition</label>
                <select wire:model.defer="condition">
                    <option value="">-- Select Condition --</option>
                    <option value="mint">Mint</option>
                    <option value="excellent">Excellent</option>
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
            @error('condition') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Notes -->
        <div>
            <label>Notes</label>
            <textarea wire:model.defer="notes"></textarea>
            @error('notes') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                onclick="return confirm('{{ $isEditing ? 'Update' : 'Create' }} this collectible?');">
            {{ $isEditing ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
