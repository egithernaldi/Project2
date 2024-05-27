<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class frontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tentangs')->insert([
            [
                'judul' => 'Story',
                'deskripsi' => 'Website surat ini dibuat untuk mempermudah masyarakat untuk mengajukan surat permohonan tanpa harus mengurus langsung ke kantor',
            ],
            [
                'judul' => 'Mission',
                'deskripsi' => 'Memujudkan tata kelola pemerintahan yang baik dan berwibawa serta akses partisipasi masyarakat mulai dari perencanaan, implementasi dan pengawasan program-program desa.
                Membangun kualitas sumber daya manusia yang cerdas dan berintegritas.
                Membangun struktur ekonomi desa yang tangguh dan kolaboratif.
                Membuka akses ekonomi desa untuk pemerataan kesejahteraan dan keadilan bagi warga khususnya disektor jasa wisata dan produk lokal desa.
                Meningkatkan kualitas lingkungan permukiman yang nyaman huni dan bermartabat
                Peningkatan kualitas infrastruktur, sarana dan prasarana desa baik fasilitas umum/sosial maupun fasilitas wisata.
                Mengembangkan seni tradisi, budaya dan kearifan lokal dalam aspek membangun kohesi kehidupan masyarakat desa dan mendukung sektor wisata.
                Membangun kolaborasi strategis berbasis strategis potensi desa dengan pemerintah, dunia usaha , LSM dan desa-desa lain.
                Menguatkan lembaga keagamaan dalam rangka membangun spiritual dan berperan dalam aspek ekonomi umat sebagai wujud desa Religius',

            ],
            [
                'judul' => 'Vision',
                'deskripsi' => 'Menjadi desa yang sejahtera, berdaya saing, dan berbudaya, menjadi tempat tinggal yang aman, nyaman, dan berkelanjutan bagi seluruh warganya.',
            ],
        ]);

        DB::table('layanans')->insert([
            [
                'judul' => 'Surat Pengajuan Umum',
                'deskripsi' => 'Surat Keterangan Umum adalah Surat yang ditujukan untuk banyak kondisi',

            ],
            [
                'judul' => 'Surat Pengantar SKCK',
                'deskripsi' => 'Surat Pengantar SKCK merupakan tembusan sebelum mengurus kekantor Polisi',

            ],
            [
                'judul' => 'Surat Pengajuan Domisili',
                'deskripsi' => 'Surat Pengajuan Domosili adalah surat yang menyatakan alamat tempat tinggal seseorang pada suatu periode waktu tertentu',
            ],
            
        ]);
        DB::table('contacts')->insert([
            [
                'nama' => 'Pelayanan Surat Desa',
                'email' => 'sungaibuluahselatan@example.com',
                'telepon' => '08529907xxxx',
                'alamat'=> 'Jl. In Aja Dulu, Padang, Sumatera Barat',
                'gambar'=> 'foto',
            ],
        ]);
    }
}
