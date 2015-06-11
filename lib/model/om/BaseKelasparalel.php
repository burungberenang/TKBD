<?php


abstract class BaseKelasparalel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $status;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $matakuliah_id;

	
	protected $aMatakuliah;

	
	protected $collAbsensis;

	
	protected $lastAbsensiCriteria = null;

	
	protected $collKelasparalelHasDosens;

	
	protected $lastKelasparalelHasDosenCriteria = null;

	
	protected $collKelasparalelHasJadwals;

	
	protected $lastKelasparalelHasJadwalCriteria = null;

	
	protected $collMahasiswaHasKelasparalels;

	
	protected $lastMahasiswaHasKelasparalelCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getStatus()
	{

		return $this->status;
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

	
	public function getMatakuliahId()
	{

		return $this->matakuliah_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = KelasparalelPeer::ID;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = KelasparalelPeer::NAMA;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = KelasparalelPeer::STATUS;
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
			$this->modifiedColumns[] = KelasparalelPeer::CREATED_AT;
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
			$this->modifiedColumns[] = KelasparalelPeer::UPDATED_AT;
		}

	} 
	
	public function setMatakuliahId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->matakuliah_id !== $v) {
			$this->matakuliah_id = $v;
			$this->modifiedColumns[] = KelasparalelPeer::MATAKULIAH_ID;
		}

		if ($this->aMatakuliah !== null && $this->aMatakuliah->getId() !== $v) {
			$this->aMatakuliah = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nama = $rs->getString($startcol + 1);

			$this->status = $rs->getInt($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->matakuliah_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Kelasparalel object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasparalelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KelasparalelPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(KelasparalelPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(KelasparalelPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasparalelPeer::DATABASE_NAME);
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


												
			if ($this->aMatakuliah !== null) {
				if ($this->aMatakuliah->isModified()) {
					$affectedRows += $this->aMatakuliah->save($con);
				}
				$this->setMatakuliah($this->aMatakuliah);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KelasparalelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KelasparalelPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAbsensis !== null) {
				foreach($this->collAbsensis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collKelasparalelHasDosens !== null) {
				foreach($this->collKelasparalelHasDosens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collKelasparalelHasJadwals !== null) {
				foreach($this->collKelasparalelHasJadwals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMahasiswaHasKelasparalels !== null) {
				foreach($this->collMahasiswaHasKelasparalels as $referrerFK) {
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


												
			if ($this->aMatakuliah !== null) {
				if (!$this->aMatakuliah->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMatakuliah->getValidationFailures());
				}
			}


			if (($retval = KelasparalelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAbsensis !== null) {
					foreach($this->collAbsensis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collKelasparalelHasDosens !== null) {
					foreach($this->collKelasparalelHasDosens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collKelasparalelHasJadwals !== null) {
					foreach($this->collKelasparalelHasJadwals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMahasiswaHasKelasparalels !== null) {
					foreach($this->collMahasiswaHasKelasparalels as $referrerFK) {
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
		$pos = KelasparalelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNama();
				break;
			case 2:
				return $this->getStatus();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			case 4:
				return $this->getUpdatedAt();
				break;
			case 5:
				return $this->getMatakuliahId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasparalelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getStatus(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getUpdatedAt(),
			$keys[5] => $this->getMatakuliahId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasparalelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNama($value);
				break;
			case 2:
				$this->setStatus($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
			case 4:
				$this->setUpdatedAt($value);
				break;
			case 5:
				$this->setMatakuliahId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasparalelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMatakuliahId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KelasparalelPeer::DATABASE_NAME);

		if ($this->isColumnModified(KelasparalelPeer::ID)) $criteria->add(KelasparalelPeer::ID, $this->id);
		if ($this->isColumnModified(KelasparalelPeer::NAMA)) $criteria->add(KelasparalelPeer::NAMA, $this->nama);
		if ($this->isColumnModified(KelasparalelPeer::STATUS)) $criteria->add(KelasparalelPeer::STATUS, $this->status);
		if ($this->isColumnModified(KelasparalelPeer::CREATED_AT)) $criteria->add(KelasparalelPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(KelasparalelPeer::UPDATED_AT)) $criteria->add(KelasparalelPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(KelasparalelPeer::MATAKULIAH_ID)) $criteria->add(KelasparalelPeer::MATAKULIAH_ID, $this->matakuliah_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KelasparalelPeer::DATABASE_NAME);

		$criteria->add(KelasparalelPeer::ID, $this->id);

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

		$copyObj->setNama($this->nama);

		$copyObj->setStatus($this->status);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setMatakuliahId($this->matakuliah_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAbsensis() as $relObj) {
				$copyObj->addAbsensi($relObj->copy($deepCopy));
			}

			foreach($this->getKelasparalelHasDosens() as $relObj) {
				$copyObj->addKelasparalelHasDosen($relObj->copy($deepCopy));
			}

			foreach($this->getKelasparalelHasJadwals() as $relObj) {
				$copyObj->addKelasparalelHasJadwal($relObj->copy($deepCopy));
			}

			foreach($this->getMahasiswaHasKelasparalels() as $relObj) {
				$copyObj->addMahasiswaHasKelasparalel($relObj->copy($deepCopy));
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
			self::$peer = new KelasparalelPeer();
		}
		return self::$peer;
	}

	
	public function setMatakuliah($v)
	{


		if ($v === null) {
			$this->setMatakuliahId(NULL);
		} else {
			$this->setMatakuliahId($v->getId());
		}


		$this->aMatakuliah = $v;
	}


	
	public function getMatakuliah($con = null)
	{
		if ($this->aMatakuliah === null && ($this->matakuliah_id !== null)) {
						include_once 'lib/model/om/BaseMatakuliahPeer.php';

			$this->aMatakuliah = MatakuliahPeer::retrieveByPK($this->matakuliah_id, $con);

			
		}
		return $this->aMatakuliah;
	}

	
	public function initAbsensis()
	{
		if ($this->collAbsensis === null) {
			$this->collAbsensis = array();
		}
	}

	
	public function getAbsensis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAbsensiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAbsensis === null) {
			if ($this->isNew()) {
			   $this->collAbsensis = array();
			} else {

				$criteria->add(AbsensiPeer::KELASPARALEL_ID, $this->getId());

				AbsensiPeer::addSelectColumns($criteria);
				$this->collAbsensis = AbsensiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AbsensiPeer::KELASPARALEL_ID, $this->getId());

				AbsensiPeer::addSelectColumns($criteria);
				if (!isset($this->lastAbsensiCriteria) || !$this->lastAbsensiCriteria->equals($criteria)) {
					$this->collAbsensis = AbsensiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAbsensiCriteria = $criteria;
		return $this->collAbsensis;
	}

	
	public function countAbsensis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAbsensiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AbsensiPeer::KELASPARALEL_ID, $this->getId());

		return AbsensiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAbsensi(Absensi $l)
	{
		$this->collAbsensis[] = $l;
		$l->setKelasparalel($this);
	}


	
	public function getAbsensisJoinDosen($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAbsensiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAbsensis === null) {
			if ($this->isNew()) {
				$this->collAbsensis = array();
			} else {

				$criteria->add(AbsensiPeer::KELASPARALEL_ID, $this->getId());

				$this->collAbsensis = AbsensiPeer::doSelectJoinDosen($criteria, $con);
			}
		} else {
									
			$criteria->add(AbsensiPeer::KELASPARALEL_ID, $this->getId());

			if (!isset($this->lastAbsensiCriteria) || !$this->lastAbsensiCriteria->equals($criteria)) {
				$this->collAbsensis = AbsensiPeer::doSelectJoinDosen($criteria, $con);
			}
		}
		$this->lastAbsensiCriteria = $criteria;

		return $this->collAbsensis;
	}

	
	public function initKelasparalelHasDosens()
	{
		if ($this->collKelasparalelHasDosens === null) {
			$this->collKelasparalelHasDosens = array();
		}
	}

	
	public function getKelasparalelHasDosens($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasparalelHasDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasparalelHasDosens === null) {
			if ($this->isNew()) {
			   $this->collKelasparalelHasDosens = array();
			} else {

				$criteria->add(KelasparalelHasDosenPeer::KELASPARALEL_ID, $this->getId());

				KelasparalelHasDosenPeer::addSelectColumns($criteria);
				$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasparalelHasDosenPeer::KELASPARALEL_ID, $this->getId());

				KelasparalelHasDosenPeer::addSelectColumns($criteria);
				if (!isset($this->lastKelasparalelHasDosenCriteria) || !$this->lastKelasparalelHasDosenCriteria->equals($criteria)) {
					$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastKelasparalelHasDosenCriteria = $criteria;
		return $this->collKelasparalelHasDosens;
	}

	
	public function countKelasparalelHasDosens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseKelasparalelHasDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(KelasparalelHasDosenPeer::KELASPARALEL_ID, $this->getId());

		return KelasparalelHasDosenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasparalelHasDosen(KelasparalelHasDosen $l)
	{
		$this->collKelasparalelHasDosens[] = $l;
		$l->setKelasparalel($this);
	}


	
	public function getKelasparalelHasDosensJoinDosen($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasparalelHasDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasparalelHasDosens === null) {
			if ($this->isNew()) {
				$this->collKelasparalelHasDosens = array();
			} else {

				$criteria->add(KelasparalelHasDosenPeer::KELASPARALEL_ID, $this->getId());

				$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelectJoinDosen($criteria, $con);
			}
		} else {
									
			$criteria->add(KelasparalelHasDosenPeer::KELASPARALEL_ID, $this->getId());

			if (!isset($this->lastKelasparalelHasDosenCriteria) || !$this->lastKelasparalelHasDosenCriteria->equals($criteria)) {
				$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelectJoinDosen($criteria, $con);
			}
		}
		$this->lastKelasparalelHasDosenCriteria = $criteria;

		return $this->collKelasparalelHasDosens;
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

				$criteria->add(KelasparalelHasJadwalPeer::KELASPARALEL_ID, $this->getId());

				KelasparalelHasJadwalPeer::addSelectColumns($criteria);
				$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasparalelHasJadwalPeer::KELASPARALEL_ID, $this->getId());

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

		$criteria->add(KelasparalelHasJadwalPeer::KELASPARALEL_ID, $this->getId());

		return KelasparalelHasJadwalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasparalelHasJadwal(KelasparalelHasJadwal $l)
	{
		$this->collKelasparalelHasJadwals[] = $l;
		$l->setKelasparalel($this);
	}


	
	public function getKelasparalelHasJadwalsJoinJadwal($criteria = null, $con = null)
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

				$criteria->add(KelasparalelHasJadwalPeer::KELASPARALEL_ID, $this->getId());

				$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelectJoinJadwal($criteria, $con);
			}
		} else {
									
			$criteria->add(KelasparalelHasJadwalPeer::KELASPARALEL_ID, $this->getId());

			if (!isset($this->lastKelasparalelHasJadwalCriteria) || !$this->lastKelasparalelHasJadwalCriteria->equals($criteria)) {
				$this->collKelasparalelHasJadwals = KelasparalelHasJadwalPeer::doSelectJoinJadwal($criteria, $con);
			}
		}
		$this->lastKelasparalelHasJadwalCriteria = $criteria;

		return $this->collKelasparalelHasJadwals;
	}

	
	public function initMahasiswaHasKelasparalels()
	{
		if ($this->collMahasiswaHasKelasparalels === null) {
			$this->collMahasiswaHasKelasparalels = array();
		}
	}

	
	public function getMahasiswaHasKelasparalels($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasKelasparalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswaHasKelasparalels === null) {
			if ($this->isNew()) {
			   $this->collMahasiswaHasKelasparalels = array();
			} else {

				$criteria->add(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, $this->getId());

				MahasiswaHasKelasparalelPeer::addSelectColumns($criteria);
				$this->collMahasiswaHasKelasparalels = MahasiswaHasKelasparalelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, $this->getId());

				MahasiswaHasKelasparalelPeer::addSelectColumns($criteria);
				if (!isset($this->lastMahasiswaHasKelasparalelCriteria) || !$this->lastMahasiswaHasKelasparalelCriteria->equals($criteria)) {
					$this->collMahasiswaHasKelasparalels = MahasiswaHasKelasparalelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMahasiswaHasKelasparalelCriteria = $criteria;
		return $this->collMahasiswaHasKelasparalels;
	}

	
	public function countMahasiswaHasKelasparalels($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasKelasparalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, $this->getId());

		return MahasiswaHasKelasparalelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMahasiswaHasKelasparalel(MahasiswaHasKelasparalel $l)
	{
		$this->collMahasiswaHasKelasparalels[] = $l;
		$l->setKelasparalel($this);
	}


	
	public function getMahasiswaHasKelasparalelsJoinMahasiswa($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasKelasparalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswaHasKelasparalels === null) {
			if ($this->isNew()) {
				$this->collMahasiswaHasKelasparalels = array();
			} else {

				$criteria->add(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, $this->getId());

				$this->collMahasiswaHasKelasparalels = MahasiswaHasKelasparalelPeer::doSelectJoinMahasiswa($criteria, $con);
			}
		} else {
									
			$criteria->add(MahasiswaHasKelasparalelPeer::KELASPARALEL_ID, $this->getId());

			if (!isset($this->lastMahasiswaHasKelasparalelCriteria) || !$this->lastMahasiswaHasKelasparalelCriteria->equals($criteria)) {
				$this->collMahasiswaHasKelasparalels = MahasiswaHasKelasparalelPeer::doSelectJoinMahasiswa($criteria, $con);
			}
		}
		$this->lastMahasiswaHasKelasparalelCriteria = $criteria;

		return $this->collMahasiswaHasKelasparalels;
	}

} 