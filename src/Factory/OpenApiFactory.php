<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Swagger\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Swagger\Module;
use OpenApi\Annotations\OpenApi;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Stdlib\ArrayUtils;

/**
 * Class OpenApiFactory
 * @package MSBios\Swagger\Factory
 */
class OpenApiFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|OpenApi
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        /** @var array $defaultOptions */
        $defaultOptions = $container->get(Module::class);

        /** @var array $options */
        $options = is_null($options)
            ? $defaultOptions : ArrayUtils::merge($defaultOptions, $options);

        return \OpenApi\scan($options['directory'], $options['options']);
    }
}
