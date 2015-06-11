<?php


abstract class BaseMahasiswaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mahasiswa';

	
	const CLASS_DEFAULT = 'lib.model.Mahasiswa';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'mahasiswa.ID';

	
	const NRP = 'mahasiswa.NRP';

	
	const NAMA = 'mahasiswa.NAMA';

	
	const ALAMAT = 'mahasiswa.ALAMAT';

	
	const TGL_LAHIR = 'mahasiswa.TGL_LAHIR';

	
	const JURUSAN_ID = 'mahasiswa.JURUSAN_ID';

	
	const CREATED_AT = 'mahasiswa.CREATED_AT';

	
	const UPDATED_AT = 'mahasiswa.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nrp', 'Nama', 'Alamat', 'TglLahir', 'JurusanId', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (MahasiswaPeer::ID, MahasiswaPeer::NRP, MahasiswaPeer::NAMA, MahasiswaPeer::ALAMAT, MahasiswaPeer::TGL_LAHIR, MahasiswaPeer::JURUSAN_ID, MahasiswaPeer::CREATED_AT, MahasiswaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nrp', 'nama', 'alamat', 'tgl_lahir', 'jurusan_id', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nrp' => 1, 'Nama' => 2, 'Alamat' => 3, 'TglLahir' => 4, 'JurusanId' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (MahasiswaPeer::ID => 0, MahasiswaPeer::NRP => 1, MahasiswaPeer::NAMA => 2, MahasiswaPeer::ALAMAT => 3, MahasiswaPeer::TGL_LAHIR => 4, MahasiswaPeer::JURUSAN_ID => 5, MahasiswaPeer::CREATED_AT => 6, MahasiswaPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nrp' => 1, 'nama' => 2, 'alamat' => 3, 'tgl_lahir' => 4, 'jurusan_id' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MahasiswaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MahasiswaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MahasiswaPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(MahasiswaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MahasiswaPeer::ID);

		$criteria->addSelectColumn(MahasiswaPeer::NRP);

		$criteria->addSelectColumn(MahasiswaPeer::NAMA);

		$criteria->addSelectColumn(MahasiswaPeer::ALAMAT);

		$criteria->addSelectColumn(MahasiswaPeer::TGL_LAHIR);

		$criteria->addSelectColumn(MahasiswaPeer::JURUSAN_ID);

		$criteria->addSelectColumn(MahasiswaPeer::CREATED_AT);

		$criteria->addSelectColumn(MahasiswaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(mahasiswa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mahasiswa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MahasiswaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = MahasiswaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MahasiswaPeer::populateObjects(MahasiswaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MahasiswaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MahasiswaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinJurusan(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaPeer::JURUSAN_ID, JurusanPeer::ID);

		$rs = MahasiswaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinJurusan(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaPeer::addSelectColumns($c);
		$startcol = (MahasiswaPeer::NUM_COLUMNS - MahasiswaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		JurusanPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaPeer::JURUSAN_ID, JurusanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = JurusanPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getJurusan(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMahasiswa($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswas();
				$obj2->addMahasiswa($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaPeer::JURUSAN_ID, JurusanPeer::ID);

		$rs = MahasiswaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaPeer::NUM_COLUMNS - MahasiswaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		JurusanPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + JurusanPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaPeer::JURUSAN_ID, JurusanPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = JurusanPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getJurusan(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMahasiswa($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswas();
				$obj2->addMahasiswa($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return MahasiswaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MahasiswaPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(MahasiswaPeer::ID);
			$selectCriteria->add(MahasiswaPeer::ID, $criteria->remove(MahasiswaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(MahasiswaPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(MahasiswaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Mahasiswa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MahasiswaPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Mahasiswa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MahasiswaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MahasiswaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(MahasiswaPeer::DATABASE_NAME, MahasiswaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MahasiswaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MahasiswaPeer::DATABASE_NAME);

		$criteria->add(MahasiswaPeer::ID, $pk);


		$v = MahasiswaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(MahasiswaPeer::ID, $pks, Criteria::IN);
			$objs = MahasiswaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMahasiswaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MahasiswaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MahasiswaMapBuilder');
}
