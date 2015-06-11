<?php


abstract class BaseMahasiswaHasKelasparalelPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mahasiswa_has_kelasparalel';

	
	const CLASS_DEFAULT = 'lib.model.MahasiswaHasKelasparalel';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MAHASISWA_ID = 'mahasiswa_has_kelasparalel.MAHASISWA_ID';

	
	const KELASPARALEL_ID = 'mahasiswa_has_kelasparalel.KELASPARALEL_ID';

	
	const CREATED_AT = 'mahasiswa_has_kelasparalel.CREATED_AT';

	
	const UPDATED_AT = 'mahasiswa_has_kelasparalel.UPDATED_AT';

	
	const ID = 'mahasiswa_has_kelasparalel.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MahasiswaId', 'KelasparalelId', 'CreatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, MahasiswaHasKelasparalelPeer::CREATED_AT, MahasiswaHasKelasparalelPeer::UPDATED_AT, MahasiswaHasKelasparalelPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('mahasiswa_id', 'kelasParalel_id', 'created_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MahasiswaId' => 0, 'KelasparalelId' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (MahasiswaHasKelasparalelPeer::MAHASISWA_ID => 0, MahasiswaHasKelasparalelPeer::KELASPARALEL_ID => 1, MahasiswaHasKelasparalelPeer::CREATED_AT => 2, MahasiswaHasKelasparalelPeer::UPDATED_AT => 3, MahasiswaHasKelasparalelPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('mahasiswa_id' => 0, 'kelasParalel_id' => 1, 'created_at' => 2, 'updated_at' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MahasiswaHasKelasparalelMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MahasiswaHasKelasparalelMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MahasiswaHasKelasparalelPeer::getTableMap();
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
		return str_replace(MahasiswaHasKelasparalelPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::MAHASISWA_ID);

		$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID);

		$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::CREATED_AT);

		$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::UPDATED_AT);

		$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::ID);

	}

	const COUNT = 'COUNT(mahasiswa_has_kelasparalel.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mahasiswa_has_kelasparalel.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con);
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
		$objects = MahasiswaHasKelasparalelPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MahasiswaHasKelasparalelPeer::populateObjects(MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MahasiswaHasKelasparalelPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MahasiswaHasKelasparalelPeer::getOMClass();
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
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$rs = MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinKelasparalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$rs = MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasKelasparalelPeer::addSelectColumns($c);
		$startcol = (MahasiswaHasKelasparalelPeer::NUM_COLUMNS - MahasiswaHasKelasparalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MahasiswaPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasparalelPeer::getOMClass();

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
										$temp_obj2->addMahasiswaHasKelasparalel($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswaHasKelasparalels();
				$obj2->addMahasiswaHasKelasparalel($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinKelasparalel(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasKelasparalelPeer::addSelectColumns($c);
		$startcol = (MahasiswaHasKelasparalelPeer::NUM_COLUMNS - MahasiswaHasKelasparalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KelasparalelPeer::addSelectColumns($c);

		$c->addJoin(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, KelasparalelPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasparalelPeer::getOMClass();

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
										$temp_obj2->addMahasiswaHasKelasparalel($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMahasiswaHasKelasparalels();
				$obj2->addMahasiswaHasKelasparalel($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$criteria->addJoin(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$rs = MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasKelasparalelPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasKelasparalelPeer::NUM_COLUMNS - MahasiswaHasKelasparalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MahasiswaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MahasiswaPeer::NUM_COLUMNS;

		KelasparalelPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + KelasparalelPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$c->addJoin(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasparalelPeer::getOMClass();


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
					$temp_obj2->addMahasiswaHasKelasparalel($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasKelasparalels();
				$obj2->addMahasiswaHasKelasparalel($obj1);
			}


					
			$omClass = KelasparalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getKelasparalel(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMahasiswaHasKelasparalel($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMahasiswaHasKelasparalels();
				$obj3->addMahasiswaHasKelasparalel($obj1);
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
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, KelasparalelPeer::ID);

		$rs = MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptKelasparalel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MahasiswaHasKelasparalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);

		$rs = MahasiswaHasKelasparalelPeer::doSelectRS($criteria, $con);
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

		MahasiswaHasKelasparalelPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasKelasparalelPeer::NUM_COLUMNS - MahasiswaHasKelasparalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasparalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasparalelPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, KelasparalelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasparalelPeer::getOMClass();

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
					$temp_obj2->addMahasiswaHasKelasparalel($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasKelasparalels();
				$obj2->addMahasiswaHasKelasparalel($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptKelasparalel(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MahasiswaHasKelasparalelPeer::addSelectColumns($c);
		$startcol2 = (MahasiswaHasKelasparalelPeer::NUM_COLUMNS - MahasiswaHasKelasparalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MahasiswaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MahasiswaPeer::NUM_COLUMNS;

		$c->addJoin(MahasiswaHasKelasparalelPeer::MAHASISWA_ID, MahasiswaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MahasiswaHasKelasparalelPeer::getOMClass();

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
					$temp_obj2->addMahasiswaHasKelasparalel($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMahasiswaHasKelasparalels();
				$obj2->addMahasiswaHasKelasparalel($obj1);
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
		return MahasiswaHasKelasparalelPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MahasiswaHasKelasparalelPeer::ID); 

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
			$comparison = $criteria->getComparison(MahasiswaHasKelasparalelPeer::ID);
			$selectCriteria->add(MahasiswaHasKelasparalelPeer::ID, $criteria->remove(MahasiswaHasKelasparalelPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MahasiswaHasKelasparalelPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MahasiswaHasKelasparalelPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MahasiswaHasKelasparalel) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MahasiswaHasKelasparalelPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MahasiswaHasKelasparalel $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MahasiswaHasKelasparalelPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MahasiswaHasKelasparalelPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MahasiswaHasKelasparalelPeer::DATABASE_NAME, MahasiswaHasKelasparalelPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MahasiswaHasKelasparalelPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MahasiswaHasKelasparalelPeer::DATABASE_NAME);

		$criteria->add(MahasiswaHasKelasparalelPeer::ID, $pk);


		$v = MahasiswaHasKelasparalelPeer::doSelect($criteria, $con);

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
			$criteria->add(MahasiswaHasKelasparalelPeer::ID, $pks, Criteria::IN);
			$objs = MahasiswaHasKelasparalelPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMahasiswaHasKelasparalelPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MahasiswaHasKelasparalelMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MahasiswaHasKelasparalelMapBuilder');
}
