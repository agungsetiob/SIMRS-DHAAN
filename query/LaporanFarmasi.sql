BEGIN

	
	DECLARE vRUANGAN VARCHAR(11);
	DECLARE vKATEGORI VARCHAR(11);
      
   SET vRUANGAN = CONCAT(RUANGAN,'%');
   SET vKATEGORI = CONCAT(KATEGORI,'%');
   
	SET @sqlText = CONCAT('
		SELECT inst.PPK, inst.NAMA NAMAINST, inst.ALAMAT ALAMATINST,lf.ID NOMOR, lf.KUNJUNGAN, lf.TANGGAL, master.getNamaLengkapPegawai(mp.NIP) NAMADOKTER
		   , CONCAT(''LAPORAN PELAYANAN '',UPPER(jk.DESKRIPSI),'' PER PASIEN'') JENISLAPORAN
			, rg.DESKRIPSI RUANG, r.DESKRIPSI ASALPENGIRIM, master.getNamaLengkap(ps.NORM) NAMAPASIEN, DATE_FORMAT(ps.TANGGAL_LAHIR,''%d-%m-%Y'') TGLLAHIR
			, ps.ALAMAT,LPAD(ps.NORM,8,''0'') NORM
			, CONCAT(''RESEP '',UPPER(jenisk.DESKRIPSI)) JENISRESEP, master.getHeaderKategoriBarang(''',KATEGORI,''') KATEGORI
			, ib.NAMA NAMAOBAT, lf.JUMLAH, rt.JUMLAH JMLOBAT, rt.TARIF, (rt.JUMLAH * rt.TARIF) TOTAL,  CONCAT(lf.RACIKAN,lf.GROUP_RACIKAN) RACIKAN, lf.`STATUS` STATUSLAYANAN
			, IF(',CARABAYAR,'=0,''Semua'',(SELECT ref.DESKRIPSI FROM master.referensi ref WHERE ref.ID=',CARABAYAR,' AND ref.JENIS=10)) CARABAYARHEADER
			, master.getHeaderLaporan(''',RUANGAN,''') INSTALASI
			, IF(',BARANG,'=0,''Semua'',(SELECT br.NAMA FROM inventory.barang br WHERE br.ID=',BARANG,')) BARANGHEADER
			
			FROM layanan.farmasi lf
				  LEFT JOIN master.referensi ref ON lf.ATURAN_PAKAI=ref.ID AND ref.JENIS=41
				  LEFT JOIN pembayaran.rincian_tagihan rt ON lf.ID=rt.REF_ID AND rt.JENIS=4
				, pendaftaran.kunjungan pk
			     LEFT JOIN layanan.order_resep o ON o.NOMOR=pk.REF
			     LEFT JOIN master.dokter md ON o.DOKTER_DPJP=md.ID
				  LEFT JOIN master.pegawai mp ON md.NIP=mp.NIP
				  LEFT JOIN master.ruangan rg ON pk.RUANGAN=rg.ID AND rg.JENIS=5
				  LEFT JOIN master.referensi jk ON rg.JENIS_KUNJUNGAN=jk.ID AND jk.JENIS=15
				  LEFT JOIN pendaftaran.kunjungan asal ON o.KUNJUNGAN=asal.NOMOR
				  LEFT JOIN master.ruangan r ON asal.RUANGAN=r.ID AND r.JENIS=5
			     LEFT JOIN master.referensi jenisk ON r.JENIS_KUNJUNGAN=jenisk.ID AND jenisk.JENIS=15
			   , pendaftaran.pendaftaran pp
				  LEFT JOIN master.pasien ps ON pp.NORM=ps.NORM
				  LEFT JOIN pendaftaran.penjamin pj ON pp.NOMOR=pj.NOPEN
				, inventory.barang ib
				  LEFT JOIN inventory.kategori ik ON ib.KATEGORI=ik.ID
				, (SELECT mp.NAMA, ai.PPK, mp.ALAMAT
					FROM aplikasi.instansi ai
						, master.ppk mp
					WHERE ai.PPK=mp.ID) inst
			WHERE  lf.`STATUS`=2 AND lf.KUNJUNGAN=pk.NOMOR AND pk.`STATUS` IN (1,2)
				AND pk.NOPEN=pp.NOMOR AND lf.FARMASI=ib.ID AND rg.JENIS_KUNJUNGAN=',LAPORAN,'
				AND lf.TANGGAL BETWEEN ''',TGLAWAL,''' AND ''',TGLAKHIR,'''
				AND pk.RUANGAN LIKE ''',vRUANGAN,'''
				',IF(CARABAYAR=0,'',CONCAT(' AND pj.JENIS=',CARABAYAR)),'
				',IF(KATEGORI=0,'',CONCAT(' AND ik.ID LIKE ''',VKATEGORI,'''')),'
				',IF(BARANG=0,'',CONCAT(' AND ib.ID=',BARANG)),'
		#	ORDER BY lf.RACIKAN, lf.GROUP_RACIKAN		
			');

	PREPARE stmt FROM @sqlText;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

END