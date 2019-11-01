<?php

namespace Google\Service;

use PHPUnit\Framework\TestCase;

/**
 * @dataProvider provideClassExists
 * @runTestsInSeparateProcesses
 */
class AutoloadTest extends TestCase
{
    /**
     * @dataProvider provideClassExists
     */
    public function testClassExists($class)
    {
        $this->assertTrue(class_exists($class));
    }

    public function provideClassExists()
    {
        return [
            ['\Google_Exception'],
            ['\Google_Model'],
            ['\Google_Service'],
            ['\Google_Collection'],
            ['\Google_Service_Resource'],
            ['\Google_Service_Speech'],
            ['\Google_Service_Speech_ListOperationsResponse'],
            ['\Google_Service_Speech_Resource_Operations'],
            ['\Google\Service\Speech\Model\ListOperationsResponse'],
            ['\Google\Service\Speech\Resource\Operations'],
        ];
    }
}