<?php



class GolonganMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GolonganMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('golongan');
		$tMap->setPhpName('Golongan');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('KODE', 'Kode', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('GAJI_POKOK', 'GajiPokok', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('GAJI_SKS', 'GajiSks', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('GAJI_SKS_INGGRIS', 'GajiSksInggris', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 