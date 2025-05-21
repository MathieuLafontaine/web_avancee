CREATE database TeaShop;

CREATE TABLE TeaShop.client (
  idClient INT NOT NULL AUTO_INCREMENT,
  nameClient VARCHAR(25) NOT NULL,
  usernameClient VARCHAR(45) NOT NULL,
  passwordClient VARCHAR(100) NOT NULL,
  emailClient VARCHAR(45) NOT NULL,
  PRIMARY KEY (idClient));

CREATE TABLE TeaShop.Tea (
  idTea INT NOT NULL AUTO_INCREMENT,
  typeTea VARCHAR(45) NOT NULL,
  brandTea VARCHAR(20) NOT NULL,
  descriptionTea TEXT,
  priceTea DECIMAL(10, 2) NOT NULL,
   PRIMARY KEY (idTea)
);
  
  INSERT INTO Tea (typeTea, brandTea, descriptionTea, priceTea) VALUES
('Green Tea', 'Mountain Mist', 'A delicate green tea with floral notes, harvested from high-altitude gardens', 8.99),
('Black Tea', 'Royal Leaves', 'Full-bodied Assam black tea with malty flavor, perfect for breakfast', 7.50),
('Herbal Tea', 'Dreamy Blossoms', 'Caffeine-free blend of chamomile, lavender, and peppermint for relaxation', 6.75),
('Oolong Tea', 'Imperial Dragon', 'Semi-oxidized tea with complex fruity and woody flavors from Taiwan', 12.25),
('White Tea', 'Silver Needle', 'Rare white tea made from young tea buds with a light, sweet flavor', 15.99);

INSERT INTO client (nameClient, usernameClient, passwordClient, emailClient) VALUES
('Emma Johnson', 'emmaJ', 'TeaLover123', 'emma.johnson@yahoo.com'),
('Liam Chen', 'liamTeaMaster', 'OolongFan!45', 'liam.chen@gmail.com'),
('Sophia Rodriguez', 'sophiaR', 'ChaiLatte$2023', 's.rodriguez@hotmail.com'),
('Noah Wilson', 'wilsonTeaTaster', 'GreenTea789', 'noah.wilson@aol.com');

CREATE TABLE TeaShop.Transaction (
  idTransaction INT NOT NULL AUTO_INCREMENT,
  client_id INT NOT NULL,
  tea_id INT NOT NULL,
  dateTransaction DATETIME NOT NULL,
  quantityTransaction INT NOT NULL,
  totalPrice DECIMAL(10, 2) NOT NULL,
  paymentmethod_id INT NOT NULL,
  PRIMARY KEY (idTransaction),
  FOREIGN KEY (client_id) REFERENCES TeaShop.client(idClient),
  FOREIGN KEY (tea_id) REFERENCES TeaShop.Tea(idTea),
  FOREIGN KEY (paymentmethod_id) REFERENCES TeaShop.PaymentMethod(idPaymentMethod)
);

drop table transaction;

INSERT INTO TeaShop.Transaction
(client_id, tea_id, dateTransaction, quantityTransaction, totalPrice, paymentmethod_id) VALUES
(1, 2, '2023-11-15 09:30:00', 2, 15.00, 1),
(2, 4, '2023-11-15 11:15:00', 1, 12.25, 1),
(3, 1, '2023-11-16 14:20:00', 3, 26.97, 2),
(4, 3, '2023-11-17 10:45:00', 1, 6.75, 3),
(1, 5, '2023-11-18 16:30:00', 1, 15.99, 1),
(3, 2, '2023-11-19 13:10:00', 4, 30.00, 2);

select * from transaction;

CREATE TABLE TeaShop.PaymentMethod (
  idPaymentMethod INT NOT NULL AUTO_INCREMENT,
  nameMethode VARCHAR(20) NOT NULL,
  activeMethod BOOLEAN NOT NULL DEFAULT TRUE,
  PRIMARY KEY (idPaymentMethod)
);

INSERT INTO TeaShop.PaymentMethod (nameMethode, activeMethod) VALUES
('Credit Card', TRUE),
('Debit Card', TRUE),
('Cash', TRUE);

ALTER TABLE TeaShop.Transaction
MODIFY paymentMethod INT,
ADD CONSTRAINT fk_payment_method
FOREIGN KEY (paymentMethod) REFERENCES TeaShop.PaymentMethod(idPaymentMethod);

select * from Transaction;
