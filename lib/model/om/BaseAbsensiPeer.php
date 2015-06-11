<?php


abstract class BaseAbsensiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'absensi';

	
	const CLASS_DEFAULT = 'lib.model.Absensi';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'absensi.ID';

	
	const DOSEN_ID = 'absensi.DOSEN_ID';

	
	const MATERI = 'absensi.MATERI';

	
	const MINGGU_KE = 'absensi.MINGGU_KE';

	
	const TANGGAL = 'absensi.TANGGAL';

	
	const SKS_NYATA = 'absensi.SKS_NYATA';

	
	const STATUS = 'absensi.STATUS';

	
	const JAM_HADIR_DOSEN = 'absensi.JAM_HADIR_DOSEN';

	
	const JAM_KELUAR_DOSEN = 'absensi.JAM_KELUAR_DOSEN';

	
	const KELAS_PARALEL_ID = 'absensi.KELAS_PARALEL_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DosenId', 'Materi', 'MingguKe', 'Tanggal', 'SksNyata', 'Status', 'JamHadirDosen', 'JamKeluarDosen', 'KelasParalelId', ),
		BasePeer::TYPE_COLNAME => array (AbsensiPeer::ID, AbsensiPeer::DOSEN_ID, AbsensiPeer::MATERI, AbsensiPeer::MINGGU_KE, AbsensiPeer::TANGGAL, AbsensiPeer::SKS_NYATA, AbsensiPeer::STATUS, AbsensiPeer::JAM_HADIR_DOSEN, AbsensiPeer::JAM_KELUAR_DOSEN, AbsensiPeer::KELAS_PARALEL_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'dosen_id', 'materi', 'minggu_ke', 'tanggal', 'sks_nyata', 'status', 'jam_hadir_dosen', 'jam_keluar_dosen', 'kelas_paralel_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DosenId' => 1, 'Materi' => 2, 'MingguKe' => 3, 'Tanggal' => 4, 'SksNyata' => 5, 'Status' => 6, 'JamHadirDosen' => 7, 'JamKeluarDosen' => 8, 'KelasParalelId' => 9, ),
		BasePeer::TYPE_COLNAME => array (AbsensiPeer::ID => 0, AbsensiPeer::DOSEN_ID => 1, AbsensiPeer::MATERI => 2, AbsensiPeer::MINGGU_KE => 3, AbsensiPeer::TANGGAL => 4, AbsensiPeer::SKS_NYATA => 5, AbsensiPeer::STATUS => 6, AbsensiPeer::JAM_HADIR_DOSEN => 7, AbsensiPeer::JAM_KELUAR_DOSEN => 8, AbsensiPeer::KELAS_PARALEL_ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'dosen_id' => 1, 'materi' => 2, 'minggu_ke' => 3, 'tanggal' => 4, 'sks_nyata' => 5, 'status' => 6, 'jam_hadir_dosen' => 7, 'jam_keluar_dosen' => 8, 'kelas_paralel_id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AbsensiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AbsensiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AbsensiPeer::getTableMap();
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
		return str_replace(AbsensiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AbsensiPeer::ID);

		$criteria->addSelectColumn(AbsensiPeer::DOSEN_ID);

		$criteria->addSelectColumn(AbsensiPeer::MATERI);

		$criteria->addSelectColumn(AbsensiPeer::MINGGU_KE);

		$criteria->addSelectColumn(AbsensiPeer::TANGGAL);

		$criteria->addSelectColumn(AbsensiPeer::SKS_NYATA);

		$criteria->addSelectColumn(AbsensiPeer::STATUS);

		$criteria->addSelectColumn(AbsensiPeer::JAM_HADIR_DOSEN);

		$criteria->addSelectColumn(AbsensiPeer::JAM_KELUAR_DOSEN);

		$criteria->addSelectColumn(AbsensiPeer::KELAS_PARALEL_ID);

	}

	const COUNT = 'COUNT(absensi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT absensi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AbsensiPeer::doSelectRS($criteria, $con);
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
		$objects = AbsensiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AbsensiPeer::populateObjects(AbsensiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AbsensiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AbsensiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDosen(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbsensiPeer::DOSEN_ID, DosenPeer::ID);

		$rs = AbsensiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbsensiPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = AbsensiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDosen(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AbsensiPeer::addSelectColumns($c);
		$startcol = (AbsensiPeer::NUM_COLUMNS - AbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DosenPeer::addSelectColumns($c);

		$c->addJoin(AbsensiPeer::DOSEN_ID, DosenPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbsensiPeer::getOMClass();

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
										$temp_obj2->addAbsensi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAbsensis();
				$obj2->addAbsensi($obj1); 			}
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

		AbsensiPeer::addSelectColumns($c);
		$startcol = (AbsensiPeer::NUM_COLUMNS - AbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KelasPalalelPeer::addSelectColumns($c);

		$c->addJoin(AbsensiPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbsensiPeer::getOMClass();

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
										$temp_obj2->addAbsensi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAbsensis();
				$obj2->addAbsensi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbsensiPeer::DOSEN_ID, DosenPeer::ID);

		$criteria->addJoin(AbsensiPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = AbsensiPeer::doSelectRS($criteria, $con);
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

		AbsensiPeer::addSelectColumns($c);
		$startcol2 = (AbsensiPeer::NUM_COLUMNS - AbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DosenPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DosenPeer::NUM_COLUMNS;

		KelasPalalelPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + KelasPalalelPeer::NUM_COLUMNS;

		$c->addJoin(AbsensiPeer::DOSEN_ID, DosenPeer::ID);

		$c->addJoin(AbsensiPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbsensiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DosenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDosen(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAbsensi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAbsensis();
				$obj2->addAbsensi($obj1);
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
					$temp_obj3->addAbsensi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAbsensis();
				$obj3->addAbsensi($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptDosen(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbsensiPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);

		$rs = AbsensiPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AbsensiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbsensiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbsensiPeer::DOSEN_ID, DosenPeer::ID);

		$rs = AbsensiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptDosen(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AbsensiPeer::addSelectColumns($c);
		$startcol2 = (AbsensiPeer::NUM_COLUMNS - AbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KelasPalalelPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KelasPalalelPeer::NUM_COLUMNS;

		$c->addJoin(AbsensiPeer::KELAS_PARALEL_ID, KelasPalalelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbsensiPeer::getOMClass();

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
					$temp_obj2->addAbsensi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAbsensis();
				$obj2->addAbsensi($obj1);
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

		AbsensiPeer::addSelectColumns($c);
		$startcol2 = (AbsensiPeer::NUM_COLUMNS - AbsensiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DosenPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DosenPeer::NUM_COLUMNS;

		$c->addJoin(AbsensiPeer::DOSEN_ID, DosenPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbsensiPeer::getOMClass();

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
					$temp_obj2->addAbsensi($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAbsensis();
				$obj2->addAbsensi($obj1);
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
		return AbsensiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AbsensiPeer::ID); 

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
			$comparison = $criteria->getComparison(AbsensiPeer::ID);
			$selectCriteria->add(AbsensiPeer::ID, $criteria->remove(AbsensiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AbsensiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AbsensiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Absensi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AbsensiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Absensi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AbsensiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AbsensiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AbsensiPeer::DATABASE_NAME, AbsensiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AbsensiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AbsensiPeer::DATABASE_NAME);

		$criteria->add(AbsensiPeer::ID, $pk);


		$v = AbsensiPeer::doSelect($criteria, $con);

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
			$criteria->add(AbsensiPeer::ID, $pks, Criteria::IN);
			$objs = AbsensiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAbsensiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AbsensiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AbsensiMapBuilder');
}
