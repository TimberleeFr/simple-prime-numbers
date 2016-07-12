# simple-prime-numbers
This is a basic simple class in php to manage a prime numbers. This class is based on Sieve of Eratosthenes. This is after many test, the efficient way to generate a large number of prime numbers in php.

Release Version : 1.0   
Release Date : 17/06/2016

Table of content :

1.	Package contents  
2.	Requirements  
3.	How to use  

# 1.	Package contents


-	primenumber.php  
-	README.php  


# 2.	Requirements


This contents requires the use of php. Before you try to use the script, check if your web space can supports php.


# 3.	How to use

## 1 – getPrimeInRange()

This function allow to put in an array all the prime numbers between 3 and Max<100001. If you try with an hight number you go to meet an error of memory.
Max represent the value that is put as parameters.
The result is as an array who contains prime numbers.

## 2 – getNextPrime($value)

$value : a number between 3 and 100000.
Gives you the next prime number of your value. If you put a composite number, the function going to search the prime numbre after your value and give you the following prime number.

## 3 – isPrime ($value)

$value : a number between 3 and 100000
Say if the value is a composite number(false) or a prime number(true).


## 4 – getSamplePrime($nb,$lenght(,order ))

$nb : how many numbers do you need?
$lenght : how many figures do you want?
$order(optional) : You can have prime number in order (consecutive). If you don’t enter this parameter, order is random.

With this function you have the number of prime numbers wich you want in the continuation or randomly. You can also know in how long the function it is executes.
