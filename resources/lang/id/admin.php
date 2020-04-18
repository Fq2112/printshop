<?php
return [
    "header" => [
        "message" => [
            "head" => "Pesan",
            "empty" => "Tampaknya tidak ada pesan yang ditemukan 3 hari ini...",
            "footer" => "Semua Pesan",
        ],
    ],
    "sidebar" => [
        "head" => "Admin ".env('APP_NAME'),
        "inbox" => "Kotak Masuk",
        "blog-category" => "Kategori",
        "blog-post" => "Postingan",
        "blog-gallery" => "Galeri",
        "footer" => "SITUS UTAMA",
    ],
    "dashboard" => [
        "card-stats" => [
            "customer" => "Pelanggan",
            "admin" => "Admin",
            "order" => "Pesanan",
        ],
        "card-traffic" => [
            "head" => "Traffic Pengunjung",
            "period" => "Filter periode",
        ],
        "card-blog" => [
            "head" => "Sunting Postingan",
            "title" => "Judul",
            "title-capt" => "Tulis judulnya di sini...",
            "action" => "Aksi",
            "category" => "Kategori",
            "content" => "Isi",
            "content-capt" => "Mohon untuk menuliskan sesuatu mengenai postingan ini!",
        ],
        "card-contact" => [
            "head" => "Pelanggan butuh bantuan"
        ],
    ],
    "tables" => [
        "blog-category" => "Tabel Kategori Blog",
        "blog-post" => "Tabel Postingan Blog",
        "blog-gallery" => "Tabel Galeri Blog [:param]",
    ],
    "months" => [
        "jan" => "Januari",
        "feb" => "Februari",
        "mar" => "Maret",
        "apr" => "April",
        "mei" => "Mei",
        "jun" => "Juni",
        "jul" => "Juli",
        "aug" => "Agustus",
        "sep" => "September",
        "oct" => "Oktober",
        "nov" => "November",
        "dec" => "Desember",
    ],
    "alert" => [
        "feature-fail" => "Fitur ini hanya berfungsi ketika Anda masuk sebagai :param.",
        "mass-delete" => ":param berhasil dihapus!",
        "blog-category" => [
            "create" => "Kategori blog [:param] berhasil dibuat!",
            "update" => "Kategori blog [:param] berhasil diperbarui!",
            "delete" => "Kategori blog [:param] berhasil dihapus!",
        ],
        "blog" => [
            "create" => "Blog [:param] berhasil dibuat!",
            "update" => "Blog [:param] berhasil diperbarui!",
            "delete" => "Blog [:param] berhasil dihapus!",
        ],
        "blog-gallery" => [
            "update" => ":param berhasil ditambahkan ke galeri blog [:param2]!",
            "delete" => "File [:param] berhasil dihapus dari galeri blog [:param2]!",
            "mass-delete" => ":param berhasil dihapus dari galeri blog [:param2]!",
        ],
    ]
];
