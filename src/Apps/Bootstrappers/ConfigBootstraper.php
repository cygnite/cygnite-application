<?php
namespace Apps\Bootstrappers;

use Cygnite\Helpers\Config;
use Cygnite\Bootstrappers\Paths;
use Cygnite\Container\ContainerAwareInterface;
use Cygnite\Bootstrappers\BootstrapperInterface;

/**
 * Class ConfigBootstraper.
 * @package Apps\Bootstrappers
 */
class ConfigBootstraper implements BootstrapperInterface
{
    private $container;

    protected $paths;

    /**
     * @param ContainerAwareInterface $container
     * @param Paths $paths
     */
    public function __construct(ContainerAwareInterface $container, Paths $paths)
    {
        $this->container = $container;
        $this->paths = $paths;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        // Do some configuration
    }
}
