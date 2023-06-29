CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(50) NOT NULL,
    gst_rate DECIMAL(5,2) NOT NULL
);

CREATE TABLE sellers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gstin VARCHAR(50) NOT NULL,
    address TEXT
);

CREATE TABLE purchasers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gstin VARCHAR(50) NOT NULL,
    address TEXT
);

CREATE TABLE customers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gstin VARCHAR(50) NOT NULL,
    address TEXT
);

CREATE TABLE purchase_bills (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    product_id INT(11) NOT NULL,
    seller_id INT(11) NOT NULL,
    purchaser_id INT(11) NOT NULL,
    rate DECIMAL(10,2) NOT NULL,
    gst DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
	quantity int(11) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (seller_id) REFERENCES sellers(id),
    FOREIGN KEY (purchaser_id) REFERENCES purchasers(id)
);

CREATE TABLE sale_bills (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    product_id INT(11) NOT NULL,
    purchaser_id INT(11) NOT NULL,
    customer_id INT(11) NOT NULL,
    rate DECIMAL(10,2) NOT NULL,
    gst DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
	quantity int(11) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (purchaser_id) REFERENCES purchasers(id),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);



ALTER TABLE `sale_bills` ADD `type` VARCHAR(11) NOT NULL DEFAULT 'Purchase' AFTER `quantity`; 
ALTER TABLE `purchase_bills` ADD `type` VARCHAR(11) NOT NULL DEFAULT 'Sale' AFTER `quantity`; 

