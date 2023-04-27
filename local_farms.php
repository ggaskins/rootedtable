<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<style>
  .business {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1rem;
  }
  
  img.business-image {
    width: 100px;
    height: 100px;
    display: inline-block;
    vertical-align: top;
    margin-right: 10px;
  }
  .farm {
    margin-bottom: 10px;
    display: flex;
  }
  .farm h2 {
    font-size: 1.2rem;
    margin-top: 0;
    margin-bottom: 5px;
  }
  .farm p {
    font-size: 1rem;
    margin-top: 0;
    margin-bottom: 0;
  }
  .farm a {
    font-size: 1rem;
    color: #4CAF50;
    text-decoration: none;
  }
  .farm a:hover {
    text-decoration: underline;
  }

  .business-info {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
  }

  .business-info h2 {
    font-size: 1.5rem;
    margin: 0;
  }

  .business-info p {
    font-size: 1.2rem;
    margin: 0;
  }
</style>
<?php
// Set page title
$page_title = "Local Farms";

// Include header file
require_once "header.php";

// Database configuration
$db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
$db_port = '25060';
$db_name = 'defaultdb';
$db_user = 'doadmin';
$db_password = 'AVNS_TiObYQOBYOU5Klx6sf8';

// Create a database connection
$conn = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Results per page
$results_per_page = 10;

// Current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting index for the results on this page
$this_page_first_result = ($page - 1) * $results_per_page;

// Query to get the farms
$query = "SELECT * FROM businesses LIMIT " . $this_page_first_result . "," . $results_per_page;
$result = mysqli_query($conn, $query);

// Display the farms
echo "<main>";
echo "<h1>Local Farms</h1>";
echo "<div class='farms'>";
while ($row = mysqli_fetch_assoc($result)) {
  // display the farm information here
  echo '<div class="farm">';
  echo '<a href="' . $row['url'] . '">';
  echo '<img class="business-image" src="' . $row['image'] . '" onerror="this.src=\'default_image.jpg\'">';
  echo '</a>';
  echo '<div class="business-info">';
  echo '<a href="' . $row['url'] . '">';
  echo '<h2>' . $row['name'] . '</h2>';
  echo '</a>';
  echo '<p>' . $row['address'] . '</p>';
  if ($row['website'] != "\r") {
    echo '<a href="' . $row['website'] . '">Visit - ' . $row['name'] . '</a>';
  }
  echo '</div>';
  echo '</div>';
}
echo "</div>";

// Query to count the total number of farms
$query = "SELECT COUNT(*) AS count FROM businesses";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_farms = $row['count'];

// Calculate the number of pages
$number_of_pages = ceil($total_farms / $results_per_page);

// Display the pagination links
 $num_links = 5; // number of links to show
  $middle_page = ceil($num_links / 2); // middle page
  $start_page = max($page - $middle_page, 1); // start page
  $end_page = min($start_page + $num_links - 1, $number_of_pages); // end page

  // show first page link
  if ($page > 1) {
    echo '<a href="local_farms.php?page=1">First</a> ';
  }

  // show previous page link
  if ($page > 1) {
    $prev_page = $page - 1;
    echo '<a href="local_farms.php?page=' . $prev_page . '"><</a> ';
  }

  // show page links
  for ($page_number = $start_page; $page_number <= $end_page; $page_number++) {
    echo '<a href="local_farms.php?page=' . $page_number . '">' . $page_number . '</a> ';
  }

  // show next page link
  if ($page < $number_of_pages) {
    $next_page = $page + 1;
    echo '<a href="local_farms.php?page=' . $next_page . '">></a> ';
  }

  // show last page link
  if ($page < $number_of_pages) {
    echo '<a href="local_farms.php?page=' . $number_of_pages . '">Last</a> ';
  }

// Results per page form
// Results per page form
echo "<form method='get' action='local_farms.php'>";
echo "<label for='results_per_page'>Results Per Page:</label>";
echo "<select name='results_per_page[]' onchange='this.form.submit()'>";
echo "<option value='10'" . (isset($_GET['results_per_page']) && $_GET['results_per_page'][0] == 10 ? " selected" : "") . ">10</option>";
echo "<option value='20'" . (isset($_GET['results_per_page']) && $_GET['results_per_page'][0] == 20 ? " selected" : "") . ">20</option>";
echo "<option value='50'" . (isset($_GET['results_per_page']) && $_GET['results_per_page'][0] == 50 ? " selected" : "") . ">50</option>";
echo "</select>";
echo "</form>";

// Include footer file
  require_once "footer.php";
  ?>
