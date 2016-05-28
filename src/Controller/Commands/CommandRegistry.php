<?php


namespace Controller\Commands;


use RuntimeException;

class CommandRegistry
{
    private $registry = [];

    public function add(Command $command, $name)
    {
        $this->registry[$name] = $command;
    }

    public function getCommand($name)
    {
        if (!isset($this->registry[$name])) {
            throw new RuntimeException('Cannot find command ' . $name);
        }

        return $this->registry[$name];
    }
}
