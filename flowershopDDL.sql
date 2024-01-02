-- User table with User_Credentials and User_Profile
CREATE TABLE User (
    id VARCHAR(8) PRIMARY KEY,
    email_address VARCHAR(100),
    phone_number NUMERIC(10, 0)
);

CREATE TABLE User_Credentials (
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE,
    username VARCHAR(30),
    password VARCHAR(30),
    PRIMARY KEY (user_id, username)
);

CREATE TABLE User_Profile (
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE,
    email_address VARCHAR(100),
    phone_number NUMERIC(10, 0),
    PRIMARY KEY (user_id, email_address)
);


-- Address table
CREATE TABLE Address (
    id VARCHAR(4) PRIMARY KEY,
    street_number NUMERIC(10, 0),
    address_line VARCHAR(80) NOT NULL,
    city VARCHAR(30) NOT NULL,
    postal_code NUMERIC(10, 0) NOT NULL,
    state_id NUMERIC(2, 0) REFERENCES State(id) ON DELETE CASCADE
);

-- State table
CREATE TABLE State (
    id NUMERIC(2, 0) PRIMARY KEY,
    state_name VARCHAR(50) NOT NULL
);

-- User_Address table
CREATE TABLE User_Address (
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE,
    address_id VARCHAR(4) REFERENCES Address(id) ON DELETE CASCADE,
    is_default BOOLEAN,
    PRIMARY KEY (user_id, address_id)
);

-- Payment Method table with Payment_Type
CREATE TABLE Payment_Method (
    id SERIAL PRIMARY KEY,
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE,
    payment_type_id NUMERIC(2, 0) REFERENCES Payment_Type(id),
    provider VARCHAR(50),
    account_number VARCHAR(30),
    expiry_date DATE,
    is_default BOOLEAN
);

CREATE TABLE Payment_Type (
    id NUMERIC(2, 0) PRIMARY KEY,
    value VARCHAR(20) NOT NULL
);

-- Shopping Cart and Shopping Cart Item tables
CREATE TABLE Shopping_Cart (
    id SERIAL PRIMARY KEY,
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE
);


CREATE TABLE Shopping_Cart_Item (
    cart_id SERIAL,
    product_item_id VARCHAR(8),
    qty NUMERIC(5, 0),
    PRIMARY KEY (cart_id, product_item_id), -- Using a composite key
    FOREIGN KEY (cart_id) REFERENCES Shopping_Cart(id) ON DELETE CASCADE
);


-- Product and Product Category tables
-- Product table
CREATE TABLE Product (
    id VARCHAR(8) PRIMARY KEY,
    category_id NUMERIC(2, 0) REFERENCES Product_Category(id),
    name VARCHAR(50),
    description TEXT,
    product_image MEDIUMBLOB -- MEDIUMBLOB is suitable for storing images
);

CREATE TABLE Product_Category (
    id NUMERIC(2, 0) PRIMARY KEY,
    parent_category_id NUMERIC(2, 0),
    category_name VARCHAR(50) NOT NULL
);


-- Product Item table
CREATE TABLE Product_Item (
    id VARCHAR(8) PRIMARY KEY,
    product_id VARCHAR(8) REFERENCES Product(id),
    sku VARCHAR(20),
    qty_in_stock NUMERIC(5, 0),
    product_image MEDIUMBLOB, -- MEDIUMBLOB is suitable for storing images
    price DECIMAL(10, 2)
);

);

-- User Review, Order Line, and Shop Order tables
CREATE TABLE User_Review (
    id SERIAL PRIMARY KEY,
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE,
    ordered_product VARCHAR(8),
    rating_value NUMERIC(2, 1),
    comment TEXT
);

CREATE TABLE Order_Line (
    id SERIAL PRIMARY KEY,
    product_item_id VARCHAR(8) REFERENCES Product_Item(id),
    order_id VARCHAR(8),
    qty NUMERIC(5, 0),
    price DECIMAL(10, 2)
);

CREATE TABLE Shop_Order (
    id SERIAL PRIMARY KEY,
    user_id VARCHAR(8) REFERENCES User(id) ON DELETE CASCADE,
    order_date DATE,
    payment_method_id NUMERIC(8, 0) REFERENCES Payment_Method(id),
    shipping_address VARCHAR(4) REFERENCES Address(id),
    order_total DECIMAL(10, 2)
);


