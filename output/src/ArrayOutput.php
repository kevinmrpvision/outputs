<?php 
namespace Kevin\Output;
use Kevin\Output\OutputInterface;
class ArrayOutput implements OutputInterface
{
    public function load($data)
    {
        return $data;
    }
}

?>