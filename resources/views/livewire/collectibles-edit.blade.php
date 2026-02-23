<div>
    <h1 class="text-xl font-bold mb-4">
        Edit Collectible
    </h1>

    <form wire:submit.prevent="updateCollectible">

        <!-- BASIC INFO -->
        <div>
            <label>Name</label>
            <input type="text" wire:model.defer="name">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Description</label>
            <textarea wire:model.defer="description"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Color</label>
            <input type="text" wire:model.defer="color">
            @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Acquisition Date</label>
            <input type="date" wire:model.defer="acquisition_date">
            @error('acquisition_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

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

        <div>
            <label>Notes</label>
            <textarea wire:model.defer="notes"></textarea>
            @error('notes') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- LOCATION INFO -->
         <div>
            <select wire:model="location_id">
            <option value="">-- Select Location --</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">
                    {{ $location->town_name }}
                </option>
            @endforeach
        </select>
        </div>

        <!-- CATIGORY INFO -->
        <div>
            <select wire:model.defer="category_id">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- IMAGE / FILE DATA -->
        <div>
            <label>Primary Image</label>
            <input type="file" wire:model="imageFile">
            @error('imageFile') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Caption</label>
            <input type="text" wire:model.defer="caption">
            @error('caption') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Is Primary</label>
            <input type="checkbox" wire:model.defer="is_primary">
            @error('is_primary') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Sort Order</label>
            <input type="number" wire:model.defer="sort_order">
            @error('sort_order') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <!-- LOCATION META -->
        <div>
            <label>Town Name</label>
            <input type="text" wire:model.defer="town_name">
            @error('town_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>State</label>
            <input type="text" wire:model.defer="state">
            @error('state') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Latitude</label>
            <input type="text" wire:model.defer="latitude">
            @error('latitude') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Longitude</label>
            <input type="text" wire:model.defer="longitude">
            @error('longitude') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <!-- Submit -->
        <button type="submit"
                onclick="return confirm('{{ $isEditing ? 'Update' : 'Create' }} this collectible?');">
            {{ $isEditing ? 'Update' : 'Create' }}
        </button>

    </form>
</div>