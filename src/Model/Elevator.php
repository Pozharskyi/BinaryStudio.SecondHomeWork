<?php


namespace Model;


class Elevator
{
    /**
     * Limits
     */
    const MAX_FLOOR = 9;
    const MIN_FLOOR = 1;
    const MAX_PEOPLE = 4;
    const MIN_PEOPLE = 0;

    private static $_instance = null;
    private $currentFloor;
    private $numberOfPeople;

    /**
     * Elevator constructor.
     * prevent instance via "new"
     */
    private function __construct()
    {
        $this->currentFloor = self::MIN_FLOOR;
        $this->numberOfPeople = 0;
    }

    /**
     * prevent the instance for being cloned
     */
    private function __clone()
    {
    }

    /**
     * prevent the instance for being unserialized
     */
    private function __wakeup()
    {
    }

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
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
     * @return bool
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
     * @return int number of people in the elevator
     */
    public function getNumberOfPeople()
    {
        return $this->numberOfPeople;
    }

    /**
     * @param int $numberOfPeople
     * @return bool
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