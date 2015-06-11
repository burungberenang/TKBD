<?php


abstract class BaseKelasPalalel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $status;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $mata_kuliah_id;

	
	protected $aMataKuliah;

	
	protected $collAbsensis;

	
	protected $lastAbsensiCriteria = null;

	
	protected $collKelasParalelHasDosens;

	
	protected $lastKelasParalelHasDosenCriteria = null;

	
	protected $collKelasPalalelHasJadwals;

	
	protected $lastKelasPalalelHasJadwalCriteria = null;

	
	protected $collMahasiswaHasKelasPalalels;

	
	protected $lastMahasiswaHasKelasPalalelCriteria = null;

	
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

	
	public function getMataKuliahId()
	{

		return $this->mata_kuliah_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = KelasPalalelPeer::ID;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = KelasPalalelPeer::NAMA;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = KelasPalalelPeer::STATUS;
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
			$this->modifiedColumns[] = KelasPalalelPeer::CREATED_AT;
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
			$this->modifiedColumns[] = KelasPalalelPeer::UPDATED_AT;
		}

	} 
	
	public function setMataKuliahId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->mata_kuliah_id !== $v) {
			$this->mata_kuliah_id = $v;
			$this->modifiedColumns[] = KelasPalalelPeer::MATA_KULIAH_ID;
		}

		if ($this->aMataKuliah !== null && $this->aMataKuliah->getId() !== $v) {
			$this->aMataKuliah = null;
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

			$this->mata_kuliah_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating KelasPalalel object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasPalalelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KelasPalalelPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(KelasPalalelPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(KelasPalalelPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasPalalelPeer::DATABASE_NAME);
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


												
			if ($this->aMataKuliah !== null) {
				if ($this->aMataKuliah->isModified()) {
					$affectedRows += $this->aMataKuliah->save($con);
				}
				$this->setMataKuliah($this->aMataKuliah);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KelasPalalelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KelasPalalelPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAbsensis !== null) {
				foreach($this->collAbsensis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collKelasParalelHasDosens !== null) {
				foreach($this->collKelasParalelHasDosens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collKelasPalalelHasJadwals !== null) {
				foreach($this->collKelasPalalelHasJadwals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMahasiswaHasKelasPalalels !== null) {
				foreach($this->collMahasiswaHasKelasPalalels as $referrerFK) {
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


												
			if ($this->aMataKuliah !== null) {
				if (!$this->aMataKuliah->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMataKuliah->getValidationFailures());
				}
			}


			if (($retval = KelasPalalelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAbsensis !== null) {
					foreach($this->collAbsensis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collKelasParalelHasDosens !== null) {
					foreach($this->collKelasParalelHasDosens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collKelasPalalelHasJadwals !== null) {
					foreach($this->collKelasPalalelHasJadwals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMahasiswaHasKelasPalalels !== null) {
					foreach($this->collMahasiswaHasKelasPalalels as $referrerFK) {
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
		$pos = KelasPalalelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMataKuliahId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasPalalelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getStatus(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getUpdatedAt(),
			$keys[5] => $this->getMataKuliahId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasPalalelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setMataKuliahId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasPalalelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMataKuliahId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KelasPalalelPeer::DATABASE_NAME);

		if ($this->isColumnModified(KelasPalalelPeer::ID)) $criteria->add(KelasPalalelPeer::ID, $this->id);
		if ($this->isColumnModified(KelasPalalelPeer::NAMA)) $criteria->add(KelasPalalelPeer::NAMA, $this->nama);
		if ($this->isColumnModified(KelasPalalelPeer::STATUS)) $criteria->add(KelasPalalelPeer::STATUS, $this->status);
		if ($this->isColumnModified(KelasPalalelPeer::CREATED_AT)) $criteria->add(KelasPalalelPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(KelasPalalelPeer::UPDATED_AT)) $criteria->add(KelasPalalelPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(KelasPalalelPeer::MATA_KULIAH_ID)) $criteria->add(KelasPalalelPeer::MATA_KULIAH_ID, $this->mata_kuliah_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KelasPalalelPeer::DATABASE_NAME);

		$criteria->add(KelasPalalelPeer::ID, $this->id);

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

		$copyObj->setMataKuliahId($this->mata_kuliah_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAbsensis() as $relObj) {
				$copyObj->addAbsensi($relObj->copy($deepCopy));
			}

			foreach($this->getKelasParalelHasDosens() as $relObj) {
				$copyObj->addKelasParalelHasDosen($relObj->copy($deepCopy));
			}

			foreach($this->getKelasPalalelHasJadwals() as $relObj) {
				$copyObj->addKelasPalalelHasJadwal($relObj->copy($deepCopy));
			}

			foreach($this->getMahasiswaHasKelasPalalels() as $relObj) {
				$copyObj->addMahasiswaHasKelasPalalel($relObj->copy($deepCopy));
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
			self::$peer = new KelasPalalelPeer();
		}
		return self::$peer;
	}

	
	public function setMataKuliah($v)
	{


		if ($v === null) {
			$this->setMataKuliahId(NULL);
		} else {
			$this->setMataKuliahId($v->getId());
		}


		$this->aMataKuliah = $v;
	}


	
	public function getMataKuliah($con = null)
	{
		if ($this->aMataKuliah === null && ($this->mata_kuliah_id !== null)) {
						include_once 'lib/model/om/BaseMataKuliahPeer.php';

			$this->aMataKuliah = MataKuliahPeer::retrieveByPK($this->mata_kuliah_id, $con);

			
		}
		return $this->aMataKuliah;
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

				$criteria->add(AbsensiPeer::KELAS_PARALEL_ID, $this->getId());

				AbsensiPeer::addSelectColumns($criteria);
				$this->collAbsensis = AbsensiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AbsensiPeer::KELAS_PARALEL_ID, $this->getId());

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

		$criteria->add(AbsensiPeer::KELAS_PARALEL_ID, $this->getId());

		return AbsensiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAbsensi(Absensi $l)
	{
		$this->collAbsensis[] = $l;
		$l->setKelasPalalel($this);
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

				$criteria->add(AbsensiPeer::KELAS_PARALEL_ID, $this->getId());

				$this->collAbsensis = AbsensiPeer::doSelectJoinDosen($criteria, $con);
			}
		} else {
									
			$criteria->add(AbsensiPeer::KELAS_PARALEL_ID, $this->getId());

			if (!isset($this->lastAbsensiCriteria) || !$this->lastAbsensiCriteria->equals($criteria)) {
				$this->collAbsensis = AbsensiPeer::doSelectJoinDosen($criteria, $con);
			}
		}
		$this->lastAbsensiCriteria = $criteria;

		return $this->collAbsensis;
	}

	
	public function initKelasParalelHasDosens()
	{
		if ($this->collKelasParalelHasDosens === null) {
			$this->collKelasParalelHasDosens = array();
		}
	}

	
	public function getKelasParalelHasDosens($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasParalelHasDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasParalelHasDosens === null) {
			if ($this->isNew()) {
			   $this->collKelasParalelHasDosens = array();
			} else {

				$criteria->add(KelasParalelHasDosenPeer::KELAS_PARALEL_ID, $this->getId());

				KelasParalelHasDosenPeer::addSelectColumns($criteria);
				$this->collKelasParalelHasDosens = KelasParalelHasDosenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasParalelHasDosenPeer::KELAS_PARALEL_ID, $this->getId());

				KelasParalelHasDosenPeer::addSelectColumns($criteria);
				if (!isset($this->lastKelasParalelHasDosenCriteria) || !$this->lastKelasParalelHasDosenCriteria->equals($criteria)) {
					$this->collKelasParalelHasDosens = KelasParalelHasDosenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastKelasParalelHasDosenCriteria = $criteria;
		return $this->collKelasParalelHasDosens;
	}

	
	public function countKelasParalelHasDosens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseKelasParalelHasDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(KelasParalelHasDosenPeer::KELAS_PARALEL_ID, $this->getId());

		return KelasParalelHasDosenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasParalelHasDosen(KelasParalelHasDosen $l)
	{
		$this->collKelasParalelHasDosens[] = $l;
		$l->setKelasPalalel($this);
	}


	
	public function getKelasParalelHasDosensJoinDosen($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasParalelHasDosenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasParalelHasDosens === null) {
			if ($this->isNew()) {
				$this->collKelasParalelHasDosens = array();
			} else {

				$criteria->add(KelasParalelHasDosenPeer::KELAS_PARALEL_ID, $this->getId());

				$this->collKelasParalelHasDosens = KelasParalelHasDosenPeer::doSelectJoinDosen($criteria, $con);
			}
		} else {
									
			$criteria->add(KelasParalelHasDosenPeer::KELAS_PARALEL_ID, $this->getId());

			if (!isset($this->lastKelasParalelHasDosenCriteria) || !$this->lastKelasParalelHasDosenCriteria->equals($criteria)) {
				$this->collKelasParalelHasDosens = KelasParalelHasDosenPeer::doSelectJoinDosen($criteria, $con);
			}
		}
		$this->lastKelasParalelHasDosenCriteria = $criteria;

		return $this->collKelasParalelHasDosens;
	}

	
	public function initKelasPalalelHasJadwals()
	{
		if ($this->collKelasPalalelHasJadwals === null) {
			$this->collKelasPalalelHasJadwals = array();
		}
	}

	
	public function getKelasPalalelHasJadwals($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasPalalelHasJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasPalalelHasJadwals === null) {
			if ($this->isNew()) {
			   $this->collKelasPalalelHasJadwals = array();
			} else {

				$criteria->add(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, $this->getId());

				KelasPalalelHasJadwalPeer::addSelectColumns($criteria);
				$this->collKelasPalalelHasJadwals = KelasPalalelHasJadwalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, $this->getId());

				KelasPalalelHasJadwalPeer::addSelectColumns($criteria);
				if (!isset($this->lastKelasPalalelHasJadwalCriteria) || !$this->lastKelasPalalelHasJadwalCriteria->equals($criteria)) {
					$this->collKelasPalalelHasJadwals = KelasPalalelHasJadwalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastKelasPalalelHasJadwalCriteria = $criteria;
		return $this->collKelasPalalelHasJadwals;
	}

	
	public function countKelasPalalelHasJadwals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseKelasPalalelHasJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, $this->getId());

		return KelasPalalelHasJadwalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasPalalelHasJadwal(KelasPalalelHasJadwal $l)
	{
		$this->collKelasPalalelHasJadwals[] = $l;
		$l->setKelasPalalel($this);
	}


	
	public function getKelasPalalelHasJadwalsJoinJadwal($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasPalalelHasJadwalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasPalalelHasJadwals === null) {
			if ($this->isNew()) {
				$this->collKelasPalalelHasJadwals = array();
			} else {

				$criteria->add(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, $this->getId());

				$this->collKelasPalalelHasJadwals = KelasPalalelHasJadwalPeer::doSelectJoinJadwal($criteria, $con);
			}
		} else {
									
			$criteria->add(KelasPalalelHasJadwalPeer::KELAS_PARALEL_ID, $this->getId());

			if (!isset($this->lastKelasPalalelHasJadwalCriteria) || !$this->lastKelasPalalelHasJadwalCriteria->equals($criteria)) {
				$this->collKelasPalalelHasJadwals = KelasPalalelHasJadwalPeer::doSelectJoinJadwal($criteria, $con);
			}
		}
		$this->lastKelasPalalelHasJadwalCriteria = $criteria;

		return $this->collKelasPalalelHasJadwals;
	}

	
	public function initMahasiswaHasKelasPalalels()
	{
		if ($this->collMahasiswaHasKelasPalalels === null) {
			$this->collMahasiswaHasKelasPalalels = array();
		}
	}

	
	public function getMahasiswaHasKelasPalalels($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasKelasPalalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswaHasKelasPalalels === null) {
			if ($this->isNew()) {
			   $this->collMahasiswaHasKelasPalalels = array();
			} else {

				$criteria->add(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, $this->getId());

				MahasiswaHasKelasPalalelPeer::addSelectColumns($criteria);
				$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, $this->getId());

				MahasiswaHasKelasPalalelPeer::addSelectColumns($criteria);
				if (!isset($this->lastMahasiswaHasKelasPalalelCriteria) || !$this->lastMahasiswaHasKelasPalalelCriteria->equals($criteria)) {
					$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMahasiswaHasKelasPalalelCriteria = $criteria;
		return $this->collMahasiswaHasKelasPalalels;
	}

	
	public function countMahasiswaHasKelasPalalels($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasKelasPalalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, $this->getId());

		return MahasiswaHasKelasPalalelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMahasiswaHasKelasPalalel(MahasiswaHasKelasPalalel $l)
	{
		$this->collMahasiswaHasKelasPalalels[] = $l;
		$l->setKelasPalalel($this);
	}


	
	public function getMahasiswaHasKelasPalalelsJoinMahasiswa($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasKelasPalalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswaHasKelasPalalels === null) {
			if ($this->isNew()) {
				$this->collMahasiswaHasKelasPalalels = array();
			} else {

				$criteria->add(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, $this->getId());

				$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelectJoinMahasiswa($criteria, $con);
			}
		} else {
									
			$criteria->add(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, $this->getId());

			if (!isset($this->lastMahasiswaHasKelasPalalelCriteria) || !$this->lastMahasiswaHasKelasPalalelCriteria->equals($criteria)) {
				$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelectJoinMahasiswa($criteria, $con);
			}
		}
		$this->lastMahasiswaHasKelasPalalelCriteria = $criteria;

		return $this->collMahasiswaHasKelasPalalels;
	}

} 