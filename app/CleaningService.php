<?php

namespace App;

use App\Cleaning\CarpetFloorService;
use App\Cleaning\HardFloorService;

/**
 * Class FloorCleaning
 * @package App
 */
class CleaningService
{
    static $HARD = 'hard';
    static $CARPET = 'carpet';

    protected $area;
    protected $floor;
    protected $cleaningObject;
    /**
     * It takes 30 secs to fully charge the robot
     * @var int
     */
    protected $chargeTime = 30;

    /** In one charge robot can clean for 60 secs
     * @var int
     */
    protected $workCapacitySeconds = 60;

    public function __construct(Int $area = null, String $floor = null)
    {
        $this->floor = $floor;
        $this->area = $area;
    }

    public function setCleaningObject()
    {
        if ($this->area <= 0) {
            throw new \ErrorException('Invalid Area');
        }

        if ($this->floor && !in_array(strtolower($this->floor), [ self::$CARPET, self::$HARD])) {
            throw new \ErrorException('Invalid Floor');
        }

        echo " \n --Cleaning Service Started-- ";

        if (strtolower($this->floor) === self::$CARPET) {
            $this->cleaningObject = new CarpetFloorService($this->area);
        }

        if (strtolower($this->floor) === self::$HARD) {
            $this->cleaningObject = new HardFloorService($this->area);
        }
        
    }

    public function startCleaningProcess()
    {
        return $this->cleaningObject->cleanFloor();
    }

}
