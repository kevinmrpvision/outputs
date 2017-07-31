<?php 
namespace Kevin\Output;
use Kevin\Output\OutputInterface;
class SerializedArrayOutput implements OutputInterface
{
    public function load($data)
    {
        return serialize($data);
    }
}

?>