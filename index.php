<?php

interface OutputInterface
{
    public function load($arrayOfData);
}

class SerializedArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return $arrayOfData;
    }
}

class SomeClient
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput($data_input)
    {
        return $this->output->load($data_input);
    }
}

$client = new SomeClient();
$data_input = ["name"=>"kevin patel","email"=>"kevin@gmail.com"];
// Want an array?
$client->setOutput(new ArrayOutput());
$data = $client->loadOutput($data_input);

// Want some JSON?
$client->setOutput(new JsonStringOutput());
$data = $client->loadOutput($data_input);
print_r($data);