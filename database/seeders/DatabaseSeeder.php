<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use App\Models\Aduan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'admin',
            'fullname' => 'Admin',
            'profile' => 'profiluser/user.webp',
            'status_verify' => null, 
            'email' => null,
            'nim_nidn' => null,
            'status' => null,
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'username' => '221031066',
            'password' => '221031066',
            'role' => 'pelapor',
            'fullname' => 'Andi Riah Zahirah',
            'profile' => 'profiluser/user.webp',
            'status_verify' => '1', 
            'email' => 'andiriahzahirah.221031066@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031066',
            'status' => 'Mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'username' => '221031003',
            'password' => '221031003',
            'role' => 'pelapor',
            'fullname' => 'Muhammad Akbar',
            'profile' => 'profiluser/user.webp',
            'status_verify' => '1', 
            'email' => 'muhammadakbar.221031003@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031003',
            'status' => 'Mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'username' => '221031018',
            'password' => '221031018',
            'role' => 'pelapor',    
            'fullname' => 'Lukman Hakim',
            'profile' => 'profiluser/user.webp',
            'status_verify' => '1', 
            'email' => 'lukmanhakim.221031018@mahasiswa.ith.ac.id',
            'nim_nidn' => '221031018',
            'status' => 'Mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        $berita = Berita::create([
            'judul' => 'Isu Kekerasan Seksual, FJP Lampung: Masih Ada Media yang Mencampurkan',
            'isi' => 'FJPI Lampung mengkritik pemberitaan kekerasan seksual yang mencampurkan opini pribadi 
                        dengan fakta. Mereka menekankan pentingnya media menjaga objektivitas dan menghindari 
                        bias dalam laporan agar masyarakat bisa memperoleh informasi yang jelas dan tepat. FJPI 
                        juga meminta agar media lebih bertanggung jawab dalam memberikan informasi terkait isu 
                        kekerasan seksual, terutama dalam membedakan antara fakta dan opini yang dapat mempengaruhi 
                        persepsi publik. Organisasi ini mendorong adanya peningkatan edukasi media untuk mempublikasikan 
                        berita dengan mempertimbangkan hak-hak korban serta meminimalisir kesalahan informasi yang bisa 
                        memperburuk situasi.',
            'gambar' => 'berita1.jpg',
            'tanggal' => '2025-05-29',
            'penulis' => 'Admin', 
        ]);

        $berita = Berita::create([
            'judul' => 'Komnas Perempuan paparkan penggunaan istilah kasus kekerasan seksual',
            'isi' => 'Satgas PPKS telah mengangkat 11 mahasiswa sebagai duta pencegahan kekerasan seksual 
                        di Universitas Hasanuddin (Unhas). Pelantikan ini bertujuan untuk meningkatkan kesadaran 
                        dan peran aktif mahasiswa dalam memerangi kekerasan seksual di lingkungan kampus. Mereka 
                        diharapkan dapat menyebarkan informasi dan menjadi penggerak perubahan di kalangan mahasiswa 
                        dalam upaya menciptakan lingkungan yang lebih aman. Selain itu, kegiatan ini juga melibatkan 
                        pelatihan terkait pencegahan kekerasan seksual, serta upaya memperkuat partisipasi komunitas 
                        kampus dalam membangun budaya yang menanggulangi kekerasan seksual secara lebih sistematis.',
            'gambar' => 'berita2.png',
            'tanggal' => '2025-05-10',
            'penulis' => 'Admin', 
        ]);

        $berita = Berita::create([
            'judul' => 'Komnas Perempuan paparkan penggunaan istilah kasus kekerasan seksual',
            'isi' => 'Andy Yentriyani, Ketua Komnas Perempuan, mengingatkan pentingnya menggunakan 
                        istilah "peristiwa kekerasan seksual" ketika kasusnya belum jelas atau belum ada 
                        keputusan dari pihak kepolisian. Hal ini dilakukan untuk menghindari kesalahan penafsiran 
                        sebelum pihak berwenang menentukan jenis tindakannya. Andy menjelaskan bahwa istilah tersebut 
                        mencakup berbagai bentuk kekerasan seksual sesuai dengan Undang-Undang Tindak Pidana Kekerasan 
                        Seksual (UU TPKS). Sebagai contoh, Andy menegaskan bahwa dalam kasus anak yang diperkosa, istilah 
                        yang lebih tepat adalah "perbudakan seksual" karena korban sepenuhnya dikuasai oleh pelaku. 
                        Ia menambahkan bahwa penggunaan istilah yang tepat sangat penting dalam konteks pemberitaan agar 
                        tidak mereduksi beratnya kasus yang dihadapi korban.',
            'gambar' => 'berita3.webp',
            'tanggal' => '2025-05-10',
            'penulis' => 'Admin', 
        ]);

        $berita = Berita::create([
            'judul' => 'Dikbud Parepare Bentuk TPPK Tangani Kasus Bully, Anggotanya Guru-Polisi',
            'isi' => 'Dinas Pendidikan dan Kebudayaan (Dikbud) Parepare, Sulawesi Selatan (Sulsel) akan membentuk 
            Tim Pencegahan dan Penanganan Kekerasan (TPPK) di tingkat sekolah usai maraknya kasus kekerasan dan bully 
            antara pelajar. Tim ini nantinya akan beranggotakan guru dan polisi. 
            Berdasarkan Peraturan Menteri Pendidikan Kebudayaan Riset dan Teknologi (Mendikbudristek) 
            Nomor 46 Tahun 2023 tentang Pencegahan dan Penanganan Kekerasan di Lingkungan Satuan Pendidikan, 
            serta surat edaran Kemendikbudristek tentang Pembentukan Satuan Tugas dan Tim Pencegahan dan Penanganan 
            Kekerasan (TPPK) di Lingkungan Satuan Pendidikan. Dengan regulasi tersebut maka di tingkat kabupaten dan 
            kota membentuk adanya Satgas dan di sekolah dibentuk tim TPPK',
            'gambar' => 'berita4.jpeg',
            'tanggal' => '2023-10-05',
            'penulis' => 'Admin', 
        ]);

        $berita = Berita::create([
            'judul' => 'Dikbud Parepare Bentuk TPPK Tangani Kasus Bully, Anggotanya Guru-Polisi',
            'isi' => 'Dinas Pendidikan dan Kebudayaan (Dikbud) Parepare, Sulawesi Selatan (Sulsel) akan membentuk 
            Tim Pencegahan dan Penanganan Kekerasan (TPPK) di tingkat sekolah usai maraknya kasus kekerasan dan bully 
            antara pelajar. Tim ini nantinya akan beranggotakan guru dan polisi. 
            Berdasarkan Peraturan Menteri Pendidikan Kebudayaan Riset dan Teknologi (Mendikbudristek) 
            Nomor 46 Tahun 2023 tentang Pencegahan dan Penanganan Kekerasan di Lingkungan Satuan Pendidikan, 
            serta surat edaran Kemendikbudristek tentang Pembentukan Satuan Tugas dan Tim Pencegahan dan Penanganan 
            Kekerasan (TPPK) di Lingkungan Satuan Pendidikan. Dengan regulasi tersebut maka di tingkat kabupaten dan 
            kota membentuk adanya Satgas dan di sekolah dibentuk tim TPPK',
            'gambar' => 'berita4.jpeg',
            'tanggal' => '2024-05-29',
            'penulis' => 'Admin', 
        ]);

        $berita = Berita::create([
            'judul' => 'Dikbud Parepare Bentuk TPPK Tangani Kasus Bully, Anggotanya Guru-Polisi',
            'isi' => 'Dinas Pendidikan dan Kebudayaan (Dikbud) Parepare, Sulawesi Selatan (Sulsel) akan membentuk 
            Tim Pencegahan dan Penanganan Kekerasan (TPPK) di tingkat sekolah usai maraknya kasus kekerasan dan bully 
            antara pelajar. Tim ini nantinya akan beranggotakan guru dan polisi. 
            Berdasarkan Peraturan Menteri Pendidikan Kebudayaan Riset dan Teknologi (Mendikbudristek) 
            Nomor 46 Tahun 2023 tentang Pencegahan dan Penanganan Kekerasan di Lingkungan Satuan Pendidikan, 
            serta surat edaran Kemendikbudristek tentang Pembentukan Satuan Tugas dan Tim Pencegahan dan Penanganan 
            Kekerasan (TPPK) di Lingkungan Satuan Pendidikan. Dengan regulasi tersebut maka di tingkat kabupaten dan 
            kota membentuk adanya Satgas dan di sekolah dibentuk tim TPPK',
            'gambar' => 'berita4.jpeg',
            'tanggal' => '2024-07-29',
            'penulis' => 'Admin', 
        ]);

        $berita = Berita::create([
            'judul' => 'Komnas Perempuan paparkan penggunaan istilah kasus kekerasan seksual',
            'isi' => 'Andy Yentriyani, Ketua Komnas Perempuan, mengingatkan pentingnya menggunakan 
                        istilah "peristiwa kekerasan seksual" ketika kasusnya belum jelas atau belum ada 
                        keputusan dari pihak kepolisian. Hal ini dilakukan untuk menghindari kesalahan penafsiran 
                        sebelum pihak berwenang menentukan jenis tindakannya. Andy menjelaskan bahwa istilah tersebut 
                        mencakup berbagai bentuk kekerasan seksual sesuai dengan Undang-Undang Tindak Pidana Kekerasan 
                        Seksual (UU TPKS). Sebagai contoh, Andy menegaskan bahwa dalam kasus anak yang diperkosa, istilah 
                        yang lebih tepat adalah "perbudakan seksual" karena korban sepenuhnya dikuasai oleh pelaku. 
                        Ia menambahkan bahwa penggunaan istilah yang tepat sangat penting dalam konteks pemberitaan agar 
                        tidak mereduksi beratnya kasus yang dihadapi korban.',
            'gambar' => 'berita3.webp',
            'tanggal' => '2025-05-10',
            'penulis' => 'Admin', 
        ]);

    }
}
