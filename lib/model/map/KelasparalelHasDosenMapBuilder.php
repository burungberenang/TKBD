<?php



class KelasParalelHasDosenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KelasParalelHasDosenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kelas_paralel_has_dosen');
		$tMap->setPhpName('KelasParalelHasDosen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('kelas_paralel_has_dosen_SEQ');

		$tMap->addForeignKey('KELAS_PARALEL_ID', 'KelasParalelId', 'int', CreoleTypes::INTEGER, 'kelas_palalel', 'ID', true, null);

		$tMap->addForeignKey('DOSEN_ID', 'DosenId', 'int', CreoleTypes::INTEGER, 'dosen', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 