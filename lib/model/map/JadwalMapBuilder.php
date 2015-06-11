<?php



class JadwalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.JadwalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('jadwal');
		$tMap->setPhpName('Jadwal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('jadwal_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('JAM_ID', 'JamId', 'int', CreoleTypes::INTEGER, 'jam', 'ID', true, null);

		$tMap->addForeignKey('HARI_ID', 'HariId', 'int', CreoleTypes::INTEGER, 'hari', 'ID', true, null);

	} 
} 