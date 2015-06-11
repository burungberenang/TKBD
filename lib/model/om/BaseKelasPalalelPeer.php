<?php


abstract class BaseKelasPalalelPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'kelas_palalel';

	
	const CLASS_DEFAULT = 'lib.model.KelasPalalel';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'kelas_palalel.ID';

	
	const NAMA = 'kelas_palalel.NAMA';

	
	const STATUS = 'kelas_palalel.STATUS';

	
	const CREATED_AT = 'kelas_palalel.CREATED_AT';

	
	const UPDATED_AT = 'kelas_palalel.UPDATED_AT';

	
	const MATA_KULIAH_ID = 'kelas_palalel.MATA_KULIAH_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nama', 'Status', 'CreatedAt', 'UpdatedAt', 'MataKuliahId', ),
		BasePeer::TYPE_COLNAME => array (KelasPalalelPeer::ID, KelasPalalelPeer::NAMA, KelasPalalelPeer::STATUS, KelasPalalelPeer::CREATED_AT, KelasPalalelPeer::UPDATED_AT, KelasPalalelPeer::MATA_KULIAH_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nama', 'status', 'created_at', 'updated_at', 'mata_kuliah_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nama' => 1, 'Status' => 2, 'CreatedAt' => 3, 'UpdatedAt' => 4, 'MataKuliahId' => 5, ),
		BasePeer::TYPE_COLNAME => array (KelasPalalelPeer::ID => 0, KelasPalalelPeer::NAMA => 1, KelasPalalelPeer::STATUS => 2, KelasPalalelPeer::CREATED_AT => 3, KelasPalalelPeer::UPDATED_AT => 4, KelasPalalelPeer::MATA_KULIAH_ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nama' => 1, 'status' => 2, 'created_at' => 3, 'updated_at' => 4, 'mata_kuliah_id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/KelasPalalelMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.KelasPalalelMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = KelasPalalelPeer::getTableMap();
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
		return str_replace(KelasPalalelPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(KelasPalalelPeer::ID);

		$criteria->addSelectColumn(KelasPalalelPeer::NAMA);

		$criteria->addSelectColumn(KelasPalalelPeer::STATUS);

		$criteria->addSelectColumn(KelasPalalelPeer::CREATED_AT);

		$criteria->addSelectColumn(KelasPalalelPeer::UPDATED_AT);

		$criteria->addSelectColumn(KelasPalalelPeer::MATA_KULIAH_ID);

	}

	const COUNT = 'COUNT(kelas_palalel.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT kelas_palalel.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = KelasPalalelPeer::doSelectRS($criteria, $con);
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
		$objects = KelasPalalelPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return KelasPalalelPeer::populateObjects(KelasPalalelPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			KelasPalalelPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = KelasPalalelPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinMataKuliah(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelPeer::MATA_KULIAH_ID, MataKuliahPeer::ID);

		$rs = KelasPalalelPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinMataKuliah(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		KelasPalalelPeer::addSelectColumns($c);
		$startcol = (KelasPalalelPeer::NUM_COLUMNS - KelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MataKuliahPeer::addSelectColumns($c);

		$c->addJoin(KelasPalalelPeer::MATA_KULIAH_ID, MataKuliahPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MataKuliahPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getMataKuliah(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addKelasPalalel($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initKelasPalalels();
				$obj2->addKelasPalalel($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(KelasPalalelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(KelasPalalelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(KelasPalalelPeer::MATA_KULIAH_ID, MataKuliahPeer::ID);

		$rs = KelasPalalelPeer::doSelectRS($criteria, $con);
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

		KelasPalalelPeer::addSelectColumns($c);
		$startcol2 = (KelasPalalelPeer::NUM_COLUMNS - KelasPalalelPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MataKuliahPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MataKuliahPeer::NUM_COLUMNS;

		$c->addJoin(KelasPalalelPeer::MATA_KULIAH_ID, MataKuliahPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = KelasPalalelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = MataKuliahPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMataKuliah(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addKelasPalalel($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initKelasPalalels();
				$obj2->addKelasPalalel($obj1);
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
		return KelasPalalelPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(KelasPalalelPeer::ID); 

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
			$comparison = $criteria->getComparison(KelasPalalelPeer::ID);
			$selectCriteria->add(KelasPalalelPeer::ID, $criteria->remove(KelasPalalelPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(KelasPalalelPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(KelasPalalelPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof KelasPalalel) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(KelasPalalelPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(KelasPalalel $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(KelasPalalelPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(KelasPalalelPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(KelasPalalelPeer::DATABASE_NAME, KelasPalalelPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = KelasPalalelPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(KelasPalalelPeer::DATABASE_NAME);

		$criteria->add(KelasPalalelPeer::ID, $pk);


		$v = KelasPalalelPeer::doSelect($criteria, $con);

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
			$criteria->add(KelasPalalelPeer::ID, $pks, Criteria::IN);
			$objs = KelasPalalelPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseKelasPalalelPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/KelasPalalelMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.KelasPalalelMapBuilder');
}
