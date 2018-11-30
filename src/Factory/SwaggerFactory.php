<?php

/**
 * @access protected
 * @author Judzhin Milew <info[woof-woof]msbios.com>
 */
namespace MSBios\Swagger\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Swagger\Options;
use Swagger\StaticAnalyser as SwaggerStaticAnalyser;
use Swagger\Analysis as SwaggerAnalysis;
use Swagger\Util as SwaggerUtil;

use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SwaggerFactory
 * @package MSBios\Swagger\Factory
 */
class SwaggerFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|void
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $options \SwaggerModule\Options\ModuleOptions */
        $options = $container->get(Options::class);

        $analyser = new SwaggerStaticAnalyser();
        $analysis = new SwaggerAnalysis();
        $processors = SwaggerAnalysis::processors();

        // Crawl directory and parse all files
        $paths = $options->getPaths();
        foreach ($paths as $directory) {
            $finder = SwaggerUtil::finder($directory);
            foreach ($finder as $file) {
                $analysis->addAnalysis($analyser->fromFile($file->getPathname()));
            }
        }
        // Post processing
        $analysis->process($processors);
        // Validation (Generate notices & warnings)
        $analysis->validate();

        // Pass options to analyzer
        $resourceOptions = $options->getResourceOptions();
        if (! empty($resourceOptions['defaultBasePath'])) {
            $analysis->swagger->basePath = $resourceOptions['defaultBasePath'];
        }
        if (! empty($resourceOptions['defaultHost'])) {
            $analysis->swagger->host = $resourceOptions['defaultHost'];
        }
        if (! empty($resourceOptions['schemes'])) {
            $analysis->swagger->schemes = $resourceOptions['schemes'];
        }

        return $analysis->swagger;

    }
}