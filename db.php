<?php 

$db = new SQLite3('cms.db');

if(!$db) {
  echo $db->lastErrorMsg();
} else {
//   echo "Open database success...\n";
} 

// BUAT TABEL CMS
$db->query("CREATE TABLE IF NOT EXISTS cms (id INTEGER PRIMARY KEY, nama_produk TEXT NOT NULL, harga INTEGER NOT NULL, deskripsi TEXT NULL)");


// HAPUS TABEL CMS
// $db->query("DROP TABLE cms");