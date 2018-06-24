## Installation

1. Database Configure:
Go to /config/app.php and set database settings in Datasources settings

2. Installing dependences
```bash
$ composer install
```
## Not done yet
1. You  need to import the database
        ```bash
        $ bin/cake migrations migrate
        ```
2. Now seed the Apps
        ```bash
        bin/cake migrations seed
        ```
## Using it
1. Listing restaurants
	```
		GET /restaurants
	```
2. Acessing restaurants data
	```
		GET /restaurants/{RESTAURANT_ID}
	```
3. Retrieving restaurant categories
	```
		GET /restaurants/{RESTAURANT_ID}/categories
	```
3. Listing restaurant dishes by category
	```
		GET /restaurants/{RESTAURANT_ID}/categories/{CATEGORY_ID}
	```
3. Listing restaurant dishes
	```
		GET /restaurants/{RESTAURANT_ID}/dishes
	```

# All the images has been taken from Google Image and should not be used
