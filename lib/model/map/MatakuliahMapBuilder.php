<?php



class MataKuliahMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MataKuliahMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mata_kuliah');
		$tMap->setPhpName('MataKuliah');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mata_kuliah_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('KODEMK', 'Kodemk', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('SKS', 'Sks', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('JURUSAN_ID', 'JurusanId', 'int', CreoleTypes::INTEGER, 'jurusan', 'ID', true, null);

	} 
} 