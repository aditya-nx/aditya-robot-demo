<?php

namespace App\Cleaning;

use App\Robot\CleaningRobot;
use App\Cleaning\Contracts\IFloorCleaning;

/**
 * Class CarpetFloorService
 * @package App\Cleaning
 */
class CarpetFloorService implements IFloorCleaning
{
    

    /**
     * Total are to clean
     * @var
     */
    protected $area;

    /**
     *  Clean 1 meter square in 1 sec
     * @var int
     */
    protected $cleaningTime = 2;

    /**
     * Robot instance
     * @var CleaningRobot
     */
    protected $robotObject;

    /**
     * CarpetFloorIFloorCleaningService constructor.
     * @param Int $area
     */
    public function __construct(Int $area)
    {
        $this->area = $area;
        $this->robotObject = new CleaningRobot();
    }

    /**
     * @return string
     */
    public function cleanFloor()
    {
        echo " \n Total cleaning area: ".$this->area." mSq";
        echo " \n Per square meter time: ".$this->cleaningTime." secs";

        $area = $this->area;

        while($area) {
            $areaCanBeCovered = $this->robotObject->getWorkTimeInOneCharge() / $this->cleaningTime;
            $area = $area - $areaCanBeCovered;

            if($area < 0) {
                break;
            }

            echo " \n Remaining cleaning area: ".$area. " mSq";

            if ($area > 0) {
                echo " \n Robot is running out of battery. Charging initiated. It will take ".$this->robotObject->getFullChargeTime()." secs.";
                echo " \n Robot fully charged. Cleaning re-initiated.....";
            }
        }

        echo " \nCleaning completely done";
        return "Cleaning done";
    }

}