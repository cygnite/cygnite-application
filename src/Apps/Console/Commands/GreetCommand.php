<?php
namespace Apps\Console\Commands;

use Cygnite\Helpers\Inflector;
use Cygnite\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

/**
 * Class GreetCommand
 *
 * @package Apps\Console\Commands
 */
class GreetCommand extends Command
{
    /**
     * Specify your command name
     *
     * @var string
     */
    protected $name = 'app:greet';

    /**
     * Describe command
     *
     * @var string
     */
    protected $description = 'My First Awesome Console Command!';

    /**
     * Console command arguments
     *
     * @var array
     */
    protected $arguments = [
        ['name', null, InputArgument::OPTIONAL, null],
    ];

    /**
     * Set help message for the command, this is optional method
     *
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setHelp("<<<EOT
                The <info>greet</info> command is application console command
                <info>cygnite app:greet</info>
                EOT>>>"
            );
    }

    /**
     * Execute the command
     *
     * @return mixed|void
     */
    public function process()
    {
        $name = $this->argument('name');

        $this->info("Hello $name!!".PHP_EOL);
    }
}
