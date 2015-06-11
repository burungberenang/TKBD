
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- fakultas
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fakultas`;


CREATE TABLE `fakultas`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(45),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- golongan
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `golongan`;


CREATE TABLE `golongan`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`kode` VARCHAR(45)  NOT NULL,
	`gaji_pokok` DECIMAL(20,2),
	`gaji_sks` DECIMAL(20,2),
	`gaji_sks_inggris` DECIMAL(20,2),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- hari
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `hari`;


CREATE TABLE `hari`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(45),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- jam
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `jam`;


CREATE TABLE `jam`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`jam` VARCHAR(45),
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- jadwal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `jadwal`;


CREATE TABLE `jadwal`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`Jam_id` INTEGER  NOT NULL,
	`Hari_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `jadwal_FI_1` (`Jam_id`),
	CONSTRAINT `jadwal_FK_1`
		FOREIGN KEY (`Jam_id`)
		REFERENCES `jam` (`id`)
		ON DELETE CASCADE,
	INDEX `jadwal_FI_2` (`Hari_id`),
	CONSTRAINT `jadwal_FK_2`
		FOREIGN KEY (`Hari_id`)
		REFERENCES `hari` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- jurusan
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `jurusan`;


CREATE TABLE `jurusan`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(45),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`Fakultas_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `jurusan_FI_1` (`Fakultas_id`),
	CONSTRAINT `jurusan_FK_1`
		FOREIGN KEY (`Fakultas_id`)
		REFERENCES `fakultas` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- matakuliah
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `matakuliah`;


CREATE TABLE `matakuliah`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`kodeMk` VARCHAR(45),
	`nama` VARCHAR(45),
	`sks` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`Jurusan_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `matakuliah_FI_1` (`Jurusan_id`),
	CONSTRAINT `matakuliah_FK_1`
		FOREIGN KEY (`Jurusan_id`)
		REFERENCES `jurusan` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- dosen
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `dosen`;


CREATE TABLE `dosen`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`npk` VARCHAR(20)  NOT NULL,
	`nama` VARCHAR(45)  NOT NULL,
	`alamat` TEXT,
	`tgl_lahir` DATE,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`Golongan_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `dosen_npk_unique` (`npk`),
	INDEX `dosen_FI_1` (`Golongan_id`),
	CONSTRAINT `dosen_FK_1`
		FOREIGN KEY (`Golongan_id`)
		REFERENCES `golongan` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- slipgaji
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `slipgaji`;


CREATE TABLE `slipgaji`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`grand_total` DECIMAL(20,2),
	`pajak` DECIMAL(20,2),
	`created_at` DATETIME,
	`Dosen_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `slipgaji_FI_1` (`Dosen_id`),
	CONSTRAINT `slipgaji_FK_1`
		FOREIGN KEY (`Dosen_id`)
		REFERENCES `dosen` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- mahasiswa
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mahasiswa`;


CREATE TABLE `mahasiswa`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nrp` VARCHAR(10)  NOT NULL,
	`nama` VARCHAR(45)  NOT NULL,
	`alamat` TEXT,
	`tgl_lahir` DATE,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `mahasiswa_nrp_unique` (`nrp`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kelasparalel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kelasparalel`;


CREATE TABLE `kelasparalel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(45),
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`MataKuliah_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `kelasparalel_FI_1` (`MataKuliah_id`),
	CONSTRAINT `kelasparalel_FK_1`
		FOREIGN KEY (`MataKuliah_id`)
		REFERENCES `matakuliah` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- absensi
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `absensi`;


CREATE TABLE `absensi`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dosen_id` INTEGER  NOT NULL,
	`materi` TEXT,
	`minggu_ke` INTEGER,
	`tanggal` DATE,
	`sks_nyata` INTEGER  NOT NULL,
	`jam_hadir_dosen` TIME,
	`jam_keluar_dosen` TIME,
	`KelasParalel_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `absensi_FI_1` (`dosen_id`),
	CONSTRAINT `absensi_FK_1`
		FOREIGN KEY (`dosen_id`)
		REFERENCES `dosen` (`id`)
		ON DELETE CASCADE,
	INDEX `absensi_FI_2` (`KelasParalel_id`),
	CONSTRAINT `absensi_FK_2`
		FOREIGN KEY (`KelasParalel_id`)
		REFERENCES `kelasparalel` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kelasparalel_has_dosen
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kelasparalel_has_dosen`;


CREATE TABLE `kelasparalel_has_dosen`
(
	`KelasParalel_id` INTEGER  NOT NULL,
	`Dosen_id` INTEGER  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `kelasparalel_has_dosen_FI_1` (`KelasParalel_id`),
	CONSTRAINT `kelasparalel_has_dosen_FK_1`
		FOREIGN KEY (`KelasParalel_id`)
		REFERENCES `kelasparalel` (`id`)
		ON DELETE CASCADE,
	INDEX `kelasparalel_has_dosen_FI_2` (`Dosen_id`),
	CONSTRAINT `kelasparalel_has_dosen_FK_2`
		FOREIGN KEY (`Dosen_id`)
		REFERENCES `dosen` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kelasparalel_has_jadwal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kelasparalel_has_jadwal`;


CREATE TABLE `kelasparalel_has_jadwal`
(
	`KelasParalel_id` INTEGER  NOT NULL,
	`Jadwal_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `kelasparalel_has_jadwal_FI_1` (`KelasParalel_id`),
	CONSTRAINT `kelasparalel_has_jadwal_FK_1`
		FOREIGN KEY (`KelasParalel_id`)
		REFERENCES `kelasparalel` (`id`)
		ON DELETE CASCADE,
	INDEX `kelasparalel_has_jadwal_FI_2` (`Jadwal_id`),
	CONSTRAINT `kelasparalel_has_jadwal_FK_2`
		FOREIGN KEY (`Jadwal_id`)
		REFERENCES `jadwal` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- mahasiswa_has_absensi
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mahasiswa_has_absensi`;


CREATE TABLE `mahasiswa_has_absensi`
(
	`Mahasiswa_id` INTEGER  NOT NULL,
	`Absensi_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `mahasiswa_has_absensi_FI_1` (`Mahasiswa_id`),
	CONSTRAINT `mahasiswa_has_absensi_FK_1`
		FOREIGN KEY (`Mahasiswa_id`)
		REFERENCES `mahasiswa` (`id`)
		ON DELETE CASCADE,
	INDEX `mahasiswa_has_absensi_FI_2` (`Absensi_id`),
	CONSTRAINT `mahasiswa_has_absensi_FK_2`
		FOREIGN KEY (`Absensi_id`)
		REFERENCES `absensi` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- mahasiswa_has_kelasparalel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mahasiswa_has_kelasparalel`;


CREATE TABLE `mahasiswa_has_kelasparalel`
(
	`Mahasiswa_id` INTEGER  NOT NULL,
	`KelasParalel_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `mahasiswa_has_kelasparalel_FI_1` (`Mahasiswa_id`),
	CONSTRAINT `mahasiswa_has_kelasparalel_FK_1`
		FOREIGN KEY (`Mahasiswa_id`)
		REFERENCES `mahasiswa` (`id`)
		ON DELETE CASCADE,
	INDEX `mahasiswa_has_kelasparalel_FI_2` (`KelasParalel_id`),
	CONSTRAINT `mahasiswa_has_kelasparalel_FK_2`
		FOREIGN KEY (`KelasParalel_id`)
		REFERENCES `kelasparalel` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
