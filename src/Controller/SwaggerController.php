<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Swagger\Controller;

use OpenApi\Annotations\OpenApi;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class SwaggerController
 * @package MSBios\Swagger\Controller
 */
class SwaggerController extends AbstractActionController
{
    /** @var OpenApi */
    protected $openApi;

    /**
     * SwaggerController constructor.
     * @param OpenApi $openApi
     */
    public function __construct(OpenApi $openApi)
    {
        $this->openApi = $openApi;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return (new ViewModel)
            ->setTerminal(true);
    }

    /**
     * @return ViewModel
     */
    public function apiAction()
    {
        header('Content-Type: application/json');
        echo $this->openApi->toJson();
        die();
    }
}
