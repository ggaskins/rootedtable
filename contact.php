<!DOCTYPE html>
<html lang="en">
<?php include("functions.inc.php"); ?>
<head>
    <meta charset="utf-8">
    <title>Contact Us - Rooted Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
</head>

<body>
    <?php include('header.inc.php'); ?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
                <hr>
                <p>If you have any questions, suggestions, or just want to get in touch, please use the form below:</p>
                <form action="contact_process.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
