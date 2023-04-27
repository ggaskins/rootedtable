    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
        }
        header {
            background: #333;
            color: #fff;
            padding: 1rem;
        }
        nav {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
        }
        nav ul {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        nav ul li {
            margin-right: 1rem;
        }
        nav ul li a {
            color: #333;
            text-decoration: none;
        }
        main {
            padding: 2rem;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .product {
            border: 1px solid #ccc;
            padding: 1rem;
        }
    </style>
    <?php
// Set page title
    $page_title = "About Us";
// Start session
    session_start();
// Include header
    require_once "header.php";
    ?><?php
// Database connection
    $host = "db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com";
    $username = "root";
    $password = "";
    $database = "project2";

    $conn = new mysqli($host, $username, $password, $database);

// Query to retrieve products
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    ?>

    <body>
        <main>
            <h2>Featured Products</h2>
            <div class="products">
                <?php
            // Generate product list
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<h3>' . $row['name'] . '</h3>';
                        echo '<p>' . $row['description'] . '</p>';
                        echo '<button class="product" data-product-id="1">Add to Cart</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products found.</p>';
                }
                ?>
            </div>
        </main>
    </body>