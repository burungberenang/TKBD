<?php



class MahasiswaHasKelasparalelMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MahasiswaHasKelasparalelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mahasiswa_has_kelasparalel');
		$tMap->setPhpName('MahasiswaHasKelasparalel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mahasiswa_has_kelasparalel_SEQ');

		$tMap->addForeignKey('MAHASISWA_ID', 'MahasiswaId', 'int', CreoleTypes::INTEGER, 'mahasiswa', 'ID', true, null);

		$tMap->addForeignKey('KELASPARALEL_ID', 'KelasparalelId', 'int', CreoleTypes::INTEGER, 'kelasparalel', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 