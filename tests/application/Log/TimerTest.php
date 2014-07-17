<?php

class TimerTest extends PHPUnit_Framework_TestCase {


    public function testTimerInstantiate() {

        $timer = new Hasty2\Log\Timer();

        $this->assertTrue(is_object($timer), 'Could not instantiate timer object');
    }

    /**
     * @expectedException \Exception
     */
    public function testTimerStartWithoutStopGetMillisecondsException() {

        $timer = new Hasty2\Log\Timer;
        $timer->start("testTimer");
        $timer->getMilliSeconds("testTimer");
    }


    /**
     * @expectedException \Exception
     */
    public function testTimerStartWithoutStopGetSecondsException() {

        $timer = new Hasty2\Log\Timer;
        $timer->start("testTimer");
        $timer->getSeconds("testTimer");
    }

    public function testTimerTimeElapsedTime() {

        $timer = new Hasty2\Log\Timer();

        $timer->start("testTimeElapsedTime");
        usleep(2500);
        $timer->stop("testTimeElapsedTime");

        $time = $timer->getMilliSeconds("testTimeElapsedTime");

        $this->assertGreaterThan(0, $time, 'Timer did not work');
        echo "[Timer Test] Elapsed time: " . $time . "\r\n";

    }

}