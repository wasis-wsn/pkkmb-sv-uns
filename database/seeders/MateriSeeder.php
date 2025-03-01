<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materi;
use App\Models\User;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        Materi::create([
            'user_id' => $user->id,
            'judul_materi' => 'BUKU IMPLEMENTASI NILAI ASKARA MUDA',
            'deskripsi_materi' => 'Hallo Vocazens! Materi ini berisi
Buku Implementasi Nilai Askara Muda
yang digunakan sebagai materi dalam kegiatan
PKKMB SV UNS 2024.',
            'isi_materi' => 'Petunjuk Umum Implentasi Nilai :
            1. Askara Muda adalah sebutan untuk Mahasiswa Baru yang mengikuti PKKMB SV UNS Askara 2023.
2. Seluruh Implementasi Nilai bersifat WAJIB.
3. Implementasi nilai diberikan sebagai penunjang penanaman nilai-nilai dan visi misi dari PKKMB SV UNS 2023, yaitu Jiwa Berkarakter, Kreatifitas Tanpa Batas, Inovasi Mendunia.
4. Implementasi nilai menjadi indikator kelulusan PKKMB SV UNS 2023 bagi mahasiswa baru. 
5. Implementasi nilai menjadi salah satu syarat pokok untuk mendapatkan penilaian yang akan dicantumkan dalam sertifikat PKKMB SV UNS 2023. 
6. Sertifikat PKKMB SV UNS 2023 nantinya akan digunakan sebagai salah satu syarat kelulusan.
7. Implementasi nilai tidak boleh dihapus atau diarsip sampai mendapat arahan dari gardana.
8. Askara Muda wajib mempunyai akun Instagram.
9. Akun Instagram yang digunakan untuk mengunggah implementasi nilai tidak boleh diprivate.
10. Akun Instagram merupakan akun utama/asli bukan fake account, second account, atau akun buatan lainnya.
11. Menandai akun official media sosial PKKMB SV UNS di setiap implementasi nilai.
12. Seluruh foto atau video dilarang berpakaian secara tidak sopan dan tidak pantas. Pakaian tidak sopan dan tidak pantas yang dimaksud dalam poin sebelumnya adalah berpakaian ketat, transparan, memakai t-shirt (baju kaos tidak berkerah), tank top, hipster, you can see, backless, legging, rok mini, celana pendek, celana tiga per empat, model baju/celana koyak. Foto dan video dilarang mengandung unsur SARA, pornografi, dan hal negatif lainnya.
13. Pengerjaan implementasi nilai harus sesuai dengan panduan implementasi nilai.
14. Dilarang keras melakukan tindakan plagiasi dan menggunakan jasa joki.',
        ]);
        Materi::create([
            'user_id' => $user->id,
            'judul_materi' => 'TWIBBON',
            'deskripsi_materi' => 'Hallo Vocazens! Materi yang pertama berisi
Tugas Twibbon sebagai tugas dalam kegiatan 
PKKMB SV UNS 2024',
            'isi_materi' => 'Nama Implementasi nilai : Twibbon “Digitalisasi Askara Muda”
            Kategori: Individu
Ketentuan:
• Teknis pembuatan
1. Tema foto twibbon: "Kenal prodi".
2. Askara Muda diharapkan berfoto dengan dengan atribut atau properti yang menggambarkan prodi Askara Muda.
3. Ketentuan foto:
• Menampakkan wajah secara jelas, tidak menggunakan masker, dan tidak membelakangi kamera.
• Foto twibbon dilarang berpakaian secara tidak sopan dan tidak pantas.
• Foto twibbon tidak boleh mengandung unsur SARA dan hal yang bersifat negatif.
4. Atribut atau properti prodi yang dimaksud, misalnya jika Askara Muda berasal dari prodi D-4 K3 dapat berupa foto dengan memakai rompi safety, helm pengaman, kacamata pelindung, sepatu pelindung dan lain sebagainya (dapat memilih salah satu). Jika Askara Muda berasal dari prodi D-3 Komunikasi Terapan dapat berupa foto dengan seolah menjadi mc, jurnalis, presenter berita, dan lain sebagainya (dapat memilih salah satu). Jika Askara Muda berasal dari prodi D-4 DPS dapat berupa foto dengan memegang KTP atau KK (identitas harus disensor atau dibalik). Untuk Askara Muda dari program studi lainnya dapat menyesuaikan.
5. Twibbon, format caption, contoh foto twibbon dapat diakses melalui link berikut ini: uns.id/IMPLEMENTASINILAIASKARA2023
6. Askara Muda mengunduh template twibbon yang telah disediakan dan mengeditnya dengan foto sesuai dengan tema yang telah ditentukan.
7. Askara Muda mengunggah twibbon tersebut ke akun Instagram masing- masing.
8. Ketentuan mengunggah adalah sebagai berikut:
• Akun Instagram yang digunakan untuk mengunggah penugasan tidak boleh diprivate.
• Akun Instagram merupakan akun utama/asli bukan fake account, second account, atau akun buatan lainnya.
• Foto twibbon yang diunggah wajib menandai akun official media sosial @pkkmbsvuns, 5 akun instagram teman kelompok yang berbeda prodi, dan akun pribadi gardana masing-masing kelompok.
• Wajib menggunakan caption dan hashtag yang telah disediakan.
• Twibbon tidak boleh dihapus sebelum mendapatkan arahan dari gardana.
• Ketentuan caption dapat diakses melalui link berikut ini uns.id/IMPLEMENTASINILAIASKARA2023
• Teknis pengumpulan dan pengunggahan
9. Diunggah melalui Instagram.
10. Link twibbon dikumpulkan dengan nama "Twibbon Digitalisasi Askara Muda" melalui Google Classroom yang telah dibuat oleh masing- masing gardana.
11. Bentuk pengumpulan berupa link dari postingan twibbon di Instagram.
• Media atau platform : Instagram dan Google Classroom
• Pengumpulan dan pengunggahan : Diunggah serentak pada 20 Agustus 2023 (Pukul 16.00 s.d. 21.00 WIB)

• Learning outcome:
1. Memantik semangat mahasiswa baru Sekolah Vokasi UNS tahun 2023 agar senantiasa antusias menyambut rangkaian acara PKKMB Sekolah Vokasi UNS 2023.
2. Meningkatkan rasa bangga dan cinta terhadap Sekolah Vokasi UNS.
3. Menumbuhkan rasa percaya diri dalam menghadapi tantangan di masa depan sebagai Mahasiswa Vokasi.
4. Meningkatkan kesadaran akan pentingnya keterampilan dan kompetensi yang relevan dengan bidang studi masing-masing prodi di Sekolah Vokasi UNS.
• Nara hubung:
 https://wa.me/6285259320773(Rivan)
 https://wa.me/6281329754510(Eunike)',
        ]);
        Materi::create([
            'user_id' => $user->id,
            'judul_materi' => 'CO-CARD',
            'deskripsi_materi' => 'Hallo Vocazens! Materi yang kedua berisi
Tugas Co-Card sebagai tugas dalam kegiatan
PKKMB SV UNS 2024',
            'isi_materi' => 'Nama Implementasi Nilai : Co-Card “Digitalisasi Askara Muda”
            Kategori: Individu
Ketentuan:
Teknis pembuatan
1. Askara Muda mengunduh template co-card melalui link berikut: uns.id/IMPLEMENTASINILAIASKARA2023
2. Co-Card Askara Muda PKKMB SV 2023 menggunakan tema digitalisasi (search bar google).
3. Template terdiri dari 2 sisi, dengan deskripsi sebagai berikut:
4. Bagian depan berisi pas foto berukuran 3x4 cm (foto formal menggunakan kemeja putih dengan background warna biru tua) dan identitas dari Askara Muda.
5. Bagian belakang berisi barcode yang digunakan untuk presensi kehadiran pada saat kegiatan PKKMB SV 2023 berlangsung.
6. Template di print out warna kemudian diisi sesuai dengan identitas Askara Muda.
7. Identitas yang ditulis adalah nama kelompok di bagian search bar paling atas, kemudian nama diri sendiri, dan prodi. Ditulis menggunakan spidol kecil berwarna hitam dan menggunakan huruf kapital.
8. Setelah mengisi identitas, gunting kertas sesuai bentuk Co-Card, bagian depan dan belakang ditempelkan menjadi satu bagian (bolak-balik) menggunakan double tip kemudian dimasukkan dalam plastik id-card ukuran B4.
9. Adapun ketentuan tali lanyard pada co-card adalah sebagai berikut:
a. Laki-laki: warna kuning (seperti warna logo kuning sekolah vokasi) Perempuan: warna biru (seperti warna logo biru sekolah vokasi)
b. Panjang tali menyesuaikan dengan kebutuhan.
c. Co-Card discan kemudian dikumpulkan di Google Classroom
d. Pengumpulan foto dalam bentuk file pdf dengan format: Co-Card_Nama Lengkap_Nama Kelompok. Contoh: Co-Card_Andre Oktavian_Erlangga 1
• Teknis pengumpulan dan pengunggahan
1. Media atau platform : Google Classroom
2. Pengumpulan dan pengunggahan : Diunggah serentak pada 20 Agustus 2023 (Pukul 16.00 s.d. 23.59 WIB) dan digunakan saat hari pertama dan kedua (21 & 22 Agustus 2023)

• Learning outcome:
1. Sebagai tanda pengenal untuk mengetahui identitas mahasiswa baru yang akan memudahkan ketika keberjalanan acara PKKMB SV UNS 2023.
2. Sebagai sarana untuk meningkatkan kesadaran mahasiswa baru tentang teknologi, penggunaan Co-Card dengan tema digitalisasi akan meningkatkan kesadaran mahasiswa baru tentang teknologi dan peranannya dalam kehidupan sehari-hari.
3. Sebagai bentuk rasa bangga terhadap kemajuan teknologi karena menggunakan template bertema "Digitalisasi".
• Nara hubung:
https://wa.me/6285969058965(Sahrul)
https://wa.me/6281329754510(Eunike)',
        ]);
        Materi::create([
            'user_id' => $user->id,
            'judul_materi' => 'VIDEO BANGGA VOKASI',
            'deskripsi_materi' => 'Hallo Vocazens! Materi yang ketiga berisi
Tugas Video Bangga Vokasi sebagai tugas dalam kegiatan
PKKMB SV UNS 2024',
            'isi_materi' => 'Nama Implementasi Nilai : "Video Bangga Vokasi"
            Kategori: Individu
Ketentuan:
• Teknis pembuatan
1. Aksara Muda membuat video "Bangga Vokasi" di Tiktok yang berisi tentang:
2. Opening dengan jargon "Jiwa Berkarakter, Kreativitas Tanpa Batas, Inovasi Mendunia"
3. Perkenalan diri (nama diri, nama kelompok, dan prodi).
4. Menjelaskan tentang apa yang diketahui dari vokasi. Mahasiswa baru wajib memilih 3 dari 5 topik yang tersedia di bawah ini:
• Gambaran singkat tentang prodi (sesuai prodi masing-masing)
• Prospek kerja (sesuai prodi masing-masing)
• Mitos & fakta tentang vokasi
• Keunggulan vokasi
• Harapan untuk vokasi
5. Ditutup dengan kalimat "Aku Bangga menjadi Bagian dari Vokasi"
6. Video dibuat sekreatif dan semenarik mungkin dengan durasi video minimal 2 menit dan maksimal 3 menit.
7. Wajib menggunakan atribut atau properti yang menggambarkan prodi masing-masing.
8. Video yang dibuat tidak boleh mengandung unsur SARA, pornografi, dan hal negatif.
9. Ketentuan caption dapat diakses melalui link berikut ini uns.id/IMPLEMENTASINILAIASKARA2023
10. Video yang diunggah harus sesuai ketentuan dengan menggunakan caption dan hastag yang telah ditentukan. Teknis pengumpulan dan pengunggahan
11. Diunggah ke Tiktok menggunakan akun pribadi dan akun tidak boleh diprivate, tag akun tiktok @pkkmbsvuns dan akun tiktok gardana masing-masing.
12. Link dikumpulkan melalui Google Classroom
• Media atau platform : Tiktok dan Google Classroom
• Pembuatan Video : Dibuat tanggal 19 s.d. 20 Agustus 2023
• Pengumpulan dan pengunggahan : Diunggah serentak pada 21 Agustus 2023 (Pukul 16.00 s.d. 21.00 WIB)

• Learning outcome:
1. Mengembangkan apresiasi dan rasa bangga menjadi bagian dari pendidikan vokasi yang memberikan peluang nyata untuk terampil dan mampu bersaing di dunia kerja.
2. Mendapatkan wawasan yang lebih luas tentang berbagai program dari pendidikan vokasi, keunggulan, dan prospek kerja.
3. Meningkatkan motivasi bagi mahasiswa baru untuk mengembangkan potensi dan memanfaatkan peluang dalam pendidikan vokasi.
• Nara hubung:
https://wa.me/62895326590401 (Adella)
https://wa.me/6281329754510 (Eunike',
        ]);
        Materi::create([
            'user_id' => $user->id,
            'judul_materi' => 'RINGKASAN MATERI',
            'deskripsi_materi' => 'Hallo Vocazens! Materi yang ketiga berisi
Tugas Ringkasan Materi sebagai tugas dalam kegiatan
PKKMB SV UNS 2024',
            'isi_materi' => 'Nama Implementasi Nilai : "Ringkasan Materi Askara Muda"
            Kategori: Individu
Ketentuan:
• Teknis pembuatan :
1. Askara Muda merangkum pada setiap sesi materi yang telah didapatkan dari penjelasan pemateri di hari PKKMB SV 2023 berlangsung.
2. Askara Muda dapat mengunduh template ringkasan materi di link berikut ini: uns.id/IMPLEMENTASINILAIASKARA2023
3. Ringkasan materi tersebut ditulis dengan mencantumkan hal-hal sebagai berikut:
a. Nama pemateri:
b. Tema/Judul materi:
c. Ringkasan materi:
4. Membuat ringkasan materi yang telah didapatkan dari penjelasan pemateri dengan template yang telah disediakan.
5. Ringkasan tersebut diunggah ke story instagram dengan menandai username ig gardana di masing-masing kelompok dan instagram tidak boleh diprivate.
6. Setiap sesi materi harus dibuat ringkasan dengan template yang sama.
• Teknis pengumpulan dan pengunggahan
1. Link story dikumpulkan melalui Google Classroom
2. Media atau platform: Instagram dan Google Classroom
3. Batas pengumpulan dan pengunggahan: Diunggah serentak pada 22 Agustus 2023 (Pukul 18.00 s.d. 23.59 WIB) 

• Learning outcome:
1. Sebagai pengetahuan dan penerapan bagi Askara Muda yang telah disampaikan.
2. Memahami materi dan melatih kreativitas mahasiswa baru akan berfikir
3. Melatih penalaran dan mengambil kesimpulan terhadap materi yang telah disampaikan.
• Nara hubung:
https://wa.me/6288806934824 (Septiana)
https://wa.me/6281329754510 (Eunike',
        ]);
    }
}
