<!DOCTYPE html>
<html lang="en">
<?php include("functions.inc.php"); ?>
<head>
    <meta charset="utf-8">
    <title>Rooted Table</title>
    <style>
        .btn {
            border-radius: 20px; /* set the border-radius to make buttons round */
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />

</head>

<body>
    <?php include('header.inc.php'); ?>

    <!-- Page Content -->
    <main class="container">
        <div class="row">
            <aside class="col-md-2">
                <?php include("leftnav.include.php"); ?>
                <!-- end continents panel -->
            </aside>
            <div class="col-md-10">

               

                <!-- start post summaries -->
                <div class="postlist">
                    <?php
                    // Assuming $page is the page number and $perPage is the number of businesses to display per page
                    // Define the page number and number of businesses to display per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $perPage = 10;

                    // Calculate the offset
                    $offset = ($page - 1) * $perPage;

                    // Prepare a query to fetch the next set of businesses
                    $query = "SELECT * FROM businesses LIMIT :perPage OFFSET :offset";
                    $statement = $connect->prepare($query);
                    $statement->bindParam(':perPage', $perPage, PDO::PARAM_INT);
                    $statement->bindParam(':offset', $offset, PDO::PARAM_INT);

                    // Execute the query
                    $statement->execute();

                    // Fetch all the rows as an associative array
                    $businesses = $statement->fetchAll(PDO::FETCH_ASSOC);

                    ?>
                    <!-- replace each of these rows with a function call -->

                    <?php
                    foreach ($businesses as $business) {
                        outputPostRow($business);
                    }
                    ?>

                </div>   <!-- end post list -->

                <!-- add pagination links here -->
                <ul class="pagination">
                    <?php
    // Get the total number of businesses
                    $totalBusinesses = $connect->query('SELECT COUNT(*) FROM businesses')->fetchColumn();

    // Calculate the total number of pages
                    $totalPages = ceil($totalBusinesses / $perPage);

    // Calculate the start and end page numbers for the pagination links
                    $startPage = max($page - 2, 1);
                    $endPage = min($page + 2, $totalPages);

    // Display "First" link
                    if ($page > 1) {
                        echo "<li><a href='index.php?page=1'>First</a></li>";
                    }

    // Display ellipsis if necessary
                    if ($startPage > 1) {
                        echo "<li><span>...</span></li>";
                    }

    // Generate the pagination links
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        if ($i == $page) {
                            echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                        } else {
                            echo "<li><a href='index.php?page=$i'>$i</a></li>";
                        }
                    }

    // Display ellipsis if necessary
                    if ($endPage < $totalPages) {
                        echo "<li><span>...</span></li>";
                    }

    // Display "Last" link
                    if ($page < $totalPages) {
                        echo "<li><a href='index.php?page=$totalPages'>Last</a></li>";
                    }
                    ?>
                </ul>
            </div>  <!-- end col-md-10 -->
        </div>   <!-- end row -->
    </main>
    
</body>

</html>