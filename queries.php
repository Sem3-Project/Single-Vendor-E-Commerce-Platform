Krishalika - queries for views about cart - 12/02

create view product_varient(product_id,product_name,category_id,subcat_id,varient_id,price,image,varient_1,varient_2,quantity) as (select product_id,product_name,category_id,subcat_id,varient_id,price,image,varient_1,varient_2,quantity from product inner join varient using(product_id))


create view cart_cartproduct(cart_product_id,cart_id,varient_id,product_id,quantity,customer_id) as (select cart_product_id,cart_id,varient_id,product_id,cart_product.quantity,customer_id from (cart_product inner join cart using (cart_id)) inner join customer using(customer_id))
create view cart_display(customer_id,product_name,price,image,varient_1,varient_2,quantity,cart_product_id) as (select customer_id,product_name,price,image,varient_1,varient_2,cart_cartproduct.quantity,cart_cartproduct.cart_product_id from cart_cartproduct inner join product_varient using(product_id,varient_id))


Krishalika - view for order - 19/02
create VIEW `order_confirmation` AS (select `order_product`.`quantity` AS `quantity`,`order_product`.`order_id` AS `order_id`,`order_product`.`product_price` AS `product_price`,`varient`.`image` AS `image` from (`order_product` join `varient` on(`order_product`.`varient_id` = `varient`.`varient_id`)))



<option value="CashONDelivery" <?php if ($_POST['CashONDelivery'] == "CashONDelivery") echo 'selected="selected"'; ?>>Cash on delivery</option>
<option value="VISA" <?php if ($_POST['VISA'] == "VISA") echo 'selected="selected"'; ?>>Visa</option>
<option value="Paypal" <?php if ($_POST['Paypal'] == "Paypal") echo 'selected="selected"'; ?>>Paypal</option>



ALTER TABLE `cart` CHANGE `quantity` `total_value` DOUBLE(10,2) NULL DEFAULT NULL;

ALTER TABLE `order` ADD `zip_code` VARCHAR(10) NOT NULL AFTER `total_payment`, ADD `address_line_1` VARCHAR(100) NOT NULL AFTER `zip_code`, ADD `address_line_2` VARCHAR(100) NOT NULL AFTER `address_line_1`, ADD `city` VARCHAR(50) NOT NULL AFTER `address_line_2`, ADD `state` VARCHAR(50) NOT NULL AFTER `city`;

ALTER TABLE `order` CHANGE `payment_method` `payment_method` ENUM('CashONDelivery','VISA''') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `order` CHANGE `payment_method` `payment_method` ENUM('CashONDelivery','VISA') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

user code - not sure
CREATE USER 'customer'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'customer'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `singlevendor`.* TO 'customer'@'%';

================NEW=============
ALTER TABLE `cart_product` ADD `selected` TEXT NOT NULL AFTER `quantity`;
ALTER TABLE `cart_product` CHANGE `selected` `selected` BOOLEAN NOT NULL;

================NEW=============
create VIEW `confirmed_order` AS (select `cart_product`.`quantity` AS `quantity`,`cart_product`.`product_id` AS `product_id`,`cart_product`.`cart_product_id` AS `cart_product_id`,`cart_product`.`varient_id` AS `varient_id`,`cart_product`.`cart_id` AS `cart_id`,`varient`.`image` AS `image` from (`cart_product` join `varient` on(`cart_product`.`varient_id` = `varient`.`varient_id`)) WHERE cart_product.selected=1)
ALTER TABLE `order_product` DROP `product_price`;


create VIEW `confirmation` AS (select `cart_product`.`quantity` AS `quantity`,`cart_product`.`cart_product_id` AS `cart_product_id`,`cart_product`.`cart_id` AS `cart_id`,`cart_product`.`selected` as `selected`,`varient`.`image` AS `image` from (`cart_product` join `varient` on(`cart_product`.`varient_id` = `varient`.`varient_id`)))





create VIEW `confirm_order` AS (select `cart_product`.`quantity` AS `quantity`,`cart_product`.`cart_product_id` AS `cart_product_id`,`cart_product`.`cart_id` AS `cart_id`,`varient`.`image` AS `image` from (`cart_product` join `varient` on(`cart_product`.`varient_id` = `varient`.`varient_id`)) WHERE cart_product.selected=1)




create VIEW `order_confirm` AS (select `cart_product`.`quantity` AS `quantity`,`cart_product`.`cart_product_id` AS `cart_product_id`,`cart_product`.`cart_id` AS `cart_id`,`varient`.`image` AS `image` from (`cart_product` join `varient` on(`cart_product`.`varient_id` = `varient`.`varient_id`)))