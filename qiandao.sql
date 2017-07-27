-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-02-06 13:09:53
-- 服务器版本： 5.5.40-log
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qiandao`
--

-- --------------------------------------------------------

--
-- 表的结构 `cloudmusic`
--

CREATE TABLE `cloudmusic` (
  `id` int(11) NOT NULL,
  `uuid` int(11) NOT NULL,
  `cookies` text NOT NULL,
  `status` text NOT NULL,
  `lasttime` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

--
-- 表的结构 `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `passwd` text NOT NULL,
  `role` text NOT NULL,
  `regtime` text NOT NULL,
  `lasttime` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

--
-- 表的结构 `userstatus`
--

CREATE TABLE `userstatus` (
  `id` int(11) NOT NULL,
  `uuid` int(11) NOT NULL,
  `name` text NOT NULL,
  `nickname` text NOT NULL,
  `status` text NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloudmusic`
--
ALTER TABLE `cloudmusic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cloudmusic`
--
ALTER TABLE `cloudmusic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- 使用表AUTO_INCREMENT `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
