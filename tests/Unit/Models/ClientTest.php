<?php

namespace Tests\Unit\Models;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_the_correct_fillable_properties()
    {
        $fillable = ['name', 'last_name', 'email', 'avatar'];
        $client = new Client();

        $this->assertEquals($fillable, $client->getFillable());
    }

    public function test_it_returns_the_full_name()
    {
        $client = Client::factory()->create([
            'name' => 'John',
            'last_name' => 'Doe'
        ]);

        $this->assertEquals('John Doe', $client->getFullName());
    }

    public function test_it_returns_the_correct_avatar_url()
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $path = $file->store('avatars', 'public');
    
        $client = Client::factory()->create(['avatar' => $path]);
    
        $this->assertEquals(Storage::disk('public')->url($path), $client->getAvatarUrl());
    }
    
}
