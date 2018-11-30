<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBiosTest\Swagger;

use MSBios\Swagger\Module;
use PHPUnit\Framework\TestCase;

/**
 * Class ModuleTest
 * @package MSBiosTest\Authentication
 */
class ModuleTest extends TestCase
{
    /** @var Module */
    protected $instance;

    /**
     * @constructor
     */
    protected function setUp()
    {
        parent::setUp();
        $this->instance = new Module;
    }

    /**
     *
     */
    public function testGetConfig()
    {
        $this->assertInternalType('array', $this->instance->getConfig());
    }

    /**
     *
     */
    public function testGetAutoloaderConfig()
    {
        $this->assertInternalType('array', $this->instance->getAutoloaderConfig());
    }
}
