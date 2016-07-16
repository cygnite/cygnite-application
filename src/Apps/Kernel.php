<?php
namespace Apps;

use Cygnite\Foundation\Http\Kernel as HttpKernel;
use Cygnite\Container\Container;
use Cygnite\Foundation\Application;
use Cygnite\Base\Router\Router;

/**
 * Class Kernel
 * @package Apps
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Apps\Middleware\PipelineTestResolver::class,
    ];

    public function __construct(Application $app)
    {
        parent::__construct($app);
    }
}
