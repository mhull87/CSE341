CREATE TABLE items (
  item_id SERIAL PRIMARY KEY,
  item_name VARCHAR(50) NOT NULL UNIQUE,
  item_use VARCHAR(255)
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
  VALUES ('Food', 'At least a 72-hour emergency food supply is suggest.');

INSERT INTO items (item_name, item_use)
  VALUES ('Waterproof Matches', 'Starting fires in any weather condition.');

INSERT INTO items (item_name)
  VALUES ('Water');

INSERT INTO items (item_name)
  VALUES ('Whistle');

INSERT INTO items (item_name, item_use)
  VALUES ('First Aid Kit', 'Bandaids, Bandages, Tape, Neosporin');

INSERT INTO items (item_name)
  VALUES ('Hand Crank Emergency Radio');

INSERT INTO items (item_name)
  VALUES ('blanket');

INSERT INTO items (item_name)
  VALUES ('Compass');

CREATE TABLE bugout_bag (
  bag_id SERIAL PRIMARY KEY,
  item_id INT NOT NULL REFERENCES items (item_id),
  packed VARCHAR(3) NOT NULL,
  quantity INT
);

INSERT INTO bugout_bag (packed, quantity, item_id)
  VALUES ('yes', 3, 1);

INSERT INTO bugout_bag (packed, item_id)
  VALUES ('no', 5);

CREATE TABLE extras (
  extra_id SERIAL PRIMARY KEY,
  packed VARCHAR(3) NOT NULL,
  quantity INT,
  item_id INT NOT NULL REFERENCES items (item_id),
  item_location VARCHAR(50) NOT NULL
);

INSERT INTO extras (packed, item_id, item_location)
  VALUES ('yes', 4, 'Stash 1');

SELECT * FROM bugout_bag b JOIN items i ON b.item_id = i.item_id;

SELECT * FROM bugout_bag b JOIN items i ON b.item_id = i.item_id
WHERE b.packed = 'yes';

SELECT b.packed, i.item_name FROM items i JOIN bugout_bag b ON b.item_id = i.item_id WHERE b.packed = 'yes';

SELECT item_name, item_use FROM items;