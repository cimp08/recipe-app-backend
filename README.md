# Recipe APP -Backend

---

For the frontend [Github](https://github.com/cimp08/recipe-app-frontend), including the deploy.

## Deployment

The site is deployed on Heroku: [recipesite-app.herokuapp.com](https://recipesite-app.herokuapp.com)

## Getting started

Clone repo and run:

-   Clone the repository in your project folder. Docker-compose.yml and Dockerfile is included.
-   Navigate to the root directory of the project and: RUN docker-compose up in your preferred CLI
-   Fix db in .env file using this:

---

DB_CONNECTION=mysql  
DB_HOST=db  
DB_PORT=3306  
DB_DATABASE=laravel  
DB_USERNAME=root  
DB_PASSWORD=example

---

-   Attach a shell and then install composer with "composer install" in the root of the project (cd movieme)
-   Open http://127.0.0.1:8080/ in the browser to view the db, log in using the credentials stated in the third step and when inside create a new database called laravel.
-   Run "php artisan migrate"
-   Generate your application encryption key using `php artisan key:generate`
-   Run "php artisan serve --host 0.0.0.0 --port 8000"
