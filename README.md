# PHP-assignment
A chatting app made using PHP.
two tables are required for the database.

    create table gagan_users(fname varchar(100) not null,lname varchar(100) not null,email varchar(100) not null,password varchar(100) not null,username varchar(100) not null,phone varchar(100) not null,gender varchar(10) not null,profile_photo varchar(50) default './asset/default_profile_photo.jpeg');
  
    +---------------+--------------+------+-----+------------------------------------+-------+
    | Field         | Type         | Null | Key | Default                            | Extra |
    +---------------+--------------+------+-----+------------------------------------+-------+
    | fname         | varchar(100) | NO   |     | NULL                               |       |
    | lname         | varchar(100) | NO   |     | NULL                               |       |
    | email         | varchar(100) | NO   |     | NULL                               |       |
    | password      | varchar(100) | NO   |     | NULL                               |       |
    | username      | varchar(100) | NO   | PRI | NULL                               |       |
    | phone         | varchar(100) | NO   |     | NULL                               |       |
    | gender        | varchar(10)  | NO   |     | NULL                               |       |
    | profile_photo | varchar(50)  | YES  |     | ./asset/default_profile_photo.jpeg |       |
    +---------------+--------------+------+-----+------------------------------------+-------+

    create table gagan_msg( gfrom varchar(100) not null, gto varchar(100) not null, msg varchar(1000) not null, occur datetime not null);
    
    +-------+----------------+------+-----+---------+-------+
    | Field | Type           | Null | Key | Default | Extra |
    +-------+----------------+------+-----+---------+-------+
    | gfrom | varchar(100)   | NO   |     | NULL    |       |
    | gto   | varchar(100)   | NO   |     | NULL    |       |
    | msg   | varchar(10000) | NO   |     | NULL    |       |
    | occur | datetime       | NO   |     | NULL    |       |
    +-------+----------------+------+-----+---------+-------+
