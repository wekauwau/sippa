<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'divisions_id' => 6,  // Keamanan Pesantren
                'name' => 'Hasil peraturan keamanan dawuh ibuk 2 Nov 2021',
                'link' => 'https://docs.google.com/document/d/12-7UiG-4SizZ5aBElaJElf6NvTrfVTzgxZutWqVtcg0/edit?usp=sharing',
                'file' => null,
            ],
            [
                'divisions_id' => 10,  // Humas Idul Adha 2022
                'name' => 'Iuran dan Sohibul Kurban 2022',
                'link' => 'https://docs.google.com/document/d/1RVDLJVe-8PCmMp-dwV-0jyzjwdQD6P-q/edit?usp=sharing&ouid=116339038139849099361&rtpof=true&sd=true',
                'file' => null,
            ],
            [
                'divisions_id' => 6,  // Keamanan Pesantren
                'name' => 'Takzir telat pulang liburan 2022',
                'link' => 'https://docs.google.com/spreadsheets/d/16HkeA55xIdKqrWgfvqC-PTYpctbBg-NhRJqEFvj69TM/edit?amp;usp=embed_facebook#gid=0',
                'file' => null,
            ],
        ];

        foreach ($data as $val) {
            Data::create($val);
        }
    }
}
