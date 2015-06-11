<?php



class SlipgajiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SlipgajiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('slipgaji');
		$tMap->setPhpName('Slipgaji');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('GRAND_TOTAL', 'GrandTotal', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('PAJAK', 'Pajak', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DOSEN_ID', 'DosenId', 'int', CreoleTypes::INTEGER, 'dosen', 'ID', true, null);

	} 
} 