<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    public function run()
    {
        FAQ::create([
            'question' => 'Apa itu SendIt?',
            'answer'   => 'SendIt adalah aplikasi mobile untuk mempermudah pengiriman paket.',
        ]);

        FAQ::create([
            'question' => 'Bagaimana cara mengirim paket melalui SendIt?',
            'answer'   => 'Pilih layanan, isi detail, dan lacak pengiriman melalui aplikasi.',
        ]);

        FAQ::create([
            'question' => 'Bagaimana cara mengirim paket melalui SendIt?',
            'answer'   => 'Pilih layanan, isi detail, dan lacak pengiriman melalui aplikasi.',
        ]);

        /*
            {
            "question":
                "Apakah SendIt bisa digunakan oleh umum atau hanya untuk mahasiswa?",
            "answer":
                "Aplikasi SendIt dirancang terutama untuk mahasiswa di lingkungan kampus, namun bisa juga digunakan oleh siapa saja di area sekitar kampus yang membutuhkan layanan pengiriman."
            },
            {
            "question": "Bagaimana saya bisa melacak paket saya di SendIt?",
            "answer":
                "Fitur pelacakan di aplikasi SendIt memungkinkan Anda memantau status paket secara real-time. Setiap pembaruan status akan diinformasikan langsung melalui notifikasi aplikasi."
            },
            {
            "question":
                "Apakah ada batasan jenis barang yang bisa dikirim melalui SendIt?",
            "answer":
                "Ya, SendIt memiliki ketentuan terkait barang yang dapat dikirim. Barang-barang berbahaya atau ilegal tidak diperbolehkan, dan pengguna disarankan untuk memeriksa syarat dan ketentuan terkait batasan tersebut."
            },
            {
            "question": "Berapa biaya pengiriman melalui aplikasi SendIt?",
            "answer":
                "Biaya pengiriman bervariasi tergantung jarak pengiriman, ukuran, dan berat paket. Informasi lebih lanjut dapat dilihat langsung di aplikasi sebelum melakukan pengiriman."
            },
            {
            "question": "Apakah SendIt memiliki opsi pengiriman instan?",
            "answer":
                "Saat ini SendIt belum memiliki fitur tersebut, kedepannya akan kami kembangkan lagi."
            },
        */
    }
}
