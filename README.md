   ![Leads Application](../leads-app/resources/public/screen-shot.png)


# Leads Application
Leads Application basically captures potetial Leads with some information. We stores their informations on the Mongo database and also save them in a MailChimp list so we can send them e-mail for marketing purpose. 

In this SPA I used the version 3 of VueJs with Composition Api. Compisition APi helps to write more filexable and readable codes.

# Create

## Add New Route
In order to add new page to the system you should create the route for both side route. Because knowing how to create a routes for laravel is a common knowledge I'm not going to explain in here. 

The app using Laravel api routes, so the links will be like that:

http://localhost:8000/api/xxx/yyy

The `api` indicator must be added to the url when sending a request to server.

For the system that I created by using `Vue`, to insert a new `route`, go and choose a router type (admin/client) in the `router` directory under `resources`.

Import a new page component to at the top of admin.js (for exp.) 

    import ANewPage from '../pages/ANewPage.vue'

And then add those line to the json formatted variable that named `admin_routes`

    {
        path: '/a-new-page',
        component:ANewPage,
        name: 'new-page',
        meta: {
            layout:'AdminLayout',
            auth:true,
            title: 'A new Page | Leads Application',
            dashboard_title: 'New Page',
        }
        
    },
    
- **path** : the link.<br>
- **component** : the component that imported above.<br>
- **name** : Giving a new name to the route would help us to reaching it easyly <br>
- **meta** : the section is customizable.<br>
     - **layout** : The shape of the page. There are several of it.(ClientLayout, AdminLayout, LoginLayout.) You can also create one. But you how import it in to `App.js`<br> 
     - **auth** : If the page needed to auth set it true. <br> 
     - **title** : Page title <br>
     - **dashboard_title** : Header title in the dashboard page.

## Add New Page Component
Let's create the ANewPage component under the `pages` directory. And add some staff..
    
    <template>
        <h1 class="text-lg text-indigo-400">Silav, dinya</h1>
        <h1 class="text-lg text-indigo-400">Hello, World</h1>
    </template>

to add the new page link to Dashboard navigation links, go to and open the `components/admin/DashboardNavigation.vue` ad find the `nav` conts to add the path

    { name: 'New Page', path: '/new-page', current: false },

After this change the link will be apeare at the top of admin layout.

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

Open the `docker-compose.yml` file and change the `volume` value as you wish. In this example, I save the MongoDb datas under "/opt/data" direction.

`cd` into the app file and run the command

    docker-compose up

Docker will install a `mongodb` image from the up and create a container using it.
    
    docker ps

This command will show us the proccess. Let's check if the `container` created correctly.

    docker container ls -a

Make sure if there was a container with name `leads-mongo`.

If you already had mongodb installed on your computer, you can pass this step.

## Preparering Laravel
After all those step, now we can migration the tables. In order to create the tables run this command

    php artisan migrate

With fews other tables, Laravel will create two more tables with the name `leads` and `users`.

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

The vite will open a server over 3000 port so you can use the http://localhost:3000 to go to the application. You can use those information to logged in to dashboard

**E-mail** : usib@gmail.com <br>
**Password** : 2121

(for now we don't let the admin to change login informations.)


# Some Extra Information
Let me give you some more information about the packages that I used to create the application.

- **vuex**: 
In addition to those information, I create a store by using vuex, to hold the important information and share them among all the components.

- **vue-router** to routing the incoming request I used vue-router which in history.
  
- **axios** Axios helps us to sent xhttp request to server.

- **vue-toastification** Toast package helped me to create pretty good alert

- ***flowbite, tailwindcss** helped me to desing the layouts
  

