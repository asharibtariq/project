/*
Navicat MySQL Data Transfer

Source Server         : Talha
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2022-08-31 11:37:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for email_template
-- ----------------------------
DROP TABLE IF EXISTS `email_template`;
CREATE TABLE `email_template` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `templatename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of email_template
-- ----------------------------
INSERT INTO `email_template` VALUES ('1', 'otp_email', '<div style=\"font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2\">\n  <div style=\"margin:50px auto;width:70%;padding:20px 0\">\n    <div style=\"border-bottom:1px solid #eee\">\n      <a href=\"\" style=\"font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600\">Ministry of National Health Services Regulations & Coordination</a>\n    </div>\n    <p style=\"font-size:1.1em\">Hi User,</p>\n    <p>Use the following OTP to complete your Sign Up procedures.</p>\n    <h2 style=\"background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;\">{otp_number}</h2>\n    <p style=\"font-size:0.9em;\">Regards,<br />MoNHSRC</p>\n    <hr style=\"border:none;border-top:1px solid #eee\" />\n    <div style=\"float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300\">\n      <p>Ministry of Heatlh</p>\n      <p>3rd Floor, Koshar Block</p>\n      <p>Pak Secretariat, Islamabad</p>\n    </div>\n  </div>\n</div>', 'Y', null, null);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2022_08_04_045659_alter_username_field_users', '2');
INSERT INTO `migrations` VALUES ('6', '2022_08_04_050225_add_username_users', '3');
INSERT INTO `migrations` VALUES ('7', '2022_08_04_071321_create_projects_table', '4');
INSERT INTO `migrations` VALUES ('8', '2022_08_04_074708_create_reports_table', '4');
INSERT INTO `migrations` VALUES ('9', '2022_08_10_071416_add_multiple_fields_tbl_project', '5');
INSERT INTO `migrations` VALUES ('10', '2022_08_11_055626_alter_fields_tbl_report', '6');
INSERT INTO `migrations` VALUES ('11', '2022_08_11_092213_drop_tbl_report', '7');
INSERT INTO `migrations` VALUES ('12', '2022_08_11_092515_create_new_tbl_report', '7');
INSERT INTO `migrations` VALUES ('13', '2022_08_11_093125_drop_tbl_report1', '7');
INSERT INTO `migrations` VALUES ('14', '2022_08_11_093213_create_new_tbl_report1', '7');
INSERT INTO `migrations` VALUES ('15', '2022_08_17_073502_create_tbl_email_template', '8');
INSERT INTO `migrations` VALUES ('16', '2022_08_17_084745_drop_tbl_project', '8');
INSERT INTO `migrations` VALUES ('17', '2022_08_17_085251_new_tbl_project', '8');
INSERT INTO `migrations` VALUES ('18', '2022_08_18_044649_tbl_log', '8');
INSERT INTO `migrations` VALUES ('19', '2022_08_18_051649_create_logs_table', '8');
INSERT INTO `migrations` VALUES ('20', '2022_08_25_075912_add_fields_tbl_project', '9');
INSERT INTO `migrations` VALUES ('21', '2022_08_25_082458_delete_start_end_date_fields_tbl_project', '10');
INSERT INTO `migrations` VALUES ('22', '2022_08_25_082646_add_start_end_date_fields_tbl_project', '11');
INSERT INTO `migrations` VALUES ('23', '2022_08_25_085955_add_fields_tbl_report', '12');
INSERT INTO `migrations` VALUES ('24', '2022_08_25_091201_delete_fields_tbl_report', '13');
INSERT INTO `migrations` VALUES ('25', '2022_08_25_091251_add_fields_total_alloc_desc_tbl_report', '14');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_project
-- ----------------------------
DROP TABLE IF EXISTS `tbl_project`;
CREATE TABLE `tbl_project` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `psdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_fund` double(8,2) DEFAULT NULL,
  `foreign_fund` double(8,2) DEFAULT NULL,
  `cost` double(8,2) DEFAULT '0.00',
  `start_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_project
-- ----------------------------
INSERT INTO `tbl_project` VALUES ('1', '123', 'KM123', 'Malachi Barry Project', '490.00', '300.00', '790.00', '08/01/2022', '08/15/2022', '08/31/2022', 'Y', '1', '1', '2022-08-28 06:36:10', '2022-08-28 06:36:10');
INSERT INTO `tbl_project` VALUES ('2', '456', 'DM456', 'Delgado Macon Project', '160.00', '550.00', '710.00', '08/01/2022', '08/15/2022', '08/30/2022', 'Y', '1', '1', '2022-08-28 11:25:12', '2022-08-28 11:25:12');
INSERT INTO `tbl_project` VALUES ('3', '789', 'GH789', 'Sloane Hinton Project', '870.00', '590.00', '1460.00', '07/01/2022', '08/01/2022', '09/01/2022', 'Y', '1', '1', '2022-08-29 09:38:17', '2022-08-29 09:38:17');
INSERT INTO `tbl_project` VALUES ('4', '159', 'SK159', 'Nina Todd Project', '690.00', '740.00', '1430.00', '08/01/2022', '08/15/2022', '08/31/2022', 'Y', '1', '1', '2022-08-30 07:39:30', '2022-08-30 07:39:30');
INSERT INTO `tbl_project` VALUES ('5', '4567', 'KM4567', 'Project Name', '521.00', '420.00', '941.00', '08/01/2022', '08/15/2022', '08/31/2022', 'Y', '1', '1', '2022-08-30 09:45:41', '2022-08-30 09:45:41');

-- ----------------------------
-- Table structure for tbl_report
-- ----------------------------
DROP TABLE IF EXISTS `tbl_report`;
CREATE TABLE `tbl_report` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fiscal_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(11) DEFAULT '0',
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_expend` double(8,2) DEFAULT '0.00',
  `alloc_rupee` double(8,2) DEFAULT '0.00',
  `alloc_foreign` double(8,2) DEFAULT '0.00',
  `alloc_revised` double(8,2) DEFAULT '0.00',
  `alloc_total` double(8,2) DEFAULT NULL,
  `release_fund_auth` double(8,2) DEFAULT '0.00',
  `release_fund_actual` double(8,2) DEFAULT '0.00',
  `release_foreign` double(8,2) DEFAULT '0.00',
  `release_total_actual` double(8,2) DEFAULT '0.00',
  `util_actual` double(8,2) DEFAULT '0.00',
  `util_foreign` double(8,2) DEFAULT '0.00',
  `util_total` double(8,2) DEFAULT '0.00',
  `amt_surrender` double(8,2) DEFAULT '0.00',
  `amt_lapsed` double(8,2) DEFAULT '0.00',
  `financial_prog` double(8,2) DEFAULT '0.00',
  `physical_prog` double(8,2) DEFAULT '0.00',
  `physical_prog_desc` text COLLATE utf8mb4_unicode_ci,
  `comp_date_likely` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_report
-- ----------------------------
INSERT INTO `tbl_report` VALUES ('1', '2022', '1', 'Malachi Barry Project', '06/01/2022', '0.00', '450.00', '50.00', null, '500.00', '23.00', '72.00', '76.00', '148.00', '31.00', '63.00', '94.00', '27.00', '57.00', '18.80', '18.00', 'Animi qui ea elit', '08/01/2022', 'Quod fuga Est facer', 'Neque nihil odit aut', 'Y', '1', '1', '2022-08-28 11:27:03', '2022-08-28 11:27:03');
INSERT INTO `tbl_report` VALUES ('2', '2022', '1', 'Malachi Barry Project', '06/02/2022', '0.00', '500.00', '50.00', '500.00', '550.00', '90.00', '33.00', '21.00', '54.00', '40.00', '10.00', '50.00', '80.00', '45.00', '9.09', '11.00', 'Eos possimus volup', '08/31/2022', 'Eos voluptates moles', 'Aut veritatis quis e', 'Y', '1', '1', '2022-08-28 11:27:58', '2022-08-28 11:27:58');
INSERT INTO `tbl_report` VALUES ('3', '2022', '2', 'Delgado Macon Project', '06/01/2022', '0.00', '500.00', '455.00', null, '955.00', '69.00', '545.00', '545.00', '1090.00', '54.00', '545.00', '599.00', '29.00', '36.00', '62.72', '3.00', 'Eaque nostrum dolore', '08/01/2022', 'Pariatur Facilis qu', 'Non eligendi autem t', 'Y', '1', '1', '2022-08-28 20:46:03', '2022-08-28 20:46:03');
INSERT INTO `tbl_report` VALUES ('4', '2022', '2', 'Delgado Macon Project', '06/02/2022', '0.00', '500.00', '455.00', null, '955.00', '500.00', '450.00', '654.00', '1104.00', '54.00', '54.00', '108.00', '50.00', '50.00', '11.31', '50.00', 'Some description', '08/31/2022', 'Some Remarks', 'Some Notes', 'Y', '1', '1', '2022-08-29 06:19:17', '2022-08-29 06:19:17');
INSERT INTO `tbl_report` VALUES ('5', '2021', '2', 'Delgado Macon Project', '06/01/2021', '0.00', '500.00', '455.00', null, '955.00', '50.00', '50.00', '50.00', '100.00', '45.00', '50.00', '95.00', '455.00', '544.00', '9.95', '54.00', 'Some Description', '08/31/2022', 'Remarks', 'Some Notes', 'Y', '1', '1', '2022-08-29 07:34:05', '2022-08-29 07:34:05');
INSERT INTO `tbl_report` VALUES ('6', '2022', '3', 'Sloane Hinton Project', '06/01/2022', '0.00', '50.00', '45.00', null, '95.00', '18.00', '31.00', '74.00', '105.00', '3.00', '2.00', '5.00', '90.00', '48.00', '5.26', '21.00', 'Ipsum dolore consequ', '08/01/2022', 'Laboriosam officiis', 'Qui quia voluptatum', 'Y', '1', '1', '2022-08-29 09:38:53', '2022-08-29 09:38:53');
INSERT INTO `tbl_report` VALUES ('7', '2022', '3', 'Sloane Hinton Project', '06/02/2022', '0.00', '100.00', '45.00', '100.00', '145.00', '50.00', '100.00', '500.00', '600.00', '50.00', '45.00', '95.00', '50.00', '45.00', '65.52', '54.00', 'Some description', '08/01/2022', 'Some remarks', 'Some notes', 'Y', '1', '1', '2022-08-29 09:40:58', '2022-08-29 09:40:58');
INSERT INTO `tbl_report` VALUES ('8', '2022', '5', 'Project Name', '06/01/2022', '0.00', '100.00', '50.00', null, '150.00', '45.00', '520.00', '45.00', '565.00', '50.00', null, '50.00', '50.00', null, '3.33', '45.00', 'Description', '08/01/2022', 'Remarks', 'Notes', 'Y', '1', '1', '2022-08-30 09:49:31', '2022-08-30 09:49:31');

-- ----------------------------
-- Table structure for tbl_report_log
-- ----------------------------
DROP TABLE IF EXISTS `tbl_report_log`;
CREATE TABLE `tbl_report_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(11) DEFAULT '0',
  `project_id` int(11) DEFAULT '0',
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT '0',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tbl_report_log
-- ----------------------------
INSERT INTO `tbl_report_log` VALUES ('1', '1', '1', 'Malachi Barry Project', '{\"_token\":\"rl3UzZdlo8WDe93uXd6oi8SB6FwKcaSipPlprEDG\",\"project_id\":\"1\",\"project\":\"Malachi Barry Project\",\"fiscal_year\":\"2022\",\"date\":\"06\\/01\\/2022\",\"alloc_rupee\":\"450\",\"alloc_foreign\":\"50\",\"alloc_total\":\"500\",\"alloc_revised\":null,\"release_fund_auth\":\"23\",\"release_fund_actual\":\"72\",\"release_foreign\":\"76\",\"release_total_actual\":\"148\",\"util_actual\":\"31\",\"util_foreign\":\"63\",\"util_total\":\"94\",\"amt_surrender\":\"27\",\"amt_lapsed\":\"57\",\"financial_prog\":\"18.80\",\"physical_prog\":\"18\",\"physical_prog_desc\":\"Animi qui ea elit\",\"comp_date_likely\":\"08\\/01\\/2022\",\"remarks\":\"Quod fuga Est facer\",\"note\":\"Neque nihil odit aut\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-28 11:27:03', '2022-08-28 11:27:03');
INSERT INTO `tbl_report_log` VALUES ('2', '2', '1', 'Malachi Barry Project', '{\"_token\":\"rl3UzZdlo8WDe93uXd6oi8SB6FwKcaSipPlprEDG\",\"project_id\":\"1\",\"project\":\"Malachi Barry Project\",\"fiscal_year\":\"2022\",\"date\":\"06\\/02\\/2022\",\"alloc_rupee\":\"500\",\"alloc_foreign\":\"50\",\"alloc_total\":\"550\",\"alloc_revised\":\"500\",\"release_fund_auth\":\"90\",\"release_fund_actual\":\"33\",\"release_foreign\":\"21\",\"release_total_actual\":\"54\",\"util_actual\":\"40\",\"util_foreign\":\"10\",\"util_total\":\"50\",\"amt_surrender\":\"80\",\"amt_lapsed\":\"45\",\"financial_prog\":\"9.09\",\"physical_prog\":\"11\",\"physical_prog_desc\":\"Eos possimus volup\",\"comp_date_likely\":\"08\\/31\\/2022\",\"remarks\":\"Eos voluptates moles\",\"note\":\"Aut veritatis quis e\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-28 11:27:58', '2022-08-28 11:27:58');
INSERT INTO `tbl_report_log` VALUES ('3', '3', '2', 'Delgado Macon Project', '{\"_token\":\"oGBHGZ0IH9yJBRia9hJSU0DnDSZtqcDMrhTnqEOk\",\"project_id\":\"2\",\"project\":\"Delgado Macon Project\",\"fiscal_year\":\"2022\",\"date\":\"06\\/01\\/2022\",\"alloc_rupee\":\"500\",\"alloc_foreign\":\"455\",\"alloc_total\":\"955\",\"alloc_revised\":null,\"release_fund_auth\":\"69\",\"release_fund_actual\":\"545\",\"release_foreign\":\"545\",\"release_total_actual\":\"1090\",\"util_actual\":\"54\",\"util_foreign\":\"545\",\"util_total\":\"599\",\"amt_surrender\":\"29\",\"amt_lapsed\":\"36\",\"financial_prog\":\"62.72\",\"physical_prog\":\"3\",\"physical_prog_desc\":\"Eaque nostrum dolore\",\"comp_date_likely\":\"08\\/01\\/2022\",\"remarks\":\"Pariatur Facilis qu\",\"note\":\"Non eligendi autem t\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-28 20:46:03', '2022-08-28 20:46:03');
INSERT INTO `tbl_report_log` VALUES ('4', '4', '2', 'Delgado Macon Project', '{\"_token\":\"11eG8Aoo7uxl2g6OwbLaoKqP6PZEf0oEsKZBBXHj\",\"project_id\":\"2\",\"project\":\"Delgado Macon Project\",\"fiscal_year\":\"2022\",\"date\":\"06\\/02\\/2022\",\"alloc_rupee\":\"500\",\"alloc_foreign\":\"455\",\"alloc_total\":\"955\",\"alloc_revised\":null,\"release_fund_auth\":\"500\",\"release_fund_actual\":\"450\",\"release_foreign\":\"654\",\"release_total_actual\":\"1104\",\"util_actual\":\"54\",\"util_foreign\":\"54\",\"util_total\":\"108\",\"amt_surrender\":\"50\",\"amt_lapsed\":\"50\",\"financial_prog\":\"11.31\",\"physical_prog\":\"50\",\"physical_prog_desc\":\"Some description\",\"comp_date_likely\":\"08\\/31\\/2022\",\"remarks\":\"Some Remarks\",\"note\":\"Some Notes\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-29 06:19:17', '2022-08-29 06:19:17');
INSERT INTO `tbl_report_log` VALUES ('5', '5', '2', 'Delgado Macon Project', '{\"_token\":\"11eG8Aoo7uxl2g6OwbLaoKqP6PZEf0oEsKZBBXHj\",\"project_id\":\"2\",\"project\":\"Delgado Macon Project\",\"fiscal_year\":\"2021\",\"date\":\"06\\/01\\/2021\",\"alloc_rupee\":\"500\",\"alloc_foreign\":\"455\",\"alloc_total\":\"955\",\"alloc_revised\":null,\"release_fund_auth\":\"50\",\"release_fund_actual\":\"50\",\"release_foreign\":\"50\",\"release_total_actual\":\"100\",\"util_actual\":\"45\",\"util_foreign\":\"50\",\"util_total\":\"95\",\"amt_surrender\":\"455\",\"amt_lapsed\":\"544\",\"financial_prog\":\"9.95\",\"physical_prog\":\"54\",\"physical_prog_desc\":\"Some Description\",\"comp_date_likely\":\"08\\/31\\/2022\",\"remarks\":\"Remarks\",\"note\":\"Some Notes\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-29 07:34:06', '2022-08-29 07:34:06');
INSERT INTO `tbl_report_log` VALUES ('6', '6', '3', 'Sloane Hinton Project', '{\"_token\":\"11eG8Aoo7uxl2g6OwbLaoKqP6PZEf0oEsKZBBXHj\",\"project_id\":\"3\",\"project\":\"Sloane Hinton Project\",\"fiscal_year\":\"2022\",\"date\":\"06\\/01\\/2022\",\"alloc_rupee\":\"50\",\"alloc_foreign\":\"45\",\"alloc_total\":\"95\",\"alloc_revised\":null,\"release_fund_auth\":\"18\",\"release_fund_actual\":\"31\",\"release_foreign\":\"74\",\"release_total_actual\":\"105\",\"util_actual\":\"3\",\"util_foreign\":\"2\",\"util_total\":\"5\",\"amt_surrender\":\"90\",\"amt_lapsed\":\"48\",\"financial_prog\":\"5.26\",\"physical_prog\":\"21\",\"physical_prog_desc\":\"Ipsum dolore consequ\",\"comp_date_likely\":\"08\\/01\\/2022\",\"remarks\":\"Laboriosam officiis\",\"note\":\"Qui quia voluptatum\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-29 09:38:53', '2022-08-29 09:38:53');
INSERT INTO `tbl_report_log` VALUES ('7', '7', '3', 'Sloane Hinton Project', '{\"_token\":\"11eG8Aoo7uxl2g6OwbLaoKqP6PZEf0oEsKZBBXHj\",\"project_id\":\"3\",\"project\":\"Sloane Hinton Project\",\"fiscal_year\":\"2022\",\"date\":\"06\\/02\\/2022\",\"alloc_rupee\":\"100\",\"alloc_foreign\":\"45\",\"alloc_total\":\"145\",\"alloc_revised\":\"100\",\"release_fund_auth\":\"50\",\"release_fund_actual\":\"100\",\"release_foreign\":\"500\",\"release_total_actual\":\"600\",\"util_actual\":\"50\",\"util_foreign\":\"45\",\"util_total\":\"95\",\"amt_surrender\":\"50\",\"amt_lapsed\":\"45\",\"financial_prog\":\"65.52\",\"physical_prog\":\"54\",\"physical_prog_desc\":\"Some description\",\"comp_date_likely\":\"08\\/01\\/2022\",\"remarks\":\"Some remarks\",\"note\":\"Some notes\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-29 09:40:59', '2022-08-29 09:40:59');
INSERT INTO `tbl_report_log` VALUES ('8', '8', '5', 'Project Name', '{\"_token\":\"Nbwqoe2Uw1KiizhiuWoikhgTJp4GFu6IzvWTpJmY\",\"project_id\":\"5\",\"project\":\"Project Name\",\"fiscal_year\":\"2022\",\"date\":\"06\\/01\\/2022\",\"alloc_rupee\":\"100\",\"alloc_foreign\":\"50\",\"alloc_total\":\"150\",\"alloc_revised\":null,\"release_fund_auth\":\"45\",\"release_fund_actual\":\"520\",\"release_foreign\":\"45\",\"release_total_actual\":\"565\",\"util_actual\":\"50\",\"util_foreign\":null,\"util_total\":\"50\",\"amt_surrender\":\"50\",\"amt_lapsed\":null,\"financial_prog\":\"3.33\",\"physical_prog\":\"45\",\"physical_prog_desc\":\"Description\",\"comp_date_likely\":\"08\\/01\\/2022\",\"remarks\":\"Remarks\",\"note\":\"Notes\",\"created_by\":1,\"updated_by\":1,\"status\":\"Y\"}', '1', 'add', '2022-08-30 09:49:31', '2022-08-30 09:49:31');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Idola Hoffman', 'admin', 'idola@mailinator.com', null, '$2y$10$RVRgNTL0k/0gq2PkisK96..2/hGNvRL4G0vQl2odeob30Bkov0Cbq', 'q7eCHySpSaA58d4RcB2TKEO9WUawzfUwO9Ky79enlrUn70YkFUhNozFoqf6u', '2022-08-04 05:04:29', '2022-08-04 05:04:29');
INSERT INTO `users` VALUES ('2', 'Patrick Bartlett', 'pat', 'pibuqosu@mailinator.com', null, '$2y$10$RVRgNTL0k/0gq2PkisK96..2/hGNvRL4G0vQl2odeob30Bkov0Cbq', null, '2022-08-04 07:02:08', '2022-08-04 07:02:08');
