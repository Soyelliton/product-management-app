# Laravel Product Management and Shopping Cart Application

## Overview
This is a Laravel application that includes product management with role-based access control and a shopping cart feature. Admin users can manage products and view orders, while regular users can add products to their cart and proceed through the checkout process.

## Features
- Role-based authentication using Laravel Breeze.
- Admin users can create, edit, update, and delete products.
- Users can add products to a cart, view their cart, and proceed to checkout.
- Order management for Admins, allowing them to view user orders and order details.

## Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL or another compatible database
- Node.js and npm (for frontend assets)

## Project Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Soyelliton/product-management-app.git
   cd product-management-app
2. **Install PHP dependencies:**
   ```bash
   composer install
3. **Install JavaScript dependencies:**
   ```bash
   npm install && npm run dev
4. **Environment Configuration:**
   - Copy the .env.example file to create a .env file.
   - Set your database credentials in the .env file:
   ```bash
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
5. **Generate Application Key:**
   ```bash
   php artisan key:generate
6. **Run Migrations and Seeders:**
- This command will create the necessary database tables and insert default data.
    ```bash
    php artisan migrate --seed
7. **Start the development server:**
    ```bash
    php artisan serve
8. **Access the Application:**Open your browser and navigate to:
    ```bash
    http://localhost:8000
## User Roles
- **Admin:** Can manage products and view all user orders.
- **User:** Can view products, add them to the cart, and place orders.

## Product Management (Admin Only)

Admins can manage products through the following routes:

- View all products: /products
- Create a new product: /products/create
- Edit a product: /products/{id}/edit

## Cart and Checkout
### Adding Products to Cart
- Visit the product listing page as a user and click "Add to Cart" for any product.
- The cart data is stored in the session until the user proceeds to checkout.

## Viewing Cart
- Visit /cart to view items currently in the cart.
- Users can update the quantity or remove items from the cart.
## Checkout Process
- Visit /checkout to proceed with the checkout.
- Login or register if not already authenticated (required for placing an order).
- Complete the checkout process to place an order.
- After a successful order, the cart will be cleared.

## Order Management (Admin Only)
Admins can view all user orders and their details through the following routes:

- View all orders: /admin/orders
- View specific order details: /admin/orders/{order}
## Database Migrations
The following tables are used in the project:

- **users:** Stores user information, including roles (Admin or User).
- **products:** Stores product details such as name, description, price, and quantity.
- **orders:** Stores order information, including user ID and total amount.
- **order_items:** Stores each item associated with an order, including product ID, quantity, and price.

    To run the migrations manually, use:
    ```bash
    php artisan migrate

## Seeders
By running php artisan migrate --seed, some default data will be inserted:

- An admin user for testing (email: admin@gmail.com, password: 12345678)
- Some sample products.

## Testing and Debugging
- Use the Laravel Tinker tool for testing database queries:
    ```bash
    php artisan 
- For viewing logs, use:
    ```bash
    tail -f storage/logs/laravel.log
