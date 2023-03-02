<?php
namespace Kemkes\V2\Rest\DataTempatTidur;

use DBService\SystemArrayObject;

class DataTempatTidurEntity extends SystemArrayObject
{
	protected $fields = [
		"id_tt" => 1
        , "jumlah_ruang" => 1
        , "jumlah" => 1
        , 'terpakai' => 1
        , 'baru' => 1
        , 'tgl_kirim' => 1
        , 'kirim' => 1
        , 'response' => 1
	];
}