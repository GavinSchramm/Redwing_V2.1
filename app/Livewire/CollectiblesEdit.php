<?php

namespace App\Livewire;

use App\Models\Collectible;
use App\Models\Category;
use App\Models\Image;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CollectiblesEdit extends Component
{
    // State
    public ?Collectible $collectible = null;
    public bool $isEditing = false;
    use WithFileUploads;

    // Collectible fields
    public string $name = '';
    public ?string $description = null;
    public ?string $acquisition_date = null;
    public ?string $condition = null;
    public ?string $notes = null;
    public ?string $color = null;
    public ?int $location_id = null;
    public ?int $category_id = null;

    // Image fields
    public ?string $path = null;
    public ?bool $is_primary = true;
    public ?int $sort_order = 1;
    public ?string $caption = null;
    public ?string $file_size = null;
    public ?int $width = null;
    public ?int $height = null;
    public ?TemporaryUploadedFile $imageFile = null;

    // Location metadata
    public ?string $town_name = null;
    public ?string $state = null;
    public ?string $latitude = null;
    public ?string $longitude = null;

    public function mount(?Collectible $collectible = null)
    {
        if (!$collectible) return;

        $this->isEditing = true;
        $this->collectible = $collectible;

        // Collectible
        $this->name = $collectible->name;
        $this->description = $collectible->description;
        $this->color = $collectible->color;
        $this->acquisition_date = $collectible->acquisition_date?->format('Y-m-d');
        $this->condition = $collectible->condition;
        $this->notes = $collectible->notes;
        $this->location_id = $collectible->location_id;
        $this->category_id = $collectible->category_id;

        // Primary image
        $image = $collectible->images()->where('is_primary', true)->first();
        if ($image) {
            $this->caption = $image->caption;
            $this->file_size = $image->file_size;
            $this->width = $image->width;
            $this->height = $image->height;
            $this->sort_order = $image->sort_order;
            $this->is_primary = $image->is_primary;
            $this->path = $image->path;
        }

        // Location metadata
        if ($collectible->location) {
            $this->town_name = $collectible->location->town_name;
            $this->state = $collectible->location->state;
            $this->latitude = $collectible->location->latitude;
            $this->longitude = $collectible->location->longitude;
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'acquisition_date' => 'nullable|date',
            'condition' => 'nullable|in:mint,excellent,good,fair,poor',
            'notes' => 'nullable|string',
            'color' => 'nullable|string|max:50',
            'location_id' => 'required|exists:locations,id',
            'category_id' => 'required|exists:categories,id',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_primary' => 'boolean',
            'imageFile' => $this->isEditing ? 'nullable|image|max:10240' : 'required|image|max:10240', // 10MB
        ];
    }

    // UPDATE
    public function updateCollectible()
    {
        $validated = $this->validate();

        // Update collectible fields
        $this->collectible->update($validated);

        $image = $this->collectible->images()->where('is_primary', true)->first();

        if ($this->imageFile) {
            // Store new uploaded file
            $path = $this->imageFile->store('collectibles', 'public');

            if ($image) {
                $image->update([
                    'path' => $path,
                    'caption' => $this->caption,
                    'file_size' => $this->file_size,
                    'width' => $this->width,
                    'height' => $this->height,
                    'sort_order' => $this->sort_order,
                    'is_primary' => $this->is_primary,
                ]);
            } else {
                $this->collectible->images()->create([
                    'path' => $path,
                    'caption' => $this->caption,
                    'file_size' => $this->file_size,
                    'width' => $this->width,
                    'height' => $this->height,
                    'sort_order' => $this->sort_order,
                    'is_primary' => $this->is_primary,
                ]);
            }
        } elseif ($image) {
            // No new upload: just update caption & metadata
            $image->update([
                'caption' => $this->caption,
                'file_size' => $this->file_size,
                'width' => $this->width,
                'height' => $this->height,
                'sort_order' => $this->sort_order,
                'is_primary' => $this->is_primary,
            ]);
        }

        session()->flash('success', 'Collectible updated successfully!');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.collectibles-edit', [
            'locations' => Location::all(),
            'categories' => Category::all(),
        ])->layout('layouts.app');
    }
}