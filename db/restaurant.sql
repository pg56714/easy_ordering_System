-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.39-MariaDB
-- PHP 版本： 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `restaurant`
--

-- --------------------------------------------------------

--
-- 資料表結構 `booking`
--

CREATE TABLE `booking` (
  `book_id` int(10) NOT NULL COMMENT '明細_id',
  `shop_id` int(10) NOT NULL COMMENT '餐點_id',
  `mas_id` varchar(12) NOT NULL COMMENT '訂單編號_id',
  `amount` int(2) NOT NULL COMMENT '數量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `car`
--

CREATE TABLE `car` (
  `id` int(5) NOT NULL,
  `email` varchar(64) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `email` varchar(64) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `customer`
--

INSERT INTO `customer` (`email`, `password`, `name`, `phone`) VALUES
('shop@gmail.com', '123', '', ''),
('test@gmail.com', '123', '洪先生', '0912345678');

-- --------------------------------------------------------

--
-- 資料表結構 `master_list`
--

CREATE TABLE `master_list` (
  `mas_id` varchar(12) NOT NULL COMMENT '訂單編號_id',
  `res_id` int(10) NOT NULL COMMENT '員工_id',
  `email` varchar(64) NOT NULL COMMENT '信箱(帳號)',
  `date` date NOT NULL COMMENT '下單日期',
  `time` time NOT NULL COMMENT '下單時間',
  `state` int(1) NOT NULL COMMENT '狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int(10) NOT NULL COMMENT '員工_id',
  `res_name` varchar(10) NOT NULL COMMENT '員工姓名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `res_name`) VALUES
(1, '王大明'),
(2, '王曉明'),
(3, '洪先生');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(10) NOT NULL,
  `res_id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `dollar` int(5) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`shop_id`, `res_id`, `name`, `dollar`, `photo`) VALUES
(1, 1, '蝦仁炒飯', 85, '1.jpg'),
(2, 2, '肉絲炒飯', 75, '2.jpg'),
(3, 3, '海鮮炒飯', 80, '3.jpg'),
(4, 1, '日式味噌豆腐湯', 30, '190906-9532-0-oggGY.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- 資料表索引 `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- 資料表索引 `master_list`
--
ALTER TABLE `master_list`
  ADD PRIMARY KEY (`mas_id`);

--
-- 資料表索引 `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '明細_id';

--
-- 使用資料表自動增長(AUTO_INCREMENT) `car`
--
ALTER TABLE `car`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '員工_id', AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
