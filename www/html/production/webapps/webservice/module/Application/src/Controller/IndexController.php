<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\ApiTools\Admin\Module as AdminModule;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        if (class_exists('\Laminas\ApiTools\Admin\Module', false)) {
            return $this->redirect()->toRoute('api-tools/ui');
        } else {            
			return $this->redirect()->toRoute('api-tools/documentation');
		}
        return new ViewModel();
    }
}
