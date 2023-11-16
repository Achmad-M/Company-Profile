<?php

// database/seeders/WaktuKelasSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WaktuKelas;

class WaktuKelasSeeder extends Seeder
{
    public function run()
    {
        // Senin, Rabu, Jumat
        WaktuKelas::create(['hari' => 'Senin, Rabu, Jumat', 'sesi' => 'Sesi 1 : Pukul 07.00 - 08.30 WITA']);
        WaktuKelas::create(['hari' => 'Senin, Rabu, Jumat', 'sesi' => 'Sesi 2 : Pukul 08.30 - 10.00 WITA']);
        WaktuKelas::create(['hari' => 'Senin, Rabu, Jumat', 'sesi' => 'Sesi 3 : Pukul 10.00 - 11.30 WITA']);
        WaktuKelas::create(['hari' => 'Senin, Rabu, Jumat', 'sesi' => 'Sesi 4 : Pukul 11.30 - 13.00 WITA']);
        WaktuKelas::create(['hari' => 'Senin, Rabu, Jumat', 'sesi' => 'Sesi 5 : Pukul 14.00 - 15.30 WITA']);

        // Selasa, Kamis, Sabtu
        WaktuKelas::create(['hari' => 'Selasa, Kamis, Sabtu', 'sesi' => 'Sesi 1 : Pukul 08.30 - 10.00 WITA']);
        WaktuKelas::create(['hari' => 'Selasa, Kamis, Sabtu', 'sesi' => 'Sesi 2 : Pukul 10.00 - 11.30 WITA']);
        WaktuKelas::create(['hari' => 'Selasa, Kamis, Sabtu', 'sesi' => 'Sesi 3 : Pukul 15.30 - 17.00 WITA']);

        // Tambahkan data lain sesuai kebutuhan
    }
}
