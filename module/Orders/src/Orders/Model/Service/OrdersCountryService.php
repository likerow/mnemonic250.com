<?php

namespace Orders\Model\Service;
use Util\Model\Service\Base\AbstractService;

class OrdersCountryService extends AbstractService 
{
    public function getAll()
    {
        return $this->_repository->getAll();
    }
   
   	public function getById($countryId)
	{
	    return $this->_repository->getBy(array('country_id=?' => $countryId), TRUE);
	}
}