CREATE TABLE items (
  item_id SERIAL PRIMARY KEY,
  item_name VARCHAR(50) NOT NULL UNIQUE,
  item_use VARCHAR(255) NOT NULL
);

INSERT INTO items (item_name, item_use)
  VALUES ('Life Straw', 'Filters drinking water. 
  You can use it to drink straight from the source.');

INSERT INTO items (item_name, item_use)
  VALUES ('Knife', 'Multiple uses. Food, defence, cutting firewood, etc.');

INSERT INTO items (item_name, item_use)
  VALUES ('Flashlight', 'Lightsource');

INSERT INTO items (item_name, item_use)
  VALUES ('Extra batteries', 'Use for flashlight or other items.');

INSERT INTO items (item_name, item_use)
  VALUES ('Food', 'At least a 72-hour emergency food supply is suggest.');

INSERT INTO items (item_name, item_use)
  VALUES ('Waterproof Matches', 'Starting fires in any weather condition.');

INSERT INTO items (item_name, item_use)
  VALUES ('Water', 'You need water to survive.');

INSERT INTO items (item_name, item_use)
  VALUES ('Whistle', 'Danger alerting or for others to find your location.');

INSERT INTO items (item_name, item_use)
  VALUES ('First Aid Kit', 'Bandaids, Bandages, Tape, Neosporin');

INSERT INTO items (item_name, item_use)
  VALUES ('Hand Crank Emergency Radio', 'Keep aware of conditions and happenings.');

INSERT INTO items (item_name, item_use)
  VALUES ('Blanket', 'Warmth');

INSERT INTO items (item_name, item_use)
  VALUES ('Compass', 'Find your way.');

INSERT INTO items (item_name, item_use)
  VALUES ('Rope', 'For shelter building or many other uses.')

CREATE TABLE bugoutuser (
  user_id SERIAL PRIMARY KEY,
  userfname VARCHAR(25) NOT NULL,
  userlname VARCHAR(25) NOT NULL,
  useremail VARCHAR(50) NOT NULL,
  userpassword VARCHAR(255) NOT NULL
);

CREATE TABLE bugout_bag (
  bag_id SERIAL PRIMARY KEY,
  user_id INT NOT NULL REFERENCES bugoutuser (user_id),
  item_id INT NOT NULL REFERENCES items (item_id),
  packed VARCHAR(3) NOT NULL,
  quantity INT NOT NULL
);

CREATE TABLE extras (
  extra_id SERIAL PRIMARY KEY,
  user_id INT NOT NULL REFERENCES bugoutuser (user_id),
  packed VARCHAR(3) NOT NULL,
  quantity INT NOT NULL,
  item_id INT NOT NULL REFERENCES items (item_id),
  item_location VARCHAR(50) NOT NULL
);

SELECT * FROM bugout_bag b JOIN items i ON b.item_id = i.item_id;

SELECT * FROM bugout_bag b JOIN items i ON b.item_id = i.item_id
WHERE b.packed = 'yes';

SELECT b.packed, i.item_name FROM items i JOIN bugout_bag b ON b.item_id = i.item_id WHERE b.packed = 'yes';

SELECT item_name, item_use FROM items;

