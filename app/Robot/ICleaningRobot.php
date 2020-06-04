<?php


namespace App\Robot;


interface ICleaningRobot
{
    public function getWorkTimeInOneCharge();
    public function getFullChargeTime();
}