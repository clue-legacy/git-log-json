#!/usr/bin/env php
<?php

use GitElephant\Repository;
use GitElephant\Objects\Commit;

$path = isset($argv[1]) ? $argv[1] : '.';

require __DIR__ . '/vendor/autoload.php';

$repo = new Repository($path);

$log = array();

foreach ($repo->getLog('HEAD', null, null, null) as $commit) {
    if ($commit instanceof Commit) { }
    
    $entry = array(
        'commit' => $commit->getSha(false),
        'parents' => $commit->getParents(),
//         'refs' => $commit->getRefs(),
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
    
    $log []= $entry;
}

echo json_encode($log) . PHP_EOL;
