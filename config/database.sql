CREATE DATABASE Smartbike;

USE Smartbike;

-- Table pour les produits
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,    
    image VARCHAR(255),
    price DECIMAL(10, 2)
);

-- Table pour les paniers
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,    
    product_id INT,
    quantity INT,      
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description, image, price) VALUES
('Téléphone Portable', 'Téléphone portable taille écran 6,1 pouces, 128Go de stockage ', 'images/telephone.PNG', 1000.99),
('Ordinateur', 'PC portable 15 pouces', 'images/ordi.PNG', 899),
('Ecran PC', 'Ecran PC 27 pouces', 'images/ecran.PNG', 125.75),
('Tablette', 'tablette 64Go de stockage ', 'images/tablette.PNG', 650),
('Bouilloire', 'Bouilloire electrique', 'images/bouilloire.PNG', 29.99),
('Ordinateur de bureau', 'PC portable 13 pouces', 'images/ordi.PNG', 499),
('Trotinette', 'Trotinette électrique', 'images/trotinette.png', 299.99);

