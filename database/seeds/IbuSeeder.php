<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;
class IbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('ibu')->insert([
            'nip_pegawai' => '2044935907895055',
            'nama_ibu' => $faker->name,
            'tgl_lahir_ibu' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'tmp_lahir_ibu' => $faker->city,
            'pend_ibu' => $faker->company,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
