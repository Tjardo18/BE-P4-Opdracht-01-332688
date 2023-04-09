CREATE DATABASE InstructeursInDienst;
USE InstructeursInDienst;

CREATE TABLE TypeVoertuig(
Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
TypeVoertuig VARCHAR(200) NOT NULL,
Rijbewijscategorie VARCHAR(10) NOT NULL)
ENGINE = InnoDB;

INSERT INTO TypeVoertuig VALUES 
(NULL, 'Personenauto', 'B'), 
(NULL, 'Vrachtwagen', 'C'), 
(NULL, 'Bus', 'D'), 
(NULL, 'Bromfiets', 'AM');

SELECT * FROM TypeVoertuig;



CONSTRAINT PK_Persoon_Id PRIMARY KEY CLUSTERED(Id);