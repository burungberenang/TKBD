<?php


abstract class BaseDosenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dosen';

	
	const CLASS_DEFAULT = 'lib.model.Dosen';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'dosen.ID';

	
	const NPK = 'dosen.NPK';

	
	const NAMA = 'dosen.NAMA';

	
	const ALAMAT = 'dosen.ALAMAT';

	
	const TGL_LAHIR = 'dosen.TGL_LAHIR';

	
	const CREATED_AT = 'dosen.CREATED_AT';

	
	const UPDATED_AT = 'dosen.UPDATED_AT';

	
	const GOLONGAN_ID = 'dosen.GOLONGAN_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Npk', 'Nama', 'Alamat', 'TglLahir', 'CreatedAt', 'UpdatedAt', 'GolonganId', ),
		BasePeer::TYPE_COLNAME => array (DosenPeer::ID, DosenPeer::NPK, DosenPeer::NAMA, DosenPeer::ALAMAT, DosenPeer::TGL_LAHIR, DosenPeer::CREATED_AT, DosenPeer::UPDATED_AT, DosenPeer::GOLONGAN_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'npk', 'nama', 'alamat', 'tgl_lahir', 'created_at', 'updated_at', 'golongan_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Npk' => 1, 'Nama' => 2, 'Alamat' => 3, 'TglLahir' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, 'GolonganId' => 7, ),
		BasePeer::TYPE_COLNAME => array (DosenPeer::ID => 0, DosenPeer::NPK => 1, DosenPeer::NAMA => 2, DosenPeer::ALAMAT => 3, DosenPeer::TGL_LAHIR => 4, DosenPeer::CREATED_AT => 5, DosenPeer::UPDATED_AT => 6, DosenPeer::GOLONGAN_ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'npk' => 1, 'nama' => 2, 'alamat' => 3, 'tgl_lahir' => 4, 'created_at' => 5, 'updated_at' => 6, 'golongan_id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DosenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DosenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DosenPeer::getTableMap();
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
		return str_replace(DosenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DosenPeer::ID);

		$criteria->addSelectColumn(DosenPeer::NPK);

		$criteria->addSelectColumn(DosenPeer::NAMA);

		$criteria->addSelectColumn(DosenPeer::ALAMAT);

		$criteria->addSelectColumn(DosenPeer::TGL_LAHIR);

		$criteria->addSelectColumn(DosenPeer::CREATED_AT);

		$criteria->addSelectColumn(DosenPeer::UPDATED_AT);

		$criteria->addSelectColumn(DosenPeer::GOLONGAN_ID);

	}

	const COUNT = 'COUNT(dosen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dosen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DosenPeer::doSelectRS($criteria, $con);
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
		$objects = DosenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DosenPeer::populateObjects(DosenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DosenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DosenPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinGolongan(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DosenPeer::GOLONGAN_ID, GolonganPeer::ID);

		$rs = DosenPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinGolongan(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DosenPeer::addSelectColumns($c);
		$startcol = (DosenPeer::NUM_COLUMNS - DosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		GolonganPeer::addSelectColumns($c);

		$c->addJoin(DosenPeer::GOLONGAN_ID, GolonganPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DosenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GolonganPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getGolongan(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDosen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDosens();
				$obj2->addDosen($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DosenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DosenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DosenPeer::GOLONGAN_ID, GolonganPeer::ID);

		$rs = DosenPeer::doSelectRS($criteria, $con);
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

		DosenPeer::addSelectColumns($c);
		$startcol2 = (DosenPeer::NUM_COLUMNS - DosenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		GolonganPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + GolonganPeer::NUM_COLUMNS;

		$c->addJoin(DosenPeer::GOLONGAN_ID, GolonganPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DosenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = GolonganPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getGolongan(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDosen($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDosens();
				$obj2->addDosen($obj1);
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
		return DosenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DosenPeer::ID); 

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
			$comparison = $criteria->getComparison(DosenPeer::ID);
			$selectCriteria->add(DosenPeer::ID, $criteria->remove(DosenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DosenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DosenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dosen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DosenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dosen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DosenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DosenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DosenPeer::DATABASE_NAME, DosenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DosenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DosenPeer::DATABASE_NAME);

		$criteria->add(DosenPeer::ID, $pk);


		$v = DosenPeer::doSelect($criteria, $con);

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
			$criteria->add(DosenPeer::ID, $pks, Criteria::IN);
			$objs = DosenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDosenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DosenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DosenMapBuilder');
}
