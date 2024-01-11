<?php

namespace App\Models;

class Entry
{
    private static $diary_entries = [
        [
            "title" => "Judul Entry Pertama",
            "slug" => "judul-entry-pertama",
            "author" => "Bryan Amadeus",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis repellendus exercitationem incidunt enim ut deserunt nemo dignissimos temporibus. Commodi, maiores laudantium! In similique cumque unde dolorem, corrupti architecto nam illum facere corporis, nesciunt facilis laboriosam blanditiis impedit tempore porro esse excepturi doloremque, eaque assumenda qui sapiente nobis. Officia ducimus fuga obcaecati natus perferendis ut illum culpa, porro perspiciatis ratione error laudantium amet vero ipsum, sit provident expedita in ex aspernatur eos. Ut, rerum vel? Ad quos tenetur magnam quo distinctio."
        ],
        [
            "title" => "Judul Entry Kedua",
            "slug" => "judul-entry-kedua",
            "author" => "Furina de Fontaine",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque laudantium nulla nisi! Odit ipsam, dicta minima adipisci dolorem fugiat repellat suscipit voluptates, odio culpa vitae perferendis recusandae veritatis vel? Facere aliquam praesentium debitis fuga illum corrupti cumque, ea nisi repellendus neque autem reprehenderit minus, provident voluptatum mollitia, ipsa vel eius laborum dolores! Voluptate accusamus iusto fugiat, molestiae rem obcaecati placeat officiis facilis vitae tempore? Debitis repudiandae ex labore commodi, blanditiis tenetur. Reprehenderit officiis totam, dignissimos explicabo nobis debitis possimus labore in quae iusto expedita ea assumenda at iure quo quaerat eum libero! Veniam esse perspiciatis omnis fugit vitae quis. Eius?"
        ]
    ];

    public static function all()
    {
        return collect(self::$diary_entries);
    }

    public static function find($slug)
    {
        // ini SEBELUM collect, harus manual cari entry yang slugnya sesuai

        // foreach(self::$diary_entries as $entry) {
        //     if($entry["slug"] === $slug) {
        //         return $entry;
        //     }
        // }

        $entries = static::all(); //dapetin semua entries
        return $entries->firstWhere('slug', $slug); //cari entry pertama yg slug-nya sama
    }
}
