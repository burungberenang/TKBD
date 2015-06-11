<?php



class MahasiswaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MahasiswaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mahasiswa');
		$tMap->setPhpName('Mahasiswa');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mahasiswa_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NRP', 'Nrp', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('ALAMAT', 'Alamat', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TGL_LAHIR', 'TglLahir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('JURUSAN_ID', 'JurusanId', 'int', CreoleTypes::INTEGER, 'jurusan', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 