CREATE DATABASE vinogradnistvo;

USE vinogradnistvo;

CREATE TABLE stranka (
    id_stranka INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50),
    priimek VARCHAR(50),
    email VARCHAR(100),
    telefon VARCHAR(20)
);

CREATE TABLE vino (
    id_vino INT AUTO_INCREMENT PRIMARY KEY,
    naziv VARCHAR(100),
    vrsta VARCHAR(50),
    sladkost VARCHAR(50),
    opis TEXT,
    cena DECIMAL(6,2)
);

CREATE TABLE rezervacija (
    id_rezervacija INT AUTO_INCREMENT PRIMARY KEY,
    datum_rezervacije DATETIME,
    st_oseb INT,
    sporocilo TEXT,
    kolicina INT,
    id_stranka INT,
    id_vino INT,
    
    FOREIGN KEY (id_stranka)
    REFERENCES stranka(id_stranka),

    FOREIGN KEY (id_vino)
    REFERENCES vino(id_vino)
);