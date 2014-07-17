<?php

class App_Config_ConfigTest extends PHPUnit_Framework_TestCase {


    /**
     *
     */
    public function testLoadConfiguration() {

        Hasty2\Config\Config::load(['testKey' => 'testKeyValue']);
        $this->assertEquals(
            'testKeyValue',
            Hasty2\Config\Config::get('testKey'),
            'Failed to load configuration from Config class via Config::get'
        );
    }

    /**
     * @expectedException \Exception
     */
    public function testMissingConfigurationParameter() {

        Hasty2\Config\Config::get('MissingKeyForSure');
    }

    /**
     *
     */
    public function testConfigurationReload() {

        $firstConfiguration = ['foo' => 'bar'];
        $secondConfiguration = ['bar' => 'foo'];

        Hasty2\Config\Config::load($firstConfiguration);
        Hasty2\Config\Config::load($secondConfiguration);

        $this->assertArrayHasKey('bar', Hasty2\Config\Config::get(), 'Loading second configuration failed.');
    }

    /**
     *
     */
    public function testMissingConfigurationParameterExceptionMessage() {

        try {
            Hasty2\Config\Config::get('testMissingParam');
        } catch (Exception $e) {
            $this->assertEquals(
                "Configuration parameter: testMissingParam is missing.",
                $e->getMessage(),
                "Exception message is invalid."
            );
        }

    }


}