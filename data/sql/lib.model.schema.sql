
-----------------------------------------------------------------------------
-- fakultas
-----------------------------------------------------------------------------

DROP TABLE "fakultas" CASCADE;

DROP SEQUENCE "fakultas_seq";

CREATE SEQUENCE "fakultas_seq";


CREATE TABLE "fakultas"
(
	"id" INTEGER  NOT NULL,
	"nama" VARCHAR(45),
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "fakultas" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- golongan
-----------------------------------------------------------------------------

DROP TABLE "golongan" CASCADE;

DROP SEQUENCE "golongan_seq";

CREATE SEQUENCE "golongan_seq";


CREATE TABLE "golongan"
(
	"id" INTEGER  NOT NULL,
	"kode" VARCHAR(45)  NOT NULL,
	"gaji_pokok" NUMERIC(20,2),
	"gaji_sks" NUMERIC(20,2),
	"gaji_sks_inggris" NUMERIC(20,2),
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "golongan" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- hari
-----------------------------------------------------------------------------

DROP TABLE "hari" CASCADE;

DROP SEQUENCE "hari_seq";

CREATE SEQUENCE "hari_seq";


CREATE TABLE "hari"
(
	"id" INTEGER  NOT NULL,
	"nama" VARCHAR(45),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "hari" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- jam
-----------------------------------------------------------------------------

DROP TABLE "jam" CASCADE;

DROP SEQUENCE "jam_seq";

CREATE SEQUENCE "jam_seq";


CREATE TABLE "jam"
(
	"id" INTEGER  NOT NULL,
	"jam" VARCHAR(45),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "jam" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- jadwal
-----------------------------------------------------------------------------

DROP TABLE "jadwal" CASCADE;

DROP SEQUENCE "jadwal_seq";

CREATE SEQUENCE "jadwal_seq";


CREATE TABLE "jadwal"
(
	"id" INTEGER  NOT NULL,
	"Jam_id" INTEGER  NOT NULL,
	"Hari_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "jadwal" IS '';


SET search_path TO public;
ALTER TABLE "jadwal" ADD CONSTRAINT "jadwal_FK_1" FOREIGN KEY ("Jam_id") REFERENCES "jam" ("id") ON DELETE CASCADE;

ALTER TABLE "jadwal" ADD CONSTRAINT "jadwal_FK_2" FOREIGN KEY ("Hari_id") REFERENCES "hari" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- jurusan
-----------------------------------------------------------------------------

DROP TABLE "jurusan" CASCADE;

DROP SEQUENCE "jurusan_seq";

CREATE SEQUENCE "jurusan_seq";


CREATE TABLE "jurusan"
(
	"id" INTEGER  NOT NULL,
	"nama" VARCHAR(45),
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"Fakultas_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "jurusan" IS '';


SET search_path TO public;
ALTER TABLE "jurusan" ADD CONSTRAINT "jurusan_FK_1" FOREIGN KEY ("Fakultas_id") REFERENCES "fakultas" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- matakuliah
-----------------------------------------------------------------------------

DROP TABLE "matakuliah" CASCADE;

DROP SEQUENCE "matakuliah_seq";

CREATE SEQUENCE "matakuliah_seq";


CREATE TABLE "matakuliah"
(
	"id" INTEGER  NOT NULL,
	"kodeMk" VARCHAR(45),
	"nama" VARCHAR(45),
	"sks" INTEGER,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"Jurusan_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "matakuliah" IS '';


SET search_path TO public;
ALTER TABLE "matakuliah" ADD CONSTRAINT "matakuliah_FK_1" FOREIGN KEY ("Jurusan_id") REFERENCES "jurusan" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- dosen
-----------------------------------------------------------------------------

DROP TABLE "dosen" CASCADE;

DROP SEQUENCE "dosen_seq";

CREATE SEQUENCE "dosen_seq";


CREATE TABLE "dosen"
(
	"id" INTEGER  NOT NULL,
	"npk" VARCHAR(20)  NOT NULL,
	"nama" VARCHAR(45)  NOT NULL,
	"alamat" TEXT,
	"tgl_lahir" DATE,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"Golongan_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id"),
	CONSTRAINT "dosen_npk_unique" UNIQUE ("npk")
);

COMMENT ON TABLE "dosen" IS '';


SET search_path TO public;
ALTER TABLE "dosen" ADD CONSTRAINT "dosen_FK_1" FOREIGN KEY ("Golongan_id") REFERENCES "golongan" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- slipgaji
-----------------------------------------------------------------------------

DROP TABLE "slipgaji" CASCADE;

DROP SEQUENCE "slipgaji_seq";

CREATE SEQUENCE "slipgaji_seq";


CREATE TABLE "slipgaji"
(
	"id" INTEGER  NOT NULL,
	"grand_total" NUMERIC(20,2),
	"pajak" NUMERIC(20,2),
	"created_at" TIMESTAMP,
	"Dosen_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "slipgaji" IS '';


SET search_path TO public;
ALTER TABLE "slipgaji" ADD CONSTRAINT "slipgaji_FK_1" FOREIGN KEY ("Dosen_id") REFERENCES "dosen" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- mahasiswa
-----------------------------------------------------------------------------

DROP TABLE "mahasiswa" CASCADE;

DROP SEQUENCE "mahasiswa_seq";

CREATE SEQUENCE "mahasiswa_seq";


CREATE TABLE "mahasiswa"
(
	"id" INTEGER  NOT NULL,
	"nrp" VARCHAR(10)  NOT NULL,
	"nama" VARCHAR(45)  NOT NULL,
	"alamat" TEXT,
	"tgl_lahir" DATE,
	"Jurusan_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	PRIMARY KEY ("id"),
	CONSTRAINT "mahasiswa_nrp_unique" UNIQUE ("nrp")
);

COMMENT ON TABLE "mahasiswa" IS '';


SET search_path TO public;
ALTER TABLE "mahasiswa" ADD CONSTRAINT "mahasiswa_FK_1" FOREIGN KEY ("Jurusan_id") REFERENCES "jurusan" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- kelasparalel
-----------------------------------------------------------------------------

DROP TABLE "kelasparalel" CASCADE;

DROP SEQUENCE "kelasparalel_seq";

CREATE SEQUENCE "kelasparalel_seq";


CREATE TABLE "kelasparalel"
(
	"id" INTEGER  NOT NULL,
	"nama" VARCHAR(45),
	"status" INTEGER,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"MataKuliah_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "kelasparalel" IS '';


SET search_path TO public;
ALTER TABLE "kelasparalel" ADD CONSTRAINT "kelasparalel_FK_1" FOREIGN KEY ("MataKuliah_id") REFERENCES "matakuliah" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- absensi
-----------------------------------------------------------------------------

DROP TABLE "absensi" CASCADE;

DROP SEQUENCE "absensi_seq";

CREATE SEQUENCE "absensi_seq";


CREATE TABLE "absensi"
(
	"id" INTEGER  NOT NULL,
	"dosen_id" INTEGER  NOT NULL,
	"materi" TEXT,
	"minggu_ke" INTEGER,
	"tanggal" DATE,
	"sks_nyata" INTEGER  NOT NULL,
	"status" INTEGER  NOT NULL,
	"jam_hadir_dosen" TIME,
	"jam_keluar_dosen" TIME,
	"KelasParalel_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "absensi" IS '';


SET search_path TO public;
ALTER TABLE "absensi" ADD CONSTRAINT "absensi_FK_1" FOREIGN KEY ("dosen_id") REFERENCES "dosen" ("id") ON DELETE CASCADE;

ALTER TABLE "absensi" ADD CONSTRAINT "absensi_FK_2" FOREIGN KEY ("KelasParalel_id") REFERENCES "kelasparalel" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- kelasparalel_has_dosen
-----------------------------------------------------------------------------

DROP TABLE "kelasparalel_has_dosen" CASCADE;

DROP SEQUENCE "kelasparalel_has_dosen_seq";

CREATE SEQUENCE "kelasparalel_has_dosen_seq";


CREATE TABLE "kelasparalel_has_dosen"
(
	"KelasParalel_id" INTEGER  NOT NULL,
	"Dosen_id" INTEGER  NOT NULL,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "kelasparalel_has_dosen" IS '';


SET search_path TO public;
ALTER TABLE "kelasparalel_has_dosen" ADD CONSTRAINT "kelasparalel_has_dosen_FK_1" FOREIGN KEY ("KelasParalel_id") REFERENCES "kelasparalel" ("id") ON DELETE CASCADE;

ALTER TABLE "kelasparalel_has_dosen" ADD CONSTRAINT "kelasparalel_has_dosen_FK_2" FOREIGN KEY ("Dosen_id") REFERENCES "dosen" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- kelasparalel_has_jadwal
-----------------------------------------------------------------------------

DROP TABLE "kelasparalel_has_jadwal" CASCADE;

DROP SEQUENCE "kelasparalel_has_jadwal_seq";

CREATE SEQUENCE "kelasparalel_has_jadwal_seq";


CREATE TABLE "kelasparalel_has_jadwal"
(
	"KelasParalel_id" INTEGER  NOT NULL,
	"Jadwal_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "kelasparalel_has_jadwal" IS '';


SET search_path TO public;
ALTER TABLE "kelasparalel_has_jadwal" ADD CONSTRAINT "kelasparalel_has_jadwal_FK_1" FOREIGN KEY ("KelasParalel_id") REFERENCES "kelasparalel" ("id") ON DELETE CASCADE;

ALTER TABLE "kelasparalel_has_jadwal" ADD CONSTRAINT "kelasparalel_has_jadwal_FK_2" FOREIGN KEY ("Jadwal_id") REFERENCES "jadwal" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- mahasiswa_has_absensi
-----------------------------------------------------------------------------

DROP TABLE "mahasiswa_has_absensi" CASCADE;

DROP SEQUENCE "mahasiswa_has_absensi_seq";

CREATE SEQUENCE "mahasiswa_has_absensi_seq";


CREATE TABLE "mahasiswa_has_absensi"
(
	"Mahasiswa_id" INTEGER  NOT NULL,
	"Absensi_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "mahasiswa_has_absensi" IS '';


SET search_path TO public;
ALTER TABLE "mahasiswa_has_absensi" ADD CONSTRAINT "mahasiswa_has_absensi_FK_1" FOREIGN KEY ("Mahasiswa_id") REFERENCES "mahasiswa" ("id") ON DELETE CASCADE;

ALTER TABLE "mahasiswa_has_absensi" ADD CONSTRAINT "mahasiswa_has_absensi_FK_2" FOREIGN KEY ("Absensi_id") REFERENCES "absensi" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- mahasiswa_has_kelasparalel
-----------------------------------------------------------------------------

DROP TABLE "mahasiswa_has_kelasparalel" CASCADE;

DROP SEQUENCE "mahasiswa_has_kelasparalel_seq";

CREATE SEQUENCE "mahasiswa_has_kelasparalel_seq";


CREATE TABLE "mahasiswa_has_kelasparalel"
(
	"Mahasiswa_id" INTEGER  NOT NULL,
	"KelasParalel_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "mahasiswa_has_kelasparalel" IS '';


SET search_path TO public;
ALTER TABLE "mahasiswa_has_kelasparalel" ADD CONSTRAINT "mahasiswa_has_kelasparalel_FK_1" FOREIGN KEY ("Mahasiswa_id") REFERENCES "mahasiswa" ("id") ON DELETE CASCADE;

ALTER TABLE "mahasiswa_has_kelasparalel" ADD CONSTRAINT "mahasiswa_has_kelasparalel_FK_2" FOREIGN KEY ("KelasParalel_id") REFERENCES "kelasparalel" ("id") ON DELETE CASCADE;
