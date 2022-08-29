<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function acquaintance()
{
//    require_once __DIR__ . '/../vendor/autoload.php';
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
