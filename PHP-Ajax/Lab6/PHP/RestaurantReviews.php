<?php
$appConfigs = parse_ini_file("Lab6.ini");
$reviewWsdl = $appConfigs["restaurantReviewServiceWsdl"];
$reviewClient = new SoapClient($reviewWsdl);

extract($_GET);
$confirmation = false;

// Get all restaurants name
if (isset($action) && $action === "showAllRestaurant") {
    // show restarant names
    $names = $reviewClient->GetRestaurantNames()->GetRestaurantNamesResult->string;

    $jsonStr = json_encode($names);
}

echo $jsonStr;

// get all details of restaurant with Id
if (isset($action) && $action === "getDetails" && isset($Id) && $Id !== "") {
    $parameters = new stdClass();
    $parameters->id = intval($Id);
    $rest = $reviewClient->GetRestaurantById($parameters)->GetRestaurantByIdResult;

    echo json_encode($rest);
    exit();
}

//// save new changes for restaurant with Id 
if (isset($action) && $action === "save" && isset($_POST["restaurant"]) && $_POST["restaurant"] !== "") {
    $updatedRestuarant = json_decode($_POST["restaurant"]);
    if ($updatedPerson->id !== "-1") {
        $parameters = new stdClass();
        $parameters->id = intval($updatedRestuarant->id);
        $restaurant = $reviewClient->GetRestaurantById($parameters)->GetRestaurantByIdResult;

       $restaurant->Location->City = $updatedRestuarant->city;
       $restaurant->Location->Province = $updatedRestuarant->ProvinceState;
       $restaurant->Location->PostalCode = $updatedRestuarant->PostalZipCode;
       $restaurant->Summary = $updatedRestuarant->summary;
       $restaurant->Rating = $updatedRestuarant->rating;
       $restaurant->Location->Street = $updatedRestuarant->StreetAddress;

       $parameters = new stdClass();
       $parameters->restInfo = $restaurant;

       $reviewClient->SaveRestaurant($parameters);

       
        $confirmation="Revised restaurant review has been saved.";
       
        echo json_encode($confirmation);
    }
    else 
    {
        echo json_encode("No restaurant review data revised!");   
    }
}
