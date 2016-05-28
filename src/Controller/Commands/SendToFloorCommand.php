<?php


namespace Controller\Commands;

use Model\Elevator;

class SendToFloorCommand implements Command
{
    protected $elevator;

    /**
     * SendToFloorCommand constructor.
     * @param $elevator
     *
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    /**
     * move elevator to the chosen floor
     * @param int $floor
     * @return string
     */
    public function execute($floor)
    {
        if ($this->elevator->setCurrentFloor($floor) == false) {
            return "Sorry, there is no such floor. Please try again with the correct floor: [1 ; 9] " . PHP_EOL;
        }
        return "Command has executed successfully" . PHP_EOL;
    }
}