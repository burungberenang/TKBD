<?php


abstract class BaseSlipgajiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'slipgaji';

	
	const CLASS_DEFAULT = 'lib.model.Slipgaji';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'slipgaji.ID';

	
	const GRAND_TOTAL = 'slipgaji.GRAND_TOTAL';

	
	const PAJAK = 'slipgaji.PAJAK';

	
	const CREATED_AT = 'slipgaji.CREATED_AT';

	
	const DOSEN_ID = 'slipgaji.DOSEN_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'GrandTotal', 'Pajak', 'CreatedAt', 'DosenId', ),
		BasePeer::TYPE_COLNAME => array (SlipgajiPeer::ID, SlipgajiPeer::GRAND_TOTAL, SlipgajiPeer::PAJAK, SlipgajiPeer::CREATED_AT, SlipgajiPeer::DOSEN_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'grand_total', 'pajak', 'created_at', 'dosen_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'GrandTotal' => 1, 'Pajak' => 2, 'CreatedAt' => 3, 'DosenId' => 4, ),
		BasePeer::TYPE_COLNAME => array (SlipgajiPeer::ID => 0, SlipgajiPeer::GRAND_TOTAL => 1, SlipgajiPeer::PAJAK => 2, SlipgajiPeer::CREATED_AT => 3, SlipgajiPeer::DOSEN_ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'grand_total' => 1, 'pajak' => 2, 'created_at' => 3, 'dosen_id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/SlipgajiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.SlipgajiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SlipgajiPeer::getTableMap();
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
		return str_replace(SlipgajiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SlipgajiPeer::ID);

		$criteria->addSelectColumn(SlipgajiPeer::GRAND_TOTAL);

		$criteria->addSelectColumn(SlipgajiPeer::PAJAK);

		$criteria->addSelectColumn(SlipgajiPeer::CREATED_AT);

		$criteria->addSelectColumn(SlipgajiPeer::DOSEN_ID);

	}

	const COUNT = 'COUNT(slipgaji.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT slipgaji.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SlipgajiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SlipgajiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SlipgajiPeer::doSelectRS($criteria, $con);
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
		$objects = SlipgajiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SlipgajiPeer::populateObjects(SlipgajiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SlipgajiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SlipgajiPeer::getOMClass();
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
			$criteria->addSelectColumn(SlipgajiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SlipgajiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SlipgajiPeer::DOSEN_ID, DosenPeer::ID);

		$rs = SlipgajiPeer::doSelectRS($criteria, $con);
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

		SlipgajiPeer::addSelectColumns($c);
		$startcol = (SlipgajiPeer::NUM_COLUMNS - SlipgajiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DosenPeer::addSelectColumns($c);

		$c->addJoin(SlipgajiPeer::DOSEN_ID, DosenPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SlipgajiPeer::getOMClass();

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
										$temp_obj2->addSlipgaji($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSlipgajis();
				$obj2->addSlipgaji($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SlipgajiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SlipgajiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SlipgajiPeer::DOSEN_ID, DosenPeer::ID);

		$rs = SlipgajiPeer::doSelectRS($criteria, $con);
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

		SlipgajiPeer::addSelectColumns($c);
		$startcol2 = (SlipgajiPeer::NUM_COLUMNS - SlipgajiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DosenPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DosenPeer::NUM_COLUMNS;

		$c->addJoin(SlipgajiPeer::DOSEN_ID, DosenPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SlipgajiPeer::getOMClass();


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
					$temp_obj2->addSlipgaji($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSlipgajis();
				$obj2->addSlipgaji($obj1);
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
		return SlipgajiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SlipgajiPeer::ID); 

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
			$comparison = $criteria->getComparison(SlipgajiPeer::ID);
			$selectCriteria->add(SlipgajiPeer::ID, $criteria->remove(SlipgajiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(SlipgajiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SlipgajiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Slipgaji) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SlipgajiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Slipgaji $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SlipgajiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SlipgajiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SlipgajiPeer::DATABASE_NAME, SlipgajiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SlipgajiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SlipgajiPeer::DATABASE_NAME);

		$criteria->add(SlipgajiPeer::ID, $pk);


		$v = SlipgajiPeer::doSelect($criteria, $con);

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
			$criteria->add(SlipgajiPeer::ID, $pks, Criteria::IN);
			$objs = SlipgajiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSlipgajiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/SlipgajiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.SlipgajiMapBuilder');
}
