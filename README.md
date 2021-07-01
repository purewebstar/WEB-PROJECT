# WEB-PROJECT
customer, expert and admin CRUD operations

IT is DESIGNED WITH MVC ARCHITECTURE from scratch
#Model - inorder to connect to database.
#Controller - middleware to accept request and delivery the response.
#View - requested view file ( web pages ) any static html or php files.

project folder have two main folders and one file
1. public contains
- contains assets and index.php file with .htaccess file.
2. Src folder contains
#core - folder holds (Controller class, Route class, Model class and sql file).
#config - folder with configuration in databse username, password, database name and host.
#model - folder where database CRUD operation perform.
#controller - folder where matching up requests with responses.
#load.php - loads necessary files and initilizes Route class.
#.htaccess - hides all src folder files.
#view - filder where static files (html) or php web pages is placed.
3. .htaccess
- redirects all requests first to public folder.
