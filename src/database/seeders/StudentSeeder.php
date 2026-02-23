<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $kelasAll = Kelas::with('jurusan')->get();
        $tahun = TahunAjaran::where('status', 'aktif')->first();

        if ($kelasAll->isEmpty() || ! $tahun) {
            $this->command->warn('Seeder dibatalkan: Kelas atau Tahun Ajaran aktif tidak ditemukan.');
            return;
        }

        $names = [
            'Andi Pratama','Siti Aminah','Budi Santoso','Sari Melati',
            'Dewi Lestari','Rudi Hartono','Tina Lestari',
            'Rina Marlina','Eko Susanto','Fajar Nur',
            'Nina Kurnia','Asep Saepudin',
        ];

        $nisBase = 210000;
        $nisnBase = 9900000000;

        foreach ($kelasAll as $kelas) {
            for ($i = 1; $i <= 12; $i++) {

                $idx = ($i - 1) % count($names);
                $name = $names[$idx] . ' ' . $kelas->nama_kelas . ' ' . $i;
                $nis = (string) ($nisBase++);
                $nisn = (string) ($nisnBase++);

                Student::firstOrCreate(
                    ['nis' => $nis],
                    [
                        'nis' => $nis,
                        'nisn' => $nisn,
                        'nama' => $name,
                        'kelas_id' => $kelas->id,
                        'jurusan_id' => $kelas->jurusan_id,
                        'tahun_ajaran_id' => $tahun->id,
                        'status' => 'aktif',
                        'tahun_lulus' => $tahun->tahun_selesai ?? date('Y'),
                        'sekolah' => 'SMK Contoh Indonesia',
                        'phone' => '08' . rand(1111111111, 9999999999),
                    ]
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Data Contoh Tetap (Tidak Acak)
        |--------------------------------------------------------------------------
        */
        $kelasSample = $kelasAll->first();

        Student::firstOrCreate(
            ['nis' => '210999'],
            [
                'nis' => '210999',
                'nisn' => '0072538844',
                'nama' => 'Muhammad Ndryan Putra Pratama',
                'kelas_id' => $kelasSample->id,
                'jurusan_id' => $kelasSample->jurusan_id,
                'tahun_ajaran_id' => $tahun->id,
                'status' => 'aktif',
                'tahun_lulus' => '2025',
                'sekolah' => 'SMKN 1 Kab Tangerang',
                'phone' => '62895330347429',
            ]
        );

        $this->command->info('StudentSeeder berhasil dijalankan.');
    }
}