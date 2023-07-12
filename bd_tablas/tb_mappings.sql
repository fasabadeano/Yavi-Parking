CREATE TABLE tb_mappings(
    id_map                 INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nro_space              VARCHAR(255) NULL,   
    state_space            VARCHAR(255) NULL,
    observation            VARCHAR(255) NULL,         
    created                DATETIME NULL,
    date_update            DATETIME NULL,
    elimination            DATETIME NULL,
    enable_status          VARCHAR(10)
);
