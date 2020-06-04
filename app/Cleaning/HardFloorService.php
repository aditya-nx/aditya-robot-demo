<?php

namespace App\Cleaning;

use App\Robot\CleaningRobot;
use App\Cleaning\Contracts\IFloorCleaning;

/**
 * Class HardFloorService
 * @package App\Cleaning
 */
class HardFloorService implements IFloorCleaning
{
    /**
     * Takes 1 sec to cleaning 1 meter square
     * @var int
     */
    protected $cleaningTimePerMeterSquare = 1;

    /**
     * Area to be cleaned
     * @var
     */
    protected $area;

    /**
     * Robot instance
     * @var CleaningRobot
     */
    protected $robotObject;

    public function __construct($area)
    {
        $this->area = $area;
        $this->robotObject = new CleaningRobot();
    }

    /**
     * Performs cleaning
     * @return string
     */
    public function cleanFloor()
    {
        echo " \n Total cleaning area: ".$this->area." mSq";
        echo " \n Per square meter time: ".$this->cleaningTimePerMeterSquare." secs";
        $area = $this->area;

        while( $area) {
            $area = $area - ($this->robotObject->getWorkTimeInOneCharge() / $this->cleaningTimePerMeterSquare);

            if($area < 0) {
                break;
            }

            echo " \n Remaining cleaning area:".$area. " mSq";

            if ($area > 0) {
                echo " \n Robot is running out of battery. Charging initiated. It will take ".$this->robotObject->getFullChargeTime()." secs";
                echo " \n Robot fully charged. Cleaning re-initiated.....";
            }
        }

        echo " \nCleaning completely done";
        return "Cleaning done";

    }

}