# Social Posting Application

SocialPoster is an application that lets users schedule and post to Social Media. 

### Design consideration

- This application currently supports only Facebook auto posting, Twitter & Google+ can be added in the future.

### System Requirements
 - Appication requires PHP 5.3.2+ to run.
 - Composer 


### Installation instructions

- Application utilizes *Composer* to manage its dependencies. So, before using the application, make sure you have Composer installed on your machine.
- All of the configuration files for the application are stored in the config directory. 
- 3rd Party plugins and SocialPosting package will be added to /vendor after composer install

**Facebook app configuration:**

*config   ->    laravel-facebook-sdk.php*

*Configuration keys can be set in the .env environment file.*

    facebook_config' => [
        'app_id' => env('FACEBOOK_APP_ID'),
        'app_secret' => env('FACEBOOK_APP_SECRET'),
        'default_graph_version' => 'v2.3',
        //'enable_beta_mode' => true,
        //'http_client_handler' => 'guzzle',
    ],

- Test your app by navigating to your site's homepage and click on login with facebook link.

### Folder Structure
```
├───app
│   ├───Console
│   │   └───Commands
│   ├───Events
│   ├───Exceptions
│   ├───Http
│   │   ├───Controllers
│   │   │   └───Auth
│   │   ├───Middleware
│   │   └───Requests
│   ├───Jobs
│   ├───Listeners
│   ├───Policies
│   └───Providers
├───bootstrap
│   └───cache
├───config
├───database
│   ├───factories
│   ├───migrations
│   └───seeds
├───public
├───resources
│   ├───assets
│   │   └───sass
│   ├───lang
│   │   └───en
│   └───views
│       ├───errors
│       ├───social-posting
│       └───vendor
├───storage
│   ├───app
│   │   └───public
│   ├───framework
│   │   ├───cache
│   │   ├───sessions
│   │   └───views
│   └───logs
```

### Todos

 - Add other social media (Twiitter, Google+) 

License
----

MIT

