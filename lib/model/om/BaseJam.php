<?php


abstract class BaseJam extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $jam;

	
	protected $collJadwals;

	
	protected $lastJadwalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getJam()
	{

		return $this->jam;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = JamPeer::ID;
		}

	} 
	
	public function setJam($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->jam !== $v) {
			$this->jam = $v;
			$this->modifiedColumns[] = JamPeer::JAM;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->jam = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Jam object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			JamPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = JamPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += JamPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collJadwals !== null) {
				foreach($this->collJadwals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = JamPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collJadwals !== null) {
					foreach($this->collJadwals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = JamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getJam();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JamPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getJam(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = JamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setJam($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JamPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setJam($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(JamPeer::DATABASE_NAME);

		if ($this->isColumnModified(JamPeer::ID)) $criteria->add(JamPeer::ID, $this->id);
		if ($this->isColumnModified(JamPeer::JAM)) $criteria->add(JamPeer::JAM, $this->jam);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(JamPeer::DATABASE_NAME);

		$criteria->add(JamPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setJam($this->jam);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getJadwals() as $relObj) {
				$copyObj->addJadwal($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new JamPeer();
		}
		return self::$peer;
	}

	
	public function initJadwals()
	{
		if ($this->collJadwals === null) {
			$this->collJadwals = array();
		}
	}

	
	public function getJadwals($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collJadwals === null) {
			if ($this->isNew()) {
			   $this->collJadwals = array();
			} else {

				$criteria->add(JadwalPeer::JAM_ID, $this->getId());

				JadwalPeer::addSelectColumns($criteria);
				$this->collJadwals = JadwalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(JadwalPeer::JAM_ID, $this->getId());

				JadwalPeer::addSelectColumns($criteria);
				if (!isset($this->lastJadwalCriteria) || !$this->lastJadwalCriteria->equals($criteria)) {
					$this->collJadwals = JadwalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastJadwalCriteria = $criteria;
		return $this->collJadwals;
	}

	
	public function countJadwals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(JadwalPeer::JAM_ID, $this->getId());

		return JadwalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addJadwal(Jadwal $l)
	{
		$this->collJadwals[] = $l;
		$l->setJam($this);
	}


	
	public function getJadwalsJoinHari($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collJadwals === null) {
			if ($this->isNew()) {
				$this->collJadwals = array();
			} else {

				$criteria->add(JadwalPeer::JAM_ID, $this->getId());

				$this->collJadwals = JadwalPeer::doSelectJoinHari($criteria, $con);
			}
		} else {
									
			$criteria->add(JadwalPeer::JAM_ID, $this->getId());

			if (!isset($this->lastJadwalCriteria) || !$this->lastJadwalCriteria->equals($criteria)) {
				$this->collJadwals = JadwalPeer::doSelectJoinHari($criteria, $con);
			}
		}
		$this->lastJadwalCriteria = $criteria;

		return $this->collJadwals;
	}

} 