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
	* Initialize the Events
	*/
	public function __construct()
	{
		parent::boot($this);
	}

    /**
     * The event handler mappings for the application.
     * You can add number of event in below array, When ever
     * you try to call/fire specified method before and after event will
     * get executed
     *
     * <code>
     * 'event.name' => '\Apps\Resources\Extensions\Api@run'
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
     * $this->fire('event.name');
     * </code>
     *
     * @var array
     */
    protected $listen = [
        'event.api.run' => '\Apps\Resources\Extensions\Api@run',
    ];

    /**
     * Activate application event, return true/false
     *
     * @return bool
     */
    public function isAppEventEnabled()
    {
        return true;
    }

    /**
     * This events will get executed before and after
     * Application::bootApplication() method
     *
     * @return array
     */
    public function registerAppEvents()
    {
        return [
        'beforeBootingApplication' => '\Apps\Resources\Extensions\Api@payment',
        'afterBootingApplication' => '\Apps\Resources\Extensions\Api@paymentSuccess'
    ];
    }

    /**
     * Fire Registered events or set into container object
     * @param $container
     */
    public function register($container)
    {
        $container['event.api.run'] = $this->fire('event.api.run');
    }
}
