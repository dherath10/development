

CREATE TABLE `backup` (
  `back_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ref` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`back_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_title` varchar(200) NOT NULL,
  `cus_fname` varchar(200) NOT NULL,
  `cus_lname` varchar(200) NOT NULL,
  `cus_telno` varchar(20) NOT NULL,
  `cus_email` varchar(200) NOT NULL,
  `cus_status` varchar(20) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("1","Mr","Rilwano","Mum","0777296275","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("2","Rev","Rilwano","Hmmm","555","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("3","Rev","Rilwano","Hmmm","555","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("4","Rev","daminda","Herath","444","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("5","Mr","gg","ggg","ggg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("6","Mr","gg","ggg","ggg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("7","Mr","gg","ggg","ggg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("8","Mr","gg","ggg","ggg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("9","Rev","ff","ff","gg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("10","Rev","ff","ff","gg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("11","Rev","ff","ff","gg","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("12","Mr.","Rasith","Rasith","100000000","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("13","Mrs","FFF","FFF","1288383","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("14","Mrs","FFF","FFF","1288383","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("15","Mr.","Rasith","Rasith","100000000","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("16","Mr.","daminda","Herath","555","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("17","Mr.","daminda","Herath","555","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("18","Mr.","dd","dd","2222","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("19","Mr.","daminda","Herath","11","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("20","Mr.","fff","fff","12345555","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("21","Mr.","GGG","GGG","33333","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("22","Mr.","gg","gg","444","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("23","Mr.","gg","gg","444","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("24","Mr.","daminda","Herath","111","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("25","Mr.","daminda","Herath","111","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("26","Mr.","DAD","DAD","333","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("27","Mr.","daminda","Herath","0777296275","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("28","Mr.","daminda","Herath","0777296275","dherath10@gmail.com","Active");
INSERT INTO customer VALUES("29","Mr.","daminda","Herath","0777296275","dherath10@yahoo.com","Active");
INSERT INTO customer VALUES("30","Mr.","daminda","Herath","0777296275","dherath10@yahoo.com","Active");





CREATE TABLE `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO district VALUES("3","Colombo","1");
INSERT INTO district VALUES("4","Kaluthara","1");
INSERT INTO district VALUES("5","Gampaha","1");
INSERT INTO district VALUES("6","Galle","2");
INSERT INTO district VALUES("7","Mathara","2");
INSERT INTO district VALUES("8","Hambanthota","2");
INSERT INTO district VALUES("9","Jaffna","3");
INSERT INTO district VALUES("10","Vanni","3");
INSERT INTO district VALUES("11","Anuradhapura","4");
INSERT INTO district VALUES("12","Polannaruwa","4");





CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

INSERT INTO log VALUES("1","2016-07-27","12:21:22","::1","1_1469602282","rasith");
INSERT INTO log VALUES("2","2016-08-02","19:41:07","::1","1_1470147067","rasith");
INSERT INTO log VALUES("3","2016-08-02","19:41:32","::1","2_1470147092","tharindu");
INSERT INTO log VALUES("4","2016-08-02","19:47:32","::1","2_1470147452","tharindu");
INSERT INTO log VALUES("5","2016-08-02","20:11:42","::1","2_1470148902","tharindu");
INSERT INTO log VALUES("6","2016-08-02","20:17:23","::1","2_1470149243","tharindu");
INSERT INTO log VALUES("7","2016-08-02","20:35:30","::1","1_1470150330","rasith");
INSERT INTO log VALUES("8","2016-08-04","09:41:07","::1","1_1470283867","rasith");
INSERT INTO log VALUES("9","2016-08-04","09:43:11","::1","2_1470283991","tharindu");
INSERT INTO log VALUES("10","2016-08-04","10:00:12","::1","2_1470285012","tharindu");
INSERT INTO log VALUES("11","2016-08-04","11:45:17","::1","1_1470291317","rasith");
INSERT INTO log VALUES("12","2016-08-04","11:46:31","::1","2_1470291391","tharindu");
INSERT INTO log VALUES("13","2016-08-04","11:47:10","::1","4_1470291430","Fazlyn");
INSERT INTO log VALUES("14","2016-08-04","12:01:29","::1","1_1470292289","rasith");
INSERT INTO log VALUES("15","2016-08-04","12:07:00","::1","4_1470292620","Fazlyn");
INSERT INTO log VALUES("16","2016-08-04","12:14:45","::1","2_1470293085","tharindu");
INSERT INTO log VALUES("17","2016-08-04","12:26:08","::1","3_1470293768","rilwan");
INSERT INTO log VALUES("18","2016-08-04","12:26:28","::1","3_1470293788","rilwan");
INSERT INTO log VALUES("19","2016-08-04","12:26:43","::1","1_1470293803","rasith");
INSERT INTO log VALUES("20","2016-08-04","12:26:52","::1","2_1470293812","tharindu");
INSERT INTO log VALUES("21","2016-08-04","12:32:09","::1","2_1470294129","tharindu");
INSERT INTO log VALUES("22","2016-08-04","12:32:36","::1","2_1470294156","tharindu");
INSERT INTO log VALUES("23","2016-08-04","12:57:10","::1","3_1470295630","rilwan");
INSERT INTO log VALUES("24","2016-08-04","12:57:24","::1","2_1470295644","tharindu");
INSERT INTO log VALUES("25","2016-08-04","19:55:04","::1","1_1470320704","rasith");
INSERT INTO log VALUES("26","2016-08-04","20:30:17","::1","2_1470322817","tharindu");
INSERT INTO log VALUES("27","2016-08-11","09:11:13","::1","2_1470886873","tharindu");
INSERT INTO log VALUES("28","2016-08-15","09:19:49","::1","2_1471232989","tharindu");
INSERT INTO log VALUES("29","2016-08-15","10:07:20","::1","2_1471235840","tharindu");
INSERT INTO log VALUES("30","2016-08-23","09:37:52","::1","2_1471925272","tharindu");
INSERT INTO log VALUES("31","2016-08-24","14:08:46","::1","2_1472027926","tharindu");
INSERT INTO log VALUES("32","2016-08-26","12:04:50","::1","2_1472193290","tharindu");
INSERT INTO log VALUES("33","2016-08-26","14:51:10","::1","2_1472203270","tharindu");
INSERT INTO log VALUES("34","2016-09-15","15:23:40","::1","2_1473933220","tharindu");
INSERT INTO log VALUES("35","2016-09-15","15:25:02","::1","2_1473933302","tharindu");
INSERT INTO log VALUES("36","2016-09-15","15:25:17","::1","1_1473933317","rasith");
INSERT INTO log VALUES("37","2016-09-18","21:04:43","::1","2_1474212883","tharindu");
INSERT INTO log VALUES("38","2016-09-19","09:17:18","::1","2_1474256838","tharindu");
INSERT INTO log VALUES("39","2016-09-19","09:22:17","::1","1_1474257137","rasith");
INSERT INTO log VALUES("40","2016-09-19","13:27:11","::1","1_1474271831","rasith");
INSERT INTO log VALUES("41","2016-09-19","13:27:20","::1","2_1474271840","tharindu");
INSERT INTO log VALUES("42","2016-09-19","13:29:48","::1","1_1474271988","rasith");
INSERT INTO log VALUES("43","2016-09-19","14:11:45","::1","1_1474274505","rasith");
INSERT INTO log VALUES("44","2016-09-19","14:11:54","::1","2_1474274514","tharindu");
INSERT INTO log VALUES("45","2016-09-19","14:12:09","::1","3_1474274529","rilwan");
INSERT INTO log VALUES("46","2016-09-19","14:12:23","::1","4_1474274543","fazlyn");
INSERT INTO log VALUES("47","2016-09-19","14:12:31","::1","1_1474274551","rasith");
INSERT INTO log VALUES("48","2016-09-19","14:45:16","::1","2_1474276516","tharindu");
INSERT INTO log VALUES("49","2016-09-19","14:47:06","::1","1_1474276626","rasith");
INSERT INTO log VALUES("50","2016-09-26","09:49:57","::1","2_1474863597","tharindu");
INSERT INTO log VALUES("51","2016-09-26","09:50:33","::1","1_1474863633","rasith");
INSERT INTO log VALUES("52","2016-09-26","11:45:24","::1","2_1474870524","tharindu");





CREATE TABLE `login` (
  `user_name` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("bla","40bd001563085fc35165329ea1ff5c5ecbdbbeef","15");
INSERT INTO login VALUES("Fazlyn","40bd001563085fc35165329ea1ff5c5ecbdbbeef","4");
INSERT INTO login VALUES("hello","40bd001563085fc35165329ea1ff5c5ecbdbbeef","13");
INSERT INTO login VALUES("la","40bd001563085fc35165329ea1ff5c5ecbdbbeef","14");
INSERT INTO login VALUES("ma","40bd001563085fc35165329ea1ff5c5ecbdbbeef","16");
INSERT INTO login VALUES("man","40bd001563085fc35165329ea1ff5c5ecbdbbeef","15");
INSERT INTO login VALUES("mm","40bd001563085fc35165329ea1ff5c5ecbdbbeef","10");
INSERT INTO login VALUES("Rasith","40bd001563085fc35165329ea1ff5c5ecbdbbeef","1");
INSERT INTO login VALUES("Rilwan","40bd001563085fc35165329ea1ff5c5ecbdbbeef","3");
INSERT INTO login VALUES("SV","40bd001563085fc35165329ea1ff5c5ecbdbbeef","9");
INSERT INTO login VALUES("Tharindu","40bd001563085fc35165329ea1ff5c5ecbdbbeef","2");





CREATE TABLE `make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_name` varchar(200) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO make VALUES("1","Nissan");
INSERT INTO make VALUES("2","Toyota");
INSERT INTO make VALUES("3","Mazda");
INSERT INTO make VALUES("4","Honda");





CREATE TABLE `model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(200) NOT NULL,
  `make_id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO model VALUES("1","Sunny N16","1","Car");
INSERT INTO model VALUES("2","Sunny FB15","1","Car");
INSERT INTO model VALUES("3","Bluebird SU12","1","Car");
INSERT INTO model VALUES("4","Vanette","1","Van");
INSERT INTO model VALUES("5","Vios","2","Car");
INSERT INTO model VALUES("6","Yaris","2","Car");
INSERT INTO model VALUES("7","Regius","2","Van");
INSERT INTO model VALUES("8","Jombo","2","Car");





CREATE TABLE `owner` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_fname` varchar(200) NOT NULL,
  `owner_address` varchar(200) NOT NULL,
  `owner_nic` varchar(200) NOT NULL,
  `owner_gender` varchar(10) NOT NULL,
  `owner_image` text NOT NULL,
  `owner_status` varchar(20) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO owner VALUES("1","Amal Silva","Moratuwa","","","","");
INSERT INTO owner VALUES("2","Rumesh Rathnayaka","Kandy","","","","");
INSERT INTO owner VALUES("4","Roshan Mahanama","Colombo","","","","");
INSERT INTO owner VALUES("5","daminda","","","","","");
INSERT INTO owner VALUES("6","","","","","","");
INSERT INTO owner VALUES("7","Daminda Herath","","","","","");





CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `res_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` time NOT NULL,
  `pay_status` varchar(100) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

INSERT INTO payment VALUES("1","500","26","2016-08-30","09:09:14","Paid");
INSERT INTO payment VALUES("2","500","26","2016-08-30","09:09:41","Paid");
INSERT INTO payment VALUES("3","500","26","2016-08-30","09:11:57","Paid");
INSERT INTO payment VALUES("4","500","26","2016-08-30","09:13:23","Paid");
INSERT INTO payment VALUES("5","500","26","2016-08-30","09:14:04","Paid");
INSERT INTO payment VALUES("6","500","26","2016-08-30","09:24:18","Paid");
INSERT INTO payment VALUES("7","500","26","2016-08-30","09:25:24","Paid");
INSERT INTO payment VALUES("8","500","26","2016-08-30","09:30:48","Paid");
INSERT INTO payment VALUES("9","500","26","2016-08-30","09:35:32","Paid");
INSERT INTO payment VALUES("10","500","27","2016-09-15","06:03:03","Paid");
INSERT INTO payment VALUES("11","500","27","2016-09-15","06:32:31","Paid");
INSERT INTO payment VALUES("12","500","27","2016-09-15","06:33:49","Paid");
INSERT INTO payment VALUES("13","500","27","2016-09-15","06:34:33","Paid");
INSERT INTO payment VALUES("14","500","27","2016-09-15","06:34:35","Paid");
INSERT INTO payment VALUES("15","500","27","2016-09-15","06:34:35","Paid");
INSERT INTO payment VALUES("16","500","27","2016-09-15","06:40:04","Paid");
INSERT INTO payment VALUES("17","500","27","2016-09-15","06:40:04","Paid");
INSERT INTO payment VALUES("18","500","27","2016-09-15","06:40:38","Paid");
INSERT INTO payment VALUES("19","500","27","2016-09-15","06:40:40","Paid");
INSERT INTO payment VALUES("20","500","27","2016-09-15","06:41:02","Paid");
INSERT INTO payment VALUES("21","500","27","2016-09-15","06:41:03","Paid");
INSERT INTO payment VALUES("22","500","27","2016-09-15","06:41:04","Paid");
INSERT INTO payment VALUES("23","500","27","2016-09-15","06:42:37","Paid");
INSERT INTO payment VALUES("24","500","27","2016-09-15","06:42:37","Paid");
INSERT INTO payment VALUES("25","500","27","2016-09-15","06:43:20","Paid");
INSERT INTO payment VALUES("26","500","27","2016-09-15","06:43:20","Paid");
INSERT INTO payment VALUES("27","500","27","2016-09-15","06:43:51","Paid");
INSERT INTO payment VALUES("28","500","27","2016-09-15","06:43:51","Paid");
INSERT INTO payment VALUES("29","500","27","2016-09-15","06:49:29","Paid");
INSERT INTO payment VALUES("30","500","27","2016-09-15","06:49:29","Paid");
INSERT INTO payment VALUES("31","500","27","2016-09-15","06:51:47","Paid");
INSERT INTO payment VALUES("32","500","27","2016-09-15","06:51:48","Paid");
INSERT INTO payment VALUES("33","500","27","2016-09-15","06:54:04","Paid");
INSERT INTO payment VALUES("34","500","27","2016-09-15","06:54:04","Paid");
INSERT INTO payment VALUES("35","500","27","2016-09-15","06:59:18","Paid");
INSERT INTO payment VALUES("36","500","27","2016-09-15","06:59:18","Paid");
INSERT INTO payment VALUES("37","500","27","2016-09-15","07:00:42","Paid");
INSERT INTO payment VALUES("38","500","27","2016-09-15","07:00:42","Paid");
INSERT INTO payment VALUES("39","500","27","2016-09-15","07:05:32","Paid");
INSERT INTO payment VALUES("40","500","27","2016-09-15","07:05:32","Paid");
INSERT INTO payment VALUES("41","500","27","2016-09-15","07:06:44","Paid");
INSERT INTO payment VALUES("42","500","27","2016-09-15","07:06:44","Paid");
INSERT INTO payment VALUES("43","500","27","2016-09-15","07:10:23","Paid");
INSERT INTO payment VALUES("44","500","27","2016-09-15","07:10:23","Paid");
INSERT INTO payment VALUES("45","500","27","2016-09-15","07:10:38","Paid");
INSERT INTO payment VALUES("46","500","27","2016-09-15","07:10:38","Paid");
INSERT INTO payment VALUES("47","500","27","2016-09-15","07:17:41","Paid");
INSERT INTO payment VALUES("48","500","27","2016-09-15","07:17:43","Paid");
INSERT INTO payment VALUES("49","500","27","2016-09-15","07:17:43","Paid");
INSERT INTO payment VALUES("50","500","27","2016-09-15","07:19:16","Paid");
INSERT INTO payment VALUES("51","500","27","2016-09-15","08:12:34","Paid");
INSERT INTO payment VALUES("52","500","27","2016-09-15","08:13:28","Paid");
INSERT INTO payment VALUES("53","500","27","2016-09-15","08:14:28","Paid");
INSERT INTO payment VALUES("54","500","27","2016-09-15","08:15:28","Paid");
INSERT INTO payment VALUES("55","500","27","2016-09-15","08:31:57","Paid");
INSERT INTO payment VALUES("56","500","27","2016-09-15","08:32:06","Paid");
INSERT INTO payment VALUES("57","500","27","2016-09-15","08:39:16","Paid");
INSERT INTO payment VALUES("58","500","27","2016-09-15","08:39:16","Paid");
INSERT INTO payment VALUES("59","500","27","2016-09-15","08:42:38","Paid");
INSERT INTO payment VALUES("60","500","27","2016-09-15","08:42:51","Paid");
INSERT INTO payment VALUES("61","500","27","2016-09-15","08:45:39","Paid");
INSERT INTO payment VALUES("62","500","28","2016-09-15","11:17:34","Paid");
INSERT INTO payment VALUES("63","500","29","2016-09-15","11:43:44","Paid");
INSERT INTO payment VALUES("64","500","30","2016-09-23","08:21:48","Paid");





CREATE TABLE `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(100) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO province VALUES("1","Western");
INSERT INTO province VALUES("2","Southern");
INSERT INTO province VALUES("3","Northern");
INSERT INTO province VALUES("4","North Central");





CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_from` varchar(200) NOT NULL,
  `res_to` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `class` varchar(200) NOT NULL,
  `ac_type` varchar(200) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `res_status` varchar(200) NOT NULL,
  `res_date` date NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO reservation VALUES("1","horana","colombo","2016-08-25","11:59:00","Car","Front AC","1","Pending","2016-08-25","fffff");
INSERT INTO reservation VALUES("2","horana","colombo","2016-12-31","12:59:00","Car","Front AC","2","Pending","2016-08-25","ffff");
INSERT INTO reservation VALUES("3","horana","colombo","2016-12-31","12:59:00","Car","Front AC","3","Pending","2016-08-25","ffff");
INSERT INTO reservation VALUES("4","horana","galle","2016-12-31","12:59:00","Car","Front AC","4","Pending","2016-08-26","ggg");
INSERT INTO reservation VALUES("5","galle","kandy","2016-08-27","13:58:00","Car","Front AC","5","Pending","2016-08-26","ggg");
INSERT INTO reservation VALUES("6","hikkaduwa galle","kandy","2016-08-27","13:58:00","Car","Front AC","6","Pending","2016-08-26","ggg");
INSERT INTO reservation VALUES("7","hikkaduwa","kandy","2016-08-27","13:58:00","Car","Front AC","7","Pending","2016-08-26","ggg");
INSERT INTO reservation VALUES("8","hikkaduwa,galle","kandy","2016-08-27","13:58:00","Car","Front AC","8","Pending","2016-08-26","ggg");
INSERT INTO reservation VALUES("9","No : 48/4, Kottawa Rd, Siddamulla, Piliyandala, Sri Lanka","colombo","2016-08-11","18:59:00","Car","Front AC","9","Pending","2016-08-27","gg");
INSERT INTO reservation VALUES("10","No : 48/4, Kottawa Rd, Siddamulla, Piliyandala, Sri Lanka","No. 235, Galle Road, Colombo 4  Sri Lanka. ","2016-08-11","18:59:00","Car","Front AC","10","Pending","2016-08-27","gg");
INSERT INTO reservation VALUES("11","No : 48/4, Kottawa Rd, Siddamulla, Piliyandala, Sri Lanka","No 235, Galle Road, Colombo 4  Sri Lanka","2016-08-11","18:59:00","Car","Front AC","11","Pending","2016-08-27","gg");
INSERT INTO reservation VALUES("12","HOrana","Colombo","2016-12-31","01:00:00","Car","Front AC","12","Pending","2016-08-30","HI");
INSERT INTO reservation VALUES("13","hikkaduwa","GALLE","2016-08-10","02:00:00","Car","Front AC","13","Pending","2016-08-30","HHH");
INSERT INTO reservation VALUES("14","hikkaduwa","galle","2016-08-10","02:00:00","Car","Front AC","14","Pending","2016-08-30","HHH");
INSERT INTO reservation VALUES("15","horana","Colombo","2016-12-31","01:00:00","Car","Front AC","15","Pending","2016-08-30","HI");
INSERT INTO reservation VALUES("16","horana","colombo","2016-08-18","01:01:00","Car","Front AC","16","Pending","2016-08-30","HI");
INSERT INTO reservation VALUES("17","horana","colombo","2016-08-18","01:01:00","Car","Front AC","17","Pending","2016-08-30","HI");
INSERT INTO reservation VALUES("18","galle","kandy","2016-12-31","12:59:00","Car","Front AC","18","Pending","2016-08-30","Hi");
INSERT INTO reservation VALUES("19","horana","colombo","2016-12-31","23:59:00","Car","Front AC","19","Pending","2016-08-30","GGG");
INSERT INTO reservation VALUES("20","horana","colombo","2016-12-31","12:59:00","Car","Front AC","20","Pending","2016-08-30","hh");
INSERT INTO reservation VALUES("21","horana","colombo","2016-12-31","12:59:00","Car","Front AC","21","Pending","2016-08-30","GG");
INSERT INTO reservation VALUES("22","horana","colombo","2016-12-31","12:59:00","Car","Front AC","22","Pending","2016-08-30","");
INSERT INTO reservation VALUES("23","horana","colombo","2016-12-31","12:59:00","Car","Front AC","23","Pending","2016-08-30","");
INSERT INTO reservation VALUES("24","horana","colombo","2016-12-31","12:59:00","Car","Front AC","24","Pending","2016-08-30","");
INSERT INTO reservation VALUES("25","horana","colombo","2016-12-31","12:59:00","Car","Front AC","25","Pending","2016-08-30","");
INSERT INTO reservation VALUES("26","horana","colombo","2016-12-31","12:59:00","Car","Front AC","26","Pending","2016-08-30","DDD");
INSERT INTO reservation VALUES("27","horana","galle","2016-12-31","12:59:00","Car","Front AC","27","Pending","2016-09-15","fff");
INSERT INTO reservation VALUES("28","kandy","colombo","2016-10-31","01:00:00","Car","Front AC","28","Pending","2016-09-15","HI");
INSERT INTO reservation VALUES("29","kandy","colombo","2016-10-31","01:00:00","Car","Front AC","29","Pending","2016-09-15","HI");
INSERT INTO reservation VALUES("30","horana","colombo","2016-12-31","12:59:00","Car","Front AC","30","Pending","2016-09-23","ggg");





CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO role VALUES("1","MD");
INSERT INTO role VALUES("2","System Admin");
INSERT INTO role VALUES("3","Manager");
INSERT INTO role VALUES("4","Accountant");





CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(200) NOT NULL,
  `user_lname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_tel_no` varchar(15) NOT NULL,
  `user_image` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_nic` varchar(20) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","Rasith","Ranawaka","ra@gmail.com","","","1","","Active","0000-00-00","Male","3");
INSERT INTO user VALUES("2","Tharindu","Rangana","ran@gmail.com","","","2","","Active","0000-00-00","Male","3");
INSERT INTO user VALUES("3","Rilwan","Mohamed","ril@gmail.com","+94771212121","1468229884_malecostume-256.png","3","941010100V","Active","1994-01-01","Male","3");
INSERT INTO user VALUES("4","Fazlyn","Cader","faz@gmail.com","","","4","","Active","0000-00-00","Male","3");
INSERT INTO user VALUES("8","Ranbir","Kapoor","ranbir@yahoo.com","+94774848489","","3","901010101V","Active","1990-02-02","Male","3");
INSERT INTO user VALUES("9","XC","zxc","g@gmail.com","+94774848489","WWW.YTS.AG.jpg","1","901010201V","Active","1990-02-02","Male","2");
INSERT INTO user VALUES("12","Man","Machine","m@gmail.com","+94778899874","1466068708_male3-256.png","3","943214569V","Active","1994-02-12","Male","1");
INSERT INTO user VALUES("14","Lam","Sal","la@yahoo.cm","+94771212131","1470287638_1468232799_finance_-56-256.png","4","941010122V","Active","1994-01-01","Male","5");
INSERT INTO user VALUES("15","blaa","caa","bla@yahoo.com","+94774374877","","1","943040210V","Active","1994-10-31","Male","3");
INSERT INTO user VALUES("16","mm","aaa","ma@yahoo.com","+9476458795","","3","941010143V","Active","1994-10-29","Male","3");





CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `v_no` varchar(200) NOT NULL,
  `e_no` varchar(200) NOT NULL,
  `c_no` varchar(200) NOT NULL,
  `nos` int(11) NOT NULL,
  `ftype` varchar(20) NOT NULL,
  `v_ac` varchar(20) NOT NULL,
  `v_image` text NOT NULL,
  `v_trans` varchar(20) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `v_status` varchar(20) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO vehicle VALUES("1","2","5","yy","r","rrr","4","Diesel","Front AC","","Manual","0","Active");
INSERT INTO vehicle VALUES("2","1","1","gg","gg","gg","4","Diesel","Front AC","","Manual","5","Active");
INSERT INTO vehicle VALUES("3","2","5","","","","0","","","","","6","Active");
INSERT INTO vehicle VALUES("4","1","1","abc1234","166666","33333","5","Petrol","Non AC","","Manual","7","Active");



