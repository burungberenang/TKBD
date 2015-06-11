<?php



class MahasiswaHasAbsensiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MahasiswaHasAbsensiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mahasiswa_has_absensi');
		$tMap->setPhpName('MahasiswaHasAbsensi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mahasiswa_has_absensi_SEQ');

		$tMap->addForeignKey('MAHASISWA_ID', 'MahasiswaId', 'int', CreoleTypes::INTEGER, 'mahasiswa', 'ID', true, null);

		$tMap->addForeignKey('ABSENSI_ID', 'AbsensiId', 'int', CreoleTypes::INTEGER, 'absensi', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 