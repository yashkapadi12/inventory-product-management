# Project Overview

This is a Product Management System built with Laravel, allowing users to manage products effectively. The application includes user authentication, product CRUD operations, search and filter functionalities, and proper validations.

## Features

- **User Authentication**: Basic authentication system to restrict access to logged-in users.
- **Product Management (CRUD)**: Create, view, edit, and delete products with the following fields:
    - Product Name
    - SKU
    - Quantity
    - Price
    - Description
- **Search and Filter**: Search products by name and filter products with stock less than 10 units.
- **Validations**: Proper validations for required fields and valid formats for price and quantity.
- **Frontend**: Responsive UI using Bootstrap.
- **Database**: MySQL with migration files and seeders for roles and products.
- **Bonus Features (if time permits)**:
    - Export product list in CSV format.
    - User roles with different access levels (Admin can manage products, regular users can only view them).

## Technologies Used

- **Laravel (PHP Framework)**: 11.9
- **PHP**: 8.2
- **MySQL (Database)**
- **Bootstrap (Frontend Framework)**: 5
- **Composer (Dependency Management)**


# Note 
- I have added additional functionality like the ability to reset password, user register, Auth using laravel passport, and everything mentioned in doc requests
- I have added seeder as well for the roles and products
- I have added developer comments to the project



## Step-by-Step Instructions to Run Laravel on Herd

1. **Install Herd**:
    - If you haven't already, download and install Herd from the official website. https://herd.laravel.com/windows
    - Open the Herd application.

2. **Create a New Project**:
    - In the Herd application, click on "Create New Project."
    - Select PHP version which is 8.2 in this case you have to remove the xampp php path if xampp is already installed if using xampp is easy option here.
    - Select your Laravel project directory (the one you created or cloned).
    - Herd will automatically detect it as a Laravel project.

3. **Set Up the Environment**:
    - Open the `.env` file in your Laravel project directory and configure your database connection settings:
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<your_database_name>
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    - Make sure to create a database in your MySQL setup that matches the `<your_database_name>` you specified.

4. **Install Composer Dependencies**:
    - Open the terminal (you can use the built-in terminal in Herd).
    - Navigate to your Laravel project directory if you haven't already:
    ```bash
    cd /path/to/your-laravel-project
    ```
    - Run the following command to install the required dependencies:
    ```bash
    composer install
    ```

5. **Generate Application Key**:
    - Still in your terminal, run:
    ```bash
    php artisan key:generate
    ```

6. **Run Migrations and Seeders**:
    - Execute the following command to create your database tables and seed them with initial data:
    ```bash
    php artisan migrate --seed
    ```

7. **Start the Application**:
    - In the Herd application, you can start the development server by clicking on the “Start” button for your project.
    - If you using herd You’ll be provided with a local URL (usually something like `https://inventory-management.test/`). If you using herd

## Accessing Your Application

- Open your web browser and go to the provided URL (e.g., `https://inventory-management.test/`).




## Step-by-Step Instructions to Run Laravel on XAMPP

1. **Install XAMPP**:
    - If you haven't already, download and install **XAMPP** from the [official website](https://www.apachefriends.org/index.html).
    - Launch the XAMPP Control Panel and start the **Apache** and **MySQL** modules.

2. **Download or Clone the Project**:
    - Download the project files or clone the repository into the `htdocs` directory of your XAMPP installation. The path is usually:
      ```
      C:\xampp\htdocs\
      ```

3. **Set Up the Environment**:
    - Open the `.env` file in your Laravel project directory and configure your database connection settings:
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<your_database_name>
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    - Make sure to create a database in your MySQL setup that matches the `<your_database_name>` you specified. You can do this via phpMyAdmin by navigating to `http://localhost/phpmyadmin`.

4. **Install Composer Dependencies**:
    - Open the Command Prompt (cmd).
    - Navigate to your Laravel project directory:
    ```bash
    cd C:\xampp\htdocs\your-laravel-project
    ```
    - Run the following command to install the required dependencies:
    ```bash
    composer install
    ```

5. **Generate Application Key**:
    - Still in your Command Prompt, run:
    ```bash
    php artisan key:generate
    ```

6. **Run Migrations and Seeders**:
    - Execute the following command to create your database tables and seed them with initial data:
    ```bash
    php artisan migrate --seed
    ```

7. **Start the Application**:
    - Open your web browser and navigate to:
    ```
    http://localhost/your-laravel-project/public
    ```

## Accessing Your Application

- Open your web browser and go to the provided URL (e.g., `http://localhost/product-management/public`).
