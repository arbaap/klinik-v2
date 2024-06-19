<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPassword = env('ADMIN_PASSWORD', 'admin123');
        $admin = [
            'fullname' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'pasirjati',
            'phone' => '1234567890',
            'gender' => 'male',
            'level' => 'admin',
            'password' => Hash::make($adminPassword),
        ];

        User::create($admin);


        $defaultPassword = env('DEFAULT_PASSWORD', 'pasien123');

        $patients = [
            [
                'fullname' => 'Pasien Satu',
                'email' => 'pasien1@gmail.com',
                'address' => 'Pasirjati',
                'phone' => '0812345678',
                'gender' => 'female',
                'level' => 'pasien',
                'password' => Hash::make($defaultPassword),
            ],
            [
                'fullname' => 'Pasien Dua',
                'email' => 'pasien2@gmail.com',
                'address' => 'Pasirjati',
                'phone' => '0856789012',
                'gender' => 'male',
                'level' => 'pasien',
                'password' => Hash::make($defaultPassword),
            ],
            [
                'fullname' => 'Pasien Tiga',
                'email' => 'pasien3@gmail.com',
                'address' => 'Pasirjati',
                'phone' => '0876543210',
                'gender' => 'other',
                'level' => 'pasien',
                'password' => Hash::make($defaultPassword),
            ],
        ];

        foreach ($patients as $patient) {
            User::create($patient);
        }

        $doctorPassword = env('DOCTOR_PASSWORD', 'dokter123');

        $doctors = [
            [
                'fullname' => 'Dr. TestSatu',
                'email' => 'drtestsatu@gmail.com',
                'address' => 'Hasan Sadikin',
                'phone' => '0811122334',
                'gender' => 'male',
                'level' => 'dokter',
                'password' => Hash::make($doctorPassword),
            ],
            [
                'fullname' => 'Dr. TestDua',
                'email' => 'drtestdua@gmail.com',
                'address' => 'Hasan Sadikin',
                'phone' => '0855566778',
                'gender' => 'female',
                'level' => 'dokter',
                'password' => Hash::make($doctorPassword),
            ],
            [
                'fullname' => 'Dr. TestTiga',
                'email' => 'drtesttiga@gmail.com',
                'address' => 'Hasan Sadikin',
                'phone' => '0888899900',
                'gender' => 'male',
                'level' => 'dokter',
                'password' => Hash::make($doctorPassword),
            ],
        ];

        foreach ($doctors as $doctor) {
            User::create($doctor);
        }
    }
}
