<?php
 // Include config file
 require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Book</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <style>
        .message{
            margin: auto;
            color: green;
            padding: 20px;
            font-size: large;
        }
    </style>
</head>
<body>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Books</b></h2>
					</div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
						<a href="#addBookModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Book</span></a>
					</div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 message">
                <?php
                    if(isset($_GET['Message'])){
                        $message = $_GET['Message'];
                        echo $message;
                    }
                ?>   
                </div>
            </div>
            <table id="bookInfo" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
						<th>Sr#</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
						<th>ISBN</th>
                        <th>Thumbnail</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				<!-- Show records in table -->
				<?php
                   $result = mysqli_query($conn,"SELECT * FROM books");

                $i=1;
                while($row = mysqli_fetch_array($result)) {
					
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["bookName"]; ?></td>
					<td><?php echo $row["publisher"]; ?></td>
					<td><?php echo $row["isbn"]; ?></td>
					<td><img src="<?php echo $row["thumbnail"]; ?>" height="50" width="50"></td>
					<td>
                        <!-- Edit the record -->
						<a href="#" onclick="updateBookInfo('<?php echo $row["id"]; ?>','<?php echo $row["bookName"]; ?>','<?php echo $row["publisher"]; ?>','<?php echo $row["isbn"]; ?>','<?php echo $row["thumbnail"]; ?>');" class="edit" ><i class="material-icons update" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="save.php?id=<?php echo $row["id"]; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addBookModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="save.php" id="book_form" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add Book</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Book Name:</label>
							<input type="text" id="bookName" name="bookName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Publisher Name:</label>
							<input type="text" id="publisher" name="publisher" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ISBN:</label>
							<input type="phone" id="isbn" name="isbn" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Thumbnail:</label>
							<input type="file" id="thumbnail" name="thumbnail" class="form-control" required>
                            <img  id="blah" name="newThumbnail" width="50" height="50" style="display:none;margin: 12px;" src="#" alt="your image" />
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" id="type" name="type">
                        <input type="hidden" value="1" id="bookID" name="bookID">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="submit" class="btn btn-success" id="btn-add">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <script src="/moodle/phpProject.js"></script>
</body>
</html>