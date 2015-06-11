<?php



class DosenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DosenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dosen');
		$tMap->setPhpName('Dosen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dosen_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NPK', 'Npk', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('ALAMAT', 'Alamat', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TGL_LAHIR', 'TglLahir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('GOLONGAN_ID', 'GolonganId', 'int', CreoleTypes::INTEGER, 'golongan', 'ID', true, null);

	} 
} 