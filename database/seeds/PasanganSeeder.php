<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class PasanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('pasangan')->insert([
           'nip_pegawai' => '4128065502041410',
            'nama_pasangan' => $faker->name,
            'tgl_lahir_pasangan' => $faker->date,
            'tmp_lahir_pasangan' => $faker->city,
            'pendidikan_pasangan' => $faker->company,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
