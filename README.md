# **Todo APP**

This project is a simple RESTful API built using Laravel 11 for managing tasks in a Todo List. It supports basic CRUD operations, token-based authentication using Laravel Sanctum, and task filtering based on completion status.

## **Requirements**

* PHP \>= 8.2  
* Composer  
* MySQL  
* XAMPP (optional, for local development)

## **Features**

* **CRUD for Tasks**: Create, Read, Update, Delete tasks.  
* **Authentication**: API token-based authentication using Laravel Sanctum.  
* **Task Filtering**: Filter tasks based on their completion status.

## **Installation**

1. **Clone the repository**:

	git clone https://github.com/priyansh157/todo-app.git
cd todo-app ( from cmd or terminal go the downloaded todo app directory)

      2\.   **Install dependencies**:  
composer install

      3\.   **Set up your database credentials** in `.env`  
	`DB_CONNECTION=mysql`  
    `DB_HOST=127.0.0.1`  
    `DB_PORT=3306`  
    `DB_DATABASE=todo`  
    `DB_USERNAME=root`  
    `DB_PASSWORD=`

4\.    Make a database with the name todo. 

5\.     **Generate application key**:   
`php artisan key:generate`

6\.     **Run the database migrations**:  
php artisan migrate

7\.     **Install Sanctum**:  
composer require laravel/sanctum

8\.     php artisan vendor:publish \--provider="Laravel\\Sanctum\\SanctumServiceProvider"

9\.   **Serve the application**:  
php artisan serve

10\. Set up API routes: The API routes are defined in the routes/api.php file. Make sure the routes are properly set up, including routes for registering, logging in, and managing tasks.

## **API Documentation**

### **Authentication Routes**
Note:  http://your-domain=> is the url on which your application is running for example:http://127.0.0.1:8000
* **Register**:  
  **Method**: `POST`  
  **URL**: `http://your-domain/api/register`  
  **Body**: Set the body to `raw` JSON like this:

	{  
  "name": "Your Name",  
  "email": "example@example.com",  
  "password": "password",  
  "password\_confirmation": "password"  
}

**Response**:  
{  
  "access\_token": "some\_token\_here",  
  "token\_type": "Bearer"  
}

**Login**:  
`POST http://your-domain/api/login`  
Body:

{

  "email": "example@example.com",

  "password": "password"  }

**Response**:

{ 

"access\_token": "some\_token\_here"

, "token\_type": "Bearer"

 }

**Note: Please store this access\_token as it will be needed for using authorization token on the further apis.**

**Task Apis:**

### **1\. Get All Tasks**

* **Endpoint: `http://your-domain/api/tasks`**  
* **Method: `GET`**  
* **Description: Fetches a list of all tasks.**  
* **Request Body: None**  
* **Authorization: Bearer Token (use the token from the login response)**

  ### **2\. Get Task by ID**

* **Endpoint: `http://your-domain/api/tasks/{id}`**  
* **Method: `GET`**  
* **Description: Fetches a specific task by its ID.**  
* **Request Body: None**  
* **Authorization: Bearer Token**

  ### **3\. Create a New Task**

* **Endpoint: `http://your-domain/api/tasks`**  
* **Method: `POST`**  
* **Description: Creates a new task.**  
* **Request Body (example):**

  {

   "title": "New Task",

   "description": "Task description",

   "status": "incomplete" }

  **Authorization**: Bearer Token


## **4\. Update an Existing Task**

* **Endpoint**: `http://your-domain/api/tasks/{id}`  
* **Method**: `PUT`  
* **Description**: Updates a task.  
* **Request Body** (example):

{ "title": "Updated Task Title", 

"description": "Updated Task Description", 

"status": "complete" }

### **5\. Delete a Task**

* **Endpoint**: `http://your-domain/api/tasks/{id}`  
* **Method**: `DELETE`  
* **Description**: Deletes a task by its ID.  
* **Request Body**: None  
* **Authorization**: Bearer Token

**6\. All Task By status**

* **Endpoint**: `http://your-domain/tasks/status/{status}` 
* **Method**: `GET`  
* **Description**: GET tasks by status (complete tasks and incomplete tasks).  
* **Request Body**: None  
* **Authorization**: Bearer Token

For testing the API you can use postman to send requests to the API. Ensure that for all routes except login and register, you include the `Authorization` header with a valid Bearer token which you would have received in response of login api:

**Authorization: Bearer \<your-token\>**

   

