USE aplikasi;

UPDATE `aplikasi`.`modules` SET `HAVE_CHILD`='1' WHERE  `ID`='22';

REPLACE INTO `modules` (`ID`, `NAMA`, `LEVEL`, `DESKRIPSI`, `STATUS`, `CLASS`, `ICON_CLS`, `HAVE_CHILD`) VALUES ('2202', 'TAMPILKAN IDENTITAS PASIEN', 2, '', 1, NULL, NULL, 0);
