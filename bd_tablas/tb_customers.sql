CREATE TABLE tb_customers(
    id_customer                    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_customer                  VARCHAR(255) NULL,
    ruc_ci_customer                VARCHAR(255) NULL,
    car_plate                      VARCHAR(255) NULL,
    created                        DATETIME NULL,
    date_update                    DATETIME NULL,
    elimination                    DATETIME NULL,
    enable_status                  VARCHAR(10)
);