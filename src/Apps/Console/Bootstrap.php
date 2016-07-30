<?php
namespace Apps\Console;

use Cygnite\Console\CraftApplication;

/**
 * Class Bootstrap
 *
 * @package Apps\Console
 */
class Bootstrap extends CraftApplication
{
    /**
     * Add craft console commands in the array stack
     *
     * @var array
     */
    protected $commands = [
        'Apps\Console\Commands\GreetCommand',
    ];

    public function __construct($version)
    {
        parent::__construct($version);
    }

    /**
     * We will register all console commands here
     *
     * @return array
     */
    public function setCommands()
    {
        parent::register($this->commands);
    }

    /**
     * Run registered commands
     *
     * @return $this|void
     */
    public function run()
    {
        $this->setCommands();

        parent::run();

        return $this;
    }
}
