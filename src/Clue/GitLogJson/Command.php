<?php

namespace Clue\GitLogJson;

use Symfony\Component\Console\Input\InputOption;

use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Output\OutputInterface;
use GitElephant\Repository;
use GitElephant\Objects\Commit;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Datetime;

class Command extends BaseCommand
{
    protected function configure()
    {
        $this->setName('dump')
             ->setDescription('Greet someone')
             ->addArgument('repository', InputArgument::OPTIONAL, 'Path to repository to dump', '.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('repository');

        $repo = new Repository($path);

        $log = array();

        foreach ($repo->getLog('HEAD', null, null, null) as $commit) {
            /* @var $commit Commit */

            $logs []= array(
                'commit' => $commit->getSha(false),
                'parents' => $commit->getParents(),
                'author' => array(
                    'name' => $commit->getAuthor()->getName(),
                    'email' => $commit->getAuthor()->getEmail(),
                    'date' => $commit->getDatetimeAuthor()->format(DateTime::ISO8601)
                ),
                'committer' => array(
                    'name' => $commit->getCommitter()->getName(),
                    'email' => $commit->getCommitter()->getEmail(),
                    'date' => $commit->getDatetimeCommitter()->format(DateTime::ISO8601)
                ),
                'message' => $commit->getMessage()->getFullMessage()
            );
        }

        $output->writeln(json_encode($log));
    }
}