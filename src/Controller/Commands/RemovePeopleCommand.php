<?php


namespace Controller\Commands;

use Model\Elevator;

class RemovePeopleCommand implements Command
{
    protected $elevator;

    /**
     * RemovePeopleCommand constructor.
     * @param Elevator $elevator
     *
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    public function execute($numberOfPeople)
    {
        $peopleLeft = $this->elevator->getNumberOfPeople() - $numberOfPeople;
        if($this->elevator->setNumberOfPeople($peopleLeft) == false){
            return "Sorry, there is no so many people. Cann't execute this command." . PHP_EOL;
        }
        return "Command has executed successfully" . PHP_EOL;
    }
}