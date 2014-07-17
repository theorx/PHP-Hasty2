<?php

class EnvTest extends PHPUnit_Framework_TestCase {

    public function testSetEnvironment() {

        $environments = ['DEV', 'TEST', 'LIVE'];

        foreach ($environments as $environment) {
            Hasty2\Env::setEnvironment($environment);
            $this->assertEquals(
                $environment,
                Hasty2\Env::getEnvironment(),
                sprintf("Setting and getting environment as '%s' failed", $environment)
            );
        }
    }

    /**
     * @expectedException Exception
     */
    public function testInvalidEnvironmentNameException() {

        Hasty2\Env::setEnvironment('InvalidEnvironmentNameForSure');
    }

}