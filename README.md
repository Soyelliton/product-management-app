Documentation: Laravel Product Management Application
Table of Contents
Project Setup
Database Migrations
Using the Cart
Checkout Process
Order Management for Admin
1. Project Setup
Prerequisites
PHP 8.1+
Composer
MySQL or any compatible database
Laravel 10+
Steps for Setup
Clone the Repository

bash
Copy code
git clone <repository-url>
cd project-directory
Install Dependencies Run the following command to install Laravel dependencies:

bash
Copy code
composer install
Environment Configuration

Duplicate the .env.example file and rename it to .env.
Update the .env file with your database credentials:
env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
Generate Application Key Generate the application key for Laravel:

bash
Copy code
php artisan key:generate
Run Migrations Migrate the database to create the necessary tables:

bash
Copy code
php artisan migrate
Seed Admin User (Optional) If you have set up seeding for creating an admin user, run:

bash
Copy code
php artisan db:seed --class=AdminUserSeeder
Run the Server Start the development server:

bash
Copy code
php artisan serve
Access the Application Open your browser and navigate to:

arduino
Copy code
http://localhost:8000
2. Database Migrations
The database consists of the following tables:

users: Stores user information, including roles (e.g., 'admin', 'user').
products: Stores product details such as name, description, price, and quantity.
orders: Tracks each order with user_id, total, and status.
order_items: Stores individual items for each order with order_id, product_id, quantity, and price.
Ensure you have migrated the tables using:

bash
Copy code
php artisan migrate
If you need to create an admin user for testing, you can create it directly in the database or by using a seeder with an 'admin' role.

3. Using the Cart
The cart allows users to add products and manage them before proceeding to checkout. Here’s how the cart functionality works:

Adding Products to the Cart

Browse the products on the home page.
Click the "Add to Cart" button on a product.
The cart will store items using Laravel sessions for guest users.
For logged-in users, the cart is still session-based, allowing them to modify their cart before placing an order.
Viewing the Cart

Navigate to the cart page (e.g., /cart).
View the list of products added to the cart, along with their quantities and prices.
Adjust quantities or remove items directly from the cart.
Cart Summary

The cart page displays a summary of the total price.
If the cart is empty, users are shown a message indicating that their cart is empty.
4. Checkout Process
To proceed with a purchase, users must be registered and logged in. The checkout process involves the following steps:

Log In or Register

Users must log in or create an account to proceed to checkout.
The login and registration pages are available at /login and /register.
Proceed to Checkout

Once logged in, navigate to the cart page.
Click the "Checkout" button to proceed with the order.
The checkout page will display the order summary and the total amount.
Placing an Order

After reviewing the order, click "Place Order" to finalize the purchase.
The order is saved in the orders and order_items tables.
The cart is cleared after the order is placed successfully.
Users are redirected to a page showing their order details and a success message.
Viewing User Orders

Users can view their order history by navigating to a page (e.g., /user-orders).
This page lists all past orders and provides links to view order details.
5. Order Management for Admin
Admin users can manage all orders placed by users through the following steps:

Accessing the Admin Dashboard

After logging in as an admin, navigate to the admin dashboard (e.g., /dashboard).
Managing Products

Click on the "Product Management" button to view, add, edit, or delete products.
Viewing and Managing Orders

Click on the "Order Management" button to view all orders.
The list shows order details, including the user who placed the order, the total amount, and the order status.
Admins can update the status of orders (e.g., 'pending', 'shipped', 'delivered').
