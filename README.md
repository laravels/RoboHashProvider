# RoboHashProvider
==================

[![Build Status](https://travis-ci.org/ddiebel/RoboHashProvider.svg?branch=master)](https://travis-ci.org/ddiebel/RoboHashProvider)
[![codecov.io](https://codecov.io/github/ddiebel/RoboHashProvider/coverage.svg?branch=master)](https://codecov.io/github/ddiebel/RoboHashProvider?branch=master)

[robohash.org](http://robohash.org) provider for [Faker](https://github.com/fzaninotto/Faker).

## Install
Install RoboHashProvider via [Composer](http://getcomposer.org/).

```
$ composer require laravels/faker-robohash-provider
```

## Howto use

```php
$faker = Faker\Factory::create();
$faker->addProvider(new Phpmedia\RoboHashProvider($faker));

// normal roboter-avatar 
$avatarUrl = $faker->avatarUrl('100x100','dummy'); // http://robohash.org/dummy.png?size=100x100
$avatarUrl = $faker->avatarUrl('50x50','dummy2','gif'); // http://robohash.org/dummy2.gif?size=50x50


// roboter-avatar from set 2 with background 1
$avatarUrl = $faker->avatarUrl('100x100', 'dummy', 'gif', 'set2', 'bg1') // http://robohash.org/dummy.gif?size=100x100&set=set2&bgset=bg1 

```
