<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Wisata extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_wisata'   => '1',
                'id_admin'    => '3',
                'nama_wisata' => 'Curug Putri',
                'deskripsi'   => 'Curug Putri di Kuningan, Jawa Barat, adalah salah satu destinasi wisata alam yang menawarkan pesona air terjun yang memukau. 
                                  Terletak di kawasan pegunungan yang asri, Curug Putri menyuguhkan pemandangan alam yang spektakuler dengan air terjun yang 
                                  jernih dan segar, dikelilingi oleh hutan hijau yang rimbun. Suara gemericik air yang jatuh dari ketinggian memberikan suasana 
                                  tenang dan damai, cocok untuk melepas penat dan menikmati keindahan alam. Akses menuju Curug Putri relatif mudah, meskipun 
                                  memerlukan sedikit usaha untuk berjalan kaki dari tempat parkir, tetapi semua itu terbayar dengan pemandangan yang menakjubkan. 
                                  Dengan keindahan alamnya yang mempesona dan suasana yang menenangkan, Curug Putri menjadi destinasi wajib bagi wisatawan yang 
                                  ingin merasakan keajaiban alam Kuningan.',
                'gambar'      => '1717439283_8250e31b65de38dbd421.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'   => '2',
                'id_admin'    => '4',
                'nama_wisata' => 'Situs Purbakala Cipari',
                'deskripsi'   => 'Situs Purbakala Cipari di Kuningan, Jawa Barat, adalah salah satu destinasi wisata sejarah yang menawarkan jendela ke masa lalu 
                                  Indonesia. Terletak di kaki Gunung Ciremai, situs ini merupakan peninggalan zaman megalitikum yang diperkirakan berusia lebih 
                                  dari 3500 tahun. Situs ini pertama kali ditemukan pada tahun 1972 dan sejak itu telah menjadi daya tarik bagi para arkeolog dan 
                                  wisatawan yang tertarik pada sejarah dan budaya. Di dalam kompleks ini, pengunjung dapat melihat berbagai artefak bersejarah 
                                  seperti sarkofagus, batu-batu besar yang digunakan untuk upacara keagamaan, dan peralatan sehari-hari dari masa lampau. Selain 
                                  itu, terdapat juga museum kecil yang menampilkan berbagai temuan arkeologis dari penggalian di sekitar situs. Dikelilingi oleh 
                                  alam yang asri dan udara pegunungan yang sejuk, Situs Purbakala Cipari tidak hanya menawarkan perjalanan edukatif ke masa lalu, 
                                  tetapi juga pengalaman yang menyegarkan bagi para pengunjung. Dengan berbagai fasilitas yang memadai, situs ini menjadi 
                                  destinasi yang menarik untuk dikunjungi oleh keluarga, pelajar, maupun peneliti.',
                'gambar'      => '1717510528_d6a31e6183cdc3d56ca2.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'   => '3',
                'id_admin'    => '5',
                'nama_wisata' => 'Curug Sidomba',
                'deskripsi'   => 'Curug Sidomba, yang terletak di Kabupaten Kuningan, Jawa Barat, adalah sebuah destinasi wisata alam yang memikat dengan 
                                  keindahan air terjun dan suasana alam yang asri. Dikelilingi oleh hutan yang rimbun dan pepohonan hijau, Curug Sidomba 
                                  menawarkan pemandangan yang menenangkan dan udara segar yang menyegarkan. Akses menuju air terjun ini cukup mudah, dengan 
                                  jalur yang telah ditata rapi sehingga pengunjung dapat menikmati perjalanan dengan nyaman. Selain keindahan air terjun yang 
                                  mempesona, area sekitar Curug Sidomba juga dilengkapi dengan fasilitas pendukung seperti tempat istirahat, area piknik, dan 
                                  warung makan, menjadikannya tempat yang ideal untuk rekreasi keluarga. Keunikan lainnya adalah adanya beberapa hewan domba 
                                  yang berkeliaran di sekitar area, menambah daya tarik tersendiri bagi wisatawan. Dengan suasana yang tenang dan pemandangan 
                                  alam yang indah, Curug Sidomba merupakan destinasi yang sempurna untuk melepas penat dan menikmati keindahan alam Kuningan.',
                'gambar'      => '1717510617_f7dceb0e6cc129e13ee8.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'   => '4',
                'id_admin'    => '6',
                'nama_wisata' => 'Taman Linggarjati',
                'deskripsi'   => 'Taman Linggarjati, terletak di Kuningan, Jawa Barat, adalah salah satu objek wisata yang menawarkan keindahan alam dan sejarah 
                                  yang memikat. Taman ini terkenal karena pesona alamnya yang asri, dihiasi oleh pepohonan rindang dan taman bunga yang 
                                  berwarna-warni. Selain pemandangan alam yang menyejukkan, Taman Linggarjati juga memiliki nilai sejarah yang tinggi, karena 
                                  berada di dekat Gedung Linggarjati, tempat bersejarah di mana perundingan antara Indonesia dan Belanda pernah berlangsung pada 
                                  tahun 1946. Pengunjung dapat menikmati suasana tenang sambil berjalan-jalan di sekitar taman, atau menikmati berbagai fasilitas 
                                  rekreasi yang disediakan. Dengan udara pegunungan yang sejuk dan panorama alam yang memukau, Taman Linggarjati menjadi destinasi 
                                  yang sempurna bagi mereka yang ingin melepas penat dan menikmati keindahan alam serta sejarah Indonesia.',
                'gambar'      => '1717510813_536121dc2a98fbb49d44.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'   => '5',
                'id_admin'    => '7',
                'nama_wisata' => 'Waduk Darma',
                'deskripsi'   => 'Waduk Darma, yang terletak di Kabupaten Kuningan, Jawa Barat, merupakan salah satu destinasi wisata yang memikat dengan 
                                  keindahan alamnya yang mempesona. Waduk ini dikelilingi oleh perbukitan hijau yang memberikan panorama menakjubkan dan suasana 
                                  yang sejuk, menjadikannya tempat yang ideal untuk berlibur dan melepas penat. Selain menikmati pemandangan danau yang luas, 
                                  pengunjung juga dapat menikmati berbagai aktivitas rekreasi seperti berperahu, memancing, dan berkemah di area sekitar waduk. 
                                  Terdapat pula fasilitas pendukung seperti gazebo, area piknik, dan warung makan yang menyajikan kuliner khas daerah. Keberadaan 
                                  flora dan fauna di sekitar waduk juga menambah daya tarik wisata ini, memberikan pengalaman alam yang autentik dan menyegarkan. 
                                  Waduk Darma bukan hanya menawarkan keindahan alam, tetapi juga menjadi sarana edukasi mengenai pentingnya menjaga ekosistem dan 
                                  lingkungan sekitar. Dengan semua pesonanya, Waduk Darma menjadi destinasi yang sempurna bagi wisatawan yang mencari ketenangan 
                                  dan keindahan alam Jawa Barat.',
                'gambar'      => '1717510883_37da6c59e58ee5a234a2.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'   => '6',
                'id_admin'    => '8',
                'nama_wisata' => 'Cibulan',
                'deskripsi'   => 'Cibulan adalah sebuah destinasi wisata yang menakjubkan di Kabupaten Kuningan, Jawa Barat. Terletak di ketinggian yang 
                                  menawarkan pemandangan alam yang menakjubkan, Cibulan memukau pengunjung dengan keindahan alamnya yang memikat. Pesona alamnya 
                                  terwujud dalam panorama pegunungan yang hijau dan udara segar yang menyegarkan jiwa. Di sini, pengunjung dapat menikmati 
                                  kegiatan seperti trekking menyusuri jalur-jalur alami, bersepeda menelusuri pedesaan yang asri, atau sekadar bersantai sambil 
                                  menikmati keindahan alam sekitarnya. Selain itu, Cibulan juga dikenal dengan sumber airnya yang jernih dan segar, cocok untuk 
                                  mandi atau sekadar berendam menyegarkan diri. Tak heran, Cibulan menjadi magnet bagi wisatawan yang mencari ketenangan dan 
                                  keindahan alam yang autentik di Jawa Barat.',
                'gambar'      => '1717510960_2192743b8e8fb5a28d36.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'   => '7',
                'id_admin'    => '9',
                'nama_wisata' => 'Telaga Remis',
                'deskripsi'   => 'Telaga Remis adalah destinasi alam yang menakjubkan terletak di Desa Cipaku, Kecamatan Cigugur, Kabupaten Kuningan, Jawa Barat. 
                                  Terletak di kaki Gunung Ciremai, Telaga Remis menawarkan pesona alam yang memukau dengan udara segar, pemandangan hijau yang 
                                  memikat, dan suasana tenang yang cocok untuk bersantai. Air jernih telaga menciptakan refleksi yang indah, terutama saat pagi 
                                  hari atau matahari terbenam. Pengunjung dapat menikmati berbagai aktivitas di sini, seperti berjalan-jalan menikmati keindahan 
                                  alam sekitar, bermain air, atau sekadar bersantai sambil menikmati keindahan alam. Telaga Remis juga merupakan tempat yang 
                                  populer untuk fotografi alam dan potret. Lokasinya dapat dicapai dengan kendaraan pribadi atau umum dari Kota Kuningan. 
                                  Telaga Remis adalah tempat yang sempurna untuk melarikan diri dari hiruk pikuk kota dan menikmati kedamaian serta keindahan 
                                  alam yang memukau di Jawa Barat.',
                'gambar'      => '1717511168_cfff13b5f13e71bf9000.jpeg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('wisata')->insertBatch($data);
    }
}
