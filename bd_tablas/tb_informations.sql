CREATE TABLE tb_informations(
    id_informationes       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_parking           VARCHAR(255) NULL,
    institute_activity     VARCHAR(255) NULL,
    branch                 VARCHAR(255) NULL,
    a_ddress               VARCHAR(255) NULL,
    z_one                  VARCHAR(255) NULL,
    phone                  VARCHAR(255) NULL,
    city                   VARCHAR(255) NULL,
    country                VARCHAR(255) NULL,

    created                DATETIME NULL,
    date_update            DATETIME NULL,
    elimination            DATETIME NULL,
    enable_status                 VARCHAR(10)
);