//v_table
CREATE TABLE v_base(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(64) NOT NULL ,
    dt DATE,
    v_time TIME,
    dir1 INT NOT NULL,
    dir2 INT NOT NULL,
    dir3 INT NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;
//dirで左のブロックの表示を管理
CREATE TABLE v_thum(
    id INT NOT NULL AUTO_INCREMENT,
    img MEDIUMBLOB NOT NULL,
    url VARCHAR(256) NOT NULL ,  
    PRIMARY KEY (id),
    FOREIGN KEY (id) references v_base(id)
)ENGINE = InnoDB;
CREATE TABLE v_dir1(
    id INT NOT NULL,
    d_name VARCHAR(32),
    PRIMARY KEY(id)
)ENGINE = InnoDB;
CREATE TABLE v_dir2(
    id INT NOT NULL,
    host_id INT NOT NULL,
    d_name VARCHAR(32),
    PRIMARY KEY(id),
    FOREIGN KEY (host_id) references v_dir1(id)
)ENGINE = InnoDB;
CREATE TABLE v_dir3(
    id INT NOT NULL,
    d_name VARCHAR(32),
    host_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (host_id) references v_dir2(id)
)ENGINE = InnoDB;
