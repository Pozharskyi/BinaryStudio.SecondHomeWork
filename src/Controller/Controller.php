<?php


namespace Controller;

use Model\Elevator;
use Controller\Commands\AddPeopleCommand;
use Controller\Commands\CommandRegistry;
use Controller\Commands\GetCurrentStateCommand;
use Controller\Commands\getHelpCommand;
use Controller\Commands\RemovePeopleCommand;
use Controller\Commands\SendToFloorCommand;

class Controller
{
    const EMPTY_PARAMETER = -1;
    protected $elevator;
    protected $registry;

    /**
     * Controller constructor.
     * @param Elevator $elevator
     * 
     */
    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;

        $this->registryCommands($elevator);
    }

    public function processUser()
    {
        echo $this->registry->getCommand("getHelp")->execute(self::EMPTY_PARAMETER);
        while (true) {

            $line = trim(fgets(STDIN));
            $input = preg_split("/[\s,]+/", $line);

            if (!$this->isInputValid($input)) {
                echo "Wrong command. Try again please" . PHP_EOL;

            } elseif ($input[0] == "exit") {
                break;

            } elseif (count($input) == 1) {
                echo $this->registry->getCommand($input[0])->execute(self::EMPTY_PARAMETER);

            } elseif (count($input) == 2) {
                echo $this->registry->getCommand($input[0])->execute($input[1]);
            }
        }
        echo "Thank you for using our elevator :)" . PHP_EOL;
    }

    private function isInputValid($input)
    {
        if (($input[0] == "getHelp" || $input[0] == "getCurrentState" || $input[0] == "exit") && (count($input) == 1)) {
            return true;
        }
        if (($input[0] == "addPeople" || $input[0] == "removePeople" || $input[0] == "sendToFloor") && (count($input) == 2) && (is_numeric($input[1]))) {
            return true;
        }
        return false;
    }

    /**
     * @param Elevator $elevator
     */
    private function registryCommands(Elevator $elevator)
    {
        $this->registry = new CommandRegistry();
        $this->registry->add(new AddPeopleCommand($elevator), "addPeople");
        $this->registry->add(new GetCurrentStateCommand($elevator), "getCurrentState");
        $this->registry->add(new RemovePeopleCommand($elevator), "removePeople");
        $this->registry->add(new SendToFloorCommand($elevator), "sendToFloor");
        $this->registry->add(new GetHelpCommand(), "getHelp");
    }

}