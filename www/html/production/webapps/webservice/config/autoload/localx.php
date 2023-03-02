<?php
return [
    'db' => [
        'adapters' => [
            'SIMpelAdapter' => [
                'database' => 'aplikasi',
                'driver' => 'PDO_Mysql',
                'hostname' => '127.0.0.1',
                'username' => 'simrsgos',
                'password' => 'S!MRSGos2',
            ],
            'BPJSAdapter' => [
                'driver' => 'Pdo_Mysql',
                'database' => 'bpjs',
                'hostname' => '127.0.0.1',
                'username' => 'simrsgos',
                'password' => 'S!MRSGos2',
            ],
            'INACBGAdapter' => [
                'driver' => 'Pdo_Mysql',
                'database' => 'inacbg',
                'hostname' => '127.0.0.1',
                'username' => 'simrsgos',
                'password' => 'S!MRSGos2',
            ],
            'WinacomAdapter' => [
                'database' => 'lis_bridging',
                'driver' => 'PDO_Mysql',
                'hostname' => '',
                'username' => '',
                'password' => '',
            ],
        ],
    ],
    'services' => [
        'SIMpelService' => [
            'instansi' => [
                'id' => '6310015',
            ],
            'plugins' => [
                'ReportService' => [
                    'route' => [
                        '127.0.0' => '127.0.0.1',
						'192.168.33' => '192.168.33.200',
						'simrsgos.kemkes.go' => 'simrsgos.kemkes.go.id',
                    ],
                    'url' => 'http://[HOST]/webservice/report?requestReport=',
                    'key' => 'b14ba5e1e0073125e3fe2d228a35b04fc7c39caae08245e3ca46049358b73e43',
                ],
                'BPJS' => [
                    'url' => 'http://127.0.0.1/webservice/bpjservice',
                    'koders' => '1712R001',
                ],
                'INACBG' => [
                    'url' => 'http://127.0.0.1/webservice/inacbgservice',
                    'koders' => '6310015',
                ],
                'INASIS' => [
                    'url' => 'http://127.0.0.1/webservice/inasiservice',
                    'koders' => '6310015',
                ],
                'SP2RS' => [
                    'url' => 'http://127.0.0.1/webservice/sp2rservice',
                    'koders' => '6310015',
                ],
            ],
        ],
        'ReportService' => [
            'db' => [
                'driver' => 'com.mysql.cj.jdbc.Driver',
                'driverManager' => 'java.sql.DriverManager',
                'connectionStrings' => [
                    0 => 'jdbc:mysql://127.0.0.1:3306/aplikasi?user=simrsgos&password=S!MRSGos2&serverTimezone=Asia/Makassar&useSSL=false',
                ],
                \locale::class => [
                    0 => 'in',
                    1 => 'ID',
                ],
            ],
            'javaBridge' => [
                'location' => 'http://127.0.0.1:8080/JavaBridge/java/Java.inc',
            ],
            'key' => 'b14ba5e1e0073125e3fe2d228a35b04fc7c39caae08245e3ca46049358b73e43',
        ],
        'BPJService' => [
            'url' => '[ALAMAT WEB SERVICE BPJS]',
			'id' => '[CONSUMER ID DARI BPJS]',
			'key' => '[CONSUMER SECRET DARI BPJS]',
			'timezone' => 'UTC',
			'addTime' => 'PT0M',
			'koders' => '1712R001',
			/* untuk menggunakan versi ws bpjs 
			 * name : Nama Web Service
			 * value: "" = "Sep" | "VClaim" = "VClaim"
			 */
			'name' => 'VClaim',
			'version' => '1.1',
			
			/* Advance Feature */
			'aplicares' => [
				'url' => 'http://dvlp.bpjs-kesehatan.go.id:8081/DevWsLokalRest',
				'id' => '{CONSUMER SECRET DARI BPJS}',
				'key' => '{CONSUMER SECRET DARI BPJS}',
				'addTime' => 'PT0M',
			],
        ],
        'INACBGService' => [
			'koders' => '6310015',
			"5" => [
				"non spesifik" => [
					'url' => 'http://[IP/HOST]/E-Klaim/ws.php',
					'user' => '[USER NAME INACBG | OPTIONAL]',
					'pwd' => '[PASSWORD INACBG | OPTIONAL]',
					'koders' => '6310015',
					'key' => '[ENCRYPT KEY DARI APLIKASI E-KLAIM]',
					'kode_tarif' => '[KODE TARIF RS]',
					'version' => [
						"minor" => 2
					]
				],
			],
        ],
		
        'KemkesService' => [
            'url' => 'http://sirs.yankes.kemkes.go.id/sirsservice',
            'id' => '6310015',
            'key' => '[PASSWORD DARI KEMKES]',
            'Sisrute' => [
                'url' => "http://api.dvlp.sisrute.kemkes.go.id",
                'id' => '6310015',
                'pass' => '[PASSWORD DARI KEMKES]'
            ]
        ],		
        'PusdatinService' => [
            'wsdl' => 'http://192.168.90.65:8181/kemenkes/adminduk/?wsdl',
            'username' => '',
            'token' => '',
        ],
		/* Advance Feature */
        'JasaRaharjaService' => [
            'host' => 'http://ohs.jasaraharja.co.id',
            'port' => 7777,
            'uri' => '/JasaRaharja',
            'koders' => '{KODE RS DARI JASARAHARJA}',
        ],
		/* Advance Feature */
        'PACService' => [
            'api' => [
                'url' => 'http://172.16.21.58:8042/',
                'username' => 'remote',
                'password' => 'bismillah',
                'viewer' => 'osimis-viewer/app/index.html',
            ],
        ],
		
		/* DEPRICATED SERVICE */
        'INASIService' => [
            'url' => 'http://dvlp.bpjs-kesehatan.go.id:8081/devwslokalrest',
            'id' => '{CONSUMER ID DARI BPJS}',
            'key' => '{CONSUMER SECRET DARI BPJS}',
            'timezone' => 'UTC',
            'addTime' => 'PT0M',
            'koders' => '6310015',
        ],
		/* DEPRICATED SERVICE */
        'SP2RService' => [
            'url' => 'http://sirs.buk.depkes.go.id/sirsservice',
            'id' => '[ID/KODE RS KEMKES]',
            'key' => '{KEY DIBERIKAN OLEH SIRS BUK YANKES KEMKES}',
            'timezone' => 'UTC',
            'addTime' => 'PT0M',
            'koders' => '6310015',
        ],
    ],
];
