<?php

use App\Daerah;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PonpesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $user_id = User::pluck('id')->toArray();;
        $daerah = Daerah::where('province_name', 'JAWA TIMUR')->pluck('id')->toArray();
        for($i = 0; $i < 5; $i++){
            $namas = ['Nurul Huda', 'Daarut Tauhid', 'Daarul Quran', 'Haramain', 'Gontor'];
            // $kota = ['Batu', 'Blitar', 'Kediri', 'Jombang', 'Kediri'];
            $long = ['112.523903', '112.205429', '112.011864', '112.226479', '112.011864'];
            $lat = ['-7.867100', '-8.121262', '-7.822840', '-7.546839', '-7.822840'];
    	    // insert data ke table pegawai menggunakan Faker
    		DB::table('ponpes')->insert([
    			'user_id' => $faker->randomElement($user_id),
                'nama' => $namas[$i],
    			'deskripsi' => 'Pondok pesantren Al-Quran dengan kurikulum Internasional',
    			'daerah_id' => $faker->randomElement($daerah),
                'created_at' => Carbon::now()
    		]);
    	}
    }
}
