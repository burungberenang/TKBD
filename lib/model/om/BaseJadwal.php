<?php


abstract class BaseJadwal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $jam_id;


	
	protected $hari_id;

	
	protected $aJam;

	
	protected $aHari;

	
	protected $collKelasparalelHasJadwals;

	
	protected $lastKelasparalelHasJadwalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getJamId()
	{

		return $this->jam_id;
	}

	
	public function getHariId()
	{

		return $this->hari_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = JadwalPeer::ID;
		}

	} 
	
	public function setJamId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->jam_id !== $v) {
			$this->jam_id = $v;
			$this->modifiedColumns[] = JadwalPeer::JAM_ID;
		}

		if ($this->aJam !== null && $this->aJam->getId() !== $v) {
			$this->aJam = null;
		}

	} 
	
	public function setHariId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->hari_id !== $v) {
			$this->hari_id = $v;
			$this->modifiedColumns[] = JadwalPeer::HARI_ID;
		}

		if ($this->aHari !== null && $this->aHari->getId() !== $v) {
			$this->aHari = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->jam_id = $rs->getInt($startcol + 1);

			$this->hari_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Jadwal object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JadwalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			JadwalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(JadwalPeer::DATABASE_NAME);
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


												
			if ($this->aJam !== null) {
				if ($this->aJam->isModified()) {
					$affectedRows += $this->aJam->save($con);
				}
				$this->setJam($this->aJam);
			}

			if ($this->aHari !== null) {
				if ($this->aHari->isModified()) {
					$affectedRows += $this->aHari->save($con);
				}
				$this->setHari($this->aHari);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = JadwalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += JadwalPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collKelasparalelHasJadwals !== null) {
				foreach($this->collKelasparalelHasJadwals as $referrerFK) {
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


												
			if ($this->aJam !== null) {
				if (!$this->aJam->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJam->getValidationFailures());
				}
			}

			if ($this->aHari !== null) {
				if (!$this->aHari->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHari->getValidationFailures());
				}
			}


			if (($retval = JadwalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collKelasparalelHasJadwals !== null) {
					foreach($this->collKelasparalelHasJadwals as $referrerFK) {
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
		$pos = JadwalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getJamId();
				break;
			case 2:
				return $this->getHariId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JadwalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getJamId(),
			$keys[2] => $this->getHariId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = JadwalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setJamId($value);
				break;
			case 2:
				$this->setHariId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JadwalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setJamId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHariId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(JadwalPeer::DATABASE_NAME);

		if ($this->isColumnModified(JadwalPeer::ID)) $criteria->add(JadwalPeer::ID, $this->id);
		if ($this->isColumnModified(JadwalPeer::JAM_ID)) $criteria->add(JadwalPeer::JAM_ID, $this->jam_id);
		if ($this->isColumnModified(JadwalPeer::HARI_ID)) $criteria->add(JadwalPeer::HARI_ID, $this->hari_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(JadwalPeer::DATABASE_NAME);

		$criteria->add(JadwalPeer::ID, $this->id);

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

		$copyObj->setJamId($this->jam_id);

		$copyObj->setHariId($this->hari_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getKelasparalelHasJadwals() as $relObj) {
				$copyObj->addKelasparalelHasJadwal($relObj->copy($deepCopy));
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
			self::$peer = new JadwalPeer();
		}
		return self::$peer;
	}

	
	public function setJam($v)
	{


		if ($v === null) {
			$this->setJamId(NULL);
		} else {
			$this->setJamId($v->getId());
		}


		$this->aJam = $v;
	}


	
	public function getJam($con = null)
	{
		if ($this->aJam === null && ($this->jam_id !== null)) {
						include_once 'lib/model/om/BaseJamPeer.php';

			$this->aJam = JamPeer::retrieveByPK($this->jam_id, $con);

			
		}
		return $this->aJam;
	}

	
	public function setHari($v)
	{


		if ($v === null) {
			$this->setHariId(NULL);
		} else {
			$this->setHariId($v->getId());
		}


		$this->aHari = $v;
	}


	
	public function getHari($con = null)
	{
		if ($this->aHari === null && ($this->hari_id !== null)) {
						include_once 'lib/model/om/BaseHariPeer.php';

			$this->aHari = HariPeer::retrieveByPK($this->hari_id, $con);

			
		}
		return $this->aHari;
	}

	
	public function initKelasparalelHasJadwals()
	{
		if ($this->collKelasparalelHasJadwals === null) {
			$this->collKelasparalelHasJadwals = array();
		}
	}

	
	public function getKelasparalelHasJadwals($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasparalelHasJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasparalelHasJadwals === null) {
			if ($this->isNew()) {
			   $this->collKelasparalelHasJadwals = array();
			} else {

				$criteria->add(KelasparalelHasJadwalPeer::JADWAL_ID, $this->getId());

				KelasparalelHasJadwalPeer::addSelectColumns($criteria);
				$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasparalelHasJadwalPeer::JADWAL_ID, $this->getId());

				KelasparalelHasJadwalPeer::addSelectColumns($criteria);
				if (!isset($this->lastKelasparalelHasJadwalCriteria) || !$this->lastKelasparalelHasJadwalCriteria->equals($criteria)) {
					$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastKelasparalelHasJadwalCriteria = $criteria;
		return $this->collKelasparalelHasJadwals;
	}

	
	public function countKelasparalelHasJadwals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseKelasparalelHasJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(KelasparalelHasJadwalPeer::JADWAL_ID, $this->getId());

		return KelasparalelHasJadwalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasparalelHasJadwal(KelasparalelHasJadwal $l)
	{
		$this->collKelasparalelHasJadwals[] = $l;
		$l->setJadwal($this);
	}


	
	public function getKelasparalelHasJadwalsJoinKelasparalel($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasparalelHasJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasparalelHasJadwals === null) {
			if ($this->isNew()) {
				$this->collKelasparalelHasJadwals = array();
			} else {

				$criteria->add(KelasparalelHasJadwalPeer::JADWAL_ID, $this->getId());

				$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelectJoinKelasparalel($criteria, $con);
			}
		} else {
									
			$criteria->add(KelasparalelHasJadwalPeer::JADWAL_ID, $this->getId());

			if (!isset($this->lastKelasparalelHasJadwalCriteria) || !$this->lastKelasparalelHasJadwalCriteria->equals($criteria)) {
				$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelectJoinKelasparalel($criteria, $con);
			}
		}
		$this->lastKelasparalelHasJadwalCriteria = $criteria;

		return $this->collKelasparalelHasJadwals;
	}

} 