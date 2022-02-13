<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Shopify CSV formatter</title>
</head>
<body>

<div class="container-sm pt-4">
    <div class="row justify-content-md-center">
        <div class="col-sm-6">

            <?php if ( isset( $submitted ) ) { ?>
            <?php if( !empty( $errors ) ) { ?>
            <?php foreach( $errors as $error ) { ?>
            <div class="alert alert-danger mb-3">
                <span><?php echo $error; ?></span>
            </div>
            <?php } ?>
            <?php } ?>
            <?php } ?>

            <img src="https://cdn.shopify.com/s/files/1/0131/9341/2666/files/2018_Deluxe_logo_web_08f2680d-913e-41a9-b7c1-4f85aac10cae_250x85.jpg?v=1576502991" class="img-fluid mb-3" alt="Responsive image">

            <?php if( isset( $success ) ) { ?>
            <div class="alert alert-success mb-3">
                <span>Your processed file is ready to be downloaded</span>
            </div>
            <a class="btn btn-primary" href="<?php echo $processedName; ?>">Download</a>
            <?php } ?>

            <?php if( !isset( $success ) ) { ?>
            <div class="alert alert-warning mb-3">
                <span>Process a Shopify CSV export into your custom format by uploading it below</span>
            </div>
            <form class="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="csv">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <button class="btn btn-primary">Process CSV</button>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>