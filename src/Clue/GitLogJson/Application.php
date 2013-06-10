<?php

namespace Clue\GitLogJson;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Application as BaseApplication;

// http://symfony.com/doc/current/components/console/single_command_tool.html
class Application extends BaseApplication
{
    public function __construct()
    {
        parent::__construct('git-log-json', '@package_version@');

        $this->add(new Command());
    }

    protected function getCommandName(InputInterface $input)
    {
        return 'dump';
    }

    /**
     * Overridden so that the application doesn't expect the command
     * name to be the first argument.
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        // clear out the normal first argument, which is the command name
        $inputDefinition->setArguments();

        return $inputDefinition;
    }
}
