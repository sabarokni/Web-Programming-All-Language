<?php

//include "Common.php";
//session_start();
//read xml file
    
$restaurant_review = simplexml_load_file("../Data/restaurant_review.xml");
extract($_POST);

$rs1 = Array();
$jsonStr = json_encode(null);
if (isset($_GET["action"]) && $_GET["action"] == "showAllRestaurant") {
    // show restarant
    $i = 0;
    $restaurant1 = $restaurant_review->restaurant;

    // var_dump($restaurant1);
    foreach ($restaurant1 as $rs) {
        //print $rs->name;
        $i++;
        $rs1[] = (string) $rs->name;
    }
    //echo json_encode($rs1);
    $jsonStr = json_encode($rs1);
}


// show details of retuarant 
if (isset($_GET["action"]) && $_GET["action"] == "getDetails" && isset($_GET["Id"]) && $_GET["Id"] !== "") {

    $theRestaurant = $restaurant_review->restaurant[intval($_GET["Id"])];

    $theRestaurant->StreetAddress = (string) $theRestaurant->address->StreetAddress;
    $theRestaurant->city = (string) $theRestaurant->address->city;
    $theRestaurant->ProvinceState = (string) $theRestaurant->address->ProvinceState;
    $theRestaurant->PostalZipCode = (string) $theRestaurant->address->PostalZipCode;
    $theRestaurant->summary = (string) $theRestaurant->reviews->review->summary;
    
    
    $theRestaurant->rating = (int)$theRestaurant->reviews->review->rating;

    $theRestaurant->rating->minimum =(int)$theRestaurant->reviews->review->rating['min_value'];
    $theRestaurant->rating->maximum = (int)$theRestaurant->reviews->review->rating['max_value'];
    
    
    $jsonStr = json_encode($theRestaurant);
}


// save new changes 
if (isset($_GET["action"]) && $_GET["action"] == "save" && isset($_POST["restaurant"]) && $_POST["restaurant"] !== "") {
    $updatedRestuarant = json_decode($_POST["restaurant"]);
    if ($updatedPerson->id !== "-1") {
        $restaurant = $restaurant_review->restaurant[intval($updatedRestuarant->id)];

        $restaurant->address->city = $updatedRestuarant->city;
        $restaurant->address->ProvinceState = $updatedRestuarant->ProvinceState;
        $restaurant->address->PostalZipCode = $updatedRestuarant->PostalZipCode;
        $restaurant->reviews->review->summary = $updatedRestuarant->summary;
        $restaurant->reviews->review->rating = $updatedRestuarant->rating;
        $restaurant->address->StreetAddress = $updatedRestuarant->StreetAddress;
        $restaurant_review->asXML("../Data/restaurant_review.xml");
    }
}
echo $jsonStr;
