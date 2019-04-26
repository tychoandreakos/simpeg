<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AnakSeeder::class);
        $this->call(AyahSeeder::class);
        $this->call(IbuSeeder::class);
        $this->call(RiwayatPekerjaanSeeder::class);
    }
}
