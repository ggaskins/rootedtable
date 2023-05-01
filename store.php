<?php
session_start(); 
// Set page title
$page_title = "Store";
// Include header
require_once "header.php";

// Database configuration
$db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
$db_port = '25060';
$db_name = 'defaultdb';
$db_user = 'doadmin';
$db_password = 'AVNS_TiObYQOBYOU5Klx6sf8';

// Create a database connection
$conn = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

// Check if business ID is set
if (isset($_GET['business_id'])) {
    $business_id = $_GET['business_id'];

    // Query to retrieve business information based on business ID
    $sql = "SELECT * FROM businesses WHERE id = $business_id";
    $result = $conn->query($sql);

    // Check if business exists
    if ($result->num_rows > 0) {
        $business = $result->fetch_assoc();
?>
    <body>
        <script>
    function registerWebsite(business_id) {
        window.location.href = "register_website.php?id=" + business_id;
    }

    function addToCart(productId) {
        // Get the cart from the session or create a new empty one
        let cart = JSON.parse(localStorage.getItem("cart")) || {};

        // Add or increment the product in the cart
        if (cart[productId]) {
            cart[productId].quantity++;
        } else {
            cart[productId] = { quantity: 1 };
        }

        // Save the updated cart to the session
        localStorage.setItem("cart", JSON.stringify(cart));

        // Alert the user that the product has been added to the cart
        alert("Product added to cart.");
    }

    // Add click event listeners to all product buttons
    const productButtons = document.querySelectorAll(".product");
    productButtons.forEach(button => {
        button.addEventListener("click", () => {
            addToCart(button.dataset.productId);
        });
    });
</script>
        <main>
            <h2><?php echo $business['name']; ?></h2>
            <p><?php echo $business['info_snippet']; ?></p>
            <p>Address: <?php echo $business['address']; ?></p>
            <p>Phone: <?php echo $business['phone']; ?></p>
            <?php if ($business['website'] != ""): ?>
                <p>Website: <a href="<?php echo $business['website']; ?>"><?php echo $business['name']; ?></a></p>
            <?php else: ?>
                <p>No website registered.</p>
                <button onclick="registerWebsite('<?php echo $business_id; ?>')">Register a new website</button>
            <?php endif; ?>

            <h3>Featured Products</h3>
            <div class="products">
                <?php
                    // Query to retrieve products for the business
                    $sql = "SELECT * FROM products WHERE business_id = $business_id";
                    $result = $conn->query($sql);

                    // Generate product list
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="product">';
                            echo '<h4>' . $row['name'] . '</h4>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<p>' . $row['price'] . ' : ' . $row['quantity'] . ' in stock' . '</p>';
                            echo '<button class="product" data-product-id="' . $row['id'] . '">Add to Cart</button>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No products found.</p>';
                    }
                ?>
            </div>
        </main>

        <script>
            function registerWebsite(business_id) {
                window.location.href = "register_website.php?id=" + business_id;
            }
        </script>
    </body>
<?php
    } else {
        // Business not found
        echo '<p>Business not found.</p>';
    }
} else {
    // Business ID not set
    echo '<p>Business ID not set.</p>';
}
?>