<?php

namespace App\Robot;

class CleaningRobot
{
    /**
     * It takes 30 secs to fully charge the robot
     * @var int
     */
    protected static $fullChargeTime = 30;

    /** In one charge robot can clean for 60 secs
     * @var int
     */
    protected static $workTimeInOneCharge = 60;

    public function __construct()
    {

    }

    public function getWorkTimeInOneCharge()
    {
        return self::$workTimeInOneCharge;
    }

    public function getFullChargeTime()
    {
        return self::$fullChargeTime;
    }


}