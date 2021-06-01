<?php
require_once "config.php";

// Add Book 

if(count($_POST)>0){
	if($_POST['type'] == 1){
		$bookName=$_POST['bookName'];
		$publisher=$_POST['publisher'];
		$isbn=$_POST['isbn'];
        
        // For image moved to folder
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            echo "<center><i><h4>The file ". basename( $_FILES["thumbnail"]["name"]). " has been uploaded.</h4></i></center>";
        } else {
            echo "<center>Sorry, there was an error uploading your file.</font></center>";
        }
       
        // insert in db

		$sql = "INSERT INTO `books`( `bookName`, `publisher`,`isbn`,`thumbnail`) 
		VALUES ('$bookName','$publisher','$isbn','$target_file')";
		if (mysqli_query($conn, $sql)) {
            $Message = urlencode("Book Added Successfully....!");
            header("Location:index.php?Message=".$Message);
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

//  Delete Record from db
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    print_r($id);
    $sql = "DELETE FROM `books` WHERE id=$id ";
    if (mysqli_query($conn, $sql)) {
        $Message = urlencode("Book Deleted Successfully....!");
        header("Location:index.php?Message=".$Message);
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

// For Edit record
if(count($_POST)>0){
    
	if($_POST['type'] == 2){
       
		$id=$_POST['bookID'];
		$bookName=$_POST['bookName'];
		$publisher=$_POST['publisher'];
		$isbn=$_POST['isbn'];
		
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

        // Check if file already exists
        if (file_exists($target_file)) {
            $sql = "UPDATE `books` SET `bookName`='$bookName',`publisher`='$publisher',`isbn`='$isbn',`thumbnail`='$target_file' WHERE id=$id";
        } else {
            // For image moved to folder
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                echo "<center><i><h4>The file ". basename( $_FILES["thumbnail"]["name"]). " has been uploaded.</h4></i></center>";
            } else {
                echo "<center>Sorry, there was an error uploading your file.</font></center>";
            }
            $sql = "UPDATE `books` SET `bookName`='$bookName',`publisher`='$publisher',`isbn`='$isbn',`thumbnail`='$target_file' WHERE id=$id";
        }
		
		if (mysqli_query($conn, $sql)) {
            $Message = urlencode("Book Updated Successfully....!");
            header("Location:index.php?Message=".$Message);
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>