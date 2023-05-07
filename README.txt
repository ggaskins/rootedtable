Project Title
Rooted Table - Local Farms Directory

Description
Rooted Table is a local farms directory that helps users find nearby farms and learn about their offerings. The project includes a database of local farms, a login system with user roles, and features like "nearby farms", "results per page", "add business", "edit business", and "delete business".

Installation
Clone or download the project files from the GitHub repository.
Create a MySQL database and import the provided data from the "businesses.sql" file.
Update the database configuration in the "config.php" file with your database credentials.
Upload the project files to your web server.
Navigate to the project URL in your web browser to view the website.
Usage
Login System
The Rooted Table login system has two user roles: "admin" and "user". Admin users can add, edit, and delete businesses, while user users can only view the businesses.

To log in, click the "Login" button in the top right corner of the website. Enter your username and password and click "Login". If you don't have an account, click the "Register" button to create one.

Local Farms
The "Local Farms" page displays a list of all the businesses in the database. Users can choose how many businesses they want to see per page using the "Results per page" dropdown menu. The feature uses cookies to remember the user's preference.

Nearby Farms
The "Nearby Farms" page allows users to use an interactive map and see a list of farms sorted by distance from their location. The feature uses the Google Maps API to geocode the user's address and calculate the distance between each farm and the user.

To use the "Nearby Farms" feature, click the "Nearby Farms" link in the top navigation menu. Enter your address in the form and click "Find Farms". The website will display a list of farms sorted by distance from your location.

Add Business
Admin users can add new businesses to the database using the "Add Business" feature. To add a business, log in as an admin and click the "Add Business" link in the top navigation menu. Fill out the form with the business's name, address, website, and image URL and click "Add Business". The new business will be added to the database and displayed on the "Local Farms" page.

Edit Business
Admin users can edit existing businesses in the database using the "Edit Business" feature. To edit a business, log in as an admin and click the "Edit" button next to the business on the "Local Farms" page. Fill out the form with the updated information for the business and click "Save Changes". The business's information will be updated in the database and displayed on the "Local Farms" page.

Delete Business
Admin users can delete existing businesses from the database using the "Delete Business" feature. To delete a business, log in as an admin and click the "Delete" button next to the business on the "Local Farms" page. A confirmation message will be displayed. Click "OK" to delete the business from the database. The business will be removed from the "Local Farms" page.

Credits
The Rooted Table project was created by Griffin Gaskins. The project uses the following technologies:

HTML
CSS
JavaScript
PHP
MySQL
Google Maps API
License
The Rooted Table project is licensed under the MIT License. Feel free to use, modify, and distribute the code as you see fit.
