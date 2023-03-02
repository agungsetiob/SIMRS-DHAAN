<?php
namespace General\V1\Rest\DokterRuangan;

use Laminas\ApiTools\ApiProblem\ApiProblem;
use DBService\Resource;

class DokterRuanganResource extends Resource
{
	public function __construct() {
		parent::__construct();
		$this->service = new DokterRuanganService();
	}
	
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        if(isset($data->ALL)) {
            if($data->ALL) {
                if(isset($data->RUANGAN)) return $this->service->tambahSemuaDokter($data->RUANGAN);
            }
        }
        
		$result = null;
		
        if(is_array($data->DOKTER)) {
            foreach($data->DOKTER as $dr) {
                 $cek = $this->service->load(array(
                    'RUANGAN' => $data->RUANGAN,
                    'DOKTER' => $dr
                ));
                
                if(COUNT($cek) > 0){
                    $record = $cek[0];
                    
                    $result = $this->service->simpan(array(
                        'ID' =>$record['ID'],
                        'STATUS' => 1
                    ));
                    
                }else{
                    $result = $this->service->simpan(array(
                        'RUANGAN' => $data->RUANGAN,
                        'DOKTER' => $dr
                    ));
                }
            }
             
            return array(
				'data' => $result,
                'success' => $result ? true : false
            );
        }
        
		return $this->service->simpan($data);
        //return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {        
		$params->limit = 5000;
		$total = $this->service->getRowCount($params);
		$data = $this->service->load($params);	
		
		return array(
			"success" => $total > 0 ? true : false,
			"total" => $total,
			"data" => $data
		);
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
      
		$this->service->simpan($data);
	
        //return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
