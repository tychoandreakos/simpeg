<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class AyahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('ayah')->insert([
            'nip_pegawai' => '4128065502041410',
            'nama_ayah' => $faker->name,
            'tgl_lahir_ayah' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'tmp_lahir_ayah' => $faker->city,
            'pend_ayah' => $faker->company,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
