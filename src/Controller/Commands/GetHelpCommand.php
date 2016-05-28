<?php


namespace Controller\Commands;


class GetHelpCommand implements Command
{

    public function execute($number)
    {
        return "-------------------------------------------------------------------" . PHP_EOL .
               "Welcome to help info" . PHP_EOL .
               "Enter addPeople command with number to add people in the elevator" . PHP_EOL .
               "Enter removePeople command with number to remove people from the elevator" . PHP_EOL .
               "Enter sendToFloor command with number to move on the floor you need" . PHP_EOL .
               "Enter getCurrentState command to see the state of the elevator" . PHP_EOL .
               "Enter getHelp command to see available commands " . PHP_EOL .
               "Enter exit command for exit" . PHP_EOL .
               "--------------------------------------------------------------------" . PHP_EOL;
    }
}