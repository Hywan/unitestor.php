<?php

$report = $script->addDefaultReport();
$runner->setBootstrapFile(__DIR__ . DIRECTORY_SEPARATOR .  '.bootstrap.atoum.php');
$runner->addTestsFromDirectory(__DIR__ . DIRECTORY_SEPARATOR);
