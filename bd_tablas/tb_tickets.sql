CREATE TABLE tb_tickets(
    id_ticket                INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_customer            VARCHAR(255) NULL,
    ruc_ci_customer          VARCHAR(255) NULL,                
    nro_space                VARCHAR(255) NULL,                
    date_admission           VARCHAR(255) NULL,                
    time_admission           VARCHAR(255) NULL,
    user_sesion              VARCHAR(255) NULL,                

    created                DATETIME NULL;
    date_update            DATETIME NULL,
    elimination            DATETIME NULL,
    enable_status          VARCHAR(10)
);