<?php

if( isset( $_POST[ 'form' ] ) && isset($_FILES["csv"] ) )
{
    $submitted = true;
    $errors = array();
    $timeStamp = time();

    $tmp_name = $_FILES["csv"]["tmp_name"];
    $ext = strtolower( end(explode('.', $_FILES['csv']['name']) ) );

    if( $ext !== 'csv' )
    {
        array_push( $errors, 'Please upload a correctly formatted CSV file' );
    }

    $savedName = 'uploads/' . $timeStamp . '.csv';
    $processedName = 'processed/'. $timeStamp . '.csv';
    $uploaded = move_uploaded_file( $tmp_name, $savedName );

    if( !$uploaded )
    {
        array_push( $errors, 'There was a system error!' );
    }

    if( $uploaded )
    {
        if( ( $handle = fopen( $savedName, 'r') ) !== FALSE )
        {
            if( $processingHandle = fopen( $processedName, 'w+' ) )
            {
                $counter = 0;
                $cols = array(
                        'Date',
                        'Jiffy Label',
                        'Title',
                        'First name',
                        'Last name',
                        'Position',
                        'Address',
                        'Address1',
                        'Town',
                        'County',
                        'PostCode',
                        'Country',
                        'Country Code',
                        'Home Phone',
                        'Email Name',
                        'Service Ref',
                        'Service Code',
                        'Ref',
                        'Items',
                        'Weight',
                        'Format',
                        'Recorded',
                        'Order',
                        'Web Order',
                        'Certificate of Post',
                        'No Mail',
                        'Export Enquiry',
                        'PG Business Enq',
                        'Deluxe Enq',
                        'Referred By',
                        'Contact Type ID',
                        'Notes',
                        'Deluxe Glues',
                        'Blocks',
                        'Rotaries',
                        'Hand Tools',
                        'Discs',
                        'Needle Files',
                        'Rifflers',
                        'Saws',
                        'FXTs',
                        'Mail Shot Order',
                        'Work Phone',
                        'Fax Number',
                        'Mobile Phone',
                        'Web site',
                        'Interests',
                        'Club',
                        'Problems',
                        'VAT/EIN No'

                );
                fputcsv( $processingHandle, $cols );
                $success = true;
                $rows = array();

                while( ( $data = fgetcsv( $handle, 1000, ',') ) !== FALSE )
                {
                    if( $counter > 0 && !empty( $data[ 24 ] ) )
                    {
                        $date = 0; $phone = ''; $firstName = ''; $lastName = '';

                        $dateTS = strtotime( $data[ 3 ] );
                        $date = ( $dateTS ) ? date( 'Y-m-d', $dateTS ) : '';
                        $phone = str_replace( ' ', '', $data[ 33 ] );

                        $nameParts = explode( ' ' , $data[ 24 ] );
                        if( count( $nameParts ) === 1 )
                        {
                            $firstName = $nameParts[ 0 ];
                            $lastName = '';
                        }
                        else if( count( $nameParts ) === 2 )
                        {
                            $firstName = $nameParts[ 0 ];
                            $lastName = $nameParts[ 1 ];
                        }
                        else
                        {
                            $firstName = $nameParts[ 0 ];
                            for( $i = 1; $i < count( $nameParts ); $i++ )
                            {
                                $lastName .= $nameParts[ $i ] . ' ';
                            }
                            $lastName = trim( $lastName );
                        }

                        $row = array(
                            $date, //$data[ 3 ], // Date
                            '', // Jiffy
                            '', // Title
                            $firstName, // $data[ 24 ], // First name
                            $lastName, //$data[ 24 ], // Last name
                            '', // Position
                            $data[ 26 ], // Address
                            $data[ 27 ], // Address 1
                            $data[ 29 ], // Town
                            $data[ 31 ], // County
                            $data[ 30 ], // Post Code
                            $data[ 32 ], // Country
                            '', // Country Code
                            $phone, // $data[ 66 ], // Home Phone
                            $data[ 1 ], // Email name
                            '1', // Service Ref
                            'CRL24', // Service Code
                            $data[ 24 ], // Ref
                            '1', // Items
                            '', // Weight
                            'Parcel' // Format
                        );
                        fputcsv( $processingHandle, $row );
                        $rows[] = $row;
                    }
                    $counter++;
                }
                fclose( $handle );
                fclose( $processingHandle );
                unlink( $savedName );
                unlink( $processedName );

                // output headers so that the file is downloaded rather than displayed
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename=orders.csv');

                // create a file pointer connected to the output stream
                $output = fopen('php://output', 'w');

                // output the column headings
                fputcsv( $output, $cols );
                foreach( $rows as $row )
                {
                    fputcsv( $output, $row );
                }
                exit();
            }
        }
    }

//    echo '<pre>';
//    var_dump( $_FILES['csv'] );
//    var_dump( $tmp_name );
//    var_dump( move_uploaded_file( $tmp_name, 'csv/' . time() . '.csv' ) );
//    echo '</pre>';
}

?><!doctype html>
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
                    <input type="hidden" name="form">
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