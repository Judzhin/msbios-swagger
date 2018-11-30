<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Swagger\V1\Rest\Example;

use Zend\Mvc\Controller\AbstractRestfulController;

/**
 * Class ExampleController
 * @package MSBios\Swagger\V1\Rest\Example
 */
class ExampleController extends AbstractRestfulController
{
    /**
     * @param mixed $data
     * @return mixed
     */
    public function create($data)
    {
        return parent::create($data);
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * @param mixed $id
     * @param mixed $data
     * @return mixed
     */
    public function update($id, $data)
    {
        return parent::update($id, $data);
    }

}