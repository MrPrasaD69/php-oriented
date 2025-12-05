<?php

/*
Core OOP Concepts in PHP

Class & Object

A class is a blueprint.
An object is an instance of a class.
*/

class Car {
    public $brand = "Honda";

    public function drive() {
        echo "Car is driving";
    }
}

$car = new Car();
echo $car->brand;
$car->drive();



/*
Properties & Methods

Properties = variables inside class.

Methods = functions inside class.
*/
class User {
    public $name;

    public function greet() {
        return "Hello " . $this->name;
    }
}




/*
Constructor & Destructor

Constructor runs automatically when an object is created.

Destructor runs when script ends or object is destroyed.
*/
class Test {
    public function __construct() {
        echo "Object Created";
    }

    public function __destruct() {
        echo "Object Destroyed";
    }
}

$obj = new Test();



/*
Encapsulation

Restricting access to data using public, private, protected.

Visibility	Accessible from class	Inherited class	Outside
public	✔️	✔️	✔️
protected	✔️	✔️	❌
private	✔️	❌	❌
*/

class Bank {
    private $balance = 1000;

    public function getBalance() {
        return $this->balance;
    }
}



/*
Inheritance

One class inherits another class using extends.
*/
class Animal {
    public function speak() {
        echo "Animal speaks";
    }
}

class Dog extends Animal {
}

$dog = new Dog();
$dog->speak();


/*
Polymorphism

Same method name, different behaviour.
*/
class Animal {
    public function sound() {
        echo "Some sound";
    }
}

class Cat extends Animal {
    public function sound() {
        echo "Meow";
    }
}


/*
Abstraction

Hiding internal details.
In PHP: abstract classes and interfaces.
*/
abstract class Shape {
    abstract public function area();
}

class Circle extends Shape {
    public function area() {
        return 3.14 * 5 * 5;
    }
}
