USE aplikasi;

UPDATE `aplikasi`.`modules` SET `HAVE_CHILD`='1' WHERE  `ID`='1908';

REPLACE INTO `modules` (`ID`, `NAMA`, `LEVEL`, `DESKRIPSI`, `STATUS`, `CLASS`, `ICON_CLS`, `HAVE_CHILD`) VALUES ('190801', 'HANYA MENAMPILKAN BARANG DAN HARGA', 3, '', 1, NULL, NULL, 0);
