<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'post-qurban.jpg',
                'Berbagi Qurban Bersama Pondok Pesantren Al-Barokah',
                'Assalamualaikum Wr. Wb
Pondok Pesantren Al Barokah pada peringatan Hari Raya Idul Adha 1445H (10 Dzulhijah 1445H) kembali mengadakan program rutin tahunan yaitu penyembelihan dan penyaluran daging qurban.

Sehubungan dengan hal tersebut, bagi para jamaah yang ingin ikut serta dalam kegiatan Qurban PP. Al Barokah, kami sampaikan rincian informasi sebagai berikut ;
🐂 Qurban *sapi* setiap orang dikenai biaya *Rp 3.500.000,-*
🐐 Qurban *Kambing* dikenai biaya sebesar *Rp 3.200.000,-*

💸Biaya tersebut dapat dikirim melalui rekening transfer sebagai berikut :💸
💳 604001024370534
(Bank BRI a.n Maulana Jodi Listiawan)
💳 1850004065220
(Bank Mandiri a.n Fajrul Falah)

Informasi lebih lanjut dapat menghubungi nomor berikut:
📞 085701454247
(Maulana Jodi Listiawan)
📞 083867408838
(Fajrul Falah)

*Konfirmasi pembayaran juga dapat dilakukan kepada Ibu Nyai Hj. Anita Durrotul Yatimah Al-Hafidzoh.

Atas perhatian dan partisipasi kami sampaikan terima kasih.😁
Wassalamualaikum Wr.Wb.',
            ]
        ];

        // foreach ($records as $record) {
        //     Post::create([
        //         'image' => $record[0],
        //         'title' => $record[1],
        //         'content' => $record[2],
        //     ]);
        // }

        // temporary seeder
        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'image' => $records[0][0],
                'title' => $records[0][1],
                'content' => $records[0][2],
            ]);
        }
    }
}
