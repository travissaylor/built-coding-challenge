# Assignment
## Introduction

This example comes from the book Refactoring by Martin Fowler.

There are solutions to this problem readily available on the Internet, so please adhere to the honor system: don't cheat!

## Requirements

The code uses short array syntax (`$arr = [];`), so you'll need PHP 5.4 or higher.

Feel free to include any external libraries or dependencies that you believe will add value to the project.

## Domain

The domain concerns movie rentals and customer statements.

There are 3 existing classes:

- **`Movie`** is composed of a title - `name` - and a pricing code - `priceCode`.
- **`Rental`** is composed of a `Movie` - `movie` - and a duration - `daysRented`.
- **`Customer`** is composed of a name - `name` - and, optionally, a `Rental` collection / array - `rentals`.

The `Customer` class also contains a method - `statement()` - that prints a plain-text statement containing the customer's billing and loyalty information.

## Current State

The program can be run by `$ php index.php`.

This should be the output:

```
Rental Record for Joe Schmoe
        Back to the Future              3
        Office Space                    3.5
        The Big Lebowski                15
Amount owed is 21.5
You earned 4 frequent renter points

```

## Your Tasks

1. The business requires statements in HTML - in addition to their current text output. The desired HTML output is shown below. Please implement a `Customer.htmlStatement()` method that returns this output.
2. The business wants to change the movie classifications. They may, for example, wish to remove "Children's" or add a new classification called "SciFi". Then again, they may simply wish to change the algorithms for calculating frequent renter points. **In other words, the classification / pricing / points system needs to be more flexible.** (This task is intentionally open-ended.)

### HTML Output for Task #1

```
<h1>Rental Record for <em>Joe Schmoe</em></h1>
<ul>
    <li>Back to the Future - 3</li>
    <li>Office Space - 3.5</li>
    <li>The Big Lebowski - 15</li>
<ul>
<p>Amount owed is <em>21.5</em>
<p>You earned <em>4</em> frequent renter points</p>
```

## Your Deliverables

1. Set up your interviewer as a collaborator on the repo you set up
2. Include a rough estimate of how much time you spent working on the assignment.
3. Also include any additional instructions / requirements for running your solution.
4. Finally, please feel free - though you're not required - to provide some "documentation" to justify any tradeoffs you might have made when writing the code and what implications those tradeoffs may have in the future - especially for the second "task" above.

# My Solution

## Requirements
* **PHP 7.4 or greater** - Many very useful OOP tools, such as type declarations for function arguments, return values, and class properties, are available by using PHP 7.4 or greater. This enables me to demonstrate my OOP skills with the most appropriate tooling.
* **Composer** - Dependency manager for PHP. [Composer Installation Documentation](https://getcomposer.org/doc/00-intro.md)

## Installing & Running Code

### Installing
Install the project dependencies by running the following from the project root directory
```
$ composer install
```
Once installed, you should notice a vendor directory at the root of the project

### Running
As mentioned in the Assignment section, the program can be run by 
```
$ php index.php
```

## Code Explaination

### Movie Classification & Pricing

Problem 

- Weird coupling between Movie, classification, and pricing but the actual pricing algorithem needs to be handled by the client
- Need to modify the Movie class everytime there is a new classification or a change to the pricing
- The Customer handles the pricing algorithem which breaks seperation of concerns. This means that to change the pricing algorithem, you need to change the Customer statement logic.

Solution

- The Classification class has a name and a pricing strategy
- Pricing strategies implement an interface so that the classification can be passed any Pricing Strategy and not have to know the underlying implmentation
- The Movie class now has a classification that handles the entire pricing solution
- The Customer now does not need to know the pricing algorithem, it can rely on the movie classification to get the price

### Reward Points

Problem

- The Customer handles the reward points algorithem which again breaks seperation of concerns. As  we noticed with the pricing algorithem, this means that you have to change the Customer class everytime you want to make a change to the reward points algorithem

Solution

- The Rental class now has a reward points strategy which handles the reward points algorithem
- The reward point strategies inherit an interface so that the rental can be passed any reward point strategy and not have to worry about the underlying implmentation
- Now the Customer does not need to know the reward points algorithem and can rely on the Rental to get the points.
- Since the Rentals currently all use the same algorithem, I created a ConfigRentalFactory class that creates Rentals by having the user supply the movie and days rented but will pull the reward points strategy from the config. This allows you to easily swap different reward point strategies by updating the config file
- Rental Factories also implement an interface so that we can define new ways to create Rentals without having to change the implementing code and sets us up if we want to use Dependency Injection in the future.