<?php


abstract class BaseGolongan extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $kode;


	
	protected $gaji_pokok;


	
	protected $gaji_sks;


	
	protected $gaji_sks_inggris;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collDosens;

	
	protected $lastDosenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getKode()
	{

		return $this->kode;
	}

	
	public function getGajiPokok()
	{

		return $this->gaji_pokok;
	}

	
	public function getGajiSks()
	{

		return $this->gaji_sks;
	}

	
	public function getGajiSksInggris()
	{

		return $this->gaji_sks_inggris;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GolonganPeer::ID;
		}

	} 
	
	public function setKode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kode !== $v) {
			$this->kode = $v;
			$this->modifiedColumns[] = GolonganPeer::KODE;
		}

	} 
	
	public function setGajiPokok($v)
	{

		if ($this->gaji_pokok !== $v) {
			$this->gaji_pokok = $v;
			$this->modifiedColumns[] = GolonganPeer::GAJI_POKOK;
		}

	} 
	
	public function setGajiSks($v)
	{

		if ($this->gaji_sks !== $v) {
			$this->gaji_sks = $v;
			$this->modifiedColumns[] = GolonganPeer::GAJI_SKS;
		}

	} 
	
	public function setGajiSksInggris($v)
	{

		if ($this->gaji_sks_inggris !== $v) {
			$this->gaji_sks_inggris = $v;
			$this->modifiedColumns[] = GolonganPeer::GAJI_SKS_INGGRIS;
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
			$this->modifiedColumns[] = GolonganPeer::CREATED_AT;
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
			$this->modifiedColumns[] = GolonganPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->kode = $rs->getString($startcol + 1);

			$this->gaji_pokok = $rs->getFloat($startcol + 2);

			$this->gaji_sks = $rs->getFloat($startcol + 3);

			$this->gaji_sks_inggris = $rs->getFloat($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Golongan object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GolonganPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GolonganPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(GolonganPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(GolonganPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GolonganPeer::DATABASE_NAME);
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
					$pk = GolonganPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GolonganPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDosens !== null) {
				foreach($this->collDosens as $referrerFK) {
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


			if (($retval = GolonganPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDosens !== null) {
					foreach($this->collDosens as $referrerFK) {
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
		$pos = GolonganPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getKode();
				break;
			case 2:
				return $this->getGajiPokok();
				break;
			case 3:
				return $this->getGajiSks();
				break;
			case 4:
				return $this->getGajiSksInggris();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GolonganPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getKode(),
			$keys[2] => $this->getGajiPokok(),
			$keys[3] => $this->getGajiSks(),
			$keys[4] => $this->getGajiSksInggris(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GolonganPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setKode($value);
				break;
			case 2:
				$this->setGajiPokok($value);
				break;
			case 3:
				$this->setGajiSks($value);
				break;
			case 4:
				$this->setGajiSksInggris($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GolonganPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setKode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGajiPokok($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGajiSks($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGajiSksInggris($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GolonganPeer::DATABASE_NAME);

		if ($this->isColumnModified(GolonganPeer::ID)) $criteria->add(GolonganPeer::ID, $this->id);
		if ($this->isColumnModified(GolonganPeer::KODE)) $criteria->add(GolonganPeer::KODE, $this->kode);
		if ($this->isColumnModified(GolonganPeer::GAJI_POKOK)) $criteria->add(GolonganPeer::GAJI_POKOK, $this->gaji_pokok);
		if ($this->isColumnModified(GolonganPeer::GAJI_SKS)) $criteria->add(GolonganPeer::GAJI_SKS, $this->gaji_sks);
		if ($this->isColumnModified(GolonganPeer::GAJI_SKS_INGGRIS)) $criteria->add(GolonganPeer::GAJI_SKS_INGGRIS, $this->gaji_sks_inggris);
		if ($this->isColumnModified(GolonganPeer::CREATED_AT)) $criteria->add(GolonganPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(GolonganPeer::UPDATED_AT)) $criteria->add(GolonganPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GolonganPeer::DATABASE_NAME);

		$criteria->add(GolonganPeer::ID, $this->id);

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

		$copyObj->setKode($this->kode);

		$copyObj->setGajiPokok($this->gaji_pokok);

		$copyObj->setGajiSks($this->gaji_sks);

		$copyObj->setGajiSksInggris($this->gaji_sks_inggris);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDosens() as $relObj) {
				$copyObj->addDosen($relObj->copy($deepCopy));
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
			self::$peer = new GolonganPeer();
		}
		return self::$peer;
	}

	
	public function initDosens()
	{
		if ($this->collDosens === null) {
			$this->collDosens = array();
		}
	}

	
	public function getDosens($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDosens === null) {
			if ($this->isNew()) {
			   $this->collDosens = array();
			} else {

				$criteria->add(DosenPeer::GOLONGAN_ID, $this->getId());

				DosenPeer::addSelectColumns($criteria);
				$this->collDosens = DosenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DosenPeer::GOLONGAN_ID, $this->getId());

				DosenPeer::addSelectColumns($criteria);
				if (!isset($this->lastDosenCriteria) || !$this->lastDosenCriteria->equals($criteria)) {
					$this->collDosens = DosenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDosenCriteria = $criteria;
		return $this->collDosens;
	}

	
	public function countDosens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DosenPeer::GOLONGAN_ID, $this->getId());

		return DosenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDosen(Dosen $l)
	{
		$this->collDosens[] = $l;
		$l->setGolongan($this);
	}

} 