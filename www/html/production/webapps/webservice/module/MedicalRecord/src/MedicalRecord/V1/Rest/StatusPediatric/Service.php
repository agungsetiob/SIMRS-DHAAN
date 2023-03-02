<?php
namespace MedicalRecord\V1\Rest\StatusPediatric;

use DBService\DatabaseService;
use Laminas\Db\Sql\TableIdentifier;
use Laminas\Db\Sql\Select;
use DBService\System;
use DBService\Service as DBService;

class Service extends DBService {	
	public function __construct($includeReferences = true, $references = array()) {
		$this->config["entityName"] = "MedicalRecord\\V1\\Rest\\StatusPediatric\\StatusPediatricEntity";
		$this->table = DatabaseService::get("SIMpel")->get(new TableIdentifier("status_pediatric", "medicalrecord"));
		$this->entity = new StatusPediatricEntity();
	}		

	protected function queryCallback(Select &$select, &$params, $columns, $orders) {
		if(!System::isNull($params, 'STATUS')) {
			$status = $params['STATUS'];
			$params['status_pediatric.STATUS'] = $status;
			unset($params['STATUS']);
		}
		
		if(!System::isNull($params, 'HISTORY')) {
			unset($params['HISTORY']);
		
			$select->join(array('k'=>new TableIdentifier('kunjungan', 'pendaftaran')), 'k.NOMOR = status_pediatric.KUNJUNGAN', array());
			$select->join(array('p'=>new TableIdentifier('pendaftaran', 'pendaftaran')), 'p.NOMOR = k.NOPEN', array());
			
			if(!System::isNull($params, 'NORM')) {
				$norm = $params['NORM'];
				$params['p.NORM'] = $norm;
				unset($params['NORM']);
			}
		}
	}

	public function load($params = array(), $columns = array('*'), $edukasipasienkeluargas = array()) {
		$data = parent::load($params, $columns, $edukasipasienkeluargas);
		
		foreach($data as &$entity) {
			if($entity['STATUS_PEDIATRIC'] == 1){
				$status = 'Kurang Gizi';
			} else if($entity['STATUS_PEDIATRIC'] == 2){
				$status = 'Gizi Cukup';
			} else {
				$status = 'Lengkap';
			}
			
			$entity['REFERENSI']['STATUSPEDIATRI'] = $status;
		}
		
		return $data;
	}
}