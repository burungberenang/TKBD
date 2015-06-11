<?php



class KelasparalelHasJadwalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KelasparalelHasJadwalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kelasparalel_has_jadwal');
		$tMap->setPhpName('KelasparalelHasJadwal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('kelasparalel_has_jadwal_SEQ');

		$tMap->addForeignKey('KELASPARALEL_ID', 'KelasparalelId', 'int', CreoleTypes::INTEGER, 'kelasparalel', 'ID', true, null);

		$tMap->addForeignKey('JADWAL_ID', 'JadwalId', 'int', CreoleTypes::INTEGER, 'jadwal', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 