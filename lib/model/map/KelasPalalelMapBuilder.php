<?php



class KelasPalalelMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KelasPalalelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kelas_palalel');
		$tMap->setPhpName('KelasPalalel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('kelas_palalel_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('MATA_KULIAH_ID', 'MataKuliahId', 'int', CreoleTypes::INTEGER, 'mata_kuliah', 'ID', true, null);

	} 
} 