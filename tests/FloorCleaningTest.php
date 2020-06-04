<?php

use PHPUnit\Framework\TestCase;
use App\CleaningService;

class FloorCleaningTest extends TestCase
{
    static $HARD = 'hard';
    static $CARPET = 'carpet';
    
    public function testInvalidArea(): void
    {
        $this->expectException(TypeError::class);
        new CleaningService('carpet', 'xyz');
    }

    public function testInvalidFloor(): void
    {
        $this->expectException(ErrorException::class);
        $instance = new CleaningService(60, 'noFloor');
        $instance->setCleaningObject();
    }

    public function testCorrectParamters(): void
    {
        $instance = new CleaningService(60, self::$CARPET);
        $instance->setCleaningObject();
        $response = $instance->startCleaningProcess();
        $this->assertEquals('Cleaning done', $response);
    }
}