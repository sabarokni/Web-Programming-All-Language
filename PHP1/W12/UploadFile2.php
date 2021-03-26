<?php
if (isset($_POST['btnUpload'])) 
{
    $destination = './uploads';       	// define the path to a folder to save the file

	if (!file_exists($destination))
	{
		mkdir($destination);
	}
	for ($j = 0; $j < count($_FILES['txtUpload']['tmp_name']); $j++)
	{
		if ($_FILES['txtUpload']['error'][$j] == 0)
		{
			$fileTempPath = $_FILES['txtUpload']['tmp_name'][$j];
			$filePath = $destination."/".$_FILES['txtUpload']['name'][$j];
			
			$pathInfo = pathinfo($filePath);
			$dir = $pathInfo['dirname'];
			$fileName = $pathInfo['filename'];
			$ext = $pathInfo['extension'];
			
			$i="";
			while (file_exists($filePath))
			{	
				$i++;
				$filePath = $dir."/".$fileName."_".$i.".".$ext;
			}
			move_uploaded_file($fileTempPath, $filePath);
		}
		elseif ($_FILES['txtUpload']['error'][$j]  == 1)
		{			
			echo "$fileName is too large <br/>";
		}
		elseif ($_FILES['txtUpload']['error'][$j]  == 4)
		{
			echo "No upload file specified <br/>"; 
		}
		else
		{
			echo "Error happened while uploading the file(s). Try again late<br/>"; 
		}
	}
	echo "<h2>All Uploaded Files</h2>";
	$files = scandir($destination);
	foreach($files as $file)
	{
		echo $file."<br/>"; 
	}
}
?>
