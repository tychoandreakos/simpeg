<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class RiwayatPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('riwayat_pekerjaan')->insert([
            'nip_pegawai' => '4128065502041410',
            'nama_perusahaan' => $faker->company,
            'lokasi_perusahaan' => $faker->address,
            'jabatan_perusahaan' => $faker->jobTitle,
            'periode_perusahaan' => $faker->year($max = '2017') ."-". $faker->year($max = 'now'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
