DROP TABLE IF EXISTS `bestellingen`;
DROP TABLE IF EXISTS `reserveringen`;
DROP TABLE IF EXISTS `klanten`;
DROP TABLE IF EXISTS `gerechten`;

CREATE TABLE `gerechten` (
  gerecht_id INT(6) AUTO_INCREMENT,
  gerechtnaam VARCHAR(255),
  type VARCHAR(25),
  vegetarisch BOOLEAN,
  prijs FLOAT,
  PRIMARY KEY (gerecht_id)
);

CREATE TABLE `klanten` (
  klantnummer INT(16),
  email VARCHAR(55),
  achternaam VARCHAR(55),
  tussenvoegsel VARCHAR(55),
  voornaam VARCHAR(55),
  PRIMARY KEY (klantnummer)
);

CREATE TABLE `reserveringen` (
  reservering_id INT(6) AUTO_INCREMENT,
  klantnummer INT(16),
  datum DATE,
  aantal INT(6),
  PRIMARY KEY (reservering_id),
  FOREIGN KEY (klantnummer) REFERENCES klanten(klantnummer)
);
ALTER TABLE `reserveringen` AUTO_INCREMENT = 10;

CREATE TABLE `bestellingen` (
  reservering_id INT(6),
  gerecht_id INT(16),
  aantal INT(6),
  CONSTRAINT pk_bestellingen PRIMARY KEY (reservering_id, gerecht_id),
  FOREIGN KEY (reservering_id) REFERENCES reserveringen(reservering_id),
  FOREIGN KEY (gerecht_id) REFERENCES gerechten(gerecht_id)
);

INSERT INTO `klanten` (klantnummer, email, achternaam, tussenvoegsel, voornaam)
VALUES
  ('201701', 'cor@corendon.nl', 'don', 'en', 'cor'),
  ('201702', 'harry@sunweb.nl', 'sunweb', 'van de', 'harry'),
  ('201703', 'don@corendon.nl', 'cor', 'en', 'don'),
  ('201704', 'thomas@cook.nl', 'cook', '', 'thomas');

INSERT INTO `gerechten` (gerechtnaam, type, vegetarisch, prijs)
VALUES
  ('kip', 'h', FALSE, '15'),
  ('koe', 'h', FALSE, '12'),
  ('varken', 'h', FALSE, '13'),
  ('soep', 'v', TRUE, '3'),
  ('sla', 'v', TRUE, '4'),
  ('brood', 'v', TRUE, '1'),
  ('ijs', 'n', TRUE, '4'),
  ('vla', 'n', TRUE, '2'),
  ('yogurt', 'n', TRUE, '2');

INSERT INTO `reserveringen` (klantnummer, datum, aantal)
VALUES
  ('201701', '2017-1-1', 2),
  ('201702', '2017-1-1', 6),
  ('201703', '2017-1-2', 3),
  ('201704', '2017-1-4', 2);

INSERT INTO `bestellingen` (reservering_id, gerecht_id, aantal)
VALUES
  ('10', '1', '2'),
  ('10', '7', '2'),

  ('11', '4', '3'),
  ('11', '6', '3'),
  ('11', '1', '2'),
  ('11', '2', '4'),
  ('11', '7', '2'),
  ('11', '8', '2'),

  ('12', '4', '2'),
  ('12', '3', '2'),
  ('12', '9', '2'),

  ('13', '1', '1'),
  ('13', '6', '1');