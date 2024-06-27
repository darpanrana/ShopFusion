# E-Commerce Project

## Overview

This is an e-commerce web application built using the Laravel framework. The application provides a platform for users to browse, search, and purchase products online. It includes features such as user authentication, product management, order processing, and payment integration.

## Features

- User Authentication (Register, Login, Password Reset)
- Product Catalog (View Products, Search, Filter by Category)
- Shopping Cart (Add to Cart, Remove from Cart)
- Order Management (Checkout, Order History)
- Payment Integration (Stripe)
- Admin Dashboard (Manage Products, Orders, Users)

## Set up the database:

- Create a new MySQL database.
- Update the `.env` file with your database credentials.
- php artisan migrate
- first create a account then change mannually in user_type filed "user" to "admin"

## Usage

- Register a new account or log in with an existing account.
- Browse products and add them to your shopping cart.
- Proceed to checkout and complete the order.
- Admin users can log in to the admin dashboard to manage products, orders, and users.
