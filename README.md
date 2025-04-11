# book_review


# Book Review App

A simple yet feature-rich web application built using PHP with Laravel for the backend, and HTML, CSS, Bootstrap, jQuery, and Blade for the frontend. The app allows users to search for books by title, write reviews, and interact with an admin dashboard. Admins can manage books, approve or reject user reviews, and oversee user activity.

## Features
#### User Features:

- Search for books by title
- Write reviews for books
- View reviews from other users
- User dashboard to view their own reviews
- User dashboard to view their own reviews

#### Admin Features:

- CRUD functionality for books (Create, Read, Update, Delete)
- Approve or reject user reviews
- Manage user activity and reviews via the admin dashboard
- User dashboard to view their own reviews



## Requirements

#### Before installing the app, make sure you have the following installed on your machine:
- PHP >= 8.2
- Composer
- Laravel 11
- MySQL
- Node.js and npm


## Installation

Step 1: Clone the repository

```bash
  git clone https://github.com/parimalroy/book_review.git
  
  cd book_review
```
    
Step 2: Install Composer dependencies

##### Install the necessary PHP dependencies using Composer:
```bash
 composer install
```

Step 3: Set up your environment file

##### Copy the .env.example file to create your .env configuration file:
```bash
 cp .env.example .env
```

Step 4: Configure your database

###### Open the .env file and set up your database credentials. Here's an example for MySQL:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_review_db
DB_USERNAME=root
DB_PASSWORD=
```
Step 5: Generate the application key
##### Run the following command to generate your application's encryption key:
```bash
 php artisan key:generate
```

Step 6: Run database migrations

```bash
 php artisan migrate
```

Step 7: Install front-end dependencies

```bash
npm install
```

Step 8: Install public storage link

```bash
php artisan storage:link
```

## Front End:

- Users can search for books by title through a search bar available on the homepage.

#### Book Reviews
- Users can write reviews for books. Each book will have a dedicated page where users can submit their reviews.

## Dashboards

#### Admin Dashboard: 
- Allows admins to manage books, approve/reject reviews, and manage users

#### User Dashboard: 
- Displays a list of books the user has reviewed and provides options to update or delete reviews.

## Admin Panel
The admin panel can be accessed by logging in with admin credentials. Features available in the admin panel include:
- Book Management: Admins can add, update, or delete books.
- User Review Approval: Admins can approve or reject user-submitted reviews.
- User Management: Admins can view user details and manage user activity.

## User Panel
Users can register, log in, and access their own personalized dashboard, where they can:
- View their written reviews
- Edit or delete existing reviews
- Search and view books by title
- Write new reviews for books

## Technologies Used
#### Backend:
- PHP, Laravel

#### Frontend:
- HTML, CSS, Bootstrap, jQuery, Blade templating engine

#### Database
- MySQL

#### Authentication
-  Laravel Auth Middleware for both users and admin


