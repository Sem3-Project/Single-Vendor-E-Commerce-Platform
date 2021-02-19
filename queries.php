Krishalika - queries for views about cart - 12/02

create view product_varient(product_id,product_name,category_id,subcat_id,varient_id,price,image,varient_1,varient_2,quantity) as (select product_id,product_name,category_id,subcat_id,varient_id,price,image,varient_1,varient_2,quantity from product inner join varient using(product_id))


create view cart_cartproduct(cart_product_id,cart_id,varient_id,product_id,quantity,customer_id) as (select cart_product_id,cart_id,varient_id,product_id,cart_product.quantity,customer_id from (cart_product inner join cart using (cart_id)) inner join customer using(customer_id))
create view cart_display(customer_id,product_name,price,image,varient_1,varient_2,quantity,cart_product_id) as (select customer_id,product_name,price,image,varient_1,varient_2,cart_cartproduct.quantity,cart_cartproduct.cart_product_id from cart_cartproduct inner join product_varient using(product_id,varient_id))


Krishalika - view for order - 19/02
create VIEW `order_confirmation` AS  (select `order_product`.`quantity` AS `quantity`,`order_product`.`order_id` AS `order_id`,`order_product`.`product_price` AS `product_price`,`varient`.`image` AS `image` from (`order_product` join `varient` on(`order_product`.`varient_id` = `varient`.`varient_id`)))



<option value="CashONDelivery" <?php if ($_POST['CashONDelivery'] == "CashONDelivery") echo 'selected="selected"'; ?>>Cash on delivery</option>
                    <option value="VISA" <?php if ($_POST['VISA'] == "VISA") echo 'selected="selected"'; ?>>Visa</option>
                    <option value="Paypal" <?php if ($_POST['Paypal'] == "Paypal") echo 'selected="selected"'; ?>>Paypal</option>