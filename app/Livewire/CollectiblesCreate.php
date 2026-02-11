<?php

namespace App\Livewire;

use App\Models\Collectible;
use Livewire\Component;

class CollectiblesCreate extends Component
{
    // State
    public ?Collectible $collectible = null;
    public bool $isEditing = false;

    // Fields
    public string $name = '';
    public ?string $description = null;
    public ?string $acquisition_date = null;
    public ?string $condition = null;   // bind to select
    public ?string $notes = null;

    // Mount: receive optional collectible for editing
    public function mount(?Collectible $collectible = null)
    {
        if ($collectible) {
            $this->isEditing = true;
            $this->collectible = $collectible;

            $this->name = $collectible->name;
            $this->description = $collectible->description;
            $this->acquisition_date = $collectible->acquisition_date;
            $this->condition = (string) $collectible->condition; // cast to string for select
            $this->notes = $collectible->notes;
        }
    }

    // Validation rules
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'acquisition_date' => 'nullable|date',
            'condition' => 'nullable|in:mint,excellent,good,fair,poor', // enum values
            'notes' => 'nullable|string',
        ];
    }

    // Save or update
    public function save()
    {
        $validated = $this->validate();

        // ensure empty string becomes null (DB nullable enum)
        if (array_key_exists('condition', $validated) && $validated['condition'] === '') {
            $validated['condition'] = null;
        }

        if ($this->isEditing && $this->collectible) {
            $this->collectible->update($validated);
            session()->flash('success', 'Collectible updated successfully!');
        } else {
            Collectible::create($validated);
            session()->flash('success', 'Collectible created successfully!');
        }

        return redirect()->route('home');
    }

    // Render
    public function render()
    {
        return view('livewire.collectibles-addEdit')->layout('layouts.app');
    }
}

// namespace App\Livewire;

// use App\Models\Collectible;
// use Livewire\Component;

// class CollectiblesCreate extends Component
// {
//     // State to determine if we are creating or editing a collectible
//     public ?Collectible $collectible = null;
//     public bool $isEditing = false;

//     // Location Fields
//     public string $town_name = '';
//     public string $state = '';
//     public string $latitude = '';
//     public string $longitude = '';
//     public string $location_description = '';

//     // Collectible Fields
//     public string $name = '';
//     public ?string $description = null;
//     public ?string $acquisition_date = null;
//     public ?string $condition = null;   
//     public ?string $notes = null;

//     // Category Fields
//     public string $category_description = '';
//     public string $color = '';

//     //New Method
//     public function mount(?Collectible $collectible = null)
//     {
//         if ($collectible) {
//             $this->isEditing = true;
//             $this->collectible = $collectible;

//             $this->name = $collectible->name;
//             $this->description = $collectible->description;
//             $this->acquisition_date = $collectible->acquisition_date;
//             $this->condition = (string) $collectible->condition;
//             $this->notes = $collectible->notes;
//         }
//     }
    
//     protected function rules()
//     {
//         return [
//             'name' => 'required|string|max:255',
//             'description' => 'string',
//             'acquisition_date' => 'nullable|date',
//             'condition' => 'nullable|string',
//             'notes' => 'nullable|string',
//         ];
//     }

//     public function save()
//     {
//         $validated = $this->validate();

//         // Cast condition to integer if needed
//         $validated['condition'] = $validated['condition'] !== null
//             ? (int) $validated['condition']
//             : null;

//         if ($this->isEditing && $this->collectible) {
//             $this->collectible->update($validated);
//             session()->flash('success', 'Collectible updated successfully!');
//         } else {
//             Collectible::create($validated);
//             session()->flash('success', 'Collectible created successfully!');
//         }
//         return redirect()->route('home');
//     }

//     public function render()
//     {
//         if ($this->isEditing) {
//             return view('livewire.edit-form')
//                 ->layout('layouts.app');
//         } else {
//             return view('livewire.add-form')
//             ->layout('layouts.app');
//         }
//     }
// }

// This is the create/edit page, still a work in progress

// Below are notes for myself:
// Template (blade.php(html stuff)), component (render function(semi done(I just copied the list))), route (done created)
// create collectable.blade.php template(html stuff) omptimal to have template for both add and edit with conditionals of if it is add or edit.
// php syntax; a good way to learn is to use gemini or chatgpt to put psudo code and understand the syntax it gives you