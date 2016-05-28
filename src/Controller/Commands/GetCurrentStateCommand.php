<?php


namespace Controller\Commands;

use Model\Elevator;

class GetCurrentStateCommand implements Command
{
    protected $elevator;

    /**
     * GetCurrentStateCommand constructor.
     * @param Elevator $elevator
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    public function execute($number)
    {
        $currentFloor = $this->elevator->getCurrentFloor();
        $numberOfPeople = $this->elevator->getNumberOfPeople();
        return "Floor:" . $currentFloor . "People:" . $numberOfPeople . PHP_EOL;
    }
}