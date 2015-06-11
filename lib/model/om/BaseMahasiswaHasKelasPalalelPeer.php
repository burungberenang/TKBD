<?php


abstract class BaseMahasiswaHasKelasPalalelPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mahasiswa_has_kelas_palalel';

	
	const CLASS_DEFAULT = 'lib.model.MahasiswaHasKelasPalalel';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MAHASISWA_ID = 'mahasiswa_has_kelas_palalel.MAHASISWA_ID';

	
	const KELAS_PARALEL_ID = 'mahasiswa_has_kelas_palalel.KELAS_PARALEL_ID';

	
	const CREATED_AT = 'mahasiswa_has_kelas_palalel.CREATED_AT';

	
	const UPDATED_AT = 'mahasiswa_has_kelas_palalel.UPDATED_AT';

	
	const ID = 'mahasiswa_has_kelas_palalel.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MahasiswaId', 'KelasParalelId', 'CreatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, MahasiswaHasKelasPalalelPeer::CREATED_AT, MahasiswaHasKelasPalalelPeer::UPDATED_AT, MahasiswaHasKelasPalalelPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('mahasiswa_id', 'kelas_paralel_id', 'created_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MahasiswaId' => 0, 'KelasParalelId' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (MahasiswaHasKelasPalalelPeer::MAHASISWA_ID => 0, MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID => 1, MahasiswaHasKelasPalalelPeer::CREATED_AT => 2, MahasiswaHasKelasPalalelPeer::UPDATED_AT => 3, MahasiswaHasKelasPalalelPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('mahasiswa_id' => 0, 'kelas_paralel_id' => 1, 'created_at' => 2, 'updated_at' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MahasiswaHasKelasPalalelMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MahasiswaHasKelasPalalelMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MahasiswaHasKelasPalalelPeer::getTableMap();
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
		return str_replace(MahasiswaHasKelasPalalelPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID);

		$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID);

		$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::CREATED_AT);

		$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::UPDATED_AT);

		$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::ID);

	}

	const COUNT = 'COUNT(mahasiswa_has_kelas_palalel.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mahasiswa_has_kelas_palalel.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con);
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
		$objects = MahasiswaHasKelasPalalelPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MahasiswaHasKelasPalalelPeer::populateObjects(MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MahasiswaHasKelasPalalelPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MahasiswaHasKelasPalalelPeer::getOMClass();
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
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$rs = MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinKelasPalalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasKelasPalalelPeer::addSelectColumns($c);
		$startcol = (MahasiswaHasKelasPalalelPeer::NUM_COLUMNS - MahasiswaHasKelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MahasiswaPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasPalalelPeer::getOMClass();

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
										$temp_obj2->addMahasiswaHasKelasPalalel($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswaHasKelasPalalels();
				$obj2->addMahasiswaHasKelasPalalel($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinKelasPalalel(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasKelasPalalelPeer::addSelectColumns($c);
		$startcol = (MahasiswaHasKelasPalalelPeer::NUM_COLUMNS - MahasiswaHasKelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KelasPalalelPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasPalalelPeer::getOMClass();

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
										$temp_obj2->addMahasiswaHasKelasPalalel($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswaHasKelasPalalels();
				$obj2->addMahasiswaHasKelasPalalel($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$criteria->addJoin(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasKelasPalalelPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasKelasPalalelPeer::NUM_COLUMNS - MahasiswaHasKelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MahasiswaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MahasiswaPeer::NUM_COLUMNS;

		KelasPalalelPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + KelasPalalelPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$c->addJoin(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasPalalelPeer::getOMClass();


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
					$temp_obj2->addMahasiswaHasKelasPalalel($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasKelasPalalels();
				$obj2->addMahasiswaHasKelasPalalel($obj1);
			}


					
			$omClass = KelasPalalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getKelasPalalel(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMahasiswaHasKelasPalalel($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMahasiswaHasKelasPalalels();
				$obj3->addMahasiswaHasKelasPalalel($obj1);
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
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptKelasPalalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$rs = MahasiswaHasKelasPalalelPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasKelasPalalelPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasKelasPalalelPeer::NUM_COLUMNS - MahasiswaHasKelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasPalalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasPalalelPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasPalalelPeer::getOMClass();

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
					$temp_obj2->addMahasiswaHasKelasPalalel($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasKelasPalalels();
				$obj2->addMahasiswaHasKelasPalalel($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptKelasPalalel(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasKelasPalalelPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasKelasPalalelPeer::NUM_COLUMNS - MahasiswaHasKelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MahasiswaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MahasiswaPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasPalalelPeer::getOMClass();

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
					$temp_obj2->addMahasiswaHasKelasPalalel($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasKelasPalalels();
				$obj2->addMahasiswaHasKelasPalalel($obj1);
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
		return MahasiswaHasKelasPalalelPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MahasiswaHasKelasPalalelPeer::ID); 

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
			$comparison = $criteria->getComparison(MahasiswaHasKelasPalalelPeer::ID);
			$selectCriteria->add(MahasiswaHasKelasPalalelPeer::ID, $criteria->remove(MahasiswaHasKelasPalalelPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MahasiswaHasKelasPalalelPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MahasiswaHasKelasPalalel) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MahasiswaHasKelasPalalelPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MahasiswaHasKelasPalalel $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MahasiswaHasKelasPalalelPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MahasiswaHasKelasPalalelPeer::DATABASE_NAME, MahasiswaHasKelasPalalelPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MahasiswaHasKelasPalalelPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);

		$criteria->add(MahasiswaHasKelasPalalelPeer::ID, $pk);


		$v = MahasiswaHasKelasPalalelPeer::doSelect($criteria, $con);

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
			$criteria->add(MahasiswaHasKelasPalalelPeer::ID, $pks, Criteria::IN);
			$objs = MahasiswaHasKelasPalalelPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMahasiswaHasKelasPalalelPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MahasiswaHasKelasPalalelMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MahasiswaHasKelasPalalelMapBuilder');
}
