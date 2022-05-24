
## Leads Application


# Installation

To install the app, just clone the repository to your local server.

    git clone git@github.com:yusufocaliskan/leads-app.git

After cloning, cd into the `leads-app` folder and run the below commands to install the packages.  With this command composer will install the necessary packages.

    composer install

We must create the `.env` configuration file to define database informations.

    cp .env.example .env && vim .env

Then change the below variables as your's.

    DB_CONNECTION=mongodb
    DB_HOST=127.0.0.1
    DB_PORT=27017
    DB_DATABASE=leads_app
    DB_USERNAME=
    DB_PASSWORD=

Because we are going to use MongoDB database make sure that you assigned the `DB_CONNECTION` variable as `mongodb`

In addition to the database information set the Api Keys of the `MailChimp` with variables below.

    MAILCHIMP_APIKEY=
    MAILCHIMP_LIST_ID=

## Installing MongoDB (Optional)
The app uses MongoDb to store the leads informations. So we need MongoDB on server. To install MongoDB database we use docker-compose. You will need to the Docker app installed on your computer to youse `docker-compose`. 


`cd` into the app file and run the command

    docker-compose up

Docker will install a `mongodb` image from the up and create a container using it.
    
    docker ps

will show us the proccess.


If you already had mongodb installed on your computer, you can pass this step.

## Preparering Laravel
After all those step, now we can migration the tables. In order to create the tables run this command

    php artisan migrate

With fews other table, laravel will create the `leads` table and `users`.

Let's add some record to the tables. We will then needed.

    php artisan db:seed --class=Leads
    php artisan db:seed --class=Users

Because I didn't add the `.env` file to github repository, we must generate an application key. By runing the below command we can now generate the unique for laravel.

    php artisan key:generate

The back-end server is ready, let's test it.

    php artisan serve

This command will start a server on port 8000. http://localhost:8000

## Intallation Of the Vue App
Our vue directory and files are located in `resources` directory so we need to `cd` in to that directory.

    cd resources

And to install the dependencies we must run this command

    npm install

And to run the vite just use the below command

    npm run dev

The vite will open a server over 3000 port so you can use the http://localhost:3000 to go to the application.