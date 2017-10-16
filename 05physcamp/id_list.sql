# phpMyAdmin SQL Dump
# version 2.5.3-rc2
# http://www.phpmyadmin.net
#
# 主機: localhost
# 建立日期: Nov 02, 2004, 08:43 PM
# 伺服器版本: 3.23.57
# PHP 版本: 4.3.3
# 
# 資料庫: `physcamp2005`
# 

# --------------------------------------------------------

#
# 資料表格式： `id_list`
#

CREATE TABLE `id_list` (
  `id` int(5) NOT NULL auto_increment,
  `IDNumber` varchar(20) NOT NULL default '',
  `year` int(5) NOT NULL default '0',
  `month` int(5) NOT NULL default '0',
  `day` int(5) NOT NULL default '0',
  `name` varchar(30) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `home` varchar(50) NOT NULL default '',
  `cell` varchar(50) NOT NULL default '',
  `sex` char(2) NOT NULL default '',
  `school` varchar(30) NOT NULL default '',
  `Snumber` varchar(20) NOT NULL default '',
  `lv` int(5) NOT NULL default '0',
  `content` text NOT NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `content` (`content`),
  FULLTEXT KEY `content_2` (`content`)
) TYPE=MyISAM COMMENT='ID_list' AUTO_INCREMENT=8 ;

#
# 列出以下資料庫的數據： `id_list`
#

INSERT INTO `id_list` VALUES (1, 'B122193579', 85, 4, 26, '楊宗霖', 'B91202048@w3.phys.nut.edu.tw', '臺北市萬壽路75巷45號3樓', '0222347860', '0936400136', '男', '台大物理系', 'B91202048', 3, 'TEST');
INSERT INTO `id_list` VALUES (2, 'B1221935792', 85, 4, 26, '楊宗霖2', 'B91202048@w3.phys.nut.edu.tw', '臺北市萬壽路75巷45號3樓', '0222347860', '0936400136', '男', '台大物理系', 'B91202048', 3, 'TEST');
INSERT INTO `id_list` VALUES (3, 'Q123131986', 85, 11, 19, '蔡翰棠', 'b91202008@ntu.edu.tw', '北市內湖路一段一巷九弄十六號五樓', '02-27993164', '0937-900412', '男', '小可愛高中', '8300778', 2, '我是htt\r\n\r\n喔夜~~\r\n\r\n現在唸書唸不完~~喔夜~~\r\n\r\n我是1983年出生的老人喔~~\r\n\r\n請學長姊要改一下我的生日~~\r\n\r\n酷ㄝ~~  可以線上報名');
INSERT INTO `id_list` VALUES (4, 'R123474530', 85, 6, 4, '周育存', 'b91202031@w3.phys.ntu.edu.tw', '臺大男六舍 303 室', '2349656', '0917755786', '男', '臺大物理', 'b91202031', 3, '我是可愛的大聲公，現在正在測試自己的報名程式。\r\n\r\n手動斷行測試\r\n\r\n\r\n\r\n自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行自動斷行');
INSERT INTO `id_list` VALUES (5, 'l123685930', 86, 1, 1, '趙元駿', 'b93202026@ntu.edu.tw', '台中縣', '04-21234567', '0912345678', '男', '台大物理', 'Ｂ93202026', 1, '測試報名咧\r\n');
INSERT INTO `id_list` VALUES (6, 'T223423126', 85, 4, 6, '林詩茵', 'hellosilpn@yahoo.com.tw', '台大女二舍', '0233667958', '0955150824', '女', '台大物理', 'B91202034', 3, '唔! 我應該會被黑箱中吧?  大聲公給個面子吧:D');
INSERT INTO `id_list` VALUES (7, 'axxxxx0x0x', 85, 1, 1, '江輾魚', 'wawa@wawa', '台大物理系系館某樓', '(01)2345678', '09312456879', '男', '台大物理系', 'b91202016', 3, 'test!');
