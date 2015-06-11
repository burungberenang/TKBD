<?php



class KelasparalelHasDosenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KelasparalelHasDosenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kelasparalel_has_dosen');
		$tMap->setPhpName('KelasparalelHasDosen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('kelasparalel_has_dosen_SEQ');

		$tMap->addForeignKey('KELASPARALEL_ID', 'KelasparalelId', 'int', CreoleTypes::INTEGER, 'kelasparalel', 'ID', true, null);

		$tMap->addForeignKey('DOSEN_ID', 'DosenId', 'int', CreoleTypes::INTEGER, 'dosen', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 