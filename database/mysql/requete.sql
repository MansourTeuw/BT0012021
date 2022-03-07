CREATE DATABASE `daaraji`;

USE `daaraji`;

CREATE TABLE `admin` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `motdepasse1` VARCHAR(255) NOT NULL,
    `motdepasse2` VARCHAR(255) NOT NULL

);

CREATE TABLE `userAdmin` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `motdepasse1` VARCHAR(255) NOT NULL,
    `motdepasse2` VARCHAR(255) NOT NULL

);

CREATE TABLE `etudiant` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telephone` INT(9) NOT NULL,
    `module` VARCHAR(50) NOT NULL,
    `motdepasse1` VARCHAR(255) NOT NULL,
    `motdepasse2` VARCHAR(255) NOT NULL,
    `image` varchar(50) NOT NULL,
    `status` int(10) NOT NULL

);

