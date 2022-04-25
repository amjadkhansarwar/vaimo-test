

## About API

-Api is build in PHP using Larvel framework

-Api has one end point 'search' with post requset

-Api accepet data in Json formate and response also in Json formate

- Api receive an arry of products (SKU) and return arry of the random 
price of those products between 300 to 1200

-Api is using cache function. Every time when user send request
api will check the product(SKU) in cache array if the product(sku) is
already available then return that product price otherwise
api will create new random value of that product and push in on cache
arry and return the results.

-Api has check for if user send one of product(SKU) value '98765'
then api will generate rendom value between 5 to 10 and then api will 
wait for those random value as a seceonds as loader for results 
after that api send response

-Api has check for error if user send one of product(SKU) value '501'
then api will send response as 'Internal Server Error'.

- if APi get empty arrary then api give also empty response.

-CODE

- I have create one controller with the name of ProductsController
in this controller i write my logic in search functon 
and function return the results efter checking all conditions
like  
   1- wait 5 to 10 sec if one of the (SKU) value is '98765'
   2- create an Internal sever error if one of (SKU) value is '501'
   3- check the (SKU) values are already available on cache otherwise create
   new random price for products(SKU) and push on cache array then return
   the price.

- I create one route to get requset from user in POST type.



