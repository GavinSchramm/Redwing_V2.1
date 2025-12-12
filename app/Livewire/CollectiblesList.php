<?php

namespace App\Livewire;

use App\Models\Collectible;
use Livewire\Component;

class CollectiblesList extends Component
{
    public function render()
    {
        $collectibles = Collectible::with(['category', 'location', 'images'])
            ->latest()
            ->get();

        return view('livewire.collectibles-list', [
            'collectibles' => $collectibles,
        ])->layout('layouts.app');
    }
}
