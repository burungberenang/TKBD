<?php


abstract class BaseKelasPalalelHasJadwalPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'kelas_palalel_has_jadwal';

	
	const CLASS_DEFAULT = 'lib.model.KelasPalalelHasJadwal';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const KELAS_PARALEL_ID = 'kelas_palalel_has_jadwal.KELAS_PARALEL_ID';

	
	const JADWAL_ID = 'kelas_palalel_has_jadwal.JADWAL_ID';

	
	const CREATED_AT = 'kelas_palalel_has_jadwal.CREATED_AT';

	
	const UPDATED_AT = 'kelas_palalel_has_jadwal.UPDATED_AT';

	
	const ID = 'kelas_palalel_has_jadwal.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('KelasParalelId', 'JadwalId', 'CreatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelHasJadwalPeer::JADWAL_ID, KelasPalalelHasJadwalPeer::CREATED_AT, KelasPalalelHasJadwalPeer::UPDATED_AT, KelasPalalelHasJadwalPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('kelas_paralel_id', 'jadwal_id', 'created_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('KelasParalelId' => 0, 'JadwalId' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID => 0, KelasPalalelHasJadwalPeer::JADWAL_ID => 1, KelasPalalelHasJadwalPeer::CREATED_AT => 2, KelasPalalelHasJadwalPeer::UPDATED_AT => 3, KelasPalalelHasJadwalPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('kelas_paralel_id' => 0, 'jadwal_id' => 1, 'created_at' => 2, 'updated_at' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/KelasPalalelHasJadwalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.KelasPalalelHasJadwalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = KelasPalalelHasJadwalPeer::getTableMap();
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
		return str_replace(KelasPalalelHasJadwalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID);

		$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::JADWAL_ID);

		$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::CREATED_AT);

		$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::UPDATED_AT);

		$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::ID);

	}

	const COUNT = 'COUNT(kelas_palalel_has_jadwal.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT kelas_palalel_has_jadwal.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con);
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
		$objects = KelasPalalelHasJadwalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return KelasPalalelHasJadwalPeer::populateObjects(KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			KelasPalalelHasJadwalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = KelasPalalelHasJadwalPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinKelasPalalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinJadwal(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelHasJadwalPeer::JADWAL_ID, JadwalPeer::ID);

		$rs = KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinKelasPalalel(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasPalalelHasJadwalPeer::addSelectColumns($c);
		$startcol = (KelasPalalelHasJadwalPeer::NUM_COLUMNS - KelasPalalelHasJadwalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KelasPalalelPeer::addSelectColumns($c);

		$c->addJoin(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelHasJadwalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KelasPalalelPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getKelasPalalel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addKelasPalalelHasJadwal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initKelasPalalelHasJadwals();
				$obj2->addKelasPalalelHasJadwal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinJadwal(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasPalalelHasJadwalPeer::addSelectColumns($c);
		$startcol = (KelasPalalelHasJadwalPeer::NUM_COLUMNS - KelasPalalelHasJadwalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		JadwalPeer::addSelectColumns($c);

		$c->addJoin(KelasPalalelHasJadwalPeer::JADWAL_ID, JadwalPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelHasJadwalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = JadwalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getJadwal(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addKelasPalalelHasJadwal($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initKelasPalalelHasJadwals();
				$obj2->addKelasPalalelHasJadwal($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$criteria->addJoin(KelasPalalelHasJadwalPeer::JADWAL_ID, JadwalPeer::ID);

		$rs = KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con);
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

		KelasPalalelHasJadwalPeer::addSelectColumns($c);
		$startcol2 = (KelasPalalelHasJadwalPeer::NUM_COLUMNS - KelasPalalelHasJadwalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasPalalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasPalalelPeer::NUM_COLUMNS;

		JadwalPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + JadwalPeer::NUM_COLUMNS;

		$c->addJoin(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$c->addJoin(KelasPalalelHasJadwalPeer::JADWAL_ID, JadwalPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelHasJadwalPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = KelasPalalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKelasPalalel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasPalalelHasJadwal($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasPalalelHasJadwals();
				$obj2->addKelasPalalelHasJadwal($obj1);
			}


					
			$omClass = JadwalPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getJadwal(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addKelasPalalelHasJadwal($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initKelasPalalelHasJadwals();
				$obj3->addKelasPalalelHasJadwal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptKelasPalalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelHasJadwalPeer::JADWAL_ID, JadwalPeer::ID);

		$rs = KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptJadwal(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelHasJadwalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = KelasPalalelHasJadwalPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptKelasPalalel(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasPalalelHasJadwalPeer::addSelectColumns($c);
		$startcol2 = (KelasPalalelHasJadwalPeer::NUM_COLUMNS - KelasPalalelHasJadwalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		JadwalPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + JadwalPeer::NUM_COLUMNS;

		$c->addJoin(KelasPalalelHasJadwalPeer::JADWAL_ID, JadwalPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelHasJadwalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = JadwalPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getJadwal(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasPalalelHasJadwal($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasPalalelHasJadwals();
				$obj2->addKelasPalalelHasJadwal($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptJadwal(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasPalalelHasJadwalPeer::addSelectColumns($c);
		$startcol2 = (KelasPalalelHasJadwalPeer::NUM_COLUMNS - KelasPalalelHasJadwalPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasPalalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasPalalelPeer::NUM_COLUMNS;

		$c->addJoin(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelHasJadwalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KelasPalalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKelasPalalel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasPalalelHasJadwal($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasPalalelHasJadwals();
				$obj2->addKelasPalalelHasJadwal($obj1);
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
		return KelasPalalelHasJadwalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(KelasPalalelHasJadwalPeer::ID); 

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
			$comparison = $criteria->getComparison(KelasPalalelHasJadwalPeer::ID);
			$selectCriteria->add(KelasPalalelHasJadwalPeer::ID, $criteria->remove(KelasPalalelHasJadwalPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(KelasPalalelHasJadwalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(KelasPalalelHasJadwalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof KelasPalalelHasJadwal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(KelasPalalelHasJadwalPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(KelasPalalelHasJadwal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(KelasPalalelHasJadwalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(KelasPalalelHasJadwalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(KelasPalalelHasJadwalPeer::DATABASE_NAME, KelasPalalelHasJadwalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = KelasPalalelHasJadwalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(KelasPalalelHasJadwalPeer::DATABASE_NAME);

		$criteria->add(KelasPalalelHasJadwalPeer::ID, $pk);


		$v = KelasPalalelHasJadwalPeer::doSelect($criteria, $con);

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
			$criteria->add(KelasPalalelHasJadwalPeer::ID, $pks, Criteria::IN);
			$objs = KelasPalalelHasJadwalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseKelasPalalelHasJadwalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/KelasPalalelHasJadwalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.KelasPalalelHasJadwalMapBuilder');
}
