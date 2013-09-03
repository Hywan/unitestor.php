<?php

from('Hoathis')
-> import('Atoum.Test.~');

abstract class Test extends \Hoathis\Atoum\Test {

    public function __construct ( \atoum\score   $score = null,
                                  \atoum\locale  $locale = null,
                                  \atoum\adapter $adapter = null ) {

        $this->setTestNamespace('\\Test');

        return parent::__construct($score, $locale, $adapter);
    }

    protected function beforeTestMethodPraspel ( $testMethod ) {

        $this->getPraspelAsserter()->setWith('undefined method');

        return;
    }
}
