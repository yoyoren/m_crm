-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014-04-25 09:43:43
-- 服务器版本: 5.5.35
-- PHP 版本: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `crm`
--
CREATE DATABASE IF NOT EXISTS `crm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crm`;

-- --------------------------------------------------------

--
-- 表的结构 `allusers`
--

CREATE TABLE IF NOT EXISTS `allusers` (
  `uid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `isvip` tinyint(1) DEFAULT '0',
  `webid` tinyint(2) NOT NULL DEFAULT '1',
  `vipzcdate` varchar(25) NOT NULL DEFAULT '0',
  `vipusefullife` varchar(4) NOT NULL DEFAULT '0',
  `porc` tinyint(1) DEFAULT '1',
  `userid` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `bigclass` varchar(30) NOT NULL DEFAULT '0',
  `pdtotal` int(5) NOT NULL DEFAULT '0',
  `infototal` int(5) NOT NULL DEFAULT '0',
  `softtotal` int(4) NOT NULL DEFAULT '0',
  `jobtotal` int(5) NOT NULL DEFAULT '0',
  `newstotal` int(6) NOT NULL DEFAULT '0',
  `invmoney` int(6) NOT NULL DEFAULT '200',
  `integral` int(6) NOT NULL DEFAULT '0',
  `dlcs` int(5) NOT NULL DEFAULT '1',
  `linkman` varchar(25) NOT NULL DEFAULT '',
  `zhiwu` varchar(35) NOT NULL DEFAULT '0',
  `webfwcs` int(10) NOT NULL DEFAULT '0',
  `sex` varchar(4) NOT NULL DEFAULT '0',
  `idcard` varchar(30) NOT NULL DEFAULT '',
  `linktel` varchar(150) NOT NULL DEFAULT '0',
  `telcountrycode` varchar(8) NOT NULL DEFAULT '0',
  `telareacode` varchar(8) NOT NULL DEFAULT '0',
  `linkfax` varchar(150) NOT NULL DEFAULT '0',
  `faxcountrycode` varchar(8) NOT NULL DEFAULT '0',
  `faxareacode` varchar(8) NOT NULL DEFAULT '0',
  `mobilphone` varchar(150) NOT NULL DEFAULT '0',
  `oicq` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `shopname` varchar(100) DEFAULT '0',
  `mainproduct` varchar(255) NOT NULL DEFAULT '0',
  `islock` tinyint(1) NOT NULL DEFAULT '0',
  `shopintr` text,
  `shopaddr` varchar(180) NOT NULL DEFAULT '0',
  `sheng` varchar(30) NOT NULL DEFAULT '30',
  `chinacomcity` varchar(30) NOT NULL DEFAULT '0',
  `postcode` varchar(10) NOT NULL DEFAULT '0',
  `website` varchar(200) DEFAULT '0',
  `shoplogo` varchar(255) DEFAULT '0',
  `zcdate` varchar(20) NOT NULL DEFAULT '',
  `lastdlsj` varchar(20) NOT NULL DEFAULT '0',
  `regip` varchar(30) NOT NULL DEFAULT '0',
  `zhizao` tinyint(1) NOT NULL DEFAULT '0',
  `maoyi` tinyint(1) NOT NULL DEFAULT '0',
  `fuwu` tinyint(1) NOT NULL DEFAULT '0',
  `zuzhi` tinyint(1) NOT NULL DEFAULT '0',
  `lingshou` tinyint(1) NOT NULL DEFAULT '0',
  `daili` tinyint(1) NOT NULL DEFAULT '0',
  `caigou` tinyint(1) NOT NULL DEFAULT '0',
  `qit` tinyint(1) NOT NULL DEFAULT '0',
  `ygrs` int(6) NOT NULL DEFAULT '0',
  `yye` int(2) NOT NULL DEFAULT '0',
  `remark` varchar(50) NOT NULL DEFAULT '0',
  `istj` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `uid` (`uid`),
  KEY `userid` (`userid`,`linkman`),
  KEY `idcard` (`idcard`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `bigclass`
--

CREATE TABLE IF NOT EXISTS `bigclass` (
  `classid` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(100) DEFAULT NULL,
  `classcode` varchar(10) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  KEY `classid` (`classid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `userid` varchar(20) DEFAULT NULL COMMENT '用户英文',
  `activitytype` varchar(20) DEFAULT NULL COMMENT '日程类型',
  `rctitle` varchar(150) DEFAULT NULL COMMENT '*跟进主题',
  `clientname` varchar(150) DEFAULT NULL COMMENT '拜访客户',
  `clientid` varchar(10) DEFAULT NULL COMMENT '拜访客户id',
  `linkname` varchar(50) DEFAULT NULL COMMENT '联系人',
  `linknameid` varchar(10) DEFAULT NULL COMMENT '联系人id',
  `eventstatus` varchar(50) DEFAULT NULL COMMENT '阶段',
  `jhtime` varchar(50) DEFAULT NULL COMMENT '计划时间',
  `jhm` varchar(10) DEFAULT NULL COMMENT '上午/下午',
  `str_address` varchar(150) DEFAULT NULL COMMENT '地点',
  `remark` longtext COMMENT '内容及结果描述',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `fbdate` varchar(50) DEFAULT NULL COMMENT '当前时间',
  `yes` varchar(10) DEFAULT NULL COMMENT '是否送过试吃',
  `tryDate` varchar(50) DEFAULT NULL COMMENT '试吃时间',
  `plan` longtext COMMENT '跟进计划',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `chance`
--

CREATE TABLE IF NOT EXISTS `chance` (
  `id` int(9) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '序号',
  `userid` varchar(30) DEFAULT NULL COMMENT '用户',
  `itemname` varchar(50) DEFAULT NULL COMMENT '*缔结交易方式',
  `clientname` varchar(150) DEFAULT NULL COMMENT '*客户名称',
  `clientnameid` varchar(10) DEFAULT NULL,
  `itemmoney` varchar(50) DEFAULT NULL COMMENT '成交金额',
  `phase` varchar(50) DEFAULT NULL COMMENT '阶段',
  `nextcontent` varchar(250) DEFAULT NULL COMMENT '下一步',
  `expectationmoney` varchar(110) DEFAULT NULL COMMENT '期望收益',
  `intendingday` varchar(10) DEFAULT NULL COMMENT '成交日期',
  `shic` varchar(150) DEFAULT NULL COMMENT '市场活动源',
  `shicid` varchar(10) DEFAULT NULL COMMENT '市场活动源id',
  `possibility` varchar(10) DEFAULT NULL COMMENT '*可能性',
  `clew` varchar(50) DEFAULT NULL COMMENT '线索来源',
  `linkname` varchar(50) DEFAULT NULL COMMENT '联系人',
  `linknameid` varchar(10) DEFAULT NULL COMMENT '联系人id',
  `addtime` varchar(50) DEFAULT NULL COMMENT '添加时间',
  `username` varchar(10) DEFAULT NULL COMMENT '所有者',
  `remark` longtext COMMENT '描述',
  `signDate` varchar(50) DEFAULT NULL COMMENT '签约时间',
  `payDate` varchar(50) DEFAULT NULL COMMENT '*付款日期',
  `directly` varchar(50) DEFAULT NULL COMMENT '购买目的',
  `content` varchar(50) DEFAULT NULL COMMENT '产品形式',
  `discount` varchar(50) DEFAULT NULL COMMENT '折扣',
  `contract` varchar(50) DEFAULT NULL COMMENT '契约方式',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `userid` varchar(50) DEFAULT NULL COMMENT '用户英文',
  `username` varchar(10) DEFAULT NULL COMMENT '用户名',
  `clientname` varchar(150) DEFAULT NULL COMMENT '*客户名称',
  `clientlevel` varchar(50) DEFAULT NULL COMMENT '等级',
  `address` varchar(150) DEFAULT NULL COMMENT '*地址',
  `web` varchar(50) DEFAULT NULL COMMENT '公司网址',
  `fathername` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL COMMENT '客户类型',
  `calling` varchar(50) DEFAULT NULL COMMENT '*行业性质',
  `suoyq` varchar(10) DEFAULT NULL COMMENT '所有权',
  `ygrs` varchar(10) DEFAULT NULL COMMENT '*员工人数',
  `yye` varchar(10) DEFAULT NULL COMMENT '*年营业额',
  `sheng` varchar(50) DEFAULT NULL COMMENT '*省',
  `chinacomcity` varchar(50) DEFAULT NULL COMMENT '*市',
  `telcountrycode` varchar(50) DEFAULT NULL COMMENT '*长途号86',
  `telareacode` varchar(50) DEFAULT NULL COMMENT '*区号',
  `tel` varchar(50) DEFAULT NULL COMMENT '*固定电话',
  `faxcountrycode` varchar(50) DEFAULT NULL COMMENT '传真长途号86',
  `faxareacode` varchar(50) DEFAULT NULL COMMENT '传真区号',
  `fax` varchar(50) DEFAULT NULL COMMENT '传真',
  `postcode` varchar(10) DEFAULT NULL COMMENT '邮编',
  `remark` longtext COMMENT '描述',
  `bumen1` varchar(50) DEFAULT NULL COMMENT '部门',
  `addtime` varchar(50) DEFAULT NULL COMMENT '添加时间',
  `addr1` varchar(150) DEFAULT '北京市东亿国际' COMMENT '详细地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `id` decimal(20,0) NOT NULL DEFAULT '0',
  `code` varchar(20) DEFAULT NULL,
  `codename` varchar(50) DEFAULT NULL,
  `lscode` varchar(10) DEFAULT NULL,
  `classcode` varchar(50) DEFAULT NULL,
  `bigname` varchar(50) DEFAULT NULL,
  `tuh` varchar(100) DEFAULT NULL,
  `kuctm` varchar(100) DEFAULT NULL,
  `jistm` varchar(100) DEFAULT NULL,
  `guig` varchar(100) DEFAULT NULL,
  `cail` varchar(100) DEFAULT NULL,
  `adduser` varchar(50) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `modyuser` varchar(50) DEFAULT NULL,
  `modytime` varchar(50) DEFAULT NULL,
  `kucsl` varchar(10) DEFAULT NULL,
  `danwei` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `kcadduser` varchar(50) DEFAULT NULL,
  `kcaddtime` varchar(50) DEFAULT NULL,
  `provideid` varchar(50) DEFAULT NULL,
  `providename` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `compositive`
--

CREATE TABLE IF NOT EXISTS `compositive` (
  `id` decimal(20,0) NOT NULL DEFAULT '0',
  `th` varchar(50) DEFAULT NULL,
  `gh` varchar(50) DEFAULT NULL,
  `kgsl` varchar(10) DEFAULT NULL,
  `jhrq` varchar(50) DEFAULT NULL,
  `beiz` varchar(250) DEFAULT NULL,
  `adduser` varchar(50) DEFAULT NULL,
  `addname` varchar(50) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `modyuser` varchar(50) DEFAULT NULL,
  `modytime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentid` varchar(10) DEFAULT NULL,
  `departmentname` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `linkname`
--

CREATE TABLE IF NOT EXISTS `linkname` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `clew` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `zhiwu` varchar(50) DEFAULT NULL,
  `clientid` varchar(10) DEFAULT NULL,
  `clientname` varchar(150) DEFAULT NULL,
  `officetel` varchar(100) DEFAULT NULL,
  `hometel` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `assistant` varchar(50) DEFAULT NULL,
  `assistanttel` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `skypeid` varchar(50) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `remark` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `leix` varchar(10) DEFAULT NULL,
  `marketname` varchar(80) DEFAULT NULL,
  `zhuangt` varchar(10) DEFAULT NULL,
  `starttime` varchar(30) DEFAULT NULL,
  `endtime` varchar(30) DEFAULT NULL,
  `qiwsy` varchar(100) DEFAULT NULL,
  `qiwcgl` varchar(10) DEFAULT NULL,
  `yuscb` varchar(100) DEFAULT NULL,
  `shijcb` varchar(100) DEFAULT NULL,
  `facsl` varchar(80) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `remark` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `meddic`
--

CREATE TABLE IF NOT EXISTS `meddic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chancename` varchar(200) NOT NULL DEFAULT '0',
  `chanceid` varchar(10) NOT NULL DEFAULT '0',
  `userid` varchar(30) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '0',
  `metrics` varchar(5) NOT NULL DEFAULT '',
  `economic` varchar(5) NOT NULL DEFAULT '0',
  `criteria` varchar(5) NOT NULL DEFAULT '0',
  `process` varchar(5) NOT NULL DEFAULT '0',
  `pain` varchar(5) NOT NULL DEFAULT '0',
  `champions` varchar(30) NOT NULL DEFAULT '0',
  `championszt` varchar(5) NOT NULL DEFAULT '0',
  `bz` text,
  `addtime` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `chancename` (`chancename`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `newsinfo_`
--

CREATE TABLE IF NOT EXISTS `newsinfo_` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newscontent` text NOT NULL,
  `fwcs` int(6) NOT NULL DEFAULT '0',
  `newsclass` varchar(30) NOT NULL DEFAULT '0',
  `ndate` varchar(25) NOT NULL DEFAULT '0',
  `nimage` varchar(200) NOT NULL DEFAULT '0',
  `userid` varchar(10) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '0',
  `newip` varchar(30) NOT NULL DEFAULT '0',
  `isshenhe` tinyint(1) NOT NULL DEFAULT '0',
  `zhtime` varchar(50) NOT NULL DEFAULT '0',
  `zhaddr` varchar(50) NOT NULL DEFAULT '0',
  `newstitle` varchar(255) NOT NULL DEFAULT '0',
  `source` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `newstitle` (`nimage`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `managename` char(30) NOT NULL DEFAULT '',
  `mpassword` char(65) NOT NULL DEFAULT '',
  `email` char(50) DEFAULT NULL,
  `mqq` char(30) NOT NULL DEFAULT '0',
  `mtel` char(30) NOT NULL DEFAULT '0',
  `mquestion` char(50) NOT NULL DEFAULT '0',
  `mresult` char(50) NOT NULL DEFAULT '0',
  `other1` char(100) NOT NULL DEFAULT '',
  `other2` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `managename` (`managename`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `provide`
--

CREATE TABLE IF NOT EXISTS `provide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(50) DEFAULT NULL,
  `sheng` varchar(50) DEFAULT NULL,
  `shi` varchar(50) DEFAULT NULL,
  `telcountrycode` varchar(50) DEFAULT NULL,
  `telareacode` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `faxcountrycode` varchar(50) DEFAULT NULL,
  `faxareacode` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `linkname` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `mainproduct` varchar(250) DEFAULT NULL,
  `beiz` varchar(250) DEFAULT NULL,
  `adduser` varchar(50) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `provideuser`
--

CREATE TABLE IF NOT EXISTS `provideuser` (
  `id` int(11) NOT NULL DEFAULT '0',
  `companyname` varchar(100) DEFAULT NULL,
  `linkname` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `sheng` varchar(50) DEFAULT NULL,
  `shi` varchar(50) DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `small_class`
--

CREATE TABLE IF NOT EXISTS `small_class` (
  `id` decimal(20,0) DEFAULT NULL,
  `classcode` varchar(10) DEFAULT NULL,
  `bid` varchar(10) DEFAULT NULL,
  `classname` varchar(50) DEFAULT NULL,
  `code` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `smallclass`
--

CREATE TABLE IF NOT EXISTS `smallclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bigclasscode` varchar(50) DEFAULT NULL,
  `bigclassname` varchar(50) DEFAULT NULL,
  `smallclasscode` varchar(50) DEFAULT NULL,
  `smallclassname` varchar(50) DEFAULT NULL,
  `adduser` varchar(50) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `stock_log`
--

CREATE TABLE IF NOT EXISTS `stock_log` (
  `id` decimal(20,0) NOT NULL DEFAULT '0',
  `code` varchar(20) DEFAULT NULL,
  `codename` varchar(50) DEFAULT NULL,
  `classcode` varchar(50) DEFAULT NULL,
  `tuh` varchar(100) DEFAULT NULL,
  `kuctm` varchar(100) DEFAULT NULL,
  `jistm` varchar(100) DEFAULT NULL,
  `guig` varchar(100) DEFAULT NULL,
  `cail` varchar(100) DEFAULT NULL,
  `kucsl` varchar(10) DEFAULT NULL,
  `ruksl` varchar(50) DEFAULT NULL,
  `danwei` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `kcadduser` varchar(50) DEFAULT NULL,
  `addusername` varchar(50) DEFAULT NULL,
  `kcaddtime` varchar(50) DEFAULT NULL,
  `provideid` varchar(50) DEFAULT NULL,
  `providename` varchar(250) DEFAULT NULL,
  `chuorru` varchar(10) DEFAULT NULL,
  `remark` longtext
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitsid` varchar(10) DEFAULT NULL,
  `unitsname` varchar(20) DEFAULT NULL,
  `unitseng` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `userpwd` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `xingb` varchar(5) DEFAULT NULL,
  `usertel` varchar(10) DEFAULT NULL,
  `usermail` varchar(50) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `modytime` varchar(50) DEFAULT NULL,
  `departmentid` int(11) DEFAULT NULL,
  `parentid` int(10) NOT NULL,
  `departmentname` varchar(50) DEFAULT NULL,
  `fuze` char(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `userid`, `userpwd`, `username`, `xingb`, `usertel`, `usermail`, `addtime`, `modytime`, `departmentid`, `parentid`, `departmentname`, `fuze`) VALUES
(00000000001, 'admin', 'admin', '管理员', '女', '1890115550', '', '', '', 0, -1, 'admin', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
