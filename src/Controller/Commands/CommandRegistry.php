<?php


namespace Controller\Commands;


use RuntimeException;

class CommandRegistry
{
    //array of commands and their names
    private $registry = [];

    /**
     * @param Command $command
     * @param string $name
     */
    public function add(Command $command, $name)
    {
        $this->registry[$name] = $command;
    }

    /**
     * get command by it name
     * @param string $name
     * @return mixed
     */
    public function getCommand($name)
    {
        if (!isset($this->registry[$name])) {
            throw new RuntimeException('Cannot find command ' . $name);
        }

        return $this->registry[$name];
    }
}
