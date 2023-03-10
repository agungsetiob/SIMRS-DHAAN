<?php
namespace Kemkes\V2\Rest\DataTempatTidur;

use DBService\DatabaseService;
use Laminas\Db\Sql\TableIdentifier;
use DBService\Service as DBService;
use Kemkes\db\referensi\tempat_tidur\Service as TempatTidurService;

class Service extends DBService {
	private $tempatTidur;

	protected $references = array(
		'TempatTidur' => true,
	);

	public function __construct($includeReferences = true, $references = array()) {
        $this->config["entityName"] = "Kemkes\\V2\\Rest\\DataTempatTidur\\DataTempatTidurEntity";
		$this->config["entityId"] = "id_tt";
		$this->config["autoIncrement"] = false;
		$this->table = DatabaseService::get('SIMpel')->get(new TableIdentifier("data_tempat_tidur", "kemkes"));
		$this->entity = new DataTempatTidurEntity();

		$this->setReferences($references);
		
		$this->includeReferences = $includeReferences;

		if($includeReferences) {
			if($this->references['TempatTidur']) $this->tempatTidur = new TempatTidurService();
        }
	}
	
	public function load($params = array(), $columns = array('*'), $orders = array()) {
		$data = parent::load($params, $columns, $orders);
		
		if($this->includeReferences) {
            foreach($data as &$entity) {
                if($this->references['TempatTidur']) {
                    $referensi = $this->tempatTidur->load(array('kode_tt' => $entity['id_tt']));
                    if(count($referensi) > 0) $entity['REFERENSI']['TempatTidur'] = $referensi[0];
				}	
            }
        }
		
		return $data;
	}
}