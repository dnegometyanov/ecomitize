## Ecomitize: vehicles task

1. Сколько нужно времени чтобы добавить новых 40 видов транспорта? сколько файлов для этого нужно изменить? 
2. Как насчет фабрики для создания Vehicle? 
3. Как насчет Composition over Inheritance? 
4. Если я захочу добавить новых 40 свойств которые пересекаются в разных видах транспорта нужно менять интерфейсы? 

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
BMW moving
BMW moving and music switched on
BMW stopped
BMW refuel Gasoline A-98
Kamaz moving
Kamaz stopped
Kamaz empty loads
Kamaz refuel Diesel
Boeing CH-47 Chinook took off
Boeing CH-47 Chinook flying
Boeing CH-47 Chinook landing
Boeing CH-47 Chinook refuel Keresene
Boat swimming
Boat stopped
Boat refuel
```

6. to run tests: `docker exec -it ecomitize_php_1 phpunit`