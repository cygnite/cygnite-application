<?php
namespace Apps\Console;

use Cygnite\Console\CraftApplication;

/**
 * Class Bootstrap
 *
 * @package Apps\Console
 */
class Kernel extends CraftApplication
{
    /**
     * Add craft console commands in the array stack
     *
     * @var array
     */
    protected $commands = [
        'Apps\Console\Commands\GreetCommand',
    ];

    public function __construct($consoleApp, $version)
    {
        parent::__construct($consoleApp, $version);
    }

    /**
     * We will register all console commands here
     *
     * @return array
     */
    protected function setCommands()
    {
        return $this->register($this->commands);
    }

    /**
     * Run registered commands
     *
     * @return $this|void
     */
    public function run()
    {
        $this->setCommands()
            ->execute();
    }
}
