# e-commerce Backend APIs
    This Laravel project is an implementation of the DDD (Domain Driven Design) 
    which is made to separate the Modules that corresponds to the real world.
    I used Design Patterns used in this Project, for example: Repository Battern: we use it for singularity and to easly switch between DBMSs.
    Also I used Services to separate the logic from the caller functions. 
    
    I Also used events that fires on actions to inform the Merchent of the new purchase of his products

    This project is made using Docker, So all you need to do is open a terminal inside the root file of the project and execute this command:
        ```
        > ./vendor/bin/sail up
        ```
    
    After that you need to run the migration to create the DB as follows:
        ```
        > php artisan migrate
        ```
    You're going to need to run the seeders for quick start:
        ```
        > php artisan db:seed
        ```
        
    Attached with the project files the Postman .json file to use the APIs, Import it to Postman and you're good to go
