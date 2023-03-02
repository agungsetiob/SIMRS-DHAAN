<?php
return [
    'service_manager' => [
        'factories' => [
            \Kemkes\V1\Rest\BedMonitor\BedMonitorResource::class => \Kemkes\V1\Rest\BedMonitor\BedMonitorResourceFactory::class,
            \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianResource::class => \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianResourceFactory::class,
            \Kemkes\V2\Rest\BedMonitor\BedMonitorResource::class => \Kemkes\V2\Rest\BedMonitor\BedMonitorResourceFactory::class,
            \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianResource::class => \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianResourceFactory::class,
            \Kemkes\V2\Rest\Pasien\PasienResource::class => \Kemkes\V2\Rest\Pasien\PasienResourceFactory::class,
            \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienResource::class => \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienResourceFactory::class,
            \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMResource::class => \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMResourceFactory::class,
            \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDResource::class => \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDResourceFactory::class,
            \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurResource::class => \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'kemkes.rpc.kunjungan' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/kunjungan[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rpc\\Kunjungan\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.bed-monitor' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/siranap/bedmonitor[/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rest\\BedMonitor\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.bor' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/bor[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rpc\\Bor\\Controller',
                        'action' => 'bor',
                    ],
                ],
            ],
            'kemkes.rpc.diagnosa' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/diagnosa[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rpc\\Diagnosa\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.pendaftaran-online' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/pendaftaran-online[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rpc\\PendaftaranOnline\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.reservasi-antrian' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/reservasi/antrian[/:reservasi_antrian_id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rest\\ReservasiAntrian\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.run' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/run[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V1\\Rpc\\Run\\Controller',
                        'action' => 'run',
                    ],
                ],
            ],
            'kemkes.rpc.sisrute' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/sisrute[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Sisrute\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.sitt' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/sitt[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\SITT\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.indikator' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemks/dashboard/indikator[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Indikator\\Controller',
                        'action' => 'indikator',
                    ],
                ],
            ],
            'kemkes.rpc.diagnosa-rujukan10-besar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/diagnosarujukan10besar[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\DiagnosaRujukan10Besar\\Controller',
                        'action' => 'diagnosaRujukan10Besar',
                    ],
                ],
            ],
            'kemkes.rpc.golongan-darah' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemks/dashboard/golongandarah[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\GolonganDarah\\Controller',
                        'action' => 'golonganDarah',
                    ],
                ],
            ],
            'kemkes.rpc.kematian' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/kematian[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Kematian\\Controller',
                        'action' => 'kematian',
                    ],
                ],
            ],
            'kemkes.rpc.penyakit10-besar' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/penyakit10besar[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Penyakit10Besar\\Controller',
                        'action' => 'penyakit10Besar',
                    ],
                ],
            ],
            'kemkes.rpc.rujukan' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard/rujukan[/:action][/:id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Rujukan\\Controller',
                        'action' => 'rujukan',
                    ],
                ],
            ],
            'kemkes.rpc.siranap' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/siranap[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Siranap\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.dashboard' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/dashboard[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Dashboard\\Controller',
                    ],
                ],
            ],
            'kemkes.rpc.referensi' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/referensi[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rpc\\Referensi\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.pasien' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/pasien[/:pasien_id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rest\\Pasien\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.diagnosa-pasien' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/diagnosa-pasien[/:diagnosa_pasien_id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rest\\DiagnosaPasien\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.data-kebutuhan-sdm' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/data-kebutuhan-sdm[/:data_kebutuhan_sdm_id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rest\\DataKebutuhanSDM\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.data-kebutuhan-apd' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/data-kebutuhan-apd[/:data_kebutuhan_apd_id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rest\\DataKebutuhanAPD\\Controller',
                    ],
                ],
            ],
            'kemkes.rest.data-tempat-tidur' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kemkes/data-tempat-tidur[/:data_tempat_tidur_id]',
                    'defaults' => [
                        'controller' => 'Kemkes\\V2\\Rest\\DataTempatTidur\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'kemkes.rpc.kunjungan',
            1 => 'kemkes.rest.bed-monitor',
            2 => 'kemkes.rpc.bor',
            3 => 'kemkes.rpc.diagnosa',
            4 => 'kemkes.rpc.pendaftaran-online',
            5 => 'kemkes.rest.reservasi-antrian',
            6 => 'kemkes.rpc.run',
            7 => 'kemkes.rpc.sisrute',
            8 => 'kemkes.rpc.sitt',
            9 => 'kemkes.rpc.indikator',
            10 => 'kemkes.rpc.diagnosa-rujukan10-besar',
            11 => 'kemkes.rpc.golongan-darah',
            12 => 'kemkes.rpc.kematian',
            13 => 'kemkes.rpc.penyakit10-besar',
            14 => 'kemkes.rpc.rujukan',
            15 => 'kemkes.rpc.siranap',
            16 => 'kemkes.rpc.dashboard',
            17 => 'kemkes.rpc.referensi',
            18 => 'kemkes.rest.pasien',
            19 => 'kemkes.rest.diagnosa-pasien',
            20 => 'kemkes.rest.data-kebutuhan-sdm',
            21 => 'kemkes.rest.data-kebutuhan-apd',
            22 => 'kemkes.rest.data-tempat-tidur',
        ],
        'default_version' => 2,
        'module_default_version' => [
            'kemkes' => 2,
        ],
    ],
    'api-tools-rest' => [
        'Kemkes\\V1\\Rest\\BedMonitor\\Controller' => [
            'listener' => \Kemkes\V1\Rest\BedMonitor\BedMonitorResource::class,
            'route_name' => 'kemkes.rest.bed-monitor',
            'route_identifier_name' => 'id',
            'collection_name' => 'bed_monitor',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'tanggal',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V1\Rest\BedMonitor\BedMonitorEntity::class,
            'collection_class' => \Kemkes\V1\Rest\BedMonitor\BedMonitorCollection::class,
            'service_name' => 'BedMonitor',
        ],
        'Kemkes\\V1\\Rest\\ReservasiAntrian\\Controller' => [
            'listener' => \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianResource::class,
            'route_name' => 'kemkes.rest.reservasi-antrian',
            'route_identifier_name' => 'reservasi_antrian_id',
            'collection_name' => 'reservasi_antrian',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianEntity::class,
            'collection_class' => \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianCollection::class,
            'service_name' => 'ReservasiAntrian',
        ],
        'Kemkes\\V2\\Rest\\BedMonitor\\Controller' => [
            'listener' => \Kemkes\V2\Rest\BedMonitor\BedMonitorResource::class,
            'route_name' => 'kemkes.rest.bed-monitor',
            'route_identifier_name' => 'id',
            'collection_name' => 'bed_monitor',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'tanggal',
            ],
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => \Kemkes\V2\Rest\BedMonitor\BedMonitorEntity::class,
            'collection_class' => \Kemkes\V2\Rest\BedMonitor\BedMonitorCollection::class,
            'service_name' => 'BedMonitor',
        ],
        'Kemkes\\V2\\Rest\\ReservasiAntrian\\Controller' => [
            'listener' => \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianResource::class,
            'route_name' => 'kemkes.rest.reservasi-antrian',
            'route_identifier_name' => 'reservasi_antrian_id',
            'collection_name' => 'reservasi_antrian',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianEntity::class,
            'collection_class' => \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianCollection::class,
            'service_name' => 'ReservasiAntrian',
        ],
        'Kemkes\\V2\\Rest\\Pasien\\Controller' => [
            'listener' => \Kemkes\V2\Rest\Pasien\PasienResource::class,
            'route_name' => 'kemkes.rest.pasien',
            'route_identifier_name' => 'pasien_id',
            'collection_name' => 'pasien',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'nomr',
                1 => 'loadFromWs',
                2 => 'kirim',
                3 => 'start',
                4 => 'limit',
                5 => 'query',
                6 => 'hapus',
                7 => 'statistik',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V2\Rest\Pasien\PasienEntity::class,
            'collection_class' => \Kemkes\V2\Rest\Pasien\PasienCollection::class,
            'service_name' => 'Pasien',
        ],
        'Kemkes\\V2\\Rest\\DiagnosaPasien\\Controller' => [
            'listener' => \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienResource::class,
            'route_name' => 'kemkes.rest.diagnosa-pasien',
            'route_identifier_name' => 'diagnosa_pasien_id',
            'collection_name' => 'diagnosa_pasien',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'nomr',
                1 => 'loadFromWs',
                2 => 'kirim',
                3 => 'hapus',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienEntity::class,
            'collection_class' => \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienCollection::class,
            'service_name' => 'DiagnosaPasien',
        ],
        'Kemkes\\V2\\Rest\\DataKebutuhanSDM\\Controller' => [
            'listener' => \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMResource::class,
            'route_name' => 'kemkes.rest.data-kebutuhan-sdm',
            'route_identifier_name' => 'data_kebutuhan_sdm_id',
            'collection_name' => 'data_kebutuhan_sdm',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'loadFromWs',
                1 => 'kirim',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMEntity::class,
            'collection_class' => \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMCollection::class,
            'service_name' => 'DataKebutuhanSDM',
        ],
        'Kemkes\\V2\\Rest\\DataKebutuhanAPD\\Controller' => [
            'listener' => \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDResource::class,
            'route_name' => 'kemkes.rest.data-kebutuhan-apd',
            'route_identifier_name' => 'data_kebutuhan_apd_id',
            'collection_name' => 'data_kebutuhan_apd',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'loadFromWs',
                1 => 'kirim',
                2 => 'query',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDEntity::class,
            'collection_class' => \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDCollection::class,
            'service_name' => 'DataKebutuhanAPD',
        ],
        'Kemkes\\V2\\Rest\\DataTempatTidur\\Controller' => [
            'listener' => \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurResource::class,
            'route_name' => 'kemkes.rest.data-tempat-tidur',
            'route_identifier_name' => 'data_tempat_tidur_id',
            'collection_name' => 'data_tempat_tidur',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'loadFromWs',
                1 => 'kirim',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurEntity::class,
            'collection_class' => \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurCollection::class,
            'service_name' => 'DataTempatTidur',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Kemkes\\V1\\Rpc\\Kunjungan\\Controller' => 'Json',
            'Kemkes\\V1\\Rest\\BedMonitor\\Controller' => 'Json',
            'Kemkes\\V1\\Rpc\\Bor\\Controller' => 'Json',
            'Kemkes\\V1\\Rpc\\Diagnosa\\Controller' => 'Json',
            'Kemkes\\V1\\Rpc\\PendaftaranOnline\\Controller' => 'Json',
            'Kemkes\\V1\\Rest\\ReservasiAntrian\\Controller' => 'Json',
            'Kemkes\\V1\\Rpc\\Run\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Kunjungan\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\BedMonitor\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Bor\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Diagnosa\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\PendaftaranOnline\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\ReservasiAntrian\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Run\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Sisrute\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\SITT\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Indikator\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\DiagnosaRujukan10Besar\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\GolonganDarah\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Kematian\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Penyakit10Besar\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Rujukan\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Siranap\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Dashboard\\Controller' => 'Json',
            'Kemkes\\V2\\Rpc\\Referensi\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\Pasien\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\DiagnosaPasien\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\DataKebutuhanSDM\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\DataKebutuhanAPD\\Controller' => 'Json',
            'Kemkes\\V2\\Rest\\DataTempatTidur\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Kemkes\\V1\\Rpc\\Kunjungan\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V1\\Rest\\BedMonitor\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
                3 => 'application/xml',
            ],
            'Kemkes\\V1\\Rpc\\Bor\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V1\\Rpc\\Diagnosa\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V1\\Rpc\\PendaftaranOnline\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V1\\Rest\\ReservasiAntrian\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Kemkes\\V1\\Rpc\\Run\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Kunjungan\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V2\\Rest\\BedMonitor\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
                3 => 'application/xml',
            ],
            'Kemkes\\V2\\Rpc\\Bor\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V2\\Rpc\\Diagnosa\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V2\\Rpc\\PendaftaranOnline\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/xml',
            ],
            'Kemkes\\V2\\Rest\\ReservasiAntrian\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Run\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Sisrute\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\SITT\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Indikator\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\DiagnosaRujukan10Besar\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\GolonganDarah\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Kematian\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Penyakit10Besar\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Rujukan\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Siranap\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Dashboard\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rpc\\Referensi\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Kemkes\\V2\\Rest\\Pasien\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DiagnosaPasien\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DataKebutuhanSDM\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DataKebutuhanAPD\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DataTempatTidur\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Kemkes\\V1\\Rpc\\Kunjungan\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
            ],
            'Kemkes\\V1\\Rest\\BedMonitor\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
            ],
            'Kemkes\\V1\\Rpc\\Bor\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
            ],
            'Kemkes\\V1\\Rpc\\Diagnosa\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
            ],
            'Kemkes\\V1\\Rpc\\PendaftaranOnline\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
                2 => 'application/xml',
            ],
            'Kemkes\\V1\\Rest\\ReservasiAntrian\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
            ],
            'Kemkes\\V1\\Rpc\\Run\\Controller' => [
                0 => 'application/vnd.kemkes.v1+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Kunjungan\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\BedMonitor\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Bor\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Diagnosa\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\PendaftaranOnline\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
                2 => 'application/xml',
            ],
            'Kemkes\\V2\\Rest\\ReservasiAntrian\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Run\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Sisrute\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\SITT\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Indikator\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\DiagnosaRujukan10Besar\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\GolonganDarah\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Kematian\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Penyakit10Besar\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Rujukan\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Siranap\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Dashboard\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rpc\\Referensi\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\Pasien\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DiagnosaPasien\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DataKebutuhanSDM\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DataKebutuhanAPD\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
            'Kemkes\\V2\\Rest\\DataTempatTidur\\Controller' => [
                0 => 'application/vnd.kemkes.v2+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \Kemkes\V1\Rest\BedMonitor\BedMonitorEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.bed-monitor',
                'route_identifier_name' => 'id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V1\Rest\BedMonitor\BedMonitorCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.bed-monitor',
                'route_identifier_name' => 'id',
                'is_collection' => true,
            ],
            \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.reservasi-antrian',
                'route_identifier_name' => 'reservasi_antrian_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V1\Rest\ReservasiAntrian\ReservasiAntrianCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.reservasi-antrian',
                'route_identifier_name' => 'reservasi_antrian_id',
                'is_collection' => true,
            ],
            \Kemkes\V2\Rest\BedMonitor\BedMonitorEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.bed-monitor',
                'route_identifier_name' => 'id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\BedMonitor\BedMonitorCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.bed-monitor',
                'route_identifier_name' => 'id',
                'is_collection' => '1',
            ],
            \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.reservasi-antrian',
                'route_identifier_name' => 'reservasi_antrian_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\ReservasiAntrian\ReservasiAntrianCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.reservasi-antrian',
                'route_identifier_name' => 'reservasi_antrian_id',
                'is_collection' => '1',
            ],
            \Kemkes\V2\Rest\Pasien\PasienEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.pasien',
                'route_identifier_name' => 'pasien_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\Pasien\PasienCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.pasien',
                'route_identifier_name' => 'pasien_id',
                'is_collection' => true,
            ],
            \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.diagnosa-pasien',
                'route_identifier_name' => 'diagnosa_pasien_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\DiagnosaPasien\DiagnosaPasienCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.diagnosa-pasien',
                'route_identifier_name' => 'diagnosa_pasien_id',
                'is_collection' => true,
            ],
            \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.data-kebutuhan-sdm',
                'route_identifier_name' => 'data_kebutuhan_sdm_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\DataKebutuhanSDM\DataKebutuhanSDMCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.data-kebutuhan-sdm',
                'route_identifier_name' => 'data_kebutuhan_sdm_id',
                'is_collection' => true,
            ],
            \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.data-kebutuhan-apd',
                'route_identifier_name' => 'data_kebutuhan_apd_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\DataKebutuhanAPD\DataKebutuhanAPDCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.data-kebutuhan-apd',
                'route_identifier_name' => 'data_kebutuhan_apd_id',
                'is_collection' => true,
            ],
            \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.data-tempat-tidur',
                'route_identifier_name' => 'data_tempat_tidur_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Kemkes\V2\Rest\DataTempatTidur\DataTempatTidurCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'kemkes.rest.data-tempat-tidur',
                'route_identifier_name' => 'data_tempat_tidur_id',
                'is_collection' => true,
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Kemkes\\V1\\Rpc\\Kunjungan\\Controller' => \Kemkes\V1\Rpc\Kunjungan\KunjunganControllerFactory::class,
            'Kemkes\\V1\\Rpc\\Bor\\Controller' => \Kemkes\V1\Rpc\Bor\BorControllerFactory::class,
            'Kemkes\\V1\\Rpc\\Diagnosa\\Controller' => \Kemkes\V1\Rpc\Diagnosa\DiagnosaControllerFactory::class,
            'Kemkes\\V1\\Rpc\\PendaftaranOnline\\Controller' => \Kemkes\V1\Rpc\PendaftaranOnline\PendaftaranOnlineControllerFactory::class,
            'Kemkes\\V1\\Rpc\\Run\\Controller' => \Kemkes\V1\Rpc\Run\RunControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Kunjungan\\Controller' => \Kemkes\V2\Rpc\Kunjungan\KunjunganControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Bor\\Controller' => \Kemkes\V2\Rpc\Bor\BorControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Diagnosa\\Controller' => \Kemkes\V2\Rpc\Diagnosa\DiagnosaControllerFactory::class,
            'Kemkes\\V2\\Rpc\\PendaftaranOnline\\Controller' => \Kemkes\V2\Rpc\PendaftaranOnline\PendaftaranOnlineControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Run\\Controller' => \Kemkes\V2\Rpc\Run\RunControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Sisrute\\Controller' => \Kemkes\V2\Rpc\Sisrute\SisruteControllerFactory::class,
            'Kemkes\\V2\\Rpc\\SITT\\Controller' => \Kemkes\V2\Rpc\SITT\SITTControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Indikator\\Controller' => \Kemkes\V2\Rpc\Indikator\IndikatorControllerFactory::class,
            'Kemkes\\V2\\Rpc\\DiagnosaRujukan10Besar\\Controller' => \Kemkes\V2\Rpc\DiagnosaRujukan10Besar\DiagnosaRujukan10BesarControllerFactory::class,
            'Kemkes\\V2\\Rpc\\GolonganDarah\\Controller' => \Kemkes\V2\Rpc\GolonganDarah\GolonganDarahControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Kematian\\Controller' => \Kemkes\V2\Rpc\Kematian\KematianControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Penyakit10Besar\\Controller' => \Kemkes\V2\Rpc\Penyakit10Besar\Penyakit10BesarControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Rujukan\\Controller' => \Kemkes\V2\Rpc\Rujukan\RujukanControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Siranap\\Controller' => \Kemkes\V2\Rpc\Siranap\SiranapControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Dashboard\\Controller' => \Kemkes\V2\Rpc\Dashboard\DashboardControllerFactory::class,
            'Kemkes\\V2\\Rpc\\Referensi\\Controller' => \Kemkes\V2\Rpc\Referensi\ReferensiControllerFactory::class,
        ],
    ],
    'api-tools-rpc' => [
        'Kemkes\\V1\\Rpc\\Kunjungan\\Controller' => [
            'service_name' => 'Kunjungan',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.kunjungan',
        ],
        'Kemkes\\V1\\Rpc\\Bor\\Controller' => [
            'service_name' => 'Bor',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.bor',
        ],
        'Kemkes\\V1\\Rpc\\Diagnosa\\Controller' => [
            'service_name' => 'Diagnosa',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.diagnosa',
        ],
        'Kemkes\\V1\\Rpc\\PendaftaranOnline\\Controller' => [
            'service_name' => 'PendaftaranOnline',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'kemkes.rpc.pendaftaran-online',
        ],
        'Kemkes\\V1\\Rpc\\Run\\Controller' => [
            'service_name' => 'Run',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.run',
        ],
        'Kemkes\\V2\\Rpc\\Kunjungan\\Controller' => [
            'service_name' => 'Kunjungan',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.kunjungan',
        ],
        'Kemkes\\V2\\Rpc\\Bor\\Controller' => [
            'service_name' => 'Bor',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.bor',
        ],
        'Kemkes\\V2\\Rpc\\Diagnosa\\Controller' => [
            'service_name' => 'Diagnosa',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.diagnosa',
        ],
        'Kemkes\\V2\\Rpc\\PendaftaranOnline\\Controller' => [
            'service_name' => 'PendaftaranOnline',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'kemkes.rpc.pendaftaran-online',
        ],
        'Kemkes\\V2\\Rpc\\Run\\Controller' => [
            'service_name' => 'Run',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.run',
        ],
        'Kemkes\\V2\\Rpc\\Sisrute\\Controller' => [
            'service_name' => 'Sisrute',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
            ],
            'route_name' => 'kemkes.rpc.sisrute',
        ],
        'Kemkes\\V2\\Rpc\\SITT\\Controller' => [
            'service_name' => 'SITT',
            'http_methods' => [
                0 => 'POST',
                1 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.sitt',
        ],
        'Kemkes\\V2\\Rpc\\Indikator\\Controller' => [
            'service_name' => 'Indikator',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.indikator',
        ],
        'Kemkes\\V2\\Rpc\\DiagnosaRujukan10Besar\\Controller' => [
            'service_name' => 'DiagnosaRujukan10Besar',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.diagnosa-rujukan10-besar',
        ],
        'Kemkes\\V2\\Rpc\\GolonganDarah\\Controller' => [
            'service_name' => 'GolonganDarah',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.golongan-darah',
        ],
        'Kemkes\\V2\\Rpc\\Kematian\\Controller' => [
            'service_name' => 'Kematian',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.kematian',
        ],
        'Kemkes\\V2\\Rpc\\Penyakit10Besar\\Controller' => [
            'service_name' => 'Penyakit10Besar',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.penyakit10-besar',
        ],
        'Kemkes\\V2\\Rpc\\Rujukan\\Controller' => [
            'service_name' => 'Rujukan',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.rujukan',
        ],
        'Kemkes\\V2\\Rpc\\Siranap\\Controller' => [
            'service_name' => 'Siranap',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'kemkes.rpc.siranap',
        ],
        'Kemkes\\V2\\Rpc\\Dashboard\\Controller' => [
            'service_name' => 'Dashboard',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.dashboard',
        ],
        'Kemkes\\V2\\Rpc\\Referensi\\Controller' => [
            'service_name' => 'Referensi',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'kemkes.rpc.referensi',
        ],
    ],
];
