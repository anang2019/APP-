-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019-10-30 12:32:27
-- 服务器版本： 5.5.62-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `92fenfa`
--

-- --------------------------------------------------------

--
-- 表的结构 `prefix_admin`
--

CREATE TABLE IF NOT EXISTS `prefix_admin` (
  `in_adminid` int(11) NOT NULL,
  `in_adminname` varchar(255) NOT NULL,
  `in_adminpassword` varchar(255) NOT NULL,
  `in_loginip` varchar(255) DEFAULT NULL,
  `in_loginnum` int(11) NOT NULL,
  `in_logintime` datetime DEFAULT NULL,
  `in_islock` int(11) NOT NULL,
  `in_permission` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_admin`
--

INSERT INTO `prefix_admin` (`in_adminid`, `in_adminname`, `in_adminpassword`, `in_loginip`, `in_loginnum`, `in_logintime`, `in_islock`, `in_permission`) VALUES
(1, '42424567@qq.com', 'c0c344dbc0a027f55b2ab3fc1e90b405', '1.190.209.1', 65, '2019-10-18 19:56:14', 0, '1,2,3,4,5,6,7');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_app`
--

CREATE TABLE IF NOT EXISTS `prefix_app` (
  `in_id` int(11) NOT NULL,
  `in_uid` int(11) NOT NULL,
  `in_uname` varchar(255) NOT NULL,
  `in_name` varchar(255) NOT NULL,
  `in_bid` varchar(255) DEFAULT NULL,
  `in_mnvs` varchar(255) DEFAULT NULL,
  `in_bsvs` varchar(255) DEFAULT NULL,
  `in_bvs` varchar(255) DEFAULT NULL,
  `in_type` int(11) NOT NULL,
  `in_nick` varchar(255) DEFAULT NULL,
  `in_team` varchar(255) DEFAULT NULL,
  `in_form` varchar(255) DEFAULT NULL,
  `in_icon` varchar(255) DEFAULT NULL,
  `in_plist` varchar(255) NOT NULL,
  `in_hits` int(11) NOT NULL,
  `in_size` varchar(255) DEFAULT NULL,
  `in_kid` int(11) NOT NULL,
  `in_sign` int(11) NOT NULL,
  `in_resign` int(11) NOT NULL,
  `in_link` varchar(255) DEFAULT NULL,
  `in_removead` int(11) NOT NULL,
  `in_addtime` datetime DEFAULT NULL,
  `in_ios_super` varchar(255) DEFAULT NULL COMMENT '超级签名'
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_app`
--

INSERT INTO `prefix_app` (`in_id`, `in_uid`, `in_uname`, `in_name`, `in_bid`, `in_mnvs`, `in_bsvs`, `in_bvs`, `in_type`, `in_nick`, `in_team`, `in_form`, `in_icon`, `in_plist`, `in_hits`, `in_size`, `in_kid`, `in_sign`, `in_resign`, `in_link`, `in_removead`, `in_addtime`, `in_ios_super`) VALUES
(2, 1, '42424567@qq.com', '嗨拼团', 'com.kingkr.bianselong', '8.0', '1.0.0', '3', 1, 'shanxizhangshangyunwei', 'China Telecom Corporation Limited Shanghai enterprise information operations center', 'iOS', '1-1571034694.png', 'https://92ff.cn/data/attachment/1-1571034694.plist', 195, '19.8 MB', 7, 0, 0, '', 0, '2019-10-14 14:32:45', NULL),
(13, 3, '1@qq.com', '庄园之恋', 'com.kvvbsv.kgqcwuv', '17', '1.0.1', '4', 0, '*', '*', 'Android', '3-1569058015.png', 'http://www.92ff.cn/data/attachment/3-1569058015.apk', 4, '6.18 MB', 0, 0, 0, NULL, 0, '2019-09-21 17:27:20', NULL),
(9, 2, '489683@qq.com', '智慧生活', 'com.kmsxjx.knnydri', '8.0', '6.0.0', '5', 1, 'com.cmcc.enterprise-classID.onecardmultinumber.sdk', 'China Mobile Internet Company Limited', 'iOS', '2-1568535008.png', 'https://www.92ff.cn/data/attachment/2-1568535008.plist', 175, '13 MB', 0, 0, 0, NULL, 0, '2019-09-15 16:11:55', NULL),
(10, 3, '1@qq.com', '趣购商城', 'com.krbhic.kiazgzc', '8.0', '1.0.1', '2', 1, 'com.cmcc.enterprise-classID.onecardmultinumber.sdk', 'China Mobile Internet Company Limited', 'iOS', '3-1568535826.png', 'https://www.92ff.cn/data/attachment/3-1568535826.plist', 47, '12.9 MB', 0, 0, 0, NULL, 0, '2019-09-15 16:24:41', NULL),
(8, 2, '489683@qq.com', '护工端', 'com.kingkr.bianselong', '8.0', '1.0.0', '3', 1, 'shanxizhangshangyunwei', 'China Telecom Corporation Limited Shanghai enterprise information operations center', 'iOS', '2-1571034870.png', 'https://92ff.cn/data/attachment/2-1571034870.plist', 147, '13.4 MB', 0, 0, 0, '', 0, '2019-10-14 14:34:40', NULL),
(7, 1, '42424567@qq.com', '嗨拼团', 'com.kvbpkj.kvpruig', '17', '1.0.0', '5', 0, '*', '*', 'Android', '1-1568097208.png', 'http://www.92ff.cn/data/attachment/1-1568097208.apk', 54, '7.57 MB', 2, 0, 0, NULL, 1, '2019-09-10 14:34:23', NULL),
(11, 3, '1@qq.com', 'pact扫雷', 'com.konyoa.kudmfct', '17', '1.0.1', '4', 0, '*', '*', 'Android', '3-1568802158.png', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk', 17, '7.35 MB', 0, 0, 0, NULL, 0, '2019-09-18 18:23:00', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk'),
(12, 3, '1@qq.com', '嗨运动', 'io.dcloud.UNI7D0911E', '19', '1.0.1', '400', 0, '*', '*', 'Android', '3-1568885760.png', 'http://92ff.cn/data/attachment/3-1568885760.apk', 2, '26.4 MB', 0, 0, 0, NULL, 1, '2019-09-19 17:38:15', NULL),
(14, 6, '1234@qq.com', '嗨拼团', 'com.kvbpkj.kvpruig', '17', '1.0.0', '5', 0, '*', '*', 'Android', '6-1569143199.png', 'http://92ff.cn/data/attachment/6-1569143199.apk', 0, '7.57 MB', 0, 0, 0, NULL, 0, '2019-09-22 17:07:48', NULL),
(15, 3, '1@qq.com', '九四玩游戏', 'a94hwan.bjkyzh.combo', '21', '2.1-build20190923', '117', 0, '*', '*', 'Android', '3-1569204674.png', 'http://92ff.cn/data/attachment/3-1569204674.apk', 0, '21.6 MB', 0, 0, 0, NULL, 1, '2019-09-23 10:12:42', NULL),
(16, 1, '42424567@qq.com', '金羊毛', 'com.reader.readking', '21', '1.37', '37', 0, '*', '*', 'Android', '1-1569228738.png', 'http://92ff.cn/data/attachment/1-1569228738.apk', 0, '2.62 MB', 0, 0, 0, '', 0, '2019-09-23 16:53:14', NULL),
(17, 1, '42424567@qq.com', '小熊云秘书', 'com.ang.paphelper', '22', '1.10', '1', 0, '*', '*', 'Android', '1-1569571919.png', 'http://92ff.cn/data/attachment/1-1569571919.apk', 7, '5.27 MB', 0, 0, 0, '', 0, '2019-09-27 16:12:23', ''),
(18, 9, '2@qq.com', '激战', 'com.kfhlav.kgswmjo', '17', '1.0.0', '5', 0, '*', '*', 'Android', '9-1571649032.png', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk', 99, '7.49 MB', 0, 0, 0, NULL, 0, '2019-10-21 17:12:05', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk'),
(19, 3, '1@qq.com', 'PACIFIC', 'com.kxbapc.kvjpxwk', '17', '1.0.0', '8', 0, '*', '*', 'Android', '3-1569729428.png', 'http://www.92ff.cn/data/attachment/3-1569729428.apk', 77, '5.67 MB', 0, 0, 0, '', 0, '2019-09-29 11:58:18', NULL),
(20, 1, '42424567@qq.com', '小熊云控', 'com.auto.big.ang', '21', '1.2.8', '28', 0, '*', '*', 'Android', '1-1572344168.png', 'http://92ff.cn/data/attachment/1-1572344168.apk', 7, '11.1 MB', 0, 0, 0, NULL, 0, '2019-10-29 18:17:30', ''),
(22, 1, '42424567@qq.com', 'CCB', 'com.kytkfq.kaiynsq', '17', '1.0.1', '4', 0, '*', '*', 'Android', '1-1570412140.png', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk', 310, '8.21 MB', 0, 0, 0, NULL, 0, '2019-10-07 09:37:57', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk'),
(23, 1, '42424567@qq.com', '飞禽走兽', 'com.ktjrzt.kxxcbym', '17', '1.0.3', '5', 0, '*', '*', 'Android', '1-1570529839.png', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk', 13, '6.86 MB', 0, 0, 0, NULL, 0, '2019-10-08 18:17:51', NULL),
(24, 1, '42424567@qq.com', '趣购商城', 'com.krbhic.kiazgzc', '17', '1.0.1', '4', 0, '*', '*', 'Android', '1-1570597529.png', 'http://92ff.cn/data/attachment/1-1570597529.apk', 1, '6.33 MB', 25, 0, 0, NULL, 0, '2019-10-09 13:05:51', NULL),
(25, 1, '42424567@qq.com', '趣购商城', 'com.krbhic.kiazgzc', '8.0', '1.0.1', '2', 1, 'epson_wb_dis', 'Epson (China) Co., Ltd.', 'iOS', '1-1570597551.png', 'https://92ff.cn/data/attachment/1-1570597551.plist', 2, '12.9 MB', 24, 0, 0, NULL, 0, '2019-10-09 13:07:06', NULL),
(26, 3, '1@qq.com', '捉集商城', 'com.ksfwvj.klgczgp', '17', '1.0.0', '8', 0, '*', '*', 'Android', '3-1570765624.png', 'http://www.92ff.cn/data/attachment/3-1570765624.apk', 7, '6.24 MB', 0, 0, 0, NULL, 0, '2019-10-11 11:49:29', NULL),
(27, 3, '1@qq.com', 'otc股票交易系统', 'com.ktqmxt.kqrrurs', '17', '1.0.0', '4', 0, '*', '*', 'Android', '3-1570781473.png', 'http://92ff.cn/data/attachment/3-1570781473.apk', 6623, '6.85 MB', 0, 0, 0, NULL, 1, '2019-10-11 16:11:59', NULL),
(28, 1, '42424567@qq.com', '霹雳兔-洗车端', 'com.pilitu.smxc.service', '15', '1.1.9', '7', 0, '*', '*', 'Android', '1-1572062391.png', 'http://92ff.cn/data/attachment/1-1572062391.apk', 12, '36.8 MB', 0, 0, 0, NULL, 0, '2019-10-26 12:04:35', NULL),
(29, 1, '42424567@qq.com', '霹雳兔', 'com.pilitu.smxc.client', '15', '1.1.9', '7', 0, '*', '*', 'Android', '1-1572062279.png', 'http://92ff.cn/data/attachment/1-1572062279.apk', 13, '11.1 MB', 0, 0, 0, NULL, 0, '2019-10-26 11:59:40', NULL),
(30, 1, '42424567@qq.com', '嗨运动', 'io.dcloud.UNI7D0911E', '8.0', '1.0.1', '400', 1, 'shanxizhangshangyunwei', 'China Telecom Corporation Limited Shanghai enterprise information operations center', 'iOS', '1-1571191119.png', 'https://92ff.cn/data/attachment/1-1571191119.plist', 12, '28.9 MB', 31, 0, 0, NULL, 0, '2019-10-16 09:59:53', NULL),
(31, 1, '42424567@qq.com', '嗨运动', 'io.dcloud.UNI7D0911E', '19', '1.0.1', '400', 0, '*', '*', 'Android', '1-1571191194.png', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk', 208, '26.4 MB', 30, 0, 0, NULL, 0, '2019-10-16 10:00:57', 'https://fenfa.haibagroup.cn/369/2019-10-30-10-32-21-5db8f6359f6d4?attname=1410-1569365507.apk');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_buylog`
--

CREATE TABLE IF NOT EXISTS `prefix_buylog` (
  `in_id` int(11) NOT NULL,
  `in_uid` int(11) NOT NULL,
  `in_uname` varchar(255) NOT NULL,
  `in_title` varchar(255) NOT NULL,
  `in_tid` int(11) NOT NULL,
  `in_money` int(11) NOT NULL,
  `in_lock` int(11) NOT NULL,
  `in_addtime` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_buylog`
--

INSERT INTO `prefix_buylog` (`in_id`, `in_uid`, `in_uname`, `in_title`, `in_tid`, `in_money`, `in_lock`, `in_addtime`) VALUES
(4, 1, '42424567@qq.com', '1-1568983003', 10, 3600, 1, '2019-09-20 20:36:43'),
(7, 9, '2@qq.com', '9-1571649341', 100, 3600, 1, '2019-10-21 17:15:41');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_buy_cha_log`
--

CREATE TABLE IF NOT EXISTS `prefix_buy_cha_log` (
  `id` int(10) NOT NULL,
  `uid` int(20) DEFAULT NULL,
  `c_num` int(20) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_buy_cha_log`
--

INSERT INTO `prefix_buy_cha_log` (`id`, `uid`, `c_num`, `time`) VALUES
(1, 1, 10, '2019-09-22 15:41:11'),
(2, 1, 1, '2019-09-22 15:50:38'),
(3, 1, 1, '2019-09-22 15:50:50'),
(4, 1, 9, '2019-09-22 15:52:22'),
(5, 4, 11, '2019-09-22 16:28:01'),
(6, 4, 11, '2019-09-22 16:28:43'),
(7, 5, 11, '2019-09-22 16:29:22'),
(8, 5, 11, '2019-09-22 16:30:08'),
(9, 5, 11, '2019-09-22 16:30:47'),
(10, 4, 11, '2019-09-22 16:33:15'),
(11, 4, 1, '2019-09-22 16:33:43'),
(12, 5, 11, '2019-09-22 16:35:23'),
(13, 5, 11, '2019-09-22 16:35:23'),
(14, 5, 11, '2019-09-22 16:35:23'),
(15, 5, 11, '2019-09-22 16:35:33'),
(16, 5, 6, '2019-09-22 16:38:23'),
(17, 5, 50, '2019-09-22 16:41:23'),
(18, 4, 28, '2019-09-27 06:45:24');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_cert`
--

CREATE TABLE IF NOT EXISTS `prefix_cert` (
  `in_id` int(11) NOT NULL,
  `in_iden` varchar(255) NOT NULL,
  `in_name` varchar(255) NOT NULL,
  `in_dir` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `prefix_key`
--

CREATE TABLE IF NOT EXISTS `prefix_key` (
  `in_id` int(11) NOT NULL,
  `in_tid` int(11) NOT NULL,
  `in_code` varchar(255) NOT NULL,
  `in_state` int(11) NOT NULL,
  `in_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `prefix_mail`
--

CREATE TABLE IF NOT EXISTS `prefix_mail` (
  `in_id` int(11) NOT NULL,
  `in_uid` int(11) NOT NULL,
  `in_ucode` varchar(255) NOT NULL,
  `in_addtime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `prefix_path`
--

CREATE TABLE IF NOT EXISTS `prefix_path` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `super` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_path`
--

INSERT INTO `prefix_path` (`id`, `uid`, `path`, `super`) VALUES
(1, 2, 'https://92ff.cn/data/attachment/1-1571034694.plist', ''),
(2, 13, 'http://www.92ff.cn/data/attachment/3-1569058015.apk', ''),
(3, 9, 'https://www.92ff.cn/data/attachment/2-1568535008.plist', ''),
(4, 10, 'https://www.92ff.cn/data/attachment/3-1568535826.plist', ''),
(5, 8, 'https://92ff.cn/data/attachment/2-1571034870.plist', ''),
(6, 7, 'http://www.92ff.cn/data/attachment/1-1568097208.apk', ''),
(7, 11, 'https://baidu.com', ''),
(8, 12, 'http://92ff.cn/data/attachment/3-1568885760.apk', ''),
(9, 14, 'http://92ff.cn/data/attachment/6-1569143199.apk', ''),
(10, 15, 'http://92ff.cn/data/attachment/3-1569204674.apk', ''),
(11, 16, 'http://92ff.cn/data/attachment/1-1569228738.apk', ''),
(12, 17, 'http://92ff.cn/data/attachment/1-1569571919.apk', ''),
(13, 18, 'http://92ff.cn/data/attachment/9-1571649032.apk', 'https://app.92ff.cn/download/5d8b5209d5a8b.html'),
(14, 19, 'http://www.92ff.cn/data/attachment/3-1569729428.apk', ''),
(15, 20, 'http://92ff.cn/data/attachment/1-1572344168.apk', ''),
(16, 21, 'http://92ff.cn/data/attachment/1-1572312630.apk', ''),
(17, 22, 'http://www.92ff.cn/data/attachment/1-1570412140.apk', ''),
(18, 23, '', ''),
(19, 24, 'http://92ff.cn/data/attachment/1-1570597529.apk', ''),
(20, 25, 'https://92ff.cn/data/attachment/1-1570597551.plist', ''),
(21, 26, 'http://www.92ff.cn/data/attachment/3-1570765624.apk', ''),
(22, 27, 'http://92ff.cn/data/attachment/1-1570244186.apk', ''),
(23, 28, 'http://92ff.cn/data/attachment/1-1572062391.apk', ''),
(24, 29, 'http://92ff.cn/data/attachment/1-1572062279.apk', ''),
(25, 30, 'https://92ff.cn/data/attachment/1-1571191119.plist', ''),
(26, 31, 'http://92ff.cn/data/attachment/1-1571191194.apk', 'http://92ff.cn/data/attachment/1-1571191194.apk'),
(27, 32, 'http://92ff.cn/data/attachment/1-1572403639.apk', '');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_paylog`
--

CREATE TABLE IF NOT EXISTS `prefix_paylog` (
  `in_id` int(11) NOT NULL,
  `in_uid` int(11) NOT NULL,
  `in_uname` varchar(255) NOT NULL,
  `in_title` varchar(255) NOT NULL,
  `in_points` int(11) NOT NULL,
  `in_money` int(11) NOT NULL,
  `in_lock` int(11) NOT NULL,
  `in_addtime` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_paylog`
--

INSERT INTO `prefix_paylog` (`in_id`, `in_uid`, `in_uname`, `in_title`, `in_points`, `in_money`, `in_lock`, `in_addtime`) VALUES
(1, 4, '19915277@qq.com', '4-1568773441', 1000, 10, 1, '2019-09-18 10:24:01'),
(17, 1, '42424567@qq.com', '1-1569046274', 1000, 10, 1, '2019-09-21 14:11:14');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_plugin`
--

CREATE TABLE IF NOT EXISTS `prefix_plugin` (
  `in_id` int(11) NOT NULL,
  `in_name` varchar(255) NOT NULL,
  `in_dir` varchar(255) NOT NULL,
  `in_file` varchar(255) NOT NULL,
  `in_type` int(11) NOT NULL,
  `in_author` varchar(255) DEFAULT NULL,
  `in_address` varchar(255) DEFAULT NULL,
  `in_addtime` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_plugin`
--

INSERT INTO `prefix_plugin` (`in_id`, `in_name`, `in_dir`, `in_file`, `in_type`, `in_author`, `in_address`, `in_addtime`) VALUES
(1, '阿里云存储[分发]', 'App-oss', 'upload', 0, 'EarDev', '', '2019-09-07 14:44:17'),
(2, '七牛云存储[分发]', 'App-qiniu', 'upload', 0, 'EarDev', '', '2019-09-07 14:44:17');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_secret`
--

CREATE TABLE IF NOT EXISTS `prefix_secret` (
  `in_id` int(11) NOT NULL,
  `in_site` varchar(255) NOT NULL,
  `in_md5` varchar(255) NOT NULL,
  `in_endtime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `prefix_sign`
--

CREATE TABLE IF NOT EXISTS `prefix_sign` (
  `in_id` int(11) NOT NULL,
  `in_aid` int(11) NOT NULL,
  `in_aname` varchar(255) DEFAULT NULL,
  `in_replace` varchar(255) DEFAULT NULL,
  `in_ssl` varchar(255) NOT NULL,
  `in_site` varchar(255) NOT NULL,
  `in_path` varchar(255) NOT NULL,
  `in_ipa` varchar(255) NOT NULL,
  `in_status` int(11) NOT NULL,
  `in_cert` varchar(255) NOT NULL,
  `in_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `prefix_signlog`
--

CREATE TABLE IF NOT EXISTS `prefix_signlog` (
  `in_id` int(11) NOT NULL,
  `in_aid` int(11) NOT NULL,
  `in_aname` varchar(255) NOT NULL,
  `in_uid` int(11) NOT NULL,
  `in_uname` varchar(255) NOT NULL,
  `in_status` int(11) NOT NULL,
  `in_step` varchar(255) NOT NULL,
  `in_percent` int(11) NOT NULL,
  `in_addtime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `prefix_user`
--

CREATE TABLE IF NOT EXISTS `prefix_user` (
  `in_userid` int(11) NOT NULL,
  `in_username` varchar(255) NOT NULL,
  `in_userpassword` varchar(255) NOT NULL,
  `in_mobile` varchar(255) DEFAULT NULL,
  `in_qq` varchar(255) DEFAULT NULL,
  `in_firm` varchar(255) DEFAULT NULL,
  `in_job` varchar(255) DEFAULT NULL,
  `in_regdate` datetime DEFAULT NULL,
  `in_loginip` varchar(255) DEFAULT NULL,
  `in_logintime` datetime DEFAULT NULL,
  `in_islock` int(11) NOT NULL,
  `in_points` int(11) NOT NULL,
  `user_level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户等级 0无等级 1正式用户 2vip用户',
  `end_time` int(10) NOT NULL COMMENT '到期时间',
  `domain` varchar(255) DEFAULT NULL COMMENT '域名',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_user`
--

INSERT INTO `prefix_user` (`in_userid`, `in_username`, `in_userpassword`, `in_mobile`, `in_qq`, `in_firm`, `in_job`, `in_regdate`, `in_loginip`, `in_logintime`, `in_islock`, `in_points`, `user_level`, `end_time`, `domain`, `user_money`) VALUES
(1, '42424567@qq.com', 'c0a027f55b2ab3fc', '', '', '', '', '2019-09-07 14:44:17', '221.207.163.88', '2019-10-30 10:47:14', 0, 13200, 2, 1597649210, 'vcvcb.qoi074.cn', '365.00'),
(2, '489683@qq.com', 'c0a027f55b2ab3fc', '', '', '', '', '2019-09-10 14:50:57', '125.211.136.71', '2019-10-14 14:34:25', 0, 9728, 0, 0, NULL, '0.00'),
(3, '1@qq.com', 'c0a027f55b2ab3fc', '', '', '', '', NULL, '221.207.163.88', '2019-10-30 10:30:27', 0, 4173, 0, 0, NULL, '0.00'),
(4, '19915277@qq.com', 'c0a027f55b2ab3fc', NULL, NULL, NULL, NULL, '2019-09-18 10:22:12', '113.4.141.120', '2019-10-25 10:45:23', 0, 101030, 2, 1579508881, 'weri.qoi074.cn', '6042.00'),
(5, '123@qq.com', '49ba59abbe56e057', NULL, NULL, NULL, NULL, '2019-09-22 16:09:30', '125.211.136.80', '2019-09-22 21:46:27', 0, 10, 2, 1589876962, '域名6', '4400.00'),
(6, '1234@qq.com', '49ba59abbe56e057', NULL, NULL, NULL, NULL, '2019-09-22 16:55:37', '1.190.209.2', '2019-09-23 16:20:52', 0, 1010, 2, 1574326640, '域名11', '2871.00'),
(7, '3272982524@qq.com', 'b8ee297bc5ec0411', NULL, NULL, NULL, NULL, '2019-09-24 16:54:27', '49.114.53.248', '2019-09-24 16:54:27', 0, 1000, 0, 0, NULL, '0.00'),
(8, '416625@qq.com', '49ba59abbe56e057', '', '', '', '', '2019-09-25 15:26:55', '114.99.240.131', '2019-09-25 15:26:55', 0, 100000, 0, 0, NULL, '0.00'),
(9, '2@qq.com', 'c0a027f55b2ab3fc', NULL, NULL, NULL, NULL, '2019-09-25 18:03:42', '221.207.163.235', '2019-10-21 17:02:00', 0, 99901, 0, 0, NULL, '0.00'),
(10, '3@qq.com', 'c0a027f55b2ab3fc', NULL, NULL, NULL, NULL, '2019-09-25 18:05:13', '221.207.163.88', '2019-10-30 10:17:14', 0, 0, 0, 0, NULL, '0.00'),
(11, '4@qq.com', 'c0a027f55b2ab3fc', NULL, NULL, NULL, NULL, '2019-09-25 18:06:06', '221.207.187.90', '2019-09-25 18:06:06', 0, 0, 0, 0, NULL, '0.00'),
(12, '5@qq.com', 'c0a027f55b2ab3fc', NULL, NULL, NULL, NULL, '2019-09-25 18:06:53', '221.207.187.90', '2019-09-25 18:06:53', 0, 0, 0, 0, NULL, '0.00'),
(13, '7@qq.com', 'c0a027f55b2ab3fc', NULL, NULL, NULL, NULL, '2019-09-25 18:08:20', '221.207.187.90', '2019-09-25 18:08:20', 0, 1000, 0, 0, NULL, '0.00'),
(14, '12d3@qq.com', 'cb8e30682b927f35', NULL, NULL, NULL, NULL, '2019-09-26 09:12:35', '113.0.166.6', '2019-09-26 09:12:35', 0, 100000, 0, 0, NULL, '0.00'),
(15, '35944053@qq.com', '60408f5adc358a74', NULL, NULL, NULL, NULL, '2019-09-26 16:14:05', '113.106.149.122', '2019-09-26 16:14:05', 0, 100000, 0, 0, NULL, '0.00'),
(16, '283881883@qq.com', '30c0b08b7d3012ed', NULL, NULL, NULL, NULL, '2019-09-26 20:47:44', '59.175.38.199', '2019-09-27 20:30:24', 0, 100000, 0, 0, NULL, '0.00'),
(17, '9455444@qq.com', '2d3091774fb16bdf', NULL, NULL, NULL, NULL, '2019-09-26 22:09:27', '113.26.38.68', '2019-09-26 22:11:13', 0, 100000, 0, 0, NULL, '0.00'),
(18, '5833956@qq.com', '6f02e1eabcd0d71e', NULL, NULL, NULL, NULL, '2019-09-28 11:43:25', '115.208.7.169', '2019-09-28 11:43:25', 0, 100000, 0, 0, NULL, '0.00'),
(20, '2039399031@qq.com', '750b9ebee8973232', NULL, NULL, NULL, NULL, '2019-10-12 16:40:10', '117.25.180.91', '2019-10-12 16:40:10', 0, 100000, 0, 0, NULL, '0.00'),
(19, '735817791@qq.com', '50faed3f34b99083', NULL, NULL, NULL, NULL, '2019-10-05 20:42:24', '113.16.25.86', '2019-10-05 20:43:38', 0, 100000, 0, 0, NULL, '0.00'),
(21, '233458066@qq.com', '60408f5adc358a74', NULL, NULL, NULL, NULL, '2019-10-14 14:14:41', '14.144.60.56', '2019-10-14 20:23:09', 0, 100000, 1, 1573734912, '4.qoi074.cn', '0.00'),
(22, '772613551@qq.com', 'd7ebde30a62b865d', NULL, NULL, NULL, NULL, '2019-10-23 09:41:54', '106.122.241.121', '2019-10-23 09:41:54', 0, 100000, 0, 0, NULL, '0.00'),
(23, '277227078@qq.com', 'f5ac40a900bbcb00', NULL, NULL, NULL, NULL, '2019-10-23 10:46:43', '58.59.237.43', '2019-10-23 10:46:43', 0, 100000, 0, 0, NULL, '0.00'),
(24, 'i@woaiwangpai.com', '4d4946d4131e5e28', NULL, NULL, NULL, NULL, '2019-10-24 18:04:27', '124.236.142.19', '2019-10-24 18:06:03', 0, 100000, 0, 0, NULL, '0.00');

-- --------------------------------------------------------

--
-- 表的结构 `prefix_vipprice`
--

CREATE TABLE IF NOT EXISTS `prefix_vipprice` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `type` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prefix_vipprice`
--

INSERT INTO `prefix_vipprice` (`id`, `name`, `price`, `type`) VALUES
(1, 'VIP', 500, 1),
(2, '超级VIP', 1600, 1),
(3, '域名', 29, 2);

-- --------------------------------------------------------

--
-- 表的结构 `t_buy_log`
--

CREATE TABLE IF NOT EXISTS `t_buy_log` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `order_number` varchar(50) NOT NULL COMMENT '订单号',
  `zt` int(1) DEFAULT NULL COMMENT '0未支付  1已支付'
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_buy_log`
--

INSERT INTO `t_buy_log` (`id`, `user_id`, `price`, `time`, `order_number`, `zt`) VALUES
(1, 1, '100.00', '1568955899', '1909208997129291', 0),
(2, 1, '100.00', '1568956816', '1909208165957717', 0),
(3, 1, '100.00', '1568956855', '1909208555815389', 0),
(4, 1, '100.00', '1568956878', '1909208784326196', 0),
(5, 1, '100.00', '1568956896', '1909208965258621', 0),
(6, 1, '100.00', '1568956914', '1909209147482751', 0),
(7, 1, '100.00', '1568957056', '1909200563390086', 1),
(8, 1, '100.00', '1568957596', '1909205964594062', 0),
(9, 1, '100.00', '1568957713', '1909207138919011', 0),
(10, 1, '100.00', '1568957994', '1909209948115222', 0),
(11, 1, '100.00', '1568959784', '1909207846084875', 0),
(12, 1, '100.00', '1568962435', '1909204355710165', 0),
(13, 1, '100.00', '1568962581', '1909205819063098', 0),
(14, 1, '100.00', '1568962596', '1909205969844451', 1),
(15, 1, '100.00', '1568962749', '1909207498120388', 1),
(16, 1, '100.00', '1568962817', '1909208175560247', 1),
(17, 1, '100.00', '1568962824', '1909208245960564', 0),
(18, 1, '100.00', '1568962831', '1909208314914899', 0),
(19, 1, '100.00', '1568962886', '1909208865012126', 1),
(20, 1, '100.00', '1568964636', '1909206362185761', 0),
(21, 1, '100.00', '1568966091', '1909200912205105', 0),
(22, 1, '100.00', '1568967425', '1909204252994062', 0),
(23, 1, '100.00', '1568967596', '1909205965628404', 1),
(24, 1, '100.00', '1568968572', '1909205726962721', 0),
(25, 1, '100.00', '1568969868', '1909208683113456', 0),
(26, 1, '100.00', '1568970364', '1909203643360871', 0),
(27, 1, '100.00', '1568970508', '1909205084019058', 0),
(28, 1, '100.00', '1568970570', '1909205706167185', 0),
(29, 1, '100.00', '1568970668', '1909206686895922', 1),
(30, 1, '100.00', '1568970821', '1909208211637836', 0),
(31, 1, '100.00', '1568970840', '1909208407625206', 0),
(32, 1, '100.00', '1568970872', '1909208721095314', 1),
(33, 1, '100.00', '1568970933', '1909209336149971', 0),
(34, 1, '100.00', '1568984461', '1909204619494201', 0),
(35, 1, '100.00', '1568984487', '1909204875454009', 0),
(36, 1, '100.00', '1568984498', '1909204984277438', 0),
(37, 1, '100.00', '1568985278', '1909202785875849', 0),
(38, 1, '100.00', '1568985509', '1909205097691435', 0),
(39, 1, '100.00', '1568986502', '1909205025885954', 0),
(40, 1, '100.00', '1568986723', '1909207239927824', 0),
(41, 1, '100.00', '1569028294', '1909212948537869', 0),
(42, 1, '100.00', '1569046542', '1909215423497188', 0),
(43, 1, '100.00', '1569046684', '1909216846192478', 0),
(44, 1, '100.00', '1569048196', '1909211961212695', 0),
(45, 1, '100.00', '1569052175', '1909211756371793', 0),
(46, 1, '100.00', '1569052179', '1909211796383538', 0),
(47, 1, '100.00', '1569066388', '1909213885207262', 0),
(48, 1, '100.00', '1569067048', '1909210481058118', 0),
(49, 1, '100.00', '1569067071', '1909210718758826', 0),
(50, 1, '100.00', '1569142689', '1909226894303476', 0),
(51, 1, '100.00', '1569142733', '1909227331303537', 0),
(52, 1, '100.00', '1569142807', '1909228079815343', 0),
(53, 1, '100.00', '1569142894', '1909228942725122', 0),
(54, 3, '100.00', '1569160769', '1909227691813225', 0),
(55, 1, '100.00', '1569226127', '1909231276637308', 0),
(56, 16, '100.00', '1569576477', '1909274772751295', 0),
(57, 16, '100.00', '1569582948', '1909279488621291', 0),
(58, 21, '100.00', '1571033743', '1910147437677104', 0),
(59, 21, '100.00', '1571055474', '1910144745572758', 0),
(60, 21, '100.00', '1571055600', '1910146007351919', 0);

-- --------------------------------------------------------

--
-- 表的结构 `t_domain`
--

CREATE TABLE IF NOT EXISTS `t_domain` (
  `id` int(10) NOT NULL,
  `pid` int(10) DEFAULT '0',
  `domain` varchar(255) DEFAULT NULL COMMENT '域名',
  `buy_time` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0屏蔽 1正常  2访问域名',
  `remarks` text
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_domain`
--

INSERT INTO `t_domain` (`id`, `pid`, `domain`, `buy_time`, `status`, `remarks`) VALUES
(1, 1, 'vcvcb.qoi074.cn', '1569226220', 2, NULL),
(2, 1, 'fggh.qoi074.cn', '1569226440', 0, '99'),
(3, 1, 'qqwwyt.qoi074.cn', '1569227491', 0, '99'),
(4, 4, 'weri.qoi074.cn', '1569560411', 1, ''),
(5, 1, 'qwer .qoi074.cn', '1570076233', 0, '126'),
(6, 1, '1234.qoi074.cn', '1570076460', 1, '126'),
(7, 1, '1.qoi074.cn', '1570076469', 1, '126'),
(8, 1, '2.qoi074.cn', '1570076861', 1, '127'),
(9, 1, '3.qoi074.cn', '1570267334', 1, '127'),
(10, 21, '4.qoi074.cn', '1569555087', 2, NULL),
(11, 21, '5.qoi074.cn', '1569555167', 1, '128'),
(12, 21, '6.qoi074.cn', '1569555186', 1, '128'),
(13, 21, '7.qoi074.cn', '1569555255', 1, '128'),
(14, 21, '8.qoi074.cn', '1569555321', 1, '128'),
(15, 21, '9.qoi074.cn', '1569555380', 1, '128'),
(31, 21, '10.qoi074.cn', '1569555845', 1, '128'),
(32, 21, '11.qoi074.cn', '1569555845', 1, '128'),
(33, 21, '12.qoi074.cn', '1569555845', 1, '128'),
(34, 21, '13.qoi074.cn', '1569555845', 1, '128'),
(35, 0, '14.qoi074.cn', '1569555845', 1, NULL),
(36, 0, '15.qoi074.cn', '1569555845', 1, NULL),
(37, 0, '16.qoi074.cn', '1569555845', 1, NULL),
(38, 0, '17.qoi074.cn', '1569555845', 1, NULL),
(39, 0, '18.qoi074.cn', '1569555845', 1, NULL),
(40, 0, '19.qoi074.cn', '1569555845', 1, NULL),
(41, 0, '20.qoi074.cn', '1569537924', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_jump`
--

CREATE TABLE IF NOT EXISTS `t_jump` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0为下架 1为正常 2为屏蔽 ',
  `entrance` text,
  `beborn` text,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `remarks` text,
  `user_uid` int(10) DEFAULT NULL,
  `domain` text COMMENT '用户访问域名'
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_jump`
--

INSERT INTO `t_jump` (`id`, `title`, `status`, `entrance`, `beborn`, `create_time`, `update_time`, `end_time`, `remarks`, `user_uid`, `domain`) VALUES
(93, '111', 1, 'wnjrbd.gdn', 'http://h5zn.com', '2019-08-28 21:25:52', '2019-10-31 21:27:15', '2019-10-31 00:00:00', '', NULL, NULL),
(94, '标题', NULL, '入口域名', '落地页', NULL, NULL, '2019-09-13 00:00:00', '备注', NULL, NULL),
(95, '333', 1, 'weri.qoi074.cn\nqwer .qoi074.cn', 'http://ls.yosql.com/app/index.php?i=84&c=entry&do=zhuanfa&actid=3&m=shf_fxhb', '2019-09-21 00:00:00', '2019-10-23 10:04:41', '2020-04-22 00:00:00', '4567', 1, NULL),
(96, '3454', 1, '', '3', '2019-09-16 10:09:16', '2019-09-27 09:37:34', '2019-09-19 00:00:00', '域名2', 1, NULL),
(97, '4', 1, '98\n域名3', '3', '0000-00-00 00:00:00', NULL, '2019-09-11 00:00:00', 'beizhu', 1, NULL),
(98, '23', 1, '1234.qoi074.cn', 'https://web.woaiwangpai.com/', '2019-09-06 10:11:06', '2019-10-25 10:49:36', '2020-08-06 00:00:00', 'sca', 1, NULL),
(99, '111111', 0, '', 'https://zx.lingji666.com/pay/lunhuishu.html?order_id=LHS153054845000300050', '2019-09-21 00:00:00', '2019-09-26 21:04:37', '2019-10-24 00:00:00', '\n\nwnjrbd.gdn微信被封\nfggh.qoi074.cn微信被封\nqqwwyt.qoi074.cn微信被封', 1, 'wnjrbd.gdn'),
(100, '标题', 1, '111', '111', '0000-00-00 00:00:00', NULL, '2019-09-27 00:00:00', '', 1, NULL),
(102, '111111', 1, 'csacsa', '2222', '2019-09-21 10:56:44', NULL, '2019-09-27 00:00:00', '', 1, NULL),
(103, '11', 1, 'ascasc', '1515', '2019-09-21 11:20:25', NULL, '2019-09-23 00:00:00', '', 1, NULL),
(104, '111', 1, '123123', '111', '2019-09-21 11:25:01', NULL, '2019-09-19 00:00:00', '', 1, NULL),
(105, '321563456', 1, '', '56456', '2019-09-22 01:52:25', NULL, '2019-09-25 00:00:00', '', 1, NULL),
(106, '测试', 1, '', '啦啦啦啦啦', '2019-09-22 01:57:45', NULL, '0000-00-00 00:00:00', '', 1, NULL),
(107, '标题', 1, '', '啦啦啦啦啦啦', '2019-09-22 01:58:10', NULL, '0000-00-00 00:00:00', '', 1, NULL),
(108, '21565465', 1, '', '123123123', '2019-09-22 01:59:09', NULL, '0000-00-00 00:00:00', '', 1, NULL),
(109, 'ascascascs', 1, '', '545456', '2019-09-22 01:59:29', NULL, '2019-09-18 00:00:00', '', 1, NULL),
(110, 'a64s653ca4s56', 1, '', '12123123', '2019-09-22 14:03:14', NULL, '2019-10-21 14:42:13', '', 1, NULL),
(111, '1111', 1, '域名7', 'www.baidu.com', '2019-09-22 16:36:06', '2019-09-22 16:36:06', '2020-03-20 16:29:22', '', 5, NULL),
(112, '11111', 1, '域名12\n域名13\n域名15', 'baidu.com', '2019-09-22 16:57:36', '2019-09-22 16:57:36', '2019-10-22 16:57:20', '', 6, NULL),
(113, '2222', 1, '域名16\n域名17\n域名18\n域名19\n域名20', 'baidu.com', '2019-09-22 17:01:07', '2019-09-22 17:01:12', '2019-11-21 16:57:20', '', 6, NULL),
(114, '333333', 1, '域名21', 'baidu.com', '2019-09-22 17:02:45', '2019-09-22 17:02:45', '2019-11-21 16:57:20', '', 6, NULL),
(115, '123123', 1, '', '21123231', '2019-09-24 09:59:59', '2019-09-24 10:21:58', '2020-07-18 15:26:50', '', 1, NULL),
(116, '测试标题', 1, '', '11111112233', '2019-09-24 10:00:21', '2019-09-24 10:00:21', '2020-07-18 15:26:50', '', 1, NULL),
(117, '111', 1, '', '222', '2019-09-25 10:47:38', '2019-09-25 10:47:38', '2019-12-21 16:28:01', '', 4, NULL),
(118, '11111', 0, '', '', '2019-09-26 21:02:50', '2019-10-01 10:43:01', '2020-07-18 15:26:50', '', 1, NULL),
(119, 'ceshi', 1, '', '1232', '2019-09-26 21:06:28', '2019-09-26 21:06:28', '2020-07-18 15:26:50', '', 1, NULL),
(120, '114', 1, '', '22', '2019-09-27 06:45:42', '2019-09-27 07:15:40', '2020-01-20 16:28:01', '', 4, NULL),
(121, '1233', 1, '', '455', '2019-09-27 07:08:16', '2019-09-27 12:59:49', '2020-01-20 16:28:01', '', 4, NULL),
(122, '2333', 1, '', '222', '2019-09-27 09:24:13', '2019-09-27 09:24:13', '2020-07-18 15:26:50', '', 1, NULL),
(123, '55', 1, '', 'ffff', '2019-09-27 09:24:25', '2019-09-27 10:09:13', '2020-07-18 15:26:50', '', 1, NULL),
(124, '111122', 1, '', '222', '2019-09-27 09:53:28', '2019-09-27 09:53:45', '2020-07-18 15:26:50', '', 1, NULL),
(125, 'eee', 1, '', 'eee', '2019-09-27 10:21:03', '2019-09-27 10:21:03', '2020-07-18 15:26:50', '', 1, NULL),
(126, '123456', 1, '1234.qoi074.cn\n1.qoi074.cn', 'www.baidu.com', '2019-10-03 12:15:58', '2019-10-05 17:20:38', '2019-11-21 15:26:50', '\nqwer .qoi074.cn微信被封', 1, NULL),
(127, '小熊防封', 1, '2.qoi074.cn\n3.qoi074.cn', 'web.woaiwangpai.com', '2019-10-05 17:21:43', '2019-10-24 18:09:50', '2020-08-17 15:26:50', '', 1, NULL),
(128, '诺亚国际', 1, '13.qoi074.cn\n5.qoi074.cn\n6.qoi074.cn\n7.qoi074.cn\n8.qoi074.cn\n9.qoi074.cn\n10.qoi074.cn\n11.qoi074.cn\n12.qoi074.cn', 'http://ny.san734567.cn/home.php', '2019-10-14 21:02:49', '2019-10-14 21:14:44', '2019-11-14 20:35:12', '', 21, NULL),
(129, '33333', 1, '', 'www.baidu.com', '2019-10-25 10:46:55', '2019-10-25 10:46:55', '2020-01-20 16:28:01', '', 4, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_sys_config`
--

CREATE TABLE IF NOT EXISTS `t_sys_config` (
  `id` bigint(20) NOT NULL,
  `system_key` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '系统配置key',
  `system_values` varchar(2000) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '系统配置内容',
  `remark` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '系统配置备注',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_sys_config`
--

INSERT INTO `t_sys_config` (`id`, `system_key`, `system_values`, `remark`, `create_time`, `update_time`) VALUES
(1, '1', '1.762128.vip\n2.762132.vip\n3.762278.vip\n4.762386.vip\n5.762392.vip\n6.762551.vip\n7.762765.vip\n8.763271.vip\n9.767363.vip\n10.767653.vip\n11.767667.vip\n12.767713.vip\n13.767858.vip\n14.768186.vip\n15.768769.vip\n16.773113.vip\n17.773156.vip\n18.773191.vip\n19.773736.vip\n20.775179.vip\n21.775273.vip\n22.775329.vip\n23.775337.vip\n24.775997.vip\n25.781536.vip\n26.781613.vip\n27.781626.vip\n28.781831.vip\n29.781835.vip\n30.781977.vip\n31.782932.vip\n33.783157.vip\n34.786892.vip\n35.787325.vip\n36.787372.vip\n38.787622.vip\n39.787653.vip\n41.797657.vip\n43.797887.vip\n45.798239.vip\n46.799128.vip\n47.799156.vip\n48.813779.vip\n49.813781.vip\n50.815623.vip\n51.hsdp.uk.com\n52.xfsb.uk.com\n53.stkx.uk.com\n54.zkjw.uk.com\n55.hkzj.uk.com\n56.wmdf.uk.com\n57.fjgd.uk.com\n58.gmrb.uk.com\n59.tdwr.uk.com\n60.sqhq.uk.com\n61.dpyn.uk.com\n62.zmxh.uk.com\n63.cjqs.uk.com\n64.rbzd.uk.com\n65.gywh.uk.com\n66.bycg.uk.com\n67.gwdt.uk.com\n68.fllj.uk.com\n69.zfzl.uk.com\n70.ryyc.uk.com\n71.dgqj.uk.com\n72.jzcf.uk.com\n73.jzpz.uk.com\n74.ckhc.uk.com\n75.lxxp.uk.com\n76.gfpl.uk.com\n77.lcbh.uk.com\n78.krlr.uk.com\n79.drgf.uk.com\n80.zqbh.uk.com\n81.wnrf.uk.com\n82.ztwx.uk.com\n83.xrmr.uk.com\n84.xkpj.uk.com\n85.fgcf.uk.com\n86.klzc.uk.com\n87.zlft.uk.com\n88.tzbj.uk.com\n89.wzfh.uk.com\n90.gdkk.uk.com\n91.sfyk.uk.com\n92.qdcb.uk.com\n93.wtpr.uk.com\n94.pbrr.uk.com\n95.wtqk.uk.com\n96.rqcp.uk.com\n97.wbts.uk.com\n98.zdzs.uk.com\n99.twgc.uk.com\n100.wnmr.uk.com\nprevent.atmj.com.cn\nseal.5536rh.cn\nmain.wyjqbb.vip', '1', '2019-07-18 10:53:46', '2019-07-18 10:54:09'),
(2, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `t_sys_permission`
--

CREATE TABLE IF NOT EXISTS `t_sys_permission` (
  `id` bigint(11) NOT NULL,
  `parent_id` bigint(11) DEFAULT NULL COMMENT '父ID',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `url` varchar(255) NOT NULL COMMENT '权限URL',
  `sort` int(11) NOT NULL COMMENT '排序',
  `is_menu` int(1) NOT NULL COMMENT '是否菜单',
  `is_enable` int(1) NOT NULL COMMENT '是否启用',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='权限表';

--
-- 转存表中的数据 `t_sys_permission`
--

INSERT INTO `t_sys_permission` (`id`, `parent_id`, `name`, `url`, `sort`, `is_menu`, `is_enable`, `icon`) VALUES
(1, NULL, '用户信息', '/admin/user/info', 1, 0, 1, NULL),
(10, 4, '用户列表', '/admin/user/list', 1, 1, 1, NULL),
(11, 4, '编辑用户', '/admin/user/install', 1, 1, 1, NULL),
(12, NULL, '产品列表', '/admin/app/list', 1, 1, 1, NULL),
(13, NULL, '产品短链接', '/admin/app/sortUrl', 1, 1, 1, NULL),
(14, NULL, '产品编辑', '/admin/app/install', 1, 1, 1, NULL),
(15, NULL, '上传权限', '/admin/app/fileUpload', 1, 1, 1, NULL),
(16, NULL, '推广记录', '/admin/app/config', 1, 1, 1, NULL),
(17, NULL, '推广审核', '/admin/app/saveConfig', 1, 1, 1, NULL),
(18, NULL, '修改密码', '/admin/user/password', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_sys_re_role_permission`
--

CREATE TABLE IF NOT EXISTS `t_sys_re_role_permission` (
  `id` bigint(11) NOT NULL,
  `role_id` bigint(11) NOT NULL COMMENT '角色ID',
  `permission_id` bigint(11) NOT NULL COMMENT '权限ID'
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

--
-- 转存表中的数据 `t_sys_re_role_permission`
--

INSERT INTO `t_sys_re_role_permission` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(4, 1, 4),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(41, 2, 1),
(42, 2, 10),
(43, 2, 11),
(44, 2, 12),
(45, 2, 13),
(46, 2, 15),
(47, 2, 16),
(48, 2, 18),
(49, 2, 19),
(50, 3, 12),
(51, 3, 13),
(52, 3, 1),
(53, 3, 16),
(54, 1, 21),
(55, 2, 21),
(56, 3, 21),
(57, 1, 22),
(58, 2, 22),
(59, 3, 22),
(60, 1, 23),
(61, 1, 24),
(62, 1, 25),
(63, 2, 23),
(64, 2, 24),
(65, 1, 17),
(66, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_sys_re_user_role`
--

CREATE TABLE IF NOT EXISTS `t_sys_re_user_role` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL COMMENT '用户ID ',
  `role_id` bigint(11) NOT NULL COMMENT '角色ID'
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COMMENT='用户角色表';

--
-- 转存表中的数据 `t_sys_re_user_role`
--

INSERT INTO `t_sys_re_user_role` (`id`, `user_id`, `role_id`) VALUES
(63, 17, 1),
(84, 35, 2),
(85, 36, 3),
(86, 37, 2),
(87, 38, 3),
(88, 39, 3),
(89, 40, 3),
(90, 41, 2),
(91, 42, 3),
(92, 43, 3),
(93, 44, 3),
(94, 45, 3),
(95, 46, 3),
(96, 47, 3),
(97, 48, 3),
(98, 49, 3),
(99, 50, 3),
(100, 51, 2),
(101, 52, 3),
(102, 53, 2),
(103, 54, 3),
(104, 55, 2),
(105, 56, 2),
(106, 57, 3),
(107, 58, 2),
(108, 59, 2),
(109, 60, 2),
(110, 61, 2),
(111, 62, 2),
(112, 63, 3),
(113, 17, 1),
(114, 17, 2);

-- --------------------------------------------------------

--
-- 表的结构 `t_sys_role`
--

CREATE TABLE IF NOT EXISTS `t_sys_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `sort` int(11) NOT NULL COMMENT '排序',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `is_enable` int(1) NOT NULL COMMENT '是否启用'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- 转存表中的数据 `t_sys_role`
--

INSERT INTO `t_sys_role` (`id`, `name`, `sort`, `description`, `is_enable`) VALUES
(1, 'admin', 1, '系统管理员', 1),
(2, 'aclass', 1, 'A类用户', 1),
(3, 'bclass', 2, 'B类用户', 1),
(4, 'cclass', 3, 'C类用户', 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_sys_user`
--

CREATE TABLE IF NOT EXISTS `t_sys_user` (
  `id` bigint(11) NOT NULL,
  `account` varchar(50) NOT NULL COMMENT '登录名',
  `password` varchar(100) NOT NULL COMMENT '密码(加密)',
  `last_login_ip` varchar(20) DEFAULT NULL COMMENT '最后登录IP',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `login_count` int(11) NOT NULL COMMENT '登录总次数',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `is_enable` int(1) NOT NULL COMMENT '是否启用',
  `user_name` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT '0.00',
  `locking` decimal(10,2) DEFAULT '0.00',
  `cash_out` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `t_sys_user`
--

INSERT INTO `t_sys_user` (`id`, `account`, `password`, `last_login_ip`, `last_login_time`, `login_count`, `create_time`, `is_enable`, `user_name`, `remarks`, `balance`, `locking`, `cash_out`) VALUES
(17, 'shitou', 'db89b186248ce8673815cf4d3a17bd39', NULL, NULL, 0, '2019-05-07 15:51:12', 1, '系统后台', '系统后台', '0.00', '0.00', '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prefix_admin`
--
ALTER TABLE `prefix_admin`
  ADD PRIMARY KEY (`in_adminid`);

--
-- Indexes for table `prefix_app`
--
ALTER TABLE `prefix_app`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_buylog`
--
ALTER TABLE `prefix_buylog`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_buy_cha_log`
--
ALTER TABLE `prefix_buy_cha_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_cert`
--
ALTER TABLE `prefix_cert`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_key`
--
ALTER TABLE `prefix_key`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_mail`
--
ALTER TABLE `prefix_mail`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_path`
--
ALTER TABLE `prefix_path`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_paylog`
--
ALTER TABLE `prefix_paylog`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_plugin`
--
ALTER TABLE `prefix_plugin`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_secret`
--
ALTER TABLE `prefix_secret`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_sign`
--
ALTER TABLE `prefix_sign`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_signlog`
--
ALTER TABLE `prefix_signlog`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `prefix_user`
--
ALTER TABLE `prefix_user`
  ADD PRIMARY KEY (`in_userid`);

--
-- Indexes for table `prefix_vipprice`
--
ALTER TABLE `prefix_vipprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_buy_log`
--
ALTER TABLE `t_buy_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_domain`
--
ALTER TABLE `t_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jump`
--
ALTER TABLE `t_jump`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sys_config`
--
ALTER TABLE `t_sys_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sys_permission`
--
ALTER TABLE `t_sys_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sys_re_role_permission`
--
ALTER TABLE `t_sys_re_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sys_re_user_role`
--
ALTER TABLE `t_sys_re_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sys_role`
--
ALTER TABLE `t_sys_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sys_user`
--
ALTER TABLE `t_sys_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prefix_admin`
--
ALTER TABLE `prefix_admin`
  MODIFY `in_adminid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prefix_app`
--
ALTER TABLE `prefix_app`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `prefix_buylog`
--
ALTER TABLE `prefix_buylog`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `prefix_buy_cha_log`
--
ALTER TABLE `prefix_buy_cha_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `prefix_cert`
--
ALTER TABLE `prefix_cert`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_key`
--
ALTER TABLE `prefix_key`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_mail`
--
ALTER TABLE `prefix_mail`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_path`
--
ALTER TABLE `prefix_path`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `prefix_paylog`
--
ALTER TABLE `prefix_paylog`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `prefix_plugin`
--
ALTER TABLE `prefix_plugin`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prefix_secret`
--
ALTER TABLE `prefix_secret`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_sign`
--
ALTER TABLE `prefix_sign`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_signlog`
--
ALTER TABLE `prefix_signlog`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix_user`
--
ALTER TABLE `prefix_user`
  MODIFY `in_userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `prefix_vipprice`
--
ALTER TABLE `prefix_vipprice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_buy_log`
--
ALTER TABLE `t_buy_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `t_domain`
--
ALTER TABLE `t_domain`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `t_jump`
--
ALTER TABLE `t_jump`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `t_sys_config`
--
ALTER TABLE `t_sys_config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_sys_permission`
--
ALTER TABLE `t_sys_permission`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `t_sys_re_role_permission`
--
ALTER TABLE `t_sys_re_role_permission`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `t_sys_re_user_role`
--
ALTER TABLE `t_sys_re_user_role`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `t_sys_role`
--
ALTER TABLE `t_sys_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_sys_user`
--
ALTER TABLE `t_sys_user`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
