
# Product API

The Product API is a simple API that allows users to manage and sell products. Users can create, read, update, and delete products, as well as search for products by name or price.

# Technologies used

The Product API is built using the PHP programming language and the Laravel framework. We also used the Laravel Sanctum package to provide authentication and Laravel Dusk for testing.

# API endpoints

The Product API provides the following endpoints:

GET /api/products: Get a list of all products

GET /api/products/{id}: Get a single product by ID

POST /api/products: Create a new product

PUT /api/products/{id}: Update an existing product by ID

DELETE /api/products/{id}: Delete an existing product by ID

GET /api/products/search: Search for products by name or price

All endpoints except for the search endpoint require authentication using the Laravel Sanctum package. Users can authenticate by sending a POST request to /api/login with their email and password. This will return an access token that they can use to authenticate subsequent requests.

The request and response formats for each endpoint are as follows:

GET /api/products: Returns a JSON array of product objects.

GET /api/products/{id}: Returns a JSON object representing the product with the given ID.

POST /api/products: Accepts a JSON object representing the new product to create. Returns a JSON object representing the created product.

PUT /api/products/{id}: Accepts a JSON object representing the updated product. Returns a JSON object representing the updated product.

DELETE /api/products/{id}: Deletes the product with the given ID. Returns an empty response.

GET /api/products/search: Accepts query parameters for name and price. Returns a JSON array of product objects that match the search criteria.

# Input validation and error handling

All API endpoints include input validation and error handling to prevent malformed requests and provide meaningful error messages. For example, if a user sends an invalid email address when logging in, the API will return a 422 Unprocessable Entity error with a message explaining the validation error.

# Additional features

In addition to the basic CRUD operations, the Product API also includes a search endpoint that allows users to search for products by name or price. Users can send a GET request to /api/products/search with query parameters for name and price. The API will return a list of products that match the search criteria.

# Conclusion

The Product API is a simple but powerful tool for managing and selling products. By leveraging the power of the Laravel framework, we were able to quickly build a robust API that includes authentication, input validation, and error handling. We also added a search endpoint to make it easy for users to find the products they need. Overall, we are confident that the Product API will meet the needs of our client and their users.