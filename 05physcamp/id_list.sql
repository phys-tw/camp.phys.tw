# phpMyAdmin SQL Dump
# version 2.5.3-rc2
# http://www.phpmyadmin.net
#
# �D��: localhost
# �إߤ��: Nov 02, 2004, 08:43 PM
# ���A������: 3.23.57
# PHP ����: 4.3.3
# 
# ��Ʈw: `physcamp2005`
# 

# --------------------------------------------------------

#
# ��ƪ�榡�G `id_list`
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
# �C�X�H�U��Ʈw���ƾڡG `id_list`
#

INSERT INTO `id_list` VALUES (1, 'B122193579', 85, 4, 26, '���v�M', 'B91202048@w3.phys.nut.edu.tw', '�O�_���U�ظ�75��45��3��', '0222347860', '0936400136', '�k', '�x�j���z�t', 'B91202048', 3, 'TEST');
INSERT INTO `id_list` VALUES (2, 'B1221935792', 85, 4, 26, '���v�M2', 'B91202048@w3.phys.nut.edu.tw', '�O�_���U�ظ�75��45��3��', '0222347860', '0936400136', '�k', '�x�j���z�t', 'B91202048', 3, 'TEST');
INSERT INTO `id_list` VALUES (3, 'Q123131986', 85, 11, 19, '������', 'b91202008@ntu.edu.tw', '�_��������@�q�@�ѤE�ˤQ��������', '02-27993164', '0937-900412', '�k', '�p�i�R����', '8300778', 2, '�ڬOhtt\r\n\r\n��]~~\r\n\r\n�{�b��Ѱᤣ��~~��]~~\r\n\r\n�ڬO1983�~�X�ͪ��ѤH��~~\r\n\r\n�оǪ��n�n��@�U�ڪ��ͤ�~~\r\n\r\n�ţ�~~  �i�H�u�W���W');
INSERT INTO `id_list` VALUES (4, 'R123474530', 85, 6, 4, '�P�|�s', 'b91202031@w3.phys.ntu.edu.tw', '�O�j�k���� 303 ��', '2349656', '0917755786', '�k', '�O�j���z', 'b91202031', 3, '�ڬO�i�R���j�n���A�{�b���b���զۤv�����W�{���C\r\n\r\n����_�����\r\n\r\n\r\n\r\n�۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��۰��_��');
INSERT INTO `id_list` VALUES (5, 'l123685930', 86, 1, 1, '�����@', 'b93202026@ntu.edu.tw', '�x����', '04-21234567', '0912345678', '�k', '�x�j���z', '��93202026', 1, '���ճ��W��\r\n');
INSERT INTO `id_list` VALUES (6, 'T223423126', 85, 4, 6, '�L�֯�', 'hellosilpn@yahoo.com.tw', '�x�j�k�G��', '0233667958', '0955150824', '�k', '�x�j���z', 'B91202034', 3, '��! �����ӷ|�Q�½c���a?  �j�n�����ӭ��l�a:D');
INSERT INTO `id_list` VALUES (7, 'axxxxx0x0x', 85, 1, 1, '���ӳ�', 'wawa@wawa', '�x�j���z�t�t�]�Y��', '(01)2345678', '09312456879', '�k', '�x�j���z�t', 'b91202016', 3, 'test!');
