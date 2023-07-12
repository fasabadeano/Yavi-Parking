CREATE TABLE tb_roles(
    id_rol                 INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_rol               VARCHAR(255) NULL,                
    created                DATETIME NULL,
    date_update            DATETIME NULL,
    elimination            DATETIME NULL,
    enable_status          VARCHAR(10)
);