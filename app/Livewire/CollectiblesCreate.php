<?php

namespace App\Livewire;

use App\Models\Collectible;
use Livewire\Component;

class CollectiblesCreate extends Component
{
    // Location Fields
    public string $town_name = '';
    public string $state = '';
    public string $latitude = '';
    public string $longitude = '';
    public string $location_description = '';

    // Collectible Fields
    public string $name = '';
    public string $description = '';
    public string $acquisition_date = '';
    public int $condition = 0;
    public string $notes = '';

    // Category Fields
    public string $category_description = '';
    public string $color = '';


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
// This is the create page, still a work in progress

// Below are notes for myself:
// Template (blade.php(html stuff)), component (render function(semi done(I just copied the list))), route (done created)
// create collectable.blade.php template(html stuff) omptimal to have template for both add and edit with conditionals of if it is add or edit.
// php syntax; a good way to learn is to use gemini or chatgpt to put psudo code and understand the syntax it gives you