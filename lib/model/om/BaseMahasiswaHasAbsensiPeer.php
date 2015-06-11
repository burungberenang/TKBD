<?php


abstract class BaseMahasiswaHasAbsensiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mahasiswa_has_absensi';

	
	const CLASS_DEFAULT = 'lib.model.MahasiswaHasAbsensi';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MAHASISWA_ID = 'mahasiswa_has_absensi.MAHASISWA_ID';

	
	const ABSENSI_ID = 'mahasiswa_has_absensi.ABSENSI_ID';

	
	const CREATED_AT = 'mahasiswa_has_absensi.CREATED_AT';

	
	const ID = 'mahasiswa_has_absensi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MahasiswaId', 'AbsensiId', 'CreatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaHasAbsensiPeer::ABSENSI_ID, MahasiswaHasAbsensiPeer::CREATED_AT, MahasiswaHasAbsensiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('Mahasiswa_id', 'Absensi_id', 'created_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MahasiswaId' => 0, 'AbsensiId' => 1, 'CreatedAt' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (MahasiswaHasAbsensiPeer::MAHASISWA_ID => 0, MahasiswaHasAbsensiPeer::ABSENSI_ID => 1, MahasiswaHasAbsensiPeer::CREATED_AT => 2, MahasiswaHasAbsensiPeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('Mahasiswa_id' => 0, 'Absensi_id' => 1, 'created_at' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MahasiswaHasAbsensiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MahasiswaHasAbsensiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MahasiswaHasAbsensiPeer::getTableMap();
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
		return str_replace(MahasiswaHasAbsensiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::MAHASISWA_ID);

		$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::ABSENSI_ID);

		$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::CREATED_AT);

		$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::ID);

	}

	const COUNT = 'COUNT(mahasiswa_has_absensi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mahasiswa_has_absensi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con);
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
		$objects = MahasiswaHasAbsensiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MahasiswaHasAbsensiPeer::populateObjects(MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MahasiswaHasAbsensiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MahasiswaHasAbsensiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinMahasiswa(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$rs = MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAbsensi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasAbsensiPeer::ABSENSI_ID, AbsensiPeer::ID);

		$rs = MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinMahasiswa(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasAbsensiPeer::addSelectColumns($c);
		$startcol = (MahasiswaHasAbsensiPeer::NUM_COLUMNS - MahasiswaHasAbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MahasiswaPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasAbsensiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MahasiswaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getMahasiswa(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMahasiswaHasAbsensi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswaHasAbsensis();
				$obj2->addMahasiswaHasAbsensi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAbsensi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasAbsensiPeer::addSelectColumns($c);
		$startcol = (MahasiswaHasAbsensiPeer::NUM_COLUMNS - MahasiswaHasAbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AbsensiPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaHasAbsensiPeer::ABSENSI_ID, AbsensiPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasAbsensiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AbsensiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAbsensi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMahasiswaHasAbsensi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswaHasAbsensis();
				$obj2->addMahasiswaHasAbsensi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$criteria->addJoin(MahasiswaHasAbsensiPeer::ABSENSI_ID, AbsensiPeer::ID);

		$rs = MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasAbsensiPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasAbsensiPeer::NUM_COLUMNS - MahasiswaHasAbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MahasiswaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MahasiswaPeer::NUM_COLUMNS;

		AbsensiPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AbsensiPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$c->addJoin(MahasiswaHasAbsensiPeer::ABSENSI_ID, AbsensiPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasAbsensiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = MahasiswaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMahasiswa(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMahasiswaHasAbsensi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasAbsensis();
				$obj2->addMahasiswaHasAbsensi($obj1);
			}


					
			$omClass = AbsensiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAbsensi(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMahasiswaHasAbsensi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMahasiswaHasAbsensis();
				$obj3->addMahasiswaHasAbsensi($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptMahasiswa(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasAbsensiPeer::ABSENSI_ID, AbsensiPeer::ID);

		$rs = MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAbsensi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasAbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$rs = MahasiswaHasAbsensiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptMahasiswa(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasAbsensiPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasAbsensiPeer::NUM_COLUMNS - MahasiswaHasAbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AbsensiPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AbsensiPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasAbsensiPeer::ABSENSI_ID, AbsensiPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasAbsensiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AbsensiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAbsensi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMahasiswaHasAbsensi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasAbsensis();
				$obj2->addMahasiswaHasAbsensi($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAbsensi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasAbsensiPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasAbsensiPeer::NUM_COLUMNS - MahasiswaHasAbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MahasiswaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MahasiswaPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasAbsensiPeer::MAHASISWA_ID, MahasiswaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasAbsensiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MahasiswaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMahasiswa(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMahasiswaHasAbsensi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasAbsensis();
				$obj2->addMahasiswaHasAbsensi($obj1);
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
		return MahasiswaHasAbsensiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MahasiswaHasAbsensiPeer::ID); 

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
			$comparison = $criteria->getComparison(MahasiswaHasAbsensiPeer::ID);
			$selectCriteria->add(MahasiswaHasAbsensiPeer::ID, $criteria->remove(MahasiswaHasAbsensiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MahasiswaHasAbsensiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MahasiswaHasAbsensiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MahasiswaHasAbsensi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MahasiswaHasAbsensiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MahasiswaHasAbsensi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MahasiswaHasAbsensiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MahasiswaHasAbsensiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MahasiswaHasAbsensiPeer::DATABASE_NAME, MahasiswaHasAbsensiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MahasiswaHasAbsensiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MahasiswaHasAbsensiPeer::DATABASE_NAME);

		$criteria->add(MahasiswaHasAbsensiPeer::ID, $pk);


		$v = MahasiswaHasAbsensiPeer::doSelect($criteria, $con);

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
			$criteria->add(MahasiswaHasAbsensiPeer::ID, $pks, Criteria::IN);
			$objs = MahasiswaHasAbsensiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMahasiswaHasAbsensiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MahasiswaHasAbsensiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MahasiswaHasAbsensiMapBuilder');
}
