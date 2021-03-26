
<?php include("./Lab4Commons/Header.php"); ?>
<?php session_start(); ?>
<form id="" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php
    if (!isset($_SESSION["term_condition"])) {
        header("Location:Disclaimer.php");
        exit();
    }
    if (empty($radiophoneemail) && !isset($_SESSION["name"]) && !isset($_SESSION["email"]) && !isset($_SESSION["time"]) && !isset($_SESSION["phone"]) && !isset($_SESSION["postalcodde"])) {
        header("Location:CustomerInfo.php");
        exit();
    }
    ?>
    <?php
    session_start();
    if (isset($_POST['clear'])) {
        //header("Refresh:0");
        header("Location:DepositCalculator.php");
    }

    if (isset($_POST['submit'])) {
//check Pricipal Amount
        if (empty($_POST['pamount'])) {
            $msg_pamount = "You must enter Principal Amount";
        }
        $pamount_subject = $_POST['pamount'];
        $pamount_pattern = "/^\d+$/";
        preg_match($pamount_pattern, $pamount_subject, $pamount_matches);
        if (!$pamount_matches[0]) {
            $msg2_pamount = "only number and positive number.";
        }
//Intrest Rate
        if (empty($_POST['irate'])) {
            $msg_irate = "You must enter Intrest Rate";
        }
        $irate_subject = $_POST['irate'];
        $irate_pattern = "/^\d+$/";
        preg_match($irate_pattern, $irate_subject, $irate_matches);
        if (!$irate_matches[0]) {
            $msg2_irate = "only number and positive number.";
        }

        if ($_POST['year'] == "0") {
            $msg_year = "The number of year Invalid !";
        }
        $year_subject = $_POST['year'];
    }
    ?>
    <?php
// validation complete 
// store all data user entered in the session and show in current php page the values
    if (isset($_POST['submit'])) {
        if ($msg2_pamount == "" && $msg_pamount == "" && $msg2_irate == "" && $msg_irate == "" && $_msg_year) {
            $_SESSION["amount"] = $pamount_subject;
            $_SESSION["intrest"] = $irate_subject;
            $_SESSION["years"] = $year_subject;
            //header("Location:DepositCalculator.php");
            //exit();
        }
    }
    ?> 
    <fieldset>
        <h4>Enter Principal Amount, interest rate and select numbers of years to deposit: </h4>
        <hr>
        <div class="form-row">
            <div class="col-2">
                <label class="lbl-format">Principle Amount: <span class="error">*</span>:</label>
                <input type="text" class="registration input" name="pamount"  autofocus="autofocus" value="<?php echo $_POST['pamount']; ?>"><br>
                <?php echo "<p class='error'>" . $msg_pamount . "</p>"; ?>
                <?php echo "<p class='error'>" . $msg2_pamount . "</p>"; ?>
            </div>
        </div>  
        <div class="form-row">
            <div class="col-2">
                <label class="lbl-format">Interest Rate(%): <span class="error">*</span>:</label>
                <input type="text" class="registration input" name="irate" value="<?php echo $_POST['irate']; ?>"><br>
                <?php echo "<p class='error'>" . $msg_irate . "</p>"; ?>
                <?php echo "<p class='error'>" . $msg2_irate . "</p>"; ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-2">
                <label class="lbl-format">Year to Deposit <span class="error">*</span>: </label>

                <select  style="width:175px ;margin-right:30px; order-radius: 10px;
                         height: 30px;" name="year" value=<?php
                if (isset($_POST['year'])) {
                    echo $_POST['year'];
                }
                ?>>
                    <option value="0" <?php
                         if (isset($_POST['year']) && $_POST['year'] == '0') {
                             print'selected="0"';
                         }
                ?>>Select ...</option>
                    <option value="1" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '1') {
                        print'selected="1"';
                    }
                ?>>1</option>
                    <option value="2" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '2') {
                        print'selected="2"';
                    }
                ?>>2</option>
                    <option value="3" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '3') {
                        print'selected="3"';
                    }
                ?>>3</option>
                    <option value="4" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '4') {
                        print'selected="4"';
                    }
                ?>>4</option>
                    <option value="5"<?php
                    if (isset($_POST['year']) && $_POST['year'] == '5') {
                        print'selected="5"';
                    }
                ?>>5</option>
                    <option value="6" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '6') {
                        print'selected="6"';
                    }
                ?>>6</option>
                    <option value="7" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '7') {
                        print'selected="7"';
                    }
                ?>>7</option>
                    <option value="8" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '8') {
                        print'selected="8"';
                    }
                ?>>8</option>
                    <option value="9" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '9') {
                        print'selected="9"';
                    }
                ?>>9</option>
                    <option value="10" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '10') {
                        print'selected="10"';
                    }
                ?>>10</option>
                    <option value="11" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '11') {
                        print'selected="11"';
                    }
                ?>>11</option>
                    <option value="12" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '12') {
                        print'selected="12"';
                    }
                ?>>12</option>
                    <option value="13" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '13') {
                        print'selected="13"';
                    }
                ?>>13</option>
                    <option value="14" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '14') {
                        print'selected="14"';
                    }
                ?>>14</option>
                    <option value="15" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '15') {
                        print'selected="15"';
                    }
                ?>>15</option>
                    <option value="16" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '16') {
                        print'selected="16"';
                    }
                ?>>16</option>
                    <option value="17" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '17') {
                        print'selected="17"';
                    }
                ?>>17</option>
                    <option value="18" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '18') {
                        print'selected="18"';
                    }
                ?>>18</option>
                    <option value="19" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '19') {
                        print'selected="19"';
                    }
                ?>>19</option>
                    <option value="20" <?php
                    if (isset($_POST['year']) && $_POST['year'] == '20') {
                        print'selected="20"';
                    }
                ?>>20</option>
                </select>
            </div>
            <?php echo "<p class='error'>" . $msg_year . "</p>"; ?>

        </div>
        <div class="row">
            <div class="col-2">
                <button type="submit" class="register_button" name="submit">Calculate</button>

                <button type="submit" class="clear_button" value="reset" name="clear">Clear</button> 
            </div>
        </div>
        <?php
        if (isset(($_POST['pamount'])) && $_POST['pamount'] > "0" && isset(($_POST['irate'])) && $_POST['irate'] > "0" && $_POST['year'] != "0") {

            echo "<h4><hr>The following is the result of the Calculation :  <br></h4>";
            ?>
            <br>
            <table class="table table-bordered">
                <tr>

                    <th class = "year_subject" >Year </th>
                    <th class = "principaleyear">Principal at year start</th>
                    <th class = "intrestyear">Interest for a Year</th>
                        <?php
                        //create table show calcualtion 
                        for ($i = 1; $i <= $year_subject; $i++) {
                            $principaleyear = $pamount_subject;
                            $interestyear = round($irate_subject / 100 * $principaleyear, 2);
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td> $principaleyear </td>";
                            echo "<td>$interestyear</td>";
                            echo"</tr>";
                            echo "<tr></tr>";
                            $principaleyear = $pamount_subject += $interestyear;
                        }
                    }
                    ?>

            </tr>
        </table>
    </fieldset>
</form>
<?php include('./Lab4Commons/Footer.php'); ?>
   