<?php



class MahasiswaHasKelasPalalelMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MahasiswaHasKelasPalalelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mahasiswa_has_kelas_palalel');
		$tMap->setPhpName('MahasiswaHasKelasPalalel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mahasiswa_has_kelas_palalel_SEQ');

		$tMap->addForeignKey('MAHASISWA_ID', 'MahasiswaId', 'int', CreoleTypes::INTEGER, 'mahasiswa', 'ID', true, null);

		$tMap->addForeignKey('KELAS_PARALEL_ID', 'KelasParalelId', 'int', CreoleTypes::INTEGER, 'kelas_palalel', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 