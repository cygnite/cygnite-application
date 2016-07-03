<?php
/*
 * This file is part of the Cygnite package.
 *
 * (c) Sanjoy Dey <dey.sanjoy0@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Apps\Middleware\Events;

use Cygnite\Foundation\Application;
use Cygnite\Base\EventHandler\Event as EventListener;

/**
 * Class Event
 *
 * @package Apps\Middleware\Events
 */
class Event extends EventListener
{
    /**
     * The event handler mappings for the application.
     * You can add number of event in below array, When ever
     * you try to call/fire specified method before and after event will
     * get executed
     *
     * <code>
     * 'event.api.run' => '\Apps\Resources\Extensions\Api@run'
     *
     *  will execute
     *
     *  public function beforeRun() {}
     *
     *  public function run() {}
     *
     *  public function afterRun() {}
     *
     *
     * $this->fire('event.api.run');
     * </code>
     *
     * @var array
     */
    protected $listen = [
        'event.api.run' => '\Apps\Resources\Extensions\Api@run',
    ];

    /**
     * This events will get executed before and after
     * Application::bootApplication() method
     *
     * @var array
     */
    public static $appEvents = [
        'beforeBootingApplication' => '\Apps\Resources\Extensions\Api@payment',
        'afterBootingApplication' => '\Apps\Resources\Extensions\Api@paymentSuccess'
    ];

    public static $activateAppEvent = false;

    public function register($app)
    {
        parent::boot();
        $app['event.api.run'] = $this->fire('event.api.run');
    }
}
