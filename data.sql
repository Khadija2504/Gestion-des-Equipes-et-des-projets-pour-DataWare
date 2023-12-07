-- Database: datawaresys
-- Creation des tableaux:

CREATE TABLE Utilisateurs (
    UtilisateurID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50),
    Email VARCHAR(100) UNIQUE,
    DateNaissance DATE,
    MotDePasse VARCHAR(255) NOT NULL,
    Role ENUM('member', 'ProductOwner', 'ScrumMaster') NOT NULL
);

CREATE TABLE Projets (
    ProjetID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Description TEXT,
    ScrumMasterID INT,
    EquipeID INT,
    FOREIGN KEY (ScrumMasterID) REFERENCES Utilisateurs(UtilisateurID) ON DELETE SET NULL,
    FOREIGN KEY (EquipeID) REFERENCES Equipes(EquipeID) ON DELETE SET NULL
);

CREATE TABLE Equipes (
    EquipeID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    ScrumMasterID INT,
    FOREIGN KEY (ScrumMasterID) REFERENCES Utilisateurs(UtilisateurID) ON DELETE SET NULL
);

ALTER TABLE Utilisateurs
ADD COLUMN EquipeID INT,
ADD CONSTRAINT fk_utilisateurs_equipes FOREIGN KEY (EquipeID) REFERENCES Equipes(EquipeID) ON DELETE SET NULL;



ALTER TABLE Projets
DROP FOREIGN KEY fk_utilisateurs_equipes;

ALTER TABLE Projets
ADD CONSTRAINT fk_projets_equipes FOREIGN KEY (EquipeID) REFERENCES Equipes(EquipeID) ON DELETE CASCADE;


ALTER TABLE Projets
DROP FOREIGN KEY fk_projets_equipes;

ALTER TABLE Projets
ADD CONSTRAINT fk_projets_equipes FOREIGN KEY (EquipeID) REFERENCES Equipes(EquipeID) ON DELETE CASCADE;


-- les donnes:

INSERT INTO Utilisateurs (Nom, Prenom, Email, DateNaissance, MotDePasse, Role) VALUES
    ('Doe', 'John', 'john.doe@email.com', '1990-01-15', 'john', 'membre'),
    ('sql', 'php', 'php.sql@email.com', '1890-01-15', 'php', 'membre'),
    ('john', 'John', 'john.john@email.com', '1990-01-15', 'john', 'membre'),
    ('Smith', 'Alice', 'alice.smith@email.com', '1985-03-22', 'alice', 'ProductOwner'),
    ('Johnson', 'Bob', 'bob.johnson@email.com', '1988-09-10', 'bob', 'ScrumMaster'),
    ('shizo', 'shizona', 'shizo.shizona@email.com', '1988-09-10', 'shizona', 'ScrumMaster');

INSERT INTO Projets (Nom, Description, ScrumMasterID, EquipeID) VALUES
    ('Projet A', 'Description du projet A', 5, 1),
    ('Projet B', 'Description du projet B', 6, 2);

INSERT INTO Equipes (Nom, ScrumMasterID) VALUES
    ('Équipe X', 5),
    ('Équipe Y', 6),
    ('Équipe X', 6),
    ('Équipe Y', 5);