<?php


namespace Model;


class Elevator
{
    const MAX_FLOOR = 9;
    const MIN_FLOOR = 1;
    const MAX_PEOPLE = 4;
    const MIN_PEOPLE = 0;

    private $currentFloor;
    private $numberOfPeople;

    /**
     * Elevator constructor.
     */
    public function __construct()
    {
        $this->currentFloor = self::MIN_FLOOR;
        $this->numberOfPeople = 0;
    }


    /**
     * @return int
     */
    public function getCurrentFloor()
    {
        return $this->currentFloor;
    }

    /**
     * @param int $currentFloor
     * @return boolean
     */
    public function setCurrentFloor($currentFloor)
    {
        if ($currentFloor < self::MIN_FLOOR || $currentFloor > self::MAX_FLOOR) {
            return false;
        }
        $this->currentFloor = $currentFloor;
        return true;
    }

    /**
     * @return int
     */
    public function getNumberOfPeople()
    {
        return $this->numberOfPeople;
    }

    /**
     * @param int $numberOfPeople
     * @return boolean
     */
    public function setNumberOfPeople($numberOfPeople)
    {
        if ($numberOfPeople < self::MIN_PEOPLE || $numberOfPeople > self::MAX_PEOPLE) {
            return false;
        }
        $this->numberOfPeople = $numberOfPeople;
        return true;
    }

}