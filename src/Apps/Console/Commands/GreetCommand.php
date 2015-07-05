<?php
namespace Apps\Console\Commands;

use Cygnite\Helpers\Inflector;
use Cygnite\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

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
     * Configure command arguments
     *
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->addArgument('name', null, InputArgument::OPTIONAL, null)
            ->setHelp("<<<EOT
                The <info>greet</info> command is application console command
                <info>cygnite app:greet</info>
                EOT>>>"
            );
    }

    /**
     * Execute the command
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setInput($input)->setOutput($output);

        $name = $this->input->getArgument('name');

        $this->info("Hello $name!!".PHP_EOL);
    }
}
