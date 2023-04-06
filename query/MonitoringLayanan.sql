BEGIN
	SET @sqlText = CONCAT('
		SELECT
		kunj.RUANGAN, ru.DESKRIPSI
		, SUM(kunj.BLM_TERIMA_KUNJUNGAN) BLM_TERIMA_KUNJUNGAN
		, SUM(kunj.BLM_FINAL_KUNJUNGAN) BLM_FINAL_KUNJUNGAN
		, SUM(kunj.BLM_TERIMA_RESEP) BLM_TERIMA_RESEP
		, SUM(kunj.BLM_TERIMA_LAB) BLM_TERIMA_LAB
		, SUM(kunj.BLM_TERIMA_RAD) BLM_TERIMA_RAD
		, SUM(kunj.BLM_TERIMA_KONSUL) BLM_TERIMA_KONSUL
		, SUM(kunj.BLM_TERIMA_MUTASI) BLM_TERIMA_MUTASI
		FROM
		master.ruangan ru
		,
		(
			SELECT 
			IF (knj.JENISKNJ=''PENGUNJUNG'',knj.TGLPENGUNJUNG,IF(knj.JENISKNJ=''KUNJUNGAN'',knj.TGLKUNJUNGAN,knj.TGLORDER)) TANGGAL
			, IF (knj.JENISKNJ=''PENGUNJUNG'',knj.RU_A,IF(knj.JENISKNJ=''KUNJUNGAN'',knj.RU_B,knj.RU_C)) RUANGAN
			, knj.BLM_TERIMA_KUNJUNGAN
			, knj.BLM_FINAL_KUNJUNGAN
			, knj.BLM_TERIMA_RESEP
			, knj.BLM_TERIMA_LAB
			, knj.BLM_TERIMA_RAD
			, knj.BLM_TERIMA_KONSUL
			, knj.BLM_TERIMA_MUTASI
			 FROM
			(
				SELECT 
				k.MASUK TGLKUNJUNGAN, orders.TANGGAL TGLORDER, p.TANGGAL TGLPENGUNJUNG
				, IF(tp.STATUS = 1,1,0) BLM_TERIMA_KUNJUNGAN
				, IF(k.STATUS = 1,1,0) BLM_FINAL_KUNJUNGAN
				, IF(orders.JENIS = ''Resep'',
					IF(orders.STATUS = 1,1,0)
					,0) BLM_TERIMA_RESEP
				, IF(orders.JENIS = ''Laboratorium'',
					IF(orders.STATUS = 1,1,0)
					,0) BLM_TERIMA_LAB
				, IF(orders.JENIS = ''Radiologi'',
					IF(orders.STATUS = 1,1,0)
					,0) BLM_TERIMA_RAD
				, IF(orders.JENIS = ''Konsul'',
					IF(orders.STATUS = 1,1,0)
					,0) BLM_TERIMA_KONSUL
				, IF(orders.JENIS = ''Mutasi'',
					IF(orders.STATUS = 1,1,0)
					,0) BLM_TERIMA_MUTASI
				, orders.JENIS
				, tp.RUANGAN RU_A, k.RUANGAN RU_B, orders.TUJUAN RU_C
				, IF(tp.STATUS = 1,''PENGUNJUNG'',IF(k.STATUS = 1,''KUNJUNGAN'', orders.JENIS)) JENISKNJ
				FROM pendaftaran.pendaftaran p
				LEFT JOIN pendaftaran.kunjungan k ON k.NOPEN = p.NOMOR AND k.STATUS !=0
				LEFT JOIN pendaftaran.tujuan_pasien tp ON tp.NOPEN = p.NOMOR
				LEFT JOIN
				(
						(SELECT res.NOMOR, res.KUNJUNGAN, res.TUJUAN, CONCAT(''Resep'') JENIS, res.TANGGAL, res.STATUS FROM layanan.order_resep res WHERE res.STATUS != 0)
						UNION ALL
						(SELECT lab.NOMOR, lab.KUNJUNGAN, lab.TUJUAN, CONCAT(''Laboratorium'') JENIS, lab.TANGGAL, lab.STATUS FROM layanan.order_lab lab WHERE lab.STATUS != 0)
						UNION ALL
						(SELECT rad.NOMOR, rad.KUNJUNGAN, rad.TUJUAN, CONCAT(''Radiologi'') JENIS, rad.TANGGAL, rad.STATUS FROM layanan.order_rad rad WHERE rad.STATUS != 0)
						UNION ALL
						(SELECT kon.NOMOR, kon.KUNJUNGAN, kon.TUJUAN, CONCAT(''Konsul'') JENIS, kon.TANGGAL, kon.STATUS FROM pendaftaran.konsul kon WHERE kon.STATUS != 0)
						UNION ALL
						(SELECT mut.NOMOR, mut.KUNJUNGAN, mut.TUJUAN, CONCAT(''Mutasi'') JENIS, mut.TANGGAL, mut.STATUS FROM pendaftaran.mutasi mut WHERE mut.STATUS != 0)
					) orders ON orders.KUNJUNGAN = k.NOMOR
			) knj WHERE knj.JENISKNJ IS NOT NULL
		) kunj WHERE kunj.RUANGAN = ru.ID AND kunj.TANGGAL BETWEEN ''',PAWAL,''' AND ''',PAKHIR,''' GROUP BY ru.ID
	');
	PREPARE stmt FROM @sqlText;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END