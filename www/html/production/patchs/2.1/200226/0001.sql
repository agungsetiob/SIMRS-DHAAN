USE aplikasi;

UPDATE `aplikasi`.`modules` SET `HAVE_CHILD`='1' WHERE  `ID`='1109';

REPLACE INTO `modules` (`ID`, `NAMA`, `LEVEL`, `DESKRIPSI`, `STATUS`, `CLASS`, `ICON_CLS`, `HAVE_CHILD`) VALUES ('110901', 'FINAL HASIL', 3, '', 1, NULL, NULL, 0);
REPLACE INTO `modules` (`ID`, `NAMA`, `LEVEL`, `DESKRIPSI`, `STATUS`, `CLASS`, `ICON_CLS`, `HAVE_CHILD`) VALUES ('110902', 'BATAL FINAL HASIL', 3, '', 1, NULL, NULL, 0);
