# Ecommerce API
This is a minimal sample API for an Ecommerce Application.

## Installation and Requirements
1. Install [Composer](https://getcomposer.org/download/)
2. Install [Node](https://nodejs.org/en/)
3. Install [Xampp](https://www.apachefriends.org/download.html)
4. Install [Postman](https://www.postman.com/downloads/)
5. Clone the Repository under the ***"xampp/htdocs"*** directory.
6. Use the [Composer](https://getcomposer.org/download/) to install the required dependencie by navigating to the root directory of the cloned repository and run the following command inside Terminal:
```bash
composer install
``` 

## Running the application
1. Run Xampp.
2. Make sure to verify the Apache Server and PhpMyAdmin is running.
3. Make sure to create a new database with name ***"ecommerce_api"*** using PhpMyAdmin.
4. Under the root directory run the following command inside Terminal:
```bash
php artisan db:seed 
```
5. Run the following command to create the Secret key for generating access_key as follows:
```bash
php artisan passport:install 
```
This will create **"EcommerceAPI Personal Access Client"** and **"EcommerceAPI Password Grant Client"** along with their **"secret"** in the "oauth_clients" table inside the database. These keys are also visible after the above command is executed.
6. In the Postman send a GET request to grab the ACCESS TOKEN:
 - Open Postman and prepare a request to GET the ACCESS TOKEN for any of the users under the **"users"** table in the database.
				Url: http://localhost/ecommerce/public/oauth/token
				Request Type: Post
				Headers: Accept : application/json
						 Content-Type : application/json
				Body:raw {
							"grant_type" : "password",
							"client_id" : 2,
							"client_secret" : "gscjks7v6bb06kEPE1ONkLP6LuoUWHJGVFDsjVB",
							"username" : "email@example.com",
							"password" : "password"
Grab any **"Username(Email)"** from the **"user"** table in the database. Password is ***"password"***.  **"client_secret"**  is the value of **"EcommerceAPI Password Grant Client's"** **"secret"**  and **"client_id"**  **"2"**  from the "oauth_clients" table.
7. Copy the access_token which will be used to make calls as **"Authorization => Bearer Token"**  mentioned in the next section.

## Endpoints
Import the **"Ecommerce API.postman_collection.json"** into Postman and a quick overview of some of the Ecommerce API structure is as follows:
| Description | Endpoints | Payload | HTTP Methods |
| ------------- | ------------- | ------------- | ------------- |
| Get all Products: | `http://localhost/ecommerce/public/api/products` | | GET |
| Get one Product: | `http://localhost/ecommerce/public/api/products/10` | | GET |
| Create a Product: | `http://localhost/ecommerce/public/api/products` | Bearer Token: **"Copied in point 7"** content-type: contentTypeJson, {"name" : "iPhone 11", "description" : "The best iPhone in small size", "price" : 1399, "stock" : 9, "discount" : 10} | POST |
| Update a Product: | `http://localhost/ecommerce/public/api/products/10` | Bearer Token: **"Copied in point 7"** content-type: contentTypeJson, {"name" : "UPDATED: iPhone 11", "description" : "UPDATED: The best iPhone in small size", "price" : 1399, "stock" : 9, "discount" : 10} | POST |
| Delete a Product: | `http://localhost/ecommerce/public/api/products/101` | Bearer Token: **"Copied in point 7"** | POST |
| Get all Reviews for a Products: | `http://localhost/ecommerce/public/api/products/10/reviews` | | GET |
