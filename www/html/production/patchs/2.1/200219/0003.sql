USE aplikasi;

UPDATE `aplikasi`.`modules` SET `HAVE_CHILD`='1' WHERE  `ID`='1912';

REPLACE INTO `modules` (`ID`, `NAMA`, `LEVEL`, `DESKRIPSI`, `STATUS`, `CLASS`, `ICON_CLS`, `HAVE_CHILD`) VALUES ('191201', 'HANYA MENAMPILKAN TARIF', 3, '', 1, NULL, NULL, 0);
