<?php

use App\Daerah;
use App\Ponpes;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $ponpes = Ponpes::pluck('id')->toArray();
		$daerah = Daerah::where('province_name', 'JAWA TIMUR')->pluck('id')->toArray();
		
    	for($i = 1; $i <= 10; $i++){
    	    // insert data ke table pegawai menggunakan Faker
    		DB::table('santri')->insert([
    			'ponpes_id' => $faker->randomElement($ponpes),
    			'nama' => $faker->name,
    			'jenis_kelamin' => $faker->randomElement(['Pria', 'Wanita']),
    			'tanggal_lahir' => $faker->date,
    			'jumlah_hafalan' => $faker->numberBetween(0,30),
    			'no_hp' => $faker->numberBetween(6280000000000),
    			'daerah_id' => $faker->randomElement($daerah),
                'created_at' => $faker->dateTime
    		]);
 
    	}
    }
}
