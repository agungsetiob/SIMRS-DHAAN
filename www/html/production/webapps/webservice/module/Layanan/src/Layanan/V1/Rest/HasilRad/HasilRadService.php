<?php
namespace Layanan\V1\Rest\HasilRad;

use DBService\DatabaseService;
use Laminas\Db\Sql\TableIdentifier;
use DBService\Service;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Expression;
use DBService\System;

use General\V1\Rest\Dokter\DokterService;

class HasilRadService extends Service
{
	private $dokter;
	
    public function __construct() {
        $this->table = DatabaseService::get('SIMpel')->get(new TableIdentifier("hasil_rad", "layanan"));
		$this->entity = new HasilRadEntity();
		
		$this->dokter = new DokterService();
    }
        
	public function simpan($data) {
		$data = is_array($data) ? $data : (array) $data;
		$this->entity->exchangeArray($data);
		
		$this->entity->set('TANGGAL', new \Laminas\Db\Sql\Expression('NOW()'));
		$cek = $this->load(array('TINDAKAN_MEDIS'=>$this->entity->get('TINDAKAN_MEDIS')));
		$data = $this->entity->getArrayCopy();
		if(count($cek) > 0) {
			$this->table->update($data, array("TINDAKAN_MEDIS" => $this->entity->get('TINDAKAN_MEDIS')));
		} else {
			$this->table->insert($data);
		}
		
		return $data;
	}
	
	public function load($params = array(), $columns = array('*'), $orders = array()) {
		$data = parent::load($params, $columns, $orders);
		foreach($data as &$entity) {
			
			$dokter = $this->dokter->load(array('ID' => $entity['DOKTER']));
			if(count($dokter) > 0) $entity['REFERENSI']['DOKTER'] = $dokter[0];
			
		}
		
		return $data;
	}
}