## Ecomitize: vehicles task

##### Overview

This task is like a game and I hope it would be interesting.
In any case, imagine a big garage. It contains vehicles.
Vehicles like trucks, planes, cars, bikes etc.
These vehicles have their abilities, for instance, plane can fly, boat can swim,
car can switch music on.
Every vehicle has to refuel, that's why every vehicle has such ability.
There are several issues and we hope you'd solve them for us.

##### Instructions

Create a repository in your github account
Look at our code in kindaShittyExample.php, believe me, it's kinda shitty
Make this code as good as you can
Make as many commits as you want
Show us you power
Push into a repository
Give us a link to your repository to check.

Nice to have in result code

 - php 7

 - Unit tests

 - docker environment

## Usage

1. `git clone`
2. `docker-compose up -d --build`
3. `docker ps -a` should give the output like this:

`279c343773c4    ecomitize_php  "docker-php-entryp..."   16 hours ago    Up 38 seconds     ecomitize_php_1`

so `ecomitize_php_1` is the container name in this case

4. `docker exec -it ecomitize_php_1 composer install`

5. to run the app: `docker exec -it ecomitize_php_1 php index.php`

it should process output like this:

```
Kamaz moving.
Kamaz stopped.
Kamaz empty loads.
Kamaz refueled.
BMW moving.
BMW stopped.
BMW music on.
BMW refueled.
Honda moving.
Honda stopped.
Honda music on.
Honda refueled.
Boat swimming.
Boat stopped.
Boat refueled.
Boeing CH-47 Chinook took off.
Boeing CH-47 Chinook flying.
Boeing CH-47 Chinook landed.
Boeing CH-47 Chinook refueled.
```

6. to run tests: `docker exec -it ecomitize_php_1 phpunit`


7. There is support of transitions map as optional parameter
 that defines allowed transitions between states ( i.e. BMW cannot refuel while moving.)
 
 
8. Vehicle blueprints are also optional, they can be useful to save 
commonly used vehicle configs somewhere for easy reuse.