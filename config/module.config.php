<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Swagger;

use MSBios\Factory\ModuleFactory;
use OpenApi\Annotations\OpenApi;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'swagger' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/swagger[/]',
                    'defaults' => [
                        'controller' => Controller\SwaggerController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'api' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'api[.:format]',
                            'defaults' => [
                                'action' => 'api',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\SwaggerController::class =>
                Factory\SwaggerControllerFactory::class,
        ]
    ],

    'service_manager' => [
        'factories' => [
            Module::class =>
                ModuleFactory::class,
            OpenApi::class =>
                Factory\OpenApiFactory::class
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    Module::class => [

        /**
         *
         */
        'directory' => null,

        /**
         *
         */
        'options' => [
            // ...
        ]
    ]
];
