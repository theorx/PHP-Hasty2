<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/16/14
 * Time: 10:17 AM
 */
class TestDto extends Hasty2\DTO\DTOBase {

    public $name;

    public $age;

    public $length;

    /**
     * @param mixed $age
     */
    public function setAge($age) {

        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge() {

        return $this->age;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length) {

        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getLength() {

        return $this->length;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName() {

        return $this->name;
    }


}

class DTOBaseTest extends PHPUnit_Framework_TestCase {

    public function testDtoBaseToArray() {

        $testDto = new TestDto(['name' => 'test', 'length' => 195, 'age' => '25']);

        $this->assertEquals("test", $testDto->getName(), 'Inserted name was not in the object');
        $this->assertEquals("25", $testDto->getAge(), 'Inserted age was not in the object');
        $this->assertEquals("195", $testDto->getLength(), 'Inserted name was not in the object');

        $testDto->setName("John Doe");
        $this->assertEquals("John Doe", $testDto->getName(), "Name was not updated to John Doe");

        $params       = ['name' => 'Jane Doe', 'age' => '36', 'length' => '172'];
        $testDto      = new TestDto($params);
        $testDtoArray = $testDto->toArray();

        $this->assertEquals($params, $testDtoArray, 'toArray() did not return expected result');


    }

    public function testDTOBaseFillingViaPopulate() {

        $params  = ['name' => 'Jane Doe', 'age' => '36', 'length' => '172'];
        $testDto = new TestDto();
        $testDto->populate($params);
        $this->assertEquals("Jane Doe", $testDto->getName(), "Name was not populated via populate();");
    }

}