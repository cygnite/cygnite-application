<?php
namespace Apps;

use Cygnite\Foundation\Application;
use Cygnite\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel
 * @package Apps
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     * Add Middleware namespace in the array
     *
     * @var array
     */
    protected $middleware = [
        //'Apps\Middleware\AccessMiddleware',
    ];

    public function __construct(Application $app)
    {
        parent::__construct($app);
    }
}
