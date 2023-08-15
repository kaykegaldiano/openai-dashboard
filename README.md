# Installing the project

This project utilizes Docker Containers, through the Laravel Sail package in order to facilitate the development environment configuration. Therefore, you must already have Docker and Docker Compose installed on your machine.

You are free to run this project in local environment, but this text will not deal with this situation.

### Steps to run the project locally:

- Clone the project to your local machine
- Create a `.env` file, I recommend using `.env-example` as a base
- Add or change the keys as per your need
- Access the project folder via console (terminal/PowerShell/CMD)
- Run the command:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
 ```
- After processing is complete, run the command `./vendor/bin/sail up -d`

The first command performs the packages installation via composer specified in `composer.json` file and once the installation ends, the *vendor* folder becomes available in the project. The next command raise the containers based on service description made in the `docker-compose.yml` file.

By default, no configuration is needed in the *.env* project file. In case any editing is needed in the default configuration (related to binding ports or database credentials), just edit the *.env* file.

# Working with Containers

Once the project is running on top of Docker containers, it is clear the situation that the local machine does not have any of the necessary requirements to work on the project, so commands like `php artisan`, `composer` or `npm` will not work locally. To run commands in one of the project containers, a `php artisan route:liste` for example, you need to use Docker for this, for example:

```bash
docker-compose exec \ # executing a command in an existing container
    -u sail \ # specifies the username to be used within the container
    laravel_project.test \ # specifies which container will receive the command
    php artisan route:list # what command to run
```

 The execution, therefore, becomes very verbose and laborious, which can lead to potential execution errors. Thus, *Laravel Sail* provides a script called `sail` that is located at *vendor/bin/*. This script allows such commands to be executed through aliases so that the development flow is more natural and less complex. So, to run the same `php artisan route:list` command with the `sail` script would look like this:

 ```bash
 ./vendor/bin/sail artisan route:list

 # or

 ./vendor/bin/sail art route:list
 ```

### Available commands

To see the commands available through the sail script, run ./vendor/bin/sail -h for a complete listing of options with description.

# Next steps
Migrations are a way to version your database tables. To structure your database
- Run `./vendor/bin/sail art migrate` to assemble and add the tables to your database

- Run `./vendor/bin/sail art db:seed` to populate your database with dummy data
