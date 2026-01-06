1. Write a query to get Product name and quantity/unit
select ProductName, QuantityPerUnit from products

2. Write a query to get current Product list (Product ID and name).
select ProductID, ProductName from products

3. Write a query to get most expense and least expensive Product list (name and unit price).
select ProductName, UnitPrice from products ORDER BY UnitPrice desc

4. Write a query to get Product list (name, unit price) of above average price.
select ProductName, UnitPrice from products where UnitPrice > (SELECT avg(UnitPrice) from products)

5. Write a query to get Product list (id, name, unit price) where current products cost less than $20
select ProductID, ProductName, UnitPrice from products where UnitPrice < 20

6. Write a query to get Product list (name, units on order , units in stock) of stock is less than the quantity on order.
select ProductName, UnitsOnOrder, UnitsInStock FROM products WHERE UnitsInStock < UnitsOnOrder

