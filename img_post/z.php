<?php
include("../../global_config_sql.php");
include("../../global_config.php");
include("../../global_fungsi.php");

function ubahNamaGambar($nama_gambar, $nama_gambar_baru) {
    // Pastikan file ada sebelum diubah namanya
    if (file_exists($nama_gambar)) {
        if (rename($nama_gambar, $nama_gambar_baru)) {
            return "Nama gambar berhasil diubah menjadi: " . $nama_gambar_baru;
        } else {
            return "Gagal mengubah nama gambar.";
        }
    } else {
        return "File tidak ditemukan.";
    }
}

$ambil = sql_ambil_custom_full("
  SELECT * FROM (
      SELECT
      *
      FROM post_list
  ) AS post_list
");
if($ambil != 'false'){
    foreach ($ambil as $data) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        // print_r($data); echo "<hr>";


        echo "$postlist_kode | $postlist_thumbnail <hr>";
        $nama_gambar = $postlist_thumbnail;
        $nama_gambar_baru = $postlist_kode.'.png';

        echo ubahNamaGambar($nama_gambar, $nama_gambar_baru);


    }
}


?>
