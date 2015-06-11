<?php


abstract class BaseKelasparalelHasDosenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'kelasparalel_has_dosen';

	
	const CLASS_DEFAULT = 'lib.model.KelasparalelHasDosen';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const KELASPARALEL_ID = 'kelasparalel_has_dosen.KELASPARALEL_ID';

	
	const DOSEN_ID = 'kelasparalel_has_dosen.DOSEN_ID';

	
	const ID = 'kelasparalel_has_dosen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('KelasparalelId', 'DosenId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelHasDosenPeer::DOSEN_ID, KelasparalelHasDosenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('KelasParalel_id', 'Dosen_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('KelasparalelId' => 0, 'DosenId' => 1, 'Id' => 2, ),
		BasePeer::TYPE_COLNAME => array (KelasparalelHasDosenPeer::KELASPARALEL_ID => 0, KelasparalelHasDosenPeer::DOSEN_ID => 1, KelasparalelHasDosenPeer::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('KelasParalel_id' => 0, 'Dosen_id' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/KelasparalelHasDosenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.KelasparalelHasDosenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = KelasparalelHasDosenPeer::getTableMap();
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
		return str_replace(KelasparalelHasDosenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(KelasparalelHasDosenPeer::KELASPARALEL_ID);

		$criteria->addSelectColumn(KelasparalelHasDosenPeer::DOSEN_ID);

		$criteria->addSelectColumn(KelasparalelHasDosenPeer::ID);

	}

	const COUNT = 'COUNT(kelasparalel_has_dosen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT kelasparalel_has_dosen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = KelasparalelHasDosenPeer::doSelectRS($criteria, $con);
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
		$objects = KelasparalelHasDosenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return KelasparalelHasDosenPeer::populateObjects(KelasparalelHasDosenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			KelasparalelHasDosenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = KelasparalelHasDosenPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinKelasparalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$rs = KelasparalelHasDosenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDosen(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasparalelHasDosenPeer::DOSEN_ID, DosenPeer::ID);

		$rs = KelasparalelHasDosenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinKelasparalel(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasparalelHasDosenPeer::addSelectColumns($c);
		$startcol = (KelasparalelHasDosenPeer::NUM_COLUMNS - KelasparalelHasDosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KelasparalelPeer::addSelectColumns($c);

		$c->addJoin(KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasparalelHasDosenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KelasparalelPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getKelasparalel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addKelasparalelHasDosen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initKelasparalelHasDosens();
				$obj2->addKelasparalelHasDosen($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDosen(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasparalelHasDosenPeer::addSelectColumns($c);
		$startcol = (KelasparalelHasDosenPeer::NUM_COLUMNS - KelasparalelHasDosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DosenPeer::addSelectColumns($c);

		$c->addJoin(KelasparalelHasDosenPeer::DOSEN_ID, DosenPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasparalelHasDosenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DosenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDosen(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addKelasparalelHasDosen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initKelasparalelHasDosens();
				$obj2->addKelasparalelHasDosen($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$criteria->addJoin(KelasparalelHasDosenPeer::DOSEN_ID, DosenPeer::ID);

		$rs = KelasparalelHasDosenPeer::doSelectRS($criteria, $con);
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

		KelasparalelHasDosenPeer::addSelectColumns($c);
		$startcol2 = (KelasparalelHasDosenPeer::NUM_COLUMNS - KelasparalelHasDosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasparalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasparalelPeer::NUM_COLUMNS;

		DosenPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DosenPeer::NUM_COLUMNS;

		$c->addJoin(KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$c->addJoin(KelasparalelHasDosenPeer::DOSEN_ID, DosenPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasparalelHasDosenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = KelasparalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKelasparalel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasparalelHasDosen($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasparalelHasDosens();
				$obj2->addKelasparalelHasDosen($obj1);
			}


					
			$omClass = DosenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDosen(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addKelasparalelHasDosen($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initKelasparalelHasDosens();
				$obj3->addKelasparalelHasDosen($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptKelasparalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasparalelHasDosenPeer::DOSEN_ID, DosenPeer::ID);

		$rs = KelasparalelHasDosenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDosen(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasparalelHasDosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$rs = KelasparalelHasDosenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptKelasparalel(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasparalelHasDosenPeer::addSelectColumns($c);
		$startcol2 = (KelasparalelHasDosenPeer::NUM_COLUMNS - KelasparalelHasDosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DosenPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DosenPeer::NUM_COLUMNS;

		$c->addJoin(KelasparalelHasDosenPeer::DOSEN_ID, DosenPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasparalelHasDosenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DosenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDosen(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasparalelHasDosen($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasparalelHasDosens();
				$obj2->addKelasparalelHasDosen($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDosen(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasparalelHasDosenPeer::addSelectColumns($c);
		$startcol2 = (KelasparalelHasDosenPeer::NUM_COLUMNS - KelasparalelHasDosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasparalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasparalelPeer::NUM_COLUMNS;

		$c->addJoin(KelasparalelHasDosenPeer::KELASPARALEL_ID, KelasparalelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasparalelHasDosenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KelasparalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKelasparalel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasparalelHasDosen($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasparalelHasDosens();
				$obj2->addKelasparalelHasDosen($obj1);
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
		return KelasparalelHasDosenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(KelasparalelHasDosenPeer::ID); 

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
			$comparison = $criteria->getComparison(KelasparalelHasDosenPeer::ID);
			$selectCriteria->add(KelasparalelHasDosenPeer::ID, $criteria->remove(KelasparalelHasDosenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(KelasparalelHasDosenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(KelasparalelHasDosenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof KelasparalelHasDosen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(KelasparalelHasDosenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(KelasparalelHasDosen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(KelasparalelHasDosenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(KelasparalelHasDosenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(KelasparalelHasDosenPeer::DATABASE_NAME, KelasparalelHasDosenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = KelasparalelHasDosenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(KelasparalelHasDosenPeer::DATABASE_NAME);

		$criteria->add(KelasparalelHasDosenPeer::ID, $pk);


		$v = KelasparalelHasDosenPeer::doSelect($criteria, $con);

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
			$criteria->add(KelasparalelHasDosenPeer::ID, $pks, Criteria::IN);
			$objs = KelasparalelHasDosenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseKelasparalelHasDosenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/KelasparalelHasDosenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.KelasparalelHasDosenMapBuilder');
}
