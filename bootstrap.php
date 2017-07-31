<?php 
require 'vendor/autoload.php';
use Kevin\Output\Outputs;
$data = array(
    "total_users" => 3,
    "users" => array(
        array(
            "id" => 1,
            "name" => "Smith",
            "address" => array(
                "country" => "United Kingdom",
                "city" => "London",
                "zip" => 56789,
            )
        ),
        array(
            "id" => 2,
            "name" => "John",
            "address" => array(
                "country" => "USA",
                "city" => "Newyork",
                "zip" => "NY1234",
            ) 
        ),
        array(
            "id" => 3,
            "name" => "Viktor",
            "address" => array(
                "country" => "Australia",
                "city" => "Sydney",
                "zip" => 123456,
            ) 
        ),
    )
    
);

$output = new Outputs();
print_r($output->getOutput($data));
exit;




?>