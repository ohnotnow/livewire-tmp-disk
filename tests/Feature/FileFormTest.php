<?php

namespace Tests\Feature;

use App\Http\Livewire\FileForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class FileFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function we_can_upload_a_file()
    {
        Storage::fake('s3');
        $user = User::factory()->create();

        $fakeFile = UploadedFile::fake()->image('avatar.jpg');

        Livewire::test(FileForm::class)
            ->set('file', $fakeFile)
            ->call('save');

        $this->assertTrue(true);
    }
}
