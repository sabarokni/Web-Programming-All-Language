<?php
session_start();
include_once 'CST8257ProjectCommon/Settings.php';
include 'CST8257ProjectCommon/HandlerImg.php';
// include 'CST8257ProjectCommon/Picture.php';
include 'Controllers/MyPicturesController.php';

//only authenticated users can access this page. Others are redirected to the login page
//updates the session so the user can come back to this page after authentication
// if user has not logged in rediect to login page

if ($_SESSION["user"] == null) {
    header("Location: ./LogIn.php");
} else {
    $user = unserialize($_SESSION['user']);
    $userID = $user->getUserID();
    $userName = $user->getName();

    $albums = getAlbumsFrom($userID);

    if (count($albums) > 0) {

        $selectedAlbum = $albums[0][0]; //initial selection
        if (isset($_POST['selectedAlbum'])) {
            $selectedAlbum = $_POST['selectedAlbum']; //change selection (from dropdown change)
        }

        //when users navigate from My Albums or to refresh after a comment
        if (isset($_GET['submitAct'])) {
            if ($_GET['submitAct'] == 'album') {
                $selectedAlbum = $_GET['id'];
            } else if ($_GET['submitAct'] == 'picture') {
                $selectedAlbum = $_GET['id'];
                $selected_img_id = $_GET['pic'];
            }
        }

        $images = getPicturesFrom($selectedAlbum);
        $idx = 0; //initial selection

        if (!empty($images)) {

            if (isset($_POST['selectedImage'])) {
                $selected_img_id = intval($_POST['selectedImage']);
            }

            if ($selected_img_id != "") {
                $size = count($images);
                //get the array id based on the picture Id
                for ($i = 0; $i < $size; $i++) {
                    if ($images[$i]->getPicId() == $selected_img_id) {
                        $idx = $i;
                        break;
                    }
                }
            }

            if (isset($_POST['addComment'])) {
                if ($_POST['commentTxt'] != "") {
                    //inserts picture comment in DB
                    try {
                        $sql = "INSERT INTO comment(Author_Id, Picture_Id, Comment_Text, Date) "
                            . "VALUES (:userId, :pictureId, :commentTxt, NOW())";
                        $Stmt = $myPdo->prepare($sql);
                        $Stmt->execute(array(
                            ':userId' => $userID,
                            ':pictureId' => $selected_img_id,
                            ':commentTxt' => $_POST['commentTxt']
                        ));
                        $Stmt->commit;
                        exit(header('Location: MyPictures.php?action=picture&id=' . $selectedAlbum . '&pic=' . $selected_img_id));
                    } catch (PDOException $e) {
                        $commentError = $e->getMessage();
                    }
                } else {
                    $commentError = "Comment cannot be blank!";
                }
            } else if (isset($_POST['submitAct'])) {
                //Rotate, downloads or deletes the selected Image, according to the informed submitAct

                switch ($_POST['submitAct']) {
                    case 'rotateLeft':
                        $images[$idx]->rotatePicture(90);
                        break;
                    case 'rotateRight':
                        $images[$idx]->rotatePicture(-90);
                        break;
                    case 'download':
                        $file = $images[$idx]->downloadFile();
                        break;
                    case 'delete':
                        $commentError = $images[$idx]->deleteFile($myPdo);
                        if ($commentError == "") { //successfully deleted the file
                            exit(header('Location: MyPictures.php?action=album&id=' . $selectedAlbum));
                        }
                        break;
                }
            }
            //gets the file path to display as main picture
            $imageFilePath = $images[$idx]->getPathAlbum();
            $selected_img_id = $images[$idx]->getPicId();
        }

?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>My Pictures</h1>
                    <br />
                </div>
            </div>
            <form action=MyPictures.php method="post">
                <div class="row">
                    <div class="col-lg-1 col-md-2"></div>
                    <div class='col-lg-5 col-md-5'>
                        <select name='selectedAlbum' class='form-control' onchange="this.form.submit()">
                            <?php
                            foreach ($albums as $row) {
                                echo "<option value='$row[0]' ";
                                if ($row[0] == $selectedAlbum) {
                                    echo "selected='selected'";
                                }
                                echo ">" . $row[1] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <?php
                if (!empty($images)) {
                ?>
                    <div class="row">
                        <div class="col-lg-3 col-md-3"></div>
                        <div class='col-lg-4 col-md-4'>
                            <h2><?php echo $images[$idx]->getTitle(); ?></h2>
                        </div>
                    </div>
                    <br />
                    <div class="container-fluid">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="img-container col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <img src="<?php echo $imageFilePath; ?>" />
                                <div class="menu">
                                    <button type="submit" name="submitAct" class="btn-glyph" value="rotateLeft">
                                        <i class="glyphicon glyphicon-repeat gly-flip-horizontal"></i>
                                    </button>
                                    <button type="submit" name="submitAct" class="btn-glyph" value="rotateRight">
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </button>
                                    <button type="submit" name="submitAct" class="btn-glyph" value="download">
                                        <span class="glyphicon glyphicon-download-alt"></span>
                                    </button>
                                    <button type="submit" name="submitAct" class="btn-glyph" value="delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="thumbnails">
                                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12" style="overflow-x: auto; white-space: nowrap;">
                                    <?php
                                    foreach ($images as $img) {
                                    ?>
                                        <img src=<?php echo $img->getPathThumb(); ?> name="imgThumbnail" id=<?php echo $img->getPicId();
                                                                                                                    if ($img->getPicId() == $selected_img_id) { //highlight selected image
                                                                                                                        echo ' style="border: 3px solid blue;"';
                                                                                                                    }
                                                                                                                    ?> style="padding: 5px; white-space: nowrap;">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 side-comments">
                            <div class="comments-list">
                                <?php
                                if ($images[$idx]->getDescription()) {
                                    echo "<b>Description:</b>";
                                    echo "<p>" . $images[$idx]->getDescription() . "</p>";
                                }
                                $comments = $images[$idx]->getComments($myPdo);
                                if (count($comments) > 0) {
                                    echo "<b>Comments:</b>";
                                    foreach ($comments as $comment) {
                                        echo '<p><i style="color: blue">' . $comment[1] . ' ('
                                            . $comment[2] . '):</i> ' . $comment[0] . '</p>';
                                    }
                                }
                                ?>
                            </div>
                            <br />
                            <div class='form-group row'>
                                <div class='col-lg-11 col-md-11 col-sm-11 col-xs-11'>
                                    <textarea class='form-control' id='commentTxt' name='commentTxt' placeholder="Leave Comment..." style='height:150px'><?php
                                                                                                                                                            if (isset($_POST['descriptionTxt'])) {
                                                                                                                                                                echo $_POST['descriptionTxt'];
                                                                                                                                                            }
                                                                                                                                                            ?></textarea></div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-6 col-md-8 col-sm-12 col-xs-12 text-left'>
                                    <button type='submit' name='addComment' class='btn btn-block btn-primary'>Add Comment</button>
                                </div>
                                <div class='col-lg-6 col-md-12 col-sm-12 col-xs-12 text-left' style="color: red;"><?php echo $commentError; ?></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="selectedImage" value="<?php echo $images[$idx]->getPicId(); ?>" />
            </form>
        </div>
    <?php
                } else { //If there is no pictures associat with this album
    ?>
        </form>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4>This album does not have any pictures yet. Click <a href="UploadPictures.php">here</a> to Upload Pictures.</h4>

            </div>
        </div>
        </div>
    <?php
                }
            } else { //If there is no album yet
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>My Pictures</h1>
                <br />
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>You don't have an album yet. Click <a href="AddAlbum.php">here</a> to Create a new Album</h4>
                </div>
            </div>
        </div>
<?php
            }
            include 'CST8257ProjectCommon/Footer.php';
        }
