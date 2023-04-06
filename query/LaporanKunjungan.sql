BEGIN

	
	
   DECLARE vTanggalAwal DATE;
   DECLARE vTanggalAkhir DATE;
   DECLARE vRUANGAN VARCHAR(11);
      
   SET vTanggalAwal = DATE_FORMAT(TGLAWAL,'%Y-%m-%d');
   SET vTanggalAkhir = DATE_FORMAT(TGLAKHIR,'%Y-%m-%d');
   SET vRUANGAN = CONCAT(RUANGAN,'%');
	
	SET @sqlText = CONCAT('
	SELECT tgl.*, a.*, INST.NAMAINST, INST.ALAMATINST, CONCAT(''LAPORAN KUNJUNGAN '',UPPER(jk.DESKRIPSI),'' PER HARI'') JENISLAPORAN
			, master.getHeaderLaporan(''',RUANGAN,''') INSTALASI
			, IF(',CARABAYAR,'=0,''Semua'',(SELECT ref.DESKRIPSI FROM master.referensi ref WHERE ref.ID=',CARABAYAR,' AND ref.JENIS=10)) CARABAYARHEADER
		FROM master.tanggal tgl
			  LEFT JOIN (
								SELECT DATE(tk.MASUK) TANGGAL 
										, COUNT(pd.NOMOR) JUMLAH
										, SUM(IF(tk.BARU=1,1,0)) BARU
										, SUM(IF(tk.BARU=0,1,0)) LAMA
										, SUM(IF(ref.ID=1,1,0)) UMUM
										, SUM(IF(ref.ID=2,1,0)) JKN
										, SUM(IF(ref.ID=3,0,0)) INHEALTH
										, SUM(IF(ref.ID=4,0,0)) JKD
										, SUM(IF(iks.ID IS NOT NULL,1,0)) IKS
										, SUM(IF(p.JENIS_KELAMIN=1,1,0)) LAKILAKI
										, SUM(IF(p.JENIS_KELAMIN=2,1,0)) PEREMPUAN
									FROM master.pasien p
										, pendaftaran.pendaftaran pd
										  LEFT JOIN pendaftaran.penjamin pj ON pd.NOMOR=pj.NOPEN
										  LEFT JOIN master.referensi ref ON pj.JENIS=ref.ID AND ref.JENIS=10
										  LEFT JOIN master.ikatan_kerja_sama iks ON ref.ID=iks.ID AND ref.JENIS=10
										  LEFT JOIN master.kartu_asuransi_pasien kap ON pd.NORM=kap.NORM AND ref.ID=kap.JENIS AND ref.JENIS=10
										  LEFT JOIN pendaftaran.surat_rujukan_pasien srp ON pd.RUJUKAN=srp.ID AND srp.`STATUS`!=0
										  LEFT JOIN master.ppk ppk ON srp.PPK=ppk.ID
										, pendaftaran.kunjungan tk
										, master.ruangan jkr
									WHERE p.NORM=pd.NORM AND pd.NOMOR=tk.NOPEN  AND tk.RUANGAN=jkr.ID AND jkr.JENIS=5 AND jkr.JENIS_KUNJUNGAN=',LAPORAN,'
											AND tk.MASUK BETWEEN ''',TGLAWAL,''' AND ''',TGLAKHIR,''' AND pd.STATUS IN (1,2) AND tk.STATUS IN (1,2)
											AND tk.RUANGAN LIKE ''',vRUANGAN,'''
											',IF(CARABAYAR=0,'',CONCAT(' AND pj.JENIS=',CARABAYAR)),'
									GROUP BY DATE(tk.MASUK) ) a ON a.TANGGAL=tgl.TANGGAL
				, (SELECT p.NAMA NAMAINST, p.ALAMAT ALAMATINST
					FROM aplikasi.instansi ai
						, master.ppk p
					WHERE ai.PPK=p.ID) INST
			  , (SELECT DESKRIPSI FROM master.referensi jk WHERE jk.ID=',LAPORAN,' AND jk.JENIS=15) jk
			  
		WHERE tgl.TANGGAL BETWEEN ''',vTanggalAwal,''' AND ''',vTanggalAkhir,'''
	GROUP BY tgl.TANGGAL');


	PREPARE stmt FROM @sqlText;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

END