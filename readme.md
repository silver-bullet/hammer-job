Steps:

$ git clone https://github.com/silver-bullet/myhammer-jobs.git

$ composer install

$ cp .env.example .env

You will need to create an empty database for this project.
Set the database credentials in .env file

$ php artisan migrate

$ php artisan db:seed

$ php artisan key:generate

$ php artisan serve

Open http://localhost:8000/ on your browser and you should find some text shown. 
It would be nice to read it to get some general information about the API

To access full API documentation, head to:
http://localhost:8000/api/v1/docs

Now You can try sending requests to API endpoints as shown in the swagger-based API documentation

Good luck!

