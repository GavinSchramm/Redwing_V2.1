<?php

namespace App\Livewire;

use App\Models\Collectible;
use Livewire\Component;

class CollectibleDelete extends Component
{
    public function destroy(Collectible $collectible)
    {
    $collectible->delete();

    return redirect()
        ->route('home')
        ->with('success', 'Collectible deleted successfully.');
    }
}

