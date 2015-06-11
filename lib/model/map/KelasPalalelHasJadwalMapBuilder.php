<?php



class KelasPalalelHasJadwalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KelasPalalelHasJadwalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('kelas_palalel_has_jadwal');
		$tMap->setPhpName('KelasPalalelHasJadwal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('kelas_palalel_has_jadwal_SEQ');

		$tMap->addForeignKey('KELAS_PARALEL_ID', 'KelasParalelId', 'int', CreoleTypes::INTEGER, 'kelas_palalel', 'ID', true, null);

		$tMap->addForeignKey('JADWAL_ID', 'JadwalId', 'int', CreoleTypes::INTEGER, 'jadwal', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 