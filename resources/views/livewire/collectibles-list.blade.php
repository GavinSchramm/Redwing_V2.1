<div style="max-width: 1200px; margin: 0 auto; padding: 30px 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="margin: 0;">My Collectibles</h1>
        <a href="/collectibles/create" style="display: inline-block; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Add Collectible
        </a>
    </div>

    @if($collectibles->isEmpty())
        <div style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 8px; color: #6c757d;">
            <p style="font-size: 18px; margin-bottom: 10px;">No collectibles yet</p>
            <p>Start building your collection by adding your first item!</p>
        </div>
    @else
        <div style="display: grid; gap: 15px;">
            @foreach($collectibles as $collectible)
                <div style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background: white; display: flex; align-items: center; gap: 20px; transition: box-shadow 0.2s;">
                    {{-- Thumbnail/Image --}}
                    <div style="flex-shrink: 0; width: 80px; height: 80px; background: #f0f0f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        @if($collectible->images->where('is_primary', true)->first())
                            <img src="{{ $collectible->images->where('is_primary', true)->first()->path }}" 
                                 alt="{{ $collectible->name }}" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span style="font-size: 36px; color: #ccc;">📦</span>
                        @endif
                    </div>

                    {{-- Collectible Info (Clickable) --}}
                    <a href="{{ route('collectibles.edit', $collectible) }}" 
                       style="flex: 1; text-decoration: none; color: inherit; min-width: 0;">
                        <h3 style="margin: 0 0 8px 0; color: #333; font-size: 18px;">{{ $collectible->name }}</h3>
                        <div style="display: flex; gap: 15px; flex-wrap: wrap; font-size: 14px; color: #666;">
                            @if($collectible->category)
                                <span>
                                    <strong>Category:</strong> 
                                    @if($collectible->category->color)
                                        <span style="display: inline-block; padding: 2px 8px; background: {{ $collectible->category->color }}; color: white; border-radius: 3px; font-size: 12px;">
                                            {{ $collectible->category->name }}
                                        </span>
                                    @else
                                        {{ $collectible->category->name }}
                                    @endif
                                </span>
                            @endif
                            
                            @if($collectible->location)
                                <span><strong>Location:</strong> {{ $collectible->location->town_name }}, {{ $collectible->location->state }}</span>
                            @endif
                            
                            @if($collectible->condition)
                                <span><strong>Condition:</strong> 
                                    <span style="text-transform: capitalize;">{{ $collectible->condition }}</span>
                                </span>
                            @endif
                        </div>
                        
                        @if($collectible->description)
                            <p style="margin: 8px 0 0 0; color: #888; font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ Str::limit($collectible->description, 100) }}
                            </p>
                        @endif
                    </a>

                    {{-- Delete Button --}}
                    <form action="{{ route('collectibles.destroy', $collectible->id) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this collectible?');"
                        style="flex-shrink: 0;">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            style="padding: 8px 16px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;"
                            onmouseover="this.style.background='#c82333'"
                            onmouseout="this.style.background='#dc3545'">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
