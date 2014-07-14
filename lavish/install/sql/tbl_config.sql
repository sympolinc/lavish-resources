CREATE TABLE `%pre%tbl_config` (
  `master_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'The master identifier of the configuration setting.',
  `comp_id` bigint(20) DEFAULT '0' COMMENT 'The company id the setting is for.',
  `module` varchar(50) DEFAULT 'ALL' COMMENT 'The module the configuration setting is for.',
  `config_key` varchar(45) DEFAULT NULL COMMENT 'The name of the setting.',
  `config_value` text COMMENT 'The value of the setting.',
  `sys_config` bit(1) DEFAULT NULL COMMENT 'Whether it is a system configuration. If true the settings can''t be deleted.',
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='The configuration table for all companies within the instance.';

