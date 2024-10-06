-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 11:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'chatapp'
--

-- --------------------------------------------------------

--
-- Table structure for table 'messages'
--

CREATE TABLE messages (
    id INT(11) NOT NULL AUTO_INCREMENT,  -- id tự động tăng và là khóa chính
    sender_id INT(11) NOT NULL,          -- ID người gửi, kiểu INT
    receiver_id INT(11) NOT NULL,        -- ID người nhận, kiểu INT
    content TEXT NOT NULL,               -- Nội dung tin nhắn, kiểu TEXT
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Thời gian tạo, mặc định là thời gian hiện tại
    status TINYINT(1) DEFAULT 1,         -- Trạng thái tin nhắn (1: đã gửi, 0: chưa gửi)
    chat_room_id INT(11) NOT NULL,       -- ID phòng chat, kiểu INT
    is_deleted TINYINT(1) DEFAULT 0,     -- Trạng thái xóa (1: đã xóa, 0: chưa xóa)
    PRIMARY KEY (id)                     -- Thiết lập khóa chính
);


-- --------------------------------------------------------

--
-- Table structure for table 'users'
--

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,  -- id tự động tăng và là khóa chính
    username VARCHAR(100) NOT NULL,      -- Tên người dùng, độ dài tối đa 100 ký tự
    password VARCHAR(255) NOT NULL,      -- Mật khẩu (hashed), độ dài tối đa 255 ký tự
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Thời gian tạo, mặc định là thời gian hiện tại
    fullname VARCHAR(255) NOT NULL,      -- Họ tên đầy đủ, độ dài tối đa 255 ký tự
    imageFile VARCHAR(255),              -- Đường dẫn đến file ảnh, độ dài tối đa 255 ký tự
    status TINYINT(1) DEFAULT 1,         -- Trạng thái người dùng (1: hoạt động, 0: không hoạt động)
    PRIMARY KEY (id)                     -- Thiết lập khóa chính
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

