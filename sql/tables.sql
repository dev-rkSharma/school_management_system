-- database name (school_mnagement_system)
create database if not exists school_mnagement_system; 
use school_mnagement_system;


CREATE TABLE if NOT EXISTS user_master(
    user_id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(225) not null,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    removed enum ('Y', 'N') DEFAULT 'N'
);
CREATE TABLE IF NOT EXISTS country_master(
    country_id int AUTO_INCREMENT PRIMARY KEY,
    country_name VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    removed enum ('Y', 'N') DEFAULT 'N'
);
create table IF NOT EXISTS state_master(
    state_id int auto_increment primary key,
    state_name varchar(225) not null,
    country_id int,
    foreign key (country_id) references country_master(country_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    removed enum ('Y', 'N') DEFAULT 'N'
);
CREATE TABLE IF NOT EXISTS city_master(
    city_id int AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(255) NOT NULL,
    state_id int,
    foreign key (state_id) references state_master(state_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    removed enum ('Y', 'N') DEFAULT 'N'
);
create table IF NOT EXISTS class_master(
    class_id int auto_increment primary key,
    class_name varchar(255) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    removed enum ('Y', 'N') DEFAULT 'N'
);
CREATE TABLE IF NOT EXISTS section_master(
    section_id int AUTO_INCREMENT PRIMARY KEY,
    section_name varchar(255) not null,
    class_id int,
    foreign key (class_id) references class_master(class_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    removed enum ('Y', 'N') DEFAULT 'N'
);