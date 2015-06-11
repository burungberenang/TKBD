
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
	"jam_id" INTEGER  NOT NULL,
	"hari_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "jadwal" IS '';


SET search_path TO public;
ALTER TABLE "jadwal" ADD CONSTRAINT "jadwal_FK_1" FOREIGN KEY ("jam_id") REFERENCES "jam" ("id") ON DELETE CASCADE;

ALTER TABLE "jadwal" ADD CONSTRAINT "jadwal_FK_2" FOREIGN KEY ("hari_id") REFERENCES "hari" ("id") ON DELETE CASCADE;

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
	"fakultas_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "jurusan" IS '';


SET search_path TO public;
ALTER TABLE "jurusan" ADD CONSTRAINT "jurusan_FK_1" FOREIGN KEY ("fakultas_id") REFERENCES "fakultas" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- mata_kuliah
-----------------------------------------------------------------------------

DROP TABLE "mata_kuliah" CASCADE;

DROP SEQUENCE "mata_kuliah_seq";

CREATE SEQUENCE "mata_kuliah_seq";


CREATE TABLE "mata_kuliah"
(
	"id" INTEGER  NOT NULL,
	"kodeMk" VARCHAR(45),
	"nama" VARCHAR(45),
	"sks" INTEGER,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"jurusan_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "mata_kuliah" IS '';


SET search_path TO public;
ALTER TABLE "mata_kuliah" ADD CONSTRAINT "mata_kuliah_FK_1" FOREIGN KEY ("jurusan_id") REFERENCES "jurusan" ("id") ON DELETE CASCADE;

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
	"golongan_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id"),
	CONSTRAINT "dosen_npk_unique" UNIQUE ("npk")
);

COMMENT ON TABLE "dosen" IS '';


SET search_path TO public;
ALTER TABLE "dosen" ADD CONSTRAINT "dosen_FK_1" FOREIGN KEY ("golongan_id") REFERENCES "golongan" ("id") ON DELETE CASCADE;

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
	"dosen_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "slipgaji" IS '';


SET search_path TO public;
ALTER TABLE "slipgaji" ADD CONSTRAINT "slipgaji_FK_1" FOREIGN KEY ("dosen_id") REFERENCES "dosen" ("id") ON DELETE CASCADE;

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
	"jurusan_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	PRIMARY KEY ("id"),
	CONSTRAINT "mahasiswa_nrp_unique" UNIQUE ("nrp")
);

COMMENT ON TABLE "mahasiswa" IS '';


SET search_path TO public;
ALTER TABLE "mahasiswa" ADD CONSTRAINT "mahasiswa_FK_1" FOREIGN KEY ("jurusan_id") REFERENCES "jurusan" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- kelas_palalel
-----------------------------------------------------------------------------

DROP TABLE "kelas_palalel" CASCADE;

DROP SEQUENCE "kelas_palalel_seq";

CREATE SEQUENCE "kelas_palalel_seq";


CREATE TABLE "kelas_palalel"
(
	"id" INTEGER  NOT NULL,
	"nama" VARCHAR(45),
	"status" INTEGER,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"mata_kuliah_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "kelas_palalel" IS '';


SET search_path TO public;
ALTER TABLE "kelas_palalel" ADD CONSTRAINT "kelas_palalel_FK_1" FOREIGN KEY ("mata_kuliah_id") REFERENCES "mata_kuliah" ("id") ON DELETE CASCADE;

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
	"kelas_paralel_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "absensi" IS '';


SET search_path TO public;
ALTER TABLE "absensi" ADD CONSTRAINT "absensi_FK_1" FOREIGN KEY ("dosen_id") REFERENCES "dosen" ("id") ON DELETE CASCADE;

ALTER TABLE "absensi" ADD CONSTRAINT "absensi_FK_2" FOREIGN KEY ("kelas_paralel_id") REFERENCES "kelas_palalel" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- kelas_paralel_has_dosen
-----------------------------------------------------------------------------

DROP TABLE "kelas_paralel_has_dosen" CASCADE;

DROP SEQUENCE "kelas_paralel_has_dosen_seq";

CREATE SEQUENCE "kelas_paralel_has_dosen_seq";


CREATE TABLE "kelas_paralel_has_dosen"
(
	"kelas_paralel_id" INTEGER  NOT NULL,
	"dosen_id" INTEGER  NOT NULL,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "kelas_paralel_has_dosen" IS '';


SET search_path TO public;
ALTER TABLE "kelas_paralel_has_dosen" ADD CONSTRAINT "kelas_paralel_has_dosen_FK_1" FOREIGN KEY ("kelas_paralel_id") REFERENCES "kelas_palalel" ("id") ON DELETE CASCADE;

ALTER TABLE "kelas_paralel_has_dosen" ADD CONSTRAINT "kelas_paralel_has_dosen_FK_2" FOREIGN KEY ("dosen_id") REFERENCES "dosen" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- kelas_palalel_has_jadwal
-----------------------------------------------------------------------------

DROP TABLE "kelas_palalel_has_jadwal" CASCADE;

DROP SEQUENCE "kelas_palalel_has_jadwal_seq";

CREATE SEQUENCE "kelas_palalel_has_jadwal_seq";


CREATE TABLE "kelas_palalel_has_jadwal"
(
	"kelas_paralel_id" INTEGER  NOT NULL,
	"jadwal_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "kelas_palalel_has_jadwal" IS '';


SET search_path TO public;
ALTER TABLE "kelas_palalel_has_jadwal" ADD CONSTRAINT "kelas_palalel_has_jadwal_FK_1" FOREIGN KEY ("kelas_paralel_id") REFERENCES "kelas_palalel" ("id") ON DELETE CASCADE;

ALTER TABLE "kelas_palalel_has_jadwal" ADD CONSTRAINT "kelas_palalel_has_jadwal_FK_2" FOREIGN KEY ("jadwal_id") REFERENCES "jadwal" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- mahasiswa_has_absensi
-----------------------------------------------------------------------------

DROP TABLE "mahasiswa_has_absensi" CASCADE;

DROP SEQUENCE "mahasiswa_has_absensi_seq";

CREATE SEQUENCE "mahasiswa_has_absensi_seq";


CREATE TABLE "mahasiswa_has_absensi"
(
	"mahasiswa_id" INTEGER  NOT NULL,
	"absensi_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "mahasiswa_has_absensi" IS '';


SET search_path TO public;
ALTER TABLE "mahasiswa_has_absensi" ADD CONSTRAINT "mahasiswa_has_absensi_FK_1" FOREIGN KEY ("mahasiswa_id") REFERENCES "mahasiswa" ("id") ON DELETE CASCADE;

ALTER TABLE "mahasiswa_has_absensi" ADD CONSTRAINT "mahasiswa_has_absensi_FK_2" FOREIGN KEY ("absensi_id") REFERENCES "absensi" ("id") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- mahasiswa_has_kelas_palalel
-----------------------------------------------------------------------------

DROP TABLE "mahasiswa_has_kelas_palalel" CASCADE;

DROP SEQUENCE "mahasiswa_has_kelas_palalel_seq";

CREATE SEQUENCE "mahasiswa_has_kelas_palalel_seq";


CREATE TABLE "mahasiswa_has_kelas_palalel"
(
	"mahasiswa_id" INTEGER  NOT NULL,
	"kelas_paralel_id" INTEGER  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "mahasiswa_has_kelas_palalel" IS '';


SET search_path TO public;
ALTER TABLE "mahasiswa_has_kelas_palalel" ADD CONSTRAINT "mahasiswa_has_kelas_palalel_FK_1" FOREIGN KEY ("mahasiswa_id") REFERENCES "mahasiswa" ("id") ON DELETE CASCADE;

ALTER TABLE "mahasiswa_has_kelas_palalel" ADD CONSTRAINT "mahasiswa_has_kelas_palalel_FK_2" FOREIGN KEY ("kelas_paralel_id") REFERENCES "kelas_palalel" ("id") ON DELETE CASCADE;
