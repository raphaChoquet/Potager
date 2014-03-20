Install guide Garden War
========================

Welcome on the install guide of Garden War.

Follow the next step to make a nice soup !

1) Installing Garden War
----------------------------------

When it comes to installing Garden War, you have the
following options.

### Clone project from Github

    git clone https://github.com/raphaChoquet/Potager.git

### Use Composer

As Garden War uses [Composer][2] to manage its dependencies.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

You need to download and install all the necessary dependencies. Download composer (see above) and run the
following command:

    php composer.phar install

### Install the database

You need to have a database to use our project. You can install ours, following these instructions

Create the database

    php app/console doctrine:database:create

Create the schemas

    php app/console doctrine:schema:update --force

Load the fixtures

    php app/console doctrine:fixtures:load

Install assets

    php app/console assets:install --symlink



Enjoy the fight !
