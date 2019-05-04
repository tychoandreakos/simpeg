<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i < 100; $i++){
            DB::table('pegawai')->insert([
                'nip_pegawai' => $faker->nik(),
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'tgl_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tmp_lahir' => $faker->city,
                'jk' => $faker->randomElement(['0','1']),
                'no_telp' => '087821476890',
                'status' => $faker->randomElement(['0','1']),
                'email' => $faker->email,
                'gol_darah' => $faker->randomElement(['0','1','2','3']),
                'agama' => $faker->randomElement(['0','1','2','3']),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
