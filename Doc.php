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
class Test{
    public function __construct(){
        echo "Object Created";
    }

    public function __destruct(){
        echo "Object Destroyed";
    }
}

$obj = new Test();



/*
Encapsulation - Avoid direct access to properties and use setter functions to modify

Restricting access to data using public, private, protected acess modifiers

Visibility |  From class  |   Inherited class    |	Outside
public	         ✔️	               ✔️	            ✔️
protected	     ✔️	               ✔️	            ❌
private	         ✔️	               ❌	           ❌
*/

class Bank{
    private $balance = 1000;

    public function getBalance(){
        return $this->balance;
    }

    public function setBalance($amt){
        return $this->balance = $amt;
    }
}



/*
Inheritance

One class inherits another class using extends.
*/
class Animal{
    public function speak(){
        echo "Animal speaks";
    }
}

class Dog extends Animal{
}

$dog = new Dog();
$dog->speak();


/*
Polymorphism

Same method name, different behaviour.
*/
class Animal{
    public function sound(){
        echo "Some sound";
    }
}

class Cat extends Animal{
    public function sound(){
        echo "Meow";
    }
}


/*
Abstraction

Defining rules for the classes that implement them
In PHP: abstract classes and interfaces.

You define rules, child classes follow them.
*/
abstract class Shape{
    abstract public function area();
}
class Circle extends Shape{
    public function area() {
        return 3.14 * 5 * 5;
    }
}


abstract class PaymentGateway{
    abstract public function pay($amount); // abstract method

    public function validate(){           // normal method
        echo "Validating payment details...<br>";
    }
}
class GooglePay extends PaymentGateway{
    public function pay($amount){
        echo "Paid $amount using PayPal.<br>";
    }
}


//Another Abstraction----------------------------
abstract class PaymentGateway{
    protected $balance = 0;

    abstract public function pay(int $amount):int;
    
}

class Razorpay extends PaymentGateway{
    public function pay(int $amount):int{
        return $this->balance + $amount;
    }
}

$model = new Razorpay();
function process(PaymentGateway $obj, $val){
    return $obj->pay($val);
}

$resp = process($model,500);
echo $resp;


//-------------------------------------------------------
//Interfaces - Defining Rules so child classes follow them
interface PaymentGateway{
    public function pay(int $amount):bool;
}

class Razorpay implements PaymentGateway{
    public function pay(int $amount):bool{
        return true;
    }
}

$gateway = new Razorpay();
function processPayment(PaymentGateway $object){
    return  $object->pay(100);
}

$resp = processPayment($gateway);

//Another Interface-------------------------------------------
interface PaymentGateway{
    public function pay(int $amount):bool;

    public function checkBalance(int $amount):int;
}

class Razorpay implements PaymentGateway{
    public function pay(int $amount):bool{
        return true;
    }

    public function checkBalance(int $amount):int{
        return $this->balance;
    }
}

$model = new Razorpay();
function processPayment(PaymentGateway $obj, int $amt){
    return $obj->pay($amt);
}

$resp = processPayment($model,500);
echo $resp;
//------------------------------------------------------------


//PHP Traits--------------------------------------------------
/*
It copies the trait’s code into the class at compile time.
Traits are NOT types. You cannot type-hint a trait
function test(Logger $log) {} // ❌ invalid

*/
trait CheckAccount{
    public function checkAccount(){
        echo "Account Has been Checked";
    }
}

class MyClass{
    use CheckAccount;

}
$obj = new MyClass();
$obj->checkAccount();


//Using Traits with Encapsulation
trait PaymentGatewayTrait{
    protected $balance = 0;
}

class Wallet{
    use PaymentGatewayTrait;

    public function checkBalance(){
        return $this->balance;
    }

    public function setBalance($amount){
        return $this->balance += $amount;
    }
}

$wallet = new Wallet();
$resp = $wallet->setBalance(500);
echo $resp;


//Trait with Conflict
trait A {
    public function hello() {
        echo "Hello from A";
    }
}
trait B {
    public function hello() {
        echo "Hello from B";
    }
}
class Test {
    use A, B {
        A::hello insteadof B; //insteadof => php method to select from multiple traits
        B::hello as helloFromB;
    }
}

//Trait with Abstract Method
trait Loggable{
    abstract protected function getUserId():int;

    public function log(string $msg):void{
        echo "User {$this->getUserId()}: $msg <br>";
    }
}

class UserService{
    use Loggable;

    public function getUserId():int{
        return 1;
    }
}

$obj = new UserService();
$resp = $obj->getUserId();
echo $resp;


//Trait with Interface
interface LoggerInterface {
    public function log(string $message): void;
}
trait LoggerTrait {
    public function log(string $message): void {
        echo "[LOG] $message<br>";
    }
}
class Service implements LoggerInterface {
    use LoggerTrait;
}
//Interface = contract/rule, Trait = implementation
//Use inheritance to define what a class IS, and traits to define what a class CAN DO.