CREATE TABLE items (
  item_id SERIAL NOT NULL,
  item_name VARCHAR(50) PRIMARY KEY NOT NULL,
  item_use VARCHAR(200)
);

INSERT INTO items (item_name, item_use)
  VALUES ('Life Straw', 'Filters drinking water. 
  You can use it to drink straight from the source.');

INSERT INTO items (item_name)
  VALUES ('Knife');

INSERT INTO items (item_name)
  VALUES ('Flashlight');

INSERT INTO items (item_name)
  VALUES ('Extra batteries');

INSERT INTO items (item_name, item_use)
  VALUES ('Food', '72-hour emergency food supply.');

CREATE TABLE bugout_bag (
  bag_id SERIAL PRIMARY KEY NOT NULL,
  packed VARCHAR(3) NOT NULL,
  quantity INT,
  item_name VARCHAR(50) NOT NULL REFERENCES items (item_name)
);

INSERT INTO bugout_bag (packed, quantity, item_name)
  VALUES ('yes', 3, 'Life Straw');

INSERT INTO bugout_bag (packed, item_name)
  VALUES ('no', 'Food');

CREATE TABLE extras (
  extra_id SERIAL PRIMARY KEY NOT NULL,
  packed VARCHAR(3) NOT NULL,
  quantity INT,
  item_name VARCHAR(50) NOT NULL REFERENCES items (item_name),
  item_location VARCHAR(50) NOT NULL
);

INSERT INTO extras (packed, item_name, item_location)
  VALUES ('yes', 'Extra batteries', 'Stash 1');
