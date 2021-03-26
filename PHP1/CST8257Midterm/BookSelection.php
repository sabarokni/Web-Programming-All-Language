<?php
session_start();
include "BookList.php";
?>
<html>
    <head>
        <title>Algonquin College Bookstore</title>
        <link rel="stylesheet" type="text/css" href="Contents/BookStore.css" />
    </head>
    <body>
        <h3>Enter the number of copies for books you want to buy and click Buy button</h3>
        <form action="BookSelection.php" method="post">
            <br/>
            <table border="1">
                <tr><th class="i"><a href="BookSelection.php?sort=title">Title</a>
                    </th><th class="price"><a href="BookSelection.php?sort=price">Price</a>
                    </th><th class="copies">Copies</th>
                </tr>
                <?php
                //Sorting Title

                if ($_GET['sort'] == 'title') {
                    ksort($_SESSION['bookList']);
                } else if ($_GET['sort'] == 'title') {
                    asort($_SESSION['bookList']);

                    $_SESSION['bookList'] = array_reverse($_SESSION['bookList']);
                }
                //Sorting Price
                if ($_GET['sort'] == 'price') {
                    asort($_SESSION['bookList']);
                } else if ($_GET['sort'] == 'price') {
                    ksort($_SESSION['bookList']);

                    $_SESSION['bookList'] = array_reverse($_SESSION['bookList']);
                }



                if (isset($_POST['buy'])) {


                    //check copies
                    if (empty($_POST['copies_count'])) {
                        $msg_pamount = "You must enter At least one book's number of copies should be greater than 0";
                    }
                    $copies_subject = $_POST['copies'];
                    $copies_pattern = "/^\d+$/";
                    preg_match($copies_pattern, $copies_subject, $copies_matches);
                    if (!$copies_matches[0]) {
                        $msg2_copies = "only number and positive number.";
                    }
                }
                if (isset($_POST['buy'])) {

                    $_SESSION["copies"] = $copies_subject;
                    $_SESSION["price"] = $price;
                    $_SESSION["title"] = $title;
                    
                    header("Location:Confirmation.php");
                    exit();
                }
                //show table title price and copies 
                if (isset(($_SESSION['bookList']))) {

                    foreach ($_SESSION['bookList'] as $title => $price) {

                        echo "<tr>";
                        echo "<td>$title</td>";
                        echo "<td> $price </td>";
                        echo "<td><input type=text name=copies[] value=$copies></td>";
                        echo"</tr>";
                        echo "<tr></tr>";
                    }
                }
                ?>
                </tr>
            </table>
            <br/>
            <input type='submit'  class='button' name='buy' value='buy'/>
        </form>
    </body>

</html>