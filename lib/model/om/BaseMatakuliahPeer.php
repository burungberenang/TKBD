<?php


abstract class BaseMataKuliahPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mata_kuliah';

	
	const CLASS_DEFAULT = 'lib.model.MataKuliah';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'mata_kuliah.ID';

	
	const KODEMK = 'mata_kuliah.KODEMK';

	
	const NAMA = 'mata_kuliah.NAMA';

	
	const SKS = 'mata_kuliah.SKS';

	
	const CREATED_AT = 'mata_kuliah.CREATED_AT';

	
	const UPDATED_AT = 'mata_kuliah.UPDATED_AT';

	
	const JURUSAN_ID = 'mata_kuliah.JURUSAN_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Kodemk', 'Nama', 'Sks', 'CreatedAt', 'UpdatedAt', 'JurusanId', ),
		BasePeer::TYPE_COLNAME => array (MataKuliahPeer::ID, MataKuliahPeer::KODEMK, MataKuliahPeer::NAMA, MataKuliahPeer::SKS, MataKuliahPeer::CREATED_AT, MataKuliahPeer::UPDATED_AT, MataKuliahPeer::JURUSAN_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'kodeMk', 'nama', 'sks', 'created_at', 'updated_at', 'jurusan_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Kodemk' => 1, 'Nama' => 2, 'Sks' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, 'JurusanId' => 6, ),
		BasePeer::TYPE_COLNAME => array (MataKuliahPeer::ID => 0, MataKuliahPeer::KODEMK => 1, MataKuliahPeer::NAMA => 2, MataKuliahPeer::SKS => 3, MataKuliahPeer::CREATED_AT => 4, MataKuliahPeer::UPDATED_AT => 5, MataKuliahPeer::JURUSAN_ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'kodeMk' => 1, 'nama' => 2, 'sks' => 3, 'created_at' => 4, 'updated_at' => 5, 'jurusan_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MataKuliahMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MataKuliahMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MataKuliahPeer::getTableMap();
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
		return str_replace(MataKuliahPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MataKuliahPeer::ID);

		$criteria->addSelectColumn(MataKuliahPeer::KODEMK);

		$criteria->addSelectColumn(MataKuliahPeer::NAMA);

		$criteria->addSelectColumn(MataKuliahPeer::SKS);

		$criteria->addSelectColumn(MataKuliahPeer::CREATED_AT);

		$criteria->addSelectColumn(MataKuliahPeer::UPDATED_AT);

		$criteria->addSelectColumn(MataKuliahPeer::JURUSAN_ID);

	}

	const COUNT = 'COUNT(mata_kuliah.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mata_kuliah.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MataKuliahPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MataKuliahPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MataKuliahPeer::doSelectRS($criteria, $con);
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
		$objects = MataKuliahPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MataKuliahPeer::populateObjects(MataKuliahPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MataKuliahPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MataKuliahPeer::getOMClass();
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
			$criteria->addSelectColumn(MataKuliahPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MataKuliahPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MataKuliahPeer::JURUSAN_ID, JurusanPeer::ID);

		$rs = MataKuliahPeer::doSelectRS($criteria, $con);
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

		MataKuliahPeer::addSelectColumns($c);
		$startcol = (MataKuliahPeer::NUM_COLUMNS - MataKuliahPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		JurusanPeer::addSelectColumns($c);

		$c->addJoin(MataKuliahPeer::JURUSAN_ID, JurusanPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MataKuliahPeer::getOMClass();

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
										$temp_obj2->addMataKuliah($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMataKuliahs();
				$obj2->addMataKuliah($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MataKuliahPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MataKuliahPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MataKuliahPeer::JURUSAN_ID, JurusanPeer::ID);

		$rs = MataKuliahPeer::doSelectRS($criteria, $con);
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

		MataKuliahPeer::addSelectColumns($c);
		$startcol2 = (MataKuliahPeer::NUM_COLUMNS - MataKuliahPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		JurusanPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + JurusanPeer::NUM_COLUMNS;

		$c->addJoin(MataKuliahPeer::JURUSAN_ID, JurusanPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MataKuliahPeer::getOMClass();


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
					$temp_obj2->addMataKuliah($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMataKuliahs();
				$obj2->addMataKuliah($obj1);
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
		return MataKuliahPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MataKuliahPeer::ID); 

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
			$comparison = $criteria->getComparison(MataKuliahPeer::ID);
			$selectCriteria->add(MataKuliahPeer::ID, $criteria->remove(MataKuliahPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MataKuliahPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MataKuliahPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MataKuliah) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MataKuliahPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MataKuliah $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MataKuliahPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MataKuliahPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MataKuliahPeer::DATABASE_NAME, MataKuliahPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MataKuliahPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MataKuliahPeer::DATABASE_NAME);

		$criteria->add(MataKuliahPeer::ID, $pk);


		$v = MataKuliahPeer::doSelect($criteria, $con);

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
			$criteria->add(MataKuliahPeer::ID, $pks, Criteria::IN);
			$objs = MataKuliahPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMataKuliahPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MataKuliahMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MataKuliahMapBuilder');
}
