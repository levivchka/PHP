CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    surname VARCHAR(64) NOT NULL,
    last_name VARCHAR(64),
    gender ENUM('М','Ж') NOT NULL,
    birth_date DATE NOT NULL,
    phone VARCHAR(32),
    address VARCHAR(128),
    email VARCHAR(128),
    comment TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
