<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Swagger\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Swagger\Controller\SwaggerController;
use OpenApi\Annotations\OpenApi;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SwaggerControllerFactory
 * @package MSBios\Swagger\Factory
 */
class SwaggerControllerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return SwaggerController|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SwaggerController($container->get(OpenApi::class));
    }
}
