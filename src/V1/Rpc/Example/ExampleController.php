<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Swagger\V1\Rpc\Example;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class ExampleController
 * @package MSBios\Swagger\V1\Rpc\Example
 *
 * @OA\Info(title="MSBios Swagger Module", version="0.1")
 */
class ExampleController extends AbstractActionController
{
    /**
     * @OA\Get(
     *     path="/api/resource.json",
     *     @OA\Response(response="200", description="An example resource")
     * )
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
}