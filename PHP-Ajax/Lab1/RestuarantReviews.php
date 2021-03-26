<?php
//Header
include("./Common/Header.php");
//exctract all post
extract($_POST);
//read xml file
$restaurant_review = simplexml_load_file("restaurant_review.xml");
// show restarant
$restaurant = $restaurant_review->restaurant;
//get selected restaurant from drop down list for restuarants
$selectedRS = $restaurant[intval($_POST['drpName'])];
// click submit button 
if (isset($save)) {
    //get the new value and insert in xml file
    $selectedRS->address->StreetAddress = $streetAddress;
    $selectedRS->address->city = $city;
    $selectedRS->address->ProvinceState = $state;
    $selectedRS->address->PostalZipCode = $postalCode;
    $selectedRS->reviews->review->summary = $summary;
    $selectedRS->reviews->review->rating = $drprating;
    // $xml->asXML();
    //save neww value in xml file and i should put all directory for php to save new changes in xml file in a correct file
    $restaurant_review->asXML('E:\Ampps\www\CST8259Lab1\restaurant_review.xml');
    // save new changes in current directory of xml
    $updateMesssage = "Revised Restuarant Review has been saved to restuarant_review.xml";
}
// get value from xml file and show them for users
$address = $selectedRS->address->StreetAddress;
$city = $selectedRS->address->city;
$state = $selectedRS->address->ProvinceState;
$postalCode = $selectedRS->address->PostalZipCode;
$summary = $selectedRS->reviews->review->summary;
//use intval to change int to tring or deverse
$rating = intval($selectedRS->reviews->review->rating);
?>
<form id="review" name="review" method="POST" action="">
    <div class="card-header">
        <h1 class="text-center">Online Restaurant Review</h1>
    </div>
    <hr>
    <div  style="align-items:flex-end; margin-left: 25%;">
        <label><h4>Select a restaurant from drop down list to view/Edit its review: </h4></label><br>
        <div class="form-row">
            <div class="center-block">                            
                <label class="lbl-format" style="margin-right: 30px">Restaurant </label>
                <select name="drpName" value=""  id="drpName"  style="width:400px ;margin:20px; order-radius: 60px; height: 50px;" onchange="toggle_visibility('myDIV');">
                    <option value="-1">Select ...</option>
                    <?php
                    //count restaurants and plus to counter 
                    for ($i = 0; $i < count($restaurant); $i++) {
                        //show defined restarant
                        $rsIndex = $restaurant[$i];
                        //create option for each restarant show name of reatauarant and if selected show all value related to selected restuarant
                        print "<option style=width:400px ;margin-right:50px; order-radius: 60px; height: 50px; value='$i' " . ($_POST['drpName'] == $i ? 'Selected' : '' ) . "  >$rsIndex->name</option></br>";
                    }
                    ?>
                </select><br>
                <div id="myDIV">
                    <label class="lbl-format">Street Address:</label>
                    <input type="text" style="width:400px ;margin:20px; order-radius: 60px; height: 50px;" name="streetAddress"  value="<?php echo $address ?>"><br>

                    <label class="lbl-format" style="margin-right: 80px">City:</label>
                    <input type="text" style="width:400px ;margin:20px; order-radius: 60px; height: 50px;" name="city"  value="<?php echo $city ?>"><br>

                    <label class="lbl-format" >Province/State:</label>
                    <input type="text" style="width:400px ;margin:20px; order-radius: 60px; height: 50px;" name="state"  value="<?php echo $state ?>">   <br>

                    <label class="lbl-format" >Postal/ZipCode:</label>
                    <input type="text" name="postalCode"  style="width:400px ;margin:20px; order-radius: 60px; height: 50px;" value='<?php echo $postalCode ?>'> <br>

                    <label class="lbl-format">Summary:</label><br>
                    <textarea  name="summary" style="width:400px ;margin-left: 125px; order-radius: 60px; height: 150px;"> <?php echo $summary ?></textarea><br> 

                    <label class="lbl-format" style="margin-right: 55px">Rating:</label>
                    <select style="width:400px ;margin:20px; order-radius: 60px; height: 50px;" name="drprating">
                        <?php
                        for ($j = 1; $j < 6; $j++) {
                            print "<option style=width:400px ;margin-right:50px; order-radius: 60px; height: 50px; value='$j' " . ($rating == $j ? 'Selected' : '' ) . " >$j</option>";
                        }
                        ?>
                    </select><br>
                    <input type="submit" style="width:100px;height:50px; margin-left:120px; margin-top: 20px;margin-bottom: 20px; background-color: lightgreen; font-size: 20px; font-family: sans-serif;" name="save" value="Save"><br>
                    <span class="success" style="background-color: greenyellow;background-size:200px;"><?php echo $updateMesssage; ?></span>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    //create function for on change in select for restaurant name and select as a default 
    //when click select... none of input and lable inside of div show 
    // if lick restaurant name show all value in input and lable 
    function toggle_visibility(id) {
        //var a = document.getElementById('review');
        var e = document.getElementById(id);
        //get value ny ID from dropdown list restaurants
        var s = document.getElementById('drpName');
        // if value of option in dropdown list equal '-1' or not do block or none data
        if (s.value !== '-1')
        {
            e.style.display = 'block';
            document.getElementById('review').submit();
        } else
        {
            e.style.display = 'none';
        }
    }
</script>
<?php
include('./Common/Footer.php');
?>
