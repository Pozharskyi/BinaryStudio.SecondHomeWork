<?php


namespace Controller\Commands;

use Model\Elevator;

class AddPeopleCommand implements Command
{
    protected $elevator;

    /**
     * AddPeopleCommand constructor.
     * @param Elevator $elevator
     *
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    public function execute($numberOfPeople)
    {
        $allPeople = $this->elevator->getNumberOfPeople() + $numberOfPeople;
        if(!$this->elevator->setNumberOfPeople($allPeople)){

            return "Sorry, wrong number of people in the elevator. Elevator has blocked " . PHP_EOL;
        }
        return "Command has executed successfully." . PHP_EOL;
    }
}