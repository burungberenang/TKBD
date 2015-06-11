<?php



class JamMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.JamMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('jam');
		$tMap->setPhpName('Jam');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('jam_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('JAM', 'Jam', 'string', CreoleTypes::VARCHAR, false, 45);

	} 
} 