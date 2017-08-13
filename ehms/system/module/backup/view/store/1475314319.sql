

CREATE TABLE `backup` (
  `backup_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ref` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO backup VALUES("1","2016-09-24","18:15:26","1474721126","1");
INSERT INTO backup VALUES("2","2016-09-24","18:28:57","1474721937","1");
INSERT INTO backup VALUES("3","2016-09-24","18:28:58","1474721938","1");
INSERT INTO backup VALUES("4","2016-10-01","15:01:53","1475314313","1");





CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `donation_time` time NOT NULL,
  `donation_type` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `donation_status` varchar(20) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO donation VALUES("1","6","2016-09-24","15:23:32","Fund","1000","Pending");
INSERT INTO donation VALUES("2","8","2016-09-24","15:24:31","Fund","1000","Pending");
INSERT INTO donation VALUES("3","8","2016-09-24","15:29:30","Fund","1000","Pending");
INSERT INTO donation VALUES("4","8","2016-09-24","15:47:42","Fund","1000","Pending");
INSERT INTO donation VALUES("5","8","2016-09-24","17:01:11","Fund","3000","Paid");





CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_title` varchar(10) NOT NULL,
  `donor_name` varchar(200) NOT NULL,
  `donor_add` varchar(200) NOT NULL,
  `donor_tel` varchar(20) NOT NULL,
  `donor_email` varchar(200) NOT NULL,
  `donor_status` varchar(20) NOT NULL,
  `donor_nic` varchar(200) NOT NULL,
  `passwd` text NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO donor VALUES("1","Mr","Malith","Colombo","0115553333","","Active","","");
INSERT INTO donor VALUES("2","Mr","Rasith Ranawaka","Borallasgamuwa","015555555","","Active","","");
INSERT INTO donor VALUES("3","Mr","daminda","Horana","555","dherath10@yahoo.com","Active","801590241V","");
INSERT INTO donor VALUES("4","Mr","ddd","dad","177","dherath10@yahoo.com","Active","123456789v","26e7458dc56ab2830fadba7bd2c1aa10e981518d");
INSERT INTO donor VALUES("5","Mr","Rahal","Rathnapura","123","dherath10@yahoo.com","Active","123456789v","40bd001563085fc35165329ea1ff5c5ecbdbbeef");
INSERT INTO donor VALUES("6","Mr","DAminda Herath","Horana","0777296275","dherath10@gmail.com","Active","801590241V","85988304de48b7758f9ea464d8d34c29747d79f3");
INSERT INTO donor VALUES("7","Mr","Amal","Galle","1000","dherath10@gmail.com","Active","11111","e3cbba8883fe746c6e35783c9404b4bc0c7ee9eb");
INSERT INTO donor VALUES("8","","DAMINDA","","1111","dherath1010@gmail.com","","","");
INSERT INTO donor VALUES("9","Mr","Nuwan","Horana","0773785292","dherath10@yahoo.com","Active","123456789v","3cb2bf50511eacc9ec6b0d10c20baee33020893d");





CREATE TABLE `jobdetail` (
  `jd_id` int(11) NOT NULL AUTO_INCREMENT,
  `jtitle` varchar(200) NOT NULL,
  `jfield` varchar(200) NOT NULL,
  `jfrom` date NOT NULL,
  `jto` date NOT NULL,
  `oname` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`jd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO jobdetail VALUES("1","Accountant","IT","2016-12-31","2015-12-30","eSOFT","22");
INSERT INTO jobdetail VALUES("2","","","0000-00-00","0000-00-00","","23");
INSERT INTO jobdetail VALUES("3","fafaf","fafa","2016-12-31","2016-12-31","qqq","23");
INSERT INTO jobdetail VALUES("4","gg","ggg","2016-07-01","0000-00-00","hh","24");
INSERT INTO jobdetail VALUES("5","hh","hh","2016-07-14","2016-07-21","hh","24");
INSERT INTO jobdetail VALUES("6","hh","hh","2016-07-03","2016-07-21","gg","24");
INSERT INTO jobdetail VALUES("7","tt","tt","2016-07-01","2016-07-22","hhh","26");
INSERT INTO jobdetail VALUES("8","hh","hh","2016-07-04","2016-07-19","uuu","26");
INSERT INTO jobdetail VALUES("9","hh","hhh","2016-07-04","2016-07-22","hh","26");





CREATE TABLE `login` (
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("","40bd001563085fc35165329ea1ff5c5ecbdbbeef","16");
INSERT INTO login VALUES("achala","40bd001563085fc35165329ea1ff5c5ecbdbbeef","27");
INSERT INTO login VALUES("Daminda","40bd001563085fc35165329ea1ff5c5ecbdbbeef","5");
INSERT INTO login VALUES("daminda1","40bd001563085fc35165329ea1ff5c5ecbdbbeef","21");
INSERT INTO login VALUES("daminda100","40bd001563085fc35165329ea1ff5c5ecbdbbeef","23");
INSERT INTO login VALUES("daminda123","40bd001563085fc35165329ea1ff5c5ecbdbbeef","28");
INSERT INTO login VALUES("daminda1235","40bd001563085fc35165329ea1ff5c5ecbdbbeef","29");
INSERT INTO login VALUES("ddd","40bd001563085fc35165329ea1ff5c5ecbdbbeef","24");
INSERT INTO login VALUES("fftT","40bd001563085fc35165329ea1ff5c5ecbdbbeef","8");
INSERT INTO login VALUES("hh","40bd001563085fc35165329ea1ff5c5ecbdbbeef","25");
INSERT INTO login VALUES("hhh","40bd001563085fc35165329ea1ff5c5ecbdbbeef","26");
INSERT INTO login VALUES("Janitha","40bd001563085fc35165329ea1ff5c5ecbdbbeef","2");
INSERT INTO login VALUES("john","40bd001563085fc35165329ea1ff5c5ecbdbbeef","9");
INSERT INTO login VALUES("kapila","40bd001563085fc35165329ea1ff5c5ecbdbbeef","22");
INSERT INTO login VALUES("ken","40bd001563085fc35165329ea1ff5c5ecbdbbeef","10");
INSERT INTO login VALUES("kenn","40bd001563085fc35165329ea1ff5c5ecbdbbeef","11");
INSERT INTO login VALUES("kenna","40bd001563085fc35165329ea1ff5c5ecbdbbeef","12");
INSERT INTO login VALUES("Nuwan","40bd001563085fc35165329ea1ff5c5ecbdbbeef","1");
INSERT INTO login VALUES("rangana","40bd001563085fc35165329ea1ff5c5ecbdbbeef","20");
INSERT INTO login VALUES("Shanaka","40bd001563085fc35165329ea1ff5c5ecbdbbeef","4");
INSERT INTO login VALUES("Shehan","40bd001563085fc35165329ea1ff5c5ecbdbbeef","3");





CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO role VALUES("1","Web Admin");
INSERT INTO role VALUES("2","Matron");
INSERT INTO role VALUES("3","Staff");
INSERT INTO role VALUES("4","Officer");
INSERT INTO role VALUES("5","Doctor");





CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_date` date NOT NULL,
  `sch_status` varchar(20) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `ts_id` int(11) NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO schedule VALUES("1","2016-08-24","annualy","1","1");
INSERT INTO schedule VALUES("2","2016-08-30","","1","2");
INSERT INTO schedule VALUES("3","2016-08-17","","1","2");
INSERT INTO schedule VALUES("4","2016-09-01","1","5","1");
INSERT INTO schedule VALUES("5","2016-09-02","1","3","1");
INSERT INTO schedule VALUES("6","2016-09-01","1","3","5");
INSERT INTO schedule VALUES("7","2016-09-01","1","4","2");
INSERT INTO schedule VALUES("8","2016-10-01","1","1","1");
INSERT INTO schedule VALUES("9","2016-09-02","1","6","2");
INSERT INTO schedule VALUES("10","2016-09-02","1","7","3");
INSERT INTO schedule VALUES("11","2016-09-03","1","7","1");
INSERT INTO schedule VALUES("12","2016-09-08","1","3","2");
INSERT INTO schedule VALUES("13","2016-09-13","0","7","1");
INSERT INTO schedule VALUES("14","2016-09-03","1","9","3");
INSERT INTO schedule VALUES("15","2016-09-17","1","9","4");





CREATE TABLE `time_slot` (
  `ts_id` int(11) NOT NULL AUTO_INCREMENT,
  `ts_slot` time NOT NULL,
  `ts_type` varchar(20) NOT NULL,
  PRIMARY KEY (`ts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO time_slot VALUES("1","08:00:00","BreakFast");
INSERT INTO time_slot VALUES("2","10:00:00","Morning Tea");
INSERT INTO time_slot VALUES("3","12:00:00","Lunch");
INSERT INTO time_slot VALUES("4","16:00:00","Evening Tea");
INSERT INTO time_slot VALUES("5","19:00:00","Dinner");





CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `user_image` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(15) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","Nuwan","Hema","n@bit.lk","1","Active","","","0000-00-00","","","");
INSERT INTO user VALUES("2","Janitha","Silva","j@bit.lk","2","Active","","","0000-00-00","","","");
INSERT INTO user VALUES("3","Shehan","Dabare","s@bit.lk","3","Active","","","0000-00-00","","","");
INSERT INTO user VALUES("4","Shanaka","Wicra","ss@bit.lk","4","Deactive","","","0000-00-00","","","");
INSERT INTO user VALUES("5","Daminda","Herath","d@bit.lk","5","Deactive","","","0000-00-00","","","");
INSERT INTO user VALUES("6","daminda","Herath","dherath10@yahoo.com","1","Active","","M","1980-06-28","801590241V","+941234567890","gg");
INSERT INTO user VALUES("7","daminda","Herath","dherath10@yahoo.com","1","Active","","M","1980-06-28","801590241V","+941234567890","gg");
INSERT INTO user VALUES("8","daminda","Herath","dherath10@yahoo.com","1","Active","","M","1980-06-28","801590241V","+941234567890","gg");
INSERT INTO user VALUES("9","John","Poul","j@lk.lk","3","Deactive","","M","1980-12-31","801590201V","+941234567890","Colombo");
INSERT INTO user VALUES("10","Kenath","Danapala","ken@gmail.com","0","Active","","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("11","Kenath","Danapala","ken@gmail.com","3","Deactive","","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("12","Kenath","Danapala","ken@gmail.com","3","Deactive","","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("13","Kenath","Danapala","ken@gmail.com","3","Active","","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("14","Kenath","Danapala","ken@gmail.com","3","Active","","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("15","Kenath","Danapala","ken@gmail.com","3","Active","","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("16","","","","0","Active","","","0000-00-00","","","");
INSERT INTO user VALUES("19","Kenath","Danapala","ken@gmail.com","3","Active","1468060705_Routing.gif","M","1990-12-09","901234567V","+941234567890","nE");
INSERT INTO user VALUES("20","Rangana","Perera","dherath10@yahoo.com","5","Active","1468061727_2.png","M","1980-12-31","801590241V","+941234567890","Galle");
INSERT INTO user VALUES("21","daminda","Herath","dherath10@yahoo.com","4","Deactive","1468062882_fb.png","M","1980-12-12","801590241V","+941234567890","ddd");
INSERT INTO user VALUES("22","Kapila","Henda","kapi@gmail.com","4","Deactive","","M","1980-12-31","801590241V","+941234567890","ggg");
INSERT INTO user VALUES("23","daminda","Herath","dherath1010@yahoo.com","1","Active","1472216006_pack_card.jpg","M","1980-07-05","801590241V","+941234567890","  hhh");
INSERT INTO user VALUES("24","gg","gg","g@hh.lk","1","Active","","M","1980-12-31","801590241V","+941234567890","gg");
INSERT INTO user VALUES("25","hh","hh","dherath10@yahoo.com","1","Active","","M","1980-12-31","801590241V","+941234567890","ff");
INSERT INTO user VALUES("26","hh","hh","dherath10@yahoo.com","1","Active","","M","1980-12-31","801590241V","+941234567890","ff");
INSERT INTO user VALUES("27","achala","Perera","achala@yahoo.com","2","Active","1472215986_ParkReserve.jpg","F","1980-12-31","801590241V","+941234567890","  AAAA");
INSERT INTO user VALUES("28","daminda","Herath","dherath10@yahoo.com","3","Active","1472215976_Toyota-Madiun-HIACE-High-Grade-Commuter-MT.png","M","1980-01-09","801590241V","+941234567890","   hh");
INSERT INTO user VALUES("29","damin","Herathaaa","dherath10@yahoo.com","3","Active","1472215967_sl_map-larg.png","M","1980-01-09","801590241V","+941234567890","       hh");



