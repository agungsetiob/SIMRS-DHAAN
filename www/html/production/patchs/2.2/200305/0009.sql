-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.11 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Membuang struktur basisdata untuk layanan
USE `layanan`;

-- membuang struktur untuk procedure layanan.storeOrderResepDiFarmasi
DROP PROCEDURE IF EXISTS `storeOrderResepDiFarmasi`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `storeOrderResepDiFarmasi`(
	IN `PID` CHAR(21),
	IN `POLEH` SMALLINT
)
BEGIN
	DECLARE DATA_NOT_FOUND INT DEFAULT FALSE;
	DECLARE VIDFARMASI CHAR(11);
	DECLARE VKUNJUNGAN CHAR(19);
	DECLARE VFARMASI SMALLINT;
	DECLARE VJUMLAH DECIMAL(6,2);
	DECLARE VATURAN_PAKAI VARCHAR(250);
	DECLARE VKETERANGAN VARCHAR(250);
	DECLARE VRACIKAN TINYINT;
	DECLARE VGROUP_RACIKAN TINYINT;
	DECLARE VPETUNJUK_RACIKAN VARCHAR(250);
	DECLARE VJUMLAH_RACIKAN DECIMAL(10,0);
	
	DECLARE CRDATA CURSOR FOR
		SELECT c.NOMOR, b.FARMASI, b.JUMLAH, b.ATURAN_PAKAI, b.KETERANGAN
			, b.RACIKAN, b.GROUP_RACIKAN, b.PETUNJUK_RACIKAN, b.JUMLAH_RACIKAN
		  FROM layanan.order_resep a,		  
		  	 	 layanan.order_detil_resep b,
		  	 	 pendaftaran.kunjungan c
		 WHERE a.NOMOR = PID
		   AND a.STATUS = 2
		   AND a.NOMOR = c.REF
		   AND a.NOMOR = b.ORDER_ID;
		   
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET DATA_NOT_FOUND = TRUE;
	
	OPEN CRDATA;
		DATA_END: LOOP
			FETCH CRDATA INTO VKUNJUNGAN, VFARMASI, VJUMLAH, VATURAN_PAKAI, VKETERANGAN
				, VRACIKAN, VGROUP_RACIKAN, VPETUNJUK_RACIKAN, VJUMLAH_RACIKAN;
		
			IF DATA_NOT_FOUND THEN
				UPDATE temp.temp SET ID = 0 WHERE ID = 0;
				LEAVE DATA_END;
			END IF;	
			
			BEGIN
				SET VIDFARMASI = generator.generateIdFarmasi(DATE(NOW()));
				
				INSERT INTO layanan.farmasi(ID, KUNJUNGAN, FARMASI, JUMLAH, ATURAN_PAKAI, KETERANGAN
					, RACIKAN, GROUP_RACIKAN, PETUNJUK_RACIKAN, JUMLAH_RACIKAN
					, TANGGAL, OLEH)
					VALUES(VIDFARMASI, VKUNJUNGAN, VFARMASI, VJUMLAH, VATURAN_PAKAI, VKETERANGAN
					, VRACIKAN, VGROUP_RACIKAN, VPETUNJUK_RACIKAN, VJUMLAH_RACIKAN
					, NOW(), POLEH);
					
				UPDATE layanan.order_detil_resep
				   SET REF = VIDFARMASI
				 WHERE ORDER_ID = PID
				   AND FARMASI = VFARMASI
					AND (REF IS NULL OR REF = '');
			END;
		END LOOP;
	CLOSE CRDATA;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;