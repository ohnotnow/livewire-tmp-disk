<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileForm extends Component
{
    use WithFileUploads;

    public $file;

    public function render()
    {
        return view('livewire.file-form');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|file',
        ]);

        User::first()->addMediaFromDisk($this->file->path(), 's3')->toMediaCollection();
    }
}
