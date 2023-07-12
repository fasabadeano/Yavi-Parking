CREATE TABLE tb_users(
    id                     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    names                  VARCHAR(255) NULL,
    rol                    VARCHAR(255) NULL,
    email                  VARCHAR(255) NULL,
    verified_email         VARCHAR(255) NULL,
    password_user          VARCHAR(255) NULL,
    token                  VARCHAR(255) NULL,
    created                DATETIME NULL,
    date_update            DATETIME NULL,
    elimination            DATETIME NULL,
    enable_status                 VARCHAR(10)
);