<?php

if (isset($_POST['btnUpload']) && $_FILES['txtUpload']['error'] == 0) 
{
	if ($_FILES['txtUpload']['error'] == 0)
	{
		$destination = './uploads';       	// define the path to a folder to save the file

		if (!file_exists($destination))
		{
			mkdir($destination);
		}
		
		$fileTempPath = $_FILES['txtUpload']['tmp_name'];
		$filePath = $destination."/".$_FILES['txtUpload']['name'];
		
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
		
		$files = scandir($destination);
		echo "<h2>All Uploaded Files</h2>";
		foreach($files as $file)
		{
			echo $file."<br/>"; 
		}
	}
	elseif ($_FILES['txtUpload']['error'] == 1)
	{
		echo "Upload file is too large<br/>"; 
	}
	elseif ($_FILES['txtUpload']['error'] == 4)
	{
		echo "No upload file specified<br/>"; 
	}
	else
	{
		echo "Error happened while uploading the file(s). Try again late<br/>"; 
	}
}
?>
