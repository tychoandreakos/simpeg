<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class AnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('anak')->insert([
            'nip_pegawai' => '4128065502041410',
            'nama_anak' => $faker->name,
            'tgl_lahir_anak' => $faker->date,
            'tmp_lahir_anak' => $faker->city,
            'pendidikan_anak' => $faker->company,
            'jk_anak' => $faker->randomElement(['0','1']),
            'status_anak' => $faker->randomElement(['0','1','2','3']),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
