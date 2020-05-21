# PHP Developer Challenges

# Requirements
* PHP 7.4+
* Composer
* Docker (optional if you have mysql db already set)

# Install
Install dependencies
```shell
$ composer install
```

Sets up test database
```shell
$ docker-compose up -d
```
This command should also create all needed table and needed data for testing.
If needed, is possible to find the queries in db/queries.sql to run manually.

Credentials for docker test db (already set on docker-compose.yml):

MYSQL_DATABASE: 'challengedb'
MYSQL_USER: 'challengeuser'
MYSQL_PASSWORD: 'challengepassword'

# Run Tests
```shell
$ ./vendor/bin/phpunit
```

This command runs all the tests for the challenges.

# Challenges

## 1. FizzBuzz
Write a PHP script that prints all integer values from 1 to 100.
For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
Values which are multiples of both three and five should output as "FizzBuzz".

## 2. 500 Element Array
Write a PHP script to generate a random array of 500 integers (values of 1 – 500 inclusive).
Randomly remove and discard an arbitary element from this newly generated array.
Write the code to efficiently determine the value of the missing element.
Explain your reasoning with comments.

## 3. Database Connectivity
Demonstrate with PHP how you would connect to a MySQL (InnoDB) database and query for all
records with the following fields: (name, age, job_title) from a table called 'exads_test'.
Also provide an example of how you would write a sanitised record to the same table.

## 4. Date Calculation
The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
Write a function or class that calculates and returns the next valid draw date based on the current
date and time AND also on an optionally supplied date and time.

## 5. A/B Testing
Exads would like to A/B test a number of promotional designs to see which provides the best
conversion rate.
Write a snippet of PHP code that redirects end users to the different designs based on the database
table below. Extend the database model as needed.
i.e. - 50% of people will be shown Design A, 25% shown Design B and 25% shown Design C.
The code needs to be scalable as a single promotion may have upwards of 3 designs to test.

| design_id | design_name | split_percent |
|-----------|-------------|---------------|
| 1         | Design 1    | 50            |
| 2         | Design 2    | 25            |
| 3         | Design 3    | 25            |
