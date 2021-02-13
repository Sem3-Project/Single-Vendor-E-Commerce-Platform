Krishalika - queries for views about cart - 12/02

create view product_varient(product_id,product_name,category_id,subcat_id,varient_id,price,image,varient_1,varient_2,quantity) as (select product_id,product_name,category_id,subcat_id,varient_id,price,image,varient_1,varient_2,quantity from product inner join varient using(product_id))


create view cart_cartproduct(cart_product_id,cart_id,varient_id,product_id,quantity,customer_id) as (select cart_product_id,cart_id,varient_id,product_id,cart_product.quantity,customer_id from (cart_product inner join cart using (cart_id)) inner join customer using(customer_id))
create view cart_display(customer_id,product_name,price,image,varient_1,varient_2,quantity,cart_product_id) as (select customer_id,product_name,price,image,varient_1,varient_2,cart_cartproduct.quantity,cart_cartproduct.cart_product_id from cart_cartproduct inner join product_varient using(product_id,varient_id))