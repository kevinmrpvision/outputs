<?php 
namespace Kevin\Output;
use Kevin\Output\OutputInterface;
class JsonStringOutput implements OutputInterface
{
    public function load($data)
    {
        
        header("Cache-Control: no-cache");
        header("Content-Type: application/json");
        return json_encode($data);
    }
}


?>