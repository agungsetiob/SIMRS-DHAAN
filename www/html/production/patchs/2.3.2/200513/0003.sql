USE inacbg;

ALTER TABLE `hasil_grouping`
	ADD COLUMN `INA_GROUPER_MDC_NUMBER` CHAR(4) NULL DEFAULT NULL AFTER `RESPONSE`,
	ADD COLUMN `INA_GROUPER_MDC_DESCRIPTION` VARCHAR(1000) NULL DEFAULT NULL AFTER `INA_GROUPER_MDC_NUMBER`,
	ADD COLUMN `INA_GROUPER_DRG_CODE` CHAR(10) NULL DEFAULT NULL AFTER `INA_GROUPER_MDC_DESCRIPTION`,
	ADD COLUMN `INA_GROUPER_DRG_DESCRIPTION` VARCHAR(1000) NULL DEFAULT NULL AFTER `INA_GROUPER_DRG_CODE`;


ALTER TABLE `hasil_grouping`
	ADD COLUMN `TOP_UP_RAWAT_GROSS` INT NOT NULL DEFAULT '0' AFTER `INA_GROUPER_DRG_DESCRIPTION`,
	ADD COLUMN `TOP_UP_RAWAT_FACTOR` DECIMAL(10,2) NOT NULL DEFAULT 0 AFTER `TOP_UP_RAWAT_GROSS`,
	ADD COLUMN `TOP_UP_RAWAT` INT NOT NULL DEFAULT 0 AFTER `TOP_UP_RAWAT_FACTOR`,
	ADD COLUMN `TOP_UP_JENAZAH` INT NOT NULL DEFAULT 0 AFTER `TOP_UP_RAWAT`;

ALTER TABLE `hasil_grouping`
	ADD COLUMN `COVID_19_DESCRIPTION` VARCHAR(500) NULL AFTER `TOP_UP_JENAZAH`;

ALTER TABLE `map_inacbg_simrs`
	ADD COLUMN `STATUS` TINYINT NOT NULL DEFAULT '1' COMMENT '1=Aktif; 2=Non Aktif' AFTER `VERSION`;

UPDATE `inacbg`.`map_inacbg_simrs` SET `STATUS`='0' WHERE `JENIS`=3 AND `INACBG`='5' AND `SIMRS`='2' AND `VERSION`='4';
