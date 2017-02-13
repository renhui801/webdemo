-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?07 �?06 �?22:06
-- 服务器版本: 5.5.47
-- PHP 版本: 5.6.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `spcp`
--

-- --------------------------------------------------------

--
-- 表的结构 `msg_info`
--

CREATE TABLE IF NOT EXISTS `msg_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `momsg` varchar(30) NOT NULL,
  `momsg_sp` varchar(30) NOT NULL,
  `spnumber` varchar(30) NOT NULL,
  `spid` varchar(30) NOT NULL,
  `spname` varchar(30) NOT NULL,
  `spmsg` int(1) NOT NULL DEFAULT '0',
  `cpid` varchar(30) NOT NULL,
  `cpname` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `inprice` float NOT NULL,
  `outprice` float NOT NULL,
  `kl` int(5) NOT NULL,
  `kl_js` int(5) NOT NULL,
  `url` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `spname` (`spname`),
  FULLTEXT KEY `spid` (`spid`),
  FULLTEXT KEY `spid_2` (`spid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 触发器 `msg_info`
--
DROP TRIGGER IF EXISTS `cpmsg_add`;
DELIMITER //
CREATE TRIGGER `cpmsg_add` BEFORE INSERT ON `msg_info`
 FOR EACH ROW begin
declare spname varchar(30);
declare cpname varchar(30);
select s.spname,c.cpname into spname,cpname from sp s,cp c where s.spid=new.spid and c.cpid=new.cpid ;
if cpname!='' then
set new.spname=spname,new.cpname=cpname;
end if;
END
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
