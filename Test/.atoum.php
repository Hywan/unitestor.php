<?php

$report = $script->addDefaultReport();
$runner->setBootstrapFile(__DIR__ . DIRECTORY_SEPARATOR .  '.bootstrap.atoum.php');
$script->addTestAllDirectory(__DIR__ . DIRECTORY_SEPARATOR);
