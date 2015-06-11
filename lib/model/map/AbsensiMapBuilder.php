<?php



class AbsensiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AbsensiMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('absensi');
		$tMap->setPhpName('Absensi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('absensi_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('DOSEN_ID', 'DosenId', 'int', CreoleTypes::INTEGER, 'dosen', 'ID', true, null);

		$tMap->addColumn('MATERI', 'Materi', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('MINGGU_KE', 'MingguKe', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TANGGAL', 'Tanggal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SKS_NYATA', 'SksNyata', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('JAM_HADIR_DOSEN', 'JamHadirDosen', 'int', CreoleTypes::TIME, false, null);

		$tMap->addColumn('JAM_KELUAR_DOSEN', 'JamKeluarDosen', 'int', CreoleTypes::TIME, false, null);

		$tMap->addForeignKey('KELAS_PARALEL_ID', 'KelasParalelId', 'int', CreoleTypes::INTEGER, 'kelas_palalel', 'ID', true, null);

	} 
} 