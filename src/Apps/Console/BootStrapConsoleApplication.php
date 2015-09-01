<?php
namespace Apps\Console;

/**
 * Class BootStrapConsoleApplication
 *
 * @package Apps\Resources\Console
 */
class BootStrapConsoleApplication
{
    private $commands = [
        'Apps\Console\Commands\GreetCommand',
    ];

    /**
     * We will register all console commands here
     *
     * @return array
     */
    public function register()
    {
        return $this->commands;
    }
}
