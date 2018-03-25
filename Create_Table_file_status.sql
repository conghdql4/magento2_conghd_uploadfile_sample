CREATE TABLE file_status (
                              file_id int(11) NOT NULL auto_increment,
                              file_name varchar(100) ,
                              file_status int(11) ,
                              file_size int(11) ,
                              user_name varchar(30) ,
                              store_name varchar(50) ,
                              ip_address varchar(30) ,
                              browser varchar(100) ,
                              date_uploaded timestamp ,
                              date_updated timestamp,primary key(file_id) );