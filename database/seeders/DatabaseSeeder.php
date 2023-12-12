<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'John Osmond',
            'email' => 'test@test.com',
            'password' => static::$password ??= Hash::make('password'),
        ]);

        $this->call([
            CustomerSeeder::class,
            ContactSeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
