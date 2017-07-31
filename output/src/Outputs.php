<?php
namespace Kevin\Output;
use Kevin\Output\OutputInterface;
use Kevin\Output\ArrayOutput;
use Kevin\Output\SerializedArrayOutput;
use Kevin\Output\JsonStringOutput;
use Kevin\Output\XmlOutput;
class Outputs
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput($data)
    {
        return $this->output->load($data);
    }

    public function toArray($data)
    {
    	$this->setOutput(new ArrayOutput());
       	return $this->loadOutput($data);
    }

    public function toJson($data)
    {
    	$this->setOutput(new JsonStringOutput());
       	return $this->loadOutput($data);
    }

    public function toSerializedArray($data)
    {
    	$this->setOutput(new SerializedArrayOutput());
       	return $this->loadOutput($data);
    }
    
    public function toXml($data)
    {
    	$this->setOutput(new XmlOutput());
       	return $this->loadOutput($data);
    }
    
    public function getOutput($data)
    {
        
        $this->getResponseHeader();
        switch($this->header){
            case 'application/json':
                return $this->toJson($data);
                break;
            case 'application/xml':
                return $this->toXml($data);
                break;
            default :
                return $this->toJson($data);
                break;
        }
    }
    public function getResponseHeader(){
        foreach(getallheaders() as $name=>$value){
            if($name == 'Accept'){
                $this->header = $value;
                
            }
        }
    }
}
?>