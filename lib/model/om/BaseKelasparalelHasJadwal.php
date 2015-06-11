<?php


abstract class BaseKelasparalelHasJadwal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $kelasparalel_id;


	
	protected $jadwal_id;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $id;

	
	protected $aKelasparalel;

	
	protected $aJadwal;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getKelasparalelId()
	{

		return $this->kelasparalel_id;
	}

	
	public function getJadwalId()
	{

		return $this->jadwal_id;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setKelasparalelId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->kelasparalel_id !== $v) {
			$this->kelasparalel_id = $v;
			$this->modifiedColumns[] = KelasparalelHasJadwalPeer::KELASPARALEL_ID;
		}

		if ($this->aKelasparalel !== null && $this->aKelasparalel->getId() !== $v) {
			$this->aKelasparalel = null;
		}

	} 
	
	public function setJadwalId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->jadwal_id !== $v) {
			$this->jadwal_id = $v;
			$this->modifiedColumns[] = KelasparalelHasJadwalPeer::JADWAL_ID;
		}

		if ($this->aJadwal !== null && $this->aJadwal->getId() !== $v) {
			$this->aJadwal = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = KelasparalelHasJadwalPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = KelasparalelHasJadwalPeer::UPDATED_AT;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = KelasparalelHasJadwalPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->kelasparalel_id = $rs->getInt($startcol + 0);

			$this->jadwal_id = $rs->getInt($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating KelasparalelHasJadwal object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasparalelHasJadwalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KelasparalelHasJadwalPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(KelasparalelHasJadwalPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(KelasparalelHasJadwalPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasparalelHasJadwalPeer::DATABASE_NAME);
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


												
			if ($this->aKelasparalel !== null) {
				if ($this->aKelasparalel->isModified()) {
					$affectedRows += $this->aKelasparalel->save($con);
				}
				$this->setKelasparalel($this->aKelasparalel);
			}

			if ($this->aJadwal !== null) {
				if ($this->aJadwal->isModified()) {
					$affectedRows += $this->aJadwal->save($con);
				}
				$this->setJadwal($this->aJadwal);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KelasparalelHasJadwalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KelasparalelHasJadwalPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aKelasparalel !== null) {
				if (!$this->aKelasparalel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKelasparalel->getValidationFailures());
				}
			}

			if ($this->aJadwal !== null) {
				if (!$this->aJadwal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJadwal->getValidationFailures());
				}
			}


			if (($retval = KelasparalelHasJadwalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasparalelHasJadwalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getKelasparalelId();
				break;
			case 1:
				return $this->getJadwalId();
				break;
			case 2:
				return $this->getCreatedAt();
				break;
			case 3:
				return $this->getUpdatedAt();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasparalelHasJadwalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getKelasparalelId(),
			$keys[1] => $this->getJadwalId(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasparalelHasJadwalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setKelasparalelId($value);
				break;
			case 1:
				$this->setJadwalId($value);
				break;
			case 2:
				$this->setCreatedAt($value);
				break;
			case 3:
				$this->setUpdatedAt($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasparalelHasJadwalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setKelasparalelId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setJadwalId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KelasparalelHasJadwalPeer::DATABASE_NAME);

		if ($this->isColumnModified(KelasparalelHasJadwalPeer::KELASPARALEL_ID)) $criteria->add(KelasparalelHasJadwalPeer::KELASPARALEL_ID, $this->kelasparalel_id);
		if ($this->isColumnModified(KelasparalelHasJadwalPeer::JADWAL_ID)) $criteria->add(KelasparalelHasJadwalPeer::JADWAL_ID, $this->jadwal_id);
		if ($this->isColumnModified(KelasparalelHasJadwalPeer::CREATED_AT)) $criteria->add(KelasparalelHasJadwalPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(KelasparalelHasJadwalPeer::UPDATED_AT)) $criteria->add(KelasparalelHasJadwalPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(KelasparalelHasJadwalPeer::ID)) $criteria->add(KelasparalelHasJadwalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KelasparalelHasJadwalPeer::DATABASE_NAME);

		$criteria->add(KelasparalelHasJadwalPeer::ID, $this->id);

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

		$copyObj->setKelasparalelId($this->kelasparalel_id);

		$copyObj->setJadwalId($this->jadwal_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


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
			self::$peer = new KelasparalelHasJadwalPeer();
		}
		return self::$peer;
	}

	
	public function setKelasparalel($v)
	{


		if ($v === null) {
			$this->setKelasparalelId(NULL);
		} else {
			$this->setKelasparalelId($v->getId());
		}


		$this->aKelasparalel = $v;
	}


	
	public function getKelasparalel($con = null)
	{
		if ($this->aKelasparalel === null && ($this->kelasparalel_id !== null)) {
						include_once 'lib/model/om/BaseKelasparalelPeer.php';

			$this->aKelasparalel = KelasparalelPeer::retrieveByPK($this->kelasparalel_id, $con);

			
		}
		return $this->aKelasparalel;
	}

	
	public function setJadwal($v)
	{


		if ($v === null) {
			$this->setJadwalId(NULL);
		} else {
			$this->setJadwalId($v->getId());
		}


		$this->aJadwal = $v;
	}


	
	public function getJadwal($con = null)
	{
		if ($this->aJadwal === null && ($this->jadwal_id !== null)) {
						include_once 'lib/model/om/BaseJadwalPeer.php';

			$this->aJadwal = JadwalPeer::retrieveByPK($this->jadwal_id, $con);

			
		}
		return $this->aJadwal;
	}

} 