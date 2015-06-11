<?php


abstract class BaseDosen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $npk;


	
	protected $nama;


	
	protected $alamat;


	
	protected $tgl_lahir;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $golongan_id;

	
	protected $aGolongan;

	
	protected $collSlipgajis;

	
	protected $lastSlipgajiCriteria = null;

	
	protected $collAbsensis;

	
	protected $lastAbsensiCriteria = null;

	
	protected $collKelasparalelHasDosens;

	
	protected $lastKelasparalelHasDosenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNpk()
	{

		return $this->npk;
	}

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getAlamat()
	{

		return $this->alamat;
	}

	
	public function getTglLahir($format = 'Y-m-d')
	{

		if ($this->tgl_lahir === null || $this->tgl_lahir === '') {
			return null;
		} elseif (!is_int($this->tgl_lahir)) {
						$ts = strtotime($this->tgl_lahir);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [tgl_lahir] as date/time value: " . var_export($this->tgl_lahir, true));
			}
		} else {
			$ts = $this->tgl_lahir;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function getGolonganId()
	{

		return $this->golongan_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DosenPeer::ID;
		}

	} 
	
	public function setNpk($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->npk !== $v) {
			$this->npk = $v;
			$this->modifiedColumns[] = DosenPeer::NPK;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = DosenPeer::NAMA;
		}

	} 
	
	public function setAlamat($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->alamat !== $v) {
			$this->alamat = $v;
			$this->modifiedColumns[] = DosenPeer::ALAMAT;
		}

	} 
	
	public function setTglLahir($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [tgl_lahir] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->tgl_lahir !== $ts) {
			$this->tgl_lahir = $ts;
			$this->modifiedColumns[] = DosenPeer::TGL_LAHIR;
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
			$this->modifiedColumns[] = DosenPeer::CREATED_AT;
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
			$this->modifiedColumns[] = DosenPeer::UPDATED_AT;
		}

	} 
	
	public function setGolonganId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->golongan_id !== $v) {
			$this->golongan_id = $v;
			$this->modifiedColumns[] = DosenPeer::GOLONGAN_ID;
		}

		if ($this->aGolongan !== null && $this->aGolongan->getId() !== $v) {
			$this->aGolongan = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->npk = $rs->getString($startcol + 1);

			$this->nama = $rs->getString($startcol + 2);

			$this->alamat = $rs->getString($startcol + 3);

			$this->tgl_lahir = $rs->getDate($startcol + 4, null);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->golongan_id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dosen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DosenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DosenPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(DosenPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DosenPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DosenPeer::DATABASE_NAME);
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


												
			if ($this->aGolongan !== null) {
				if ($this->aGolongan->isModified()) {
					$affectedRows += $this->aGolongan->save($con);
				}
				$this->setGolongan($this->aGolongan);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DosenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DosenPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collSlipgajis !== null) {
				foreach($this->collSlipgajis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aGolongan !== null) {
				if (!$this->aGolongan->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGolongan->getValidationFailures());
				}
			}


			if (($retval = DosenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSlipgajis !== null) {
					foreach($this->collSlipgajis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DosenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNpk();
				break;
			case 2:
				return $this->getNama();
				break;
			case 3:
				return $this->getAlamat();
				break;
			case 4:
				return $this->getTglLahir();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getGolonganId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DosenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNpk(),
			$keys[2] => $this->getNama(),
			$keys[3] => $this->getAlamat(),
			$keys[4] => $this->getTglLahir(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getGolonganId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DosenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNpk($value);
				break;
			case 2:
				$this->setNama($value);
				break;
			case 3:
				$this->setAlamat($value);
				break;
			case 4:
				$this->setTglLahir($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setGolonganId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DosenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNpk($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlamat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTglLahir($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setGolonganId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DosenPeer::DATABASE_NAME);

		if ($this->isColumnModified(DosenPeer::ID)) $criteria->add(DosenPeer::ID, $this->id);
		if ($this->isColumnModified(DosenPeer::NPK)) $criteria->add(DosenPeer::NPK, $this->npk);
		if ($this->isColumnModified(DosenPeer::NAMA)) $criteria->add(DosenPeer::NAMA, $this->nama);
		if ($this->isColumnModified(DosenPeer::ALAMAT)) $criteria->add(DosenPeer::ALAMAT, $this->alamat);
		if ($this->isColumnModified(DosenPeer::TGL_LAHIR)) $criteria->add(DosenPeer::TGL_LAHIR, $this->tgl_lahir);
		if ($this->isColumnModified(DosenPeer::CREATED_AT)) $criteria->add(DosenPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DosenPeer::UPDATED_AT)) $criteria->add(DosenPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DosenPeer::GOLONGAN_ID)) $criteria->add(DosenPeer::GOLONGAN_ID, $this->golongan_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DosenPeer::DATABASE_NAME);

		$criteria->add(DosenPeer::ID, $this->id);

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

		$copyObj->setNpk($this->npk);

		$copyObj->setNama($this->nama);

		$copyObj->setAlamat($this->alamat);

		$copyObj->setTglLahir($this->tgl_lahir);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setGolonganId($this->golongan_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getSlipgajis() as $relObj) {
				$copyObj->addSlipgaji($relObj->copy($deepCopy));
			}

			foreach($this->getAbsensis() as $relObj) {
				$copyObj->addAbsensi($relObj->copy($deepCopy));
			}

			foreach($this->getKelasparalelHasDosens() as $relObj) {
				$copyObj->addKelasparalelHasDosen($relObj->copy($deepCopy));
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
			self::$peer = new DosenPeer();
		}
		return self::$peer;
	}

	
	public function setGolongan($v)
	{


		if ($v === null) {
			$this->setGolonganId(NULL);
		} else {
			$this->setGolonganId($v->getId());
		}


		$this->aGolongan = $v;
	}


	
	public function getGolongan($con = null)
	{
		if ($this->aGolongan === null && ($this->golongan_id !== null)) {
						include_once 'lib/model/om/BaseGolonganPeer.php';

			$this->aGolongan = GolonganPeer::retrieveByPK($this->golongan_id, $con);

			
		}
		return $this->aGolongan;
	}

	
	public function initSlipgajis()
	{
		if ($this->collSlipgajis === null) {
			$this->collSlipgajis = array();
		}
	}

	
	public function getSlipgajis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSlipgajiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSlipgajis === null) {
			if ($this->isNew()) {
			   $this->collSlipgajis = array();
			} else {

				$criteria->add(SlipgajiPeer::DOSEN_ID, $this->getId());

				SlipgajiPeer::addSelectColumns($criteria);
				$this->collSlipgajis = SlipgajiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SlipgajiPeer::DOSEN_ID, $this->getId());

				SlipgajiPeer::addSelectColumns($criteria);
				if (!isset($this->lastSlipgajiCriteria) || !$this->lastSlipgajiCriteria->equals($criteria)) {
					$this->collSlipgajis = SlipgajiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSlipgajiCriteria = $criteria;
		return $this->collSlipgajis;
	}

	
	public function countSlipgajis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSlipgajiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SlipgajiPeer::DOSEN_ID, $this->getId());

		return SlipgajiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSlipgaji(Slipgaji $l)
	{
		$this->collSlipgajis[] = $l;
		$l->setDosen($this);
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

				$criteria->add(AbsensiPeer::DOSEN_ID, $this->getId());

				AbsensiPeer::addSelectColumns($criteria);
				$this->collAbsensis = AbsensiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AbsensiPeer::DOSEN_ID, $this->getId());

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

		$criteria->add(AbsensiPeer::DOSEN_ID, $this->getId());

		return AbsensiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAbsensi(Absensi $l)
	{
		$this->collAbsensis[] = $l;
		$l->setDosen($this);
	}


	
	public function getAbsensisJoinKelasparalel($criteria = null, $con = null)
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

				$criteria->add(AbsensiPeer::DOSEN_ID, $this->getId());

				$this->collAbsensis = AbsensiPeer::doSelectJoinKelasparalel($criteria, $con);
			}
		} else {
									
			$criteria->add(AbsensiPeer::DOSEN_ID, $this->getId());

			if (!isset($this->lastAbsensiCriteria) || !$this->lastAbsensiCriteria->equals($criteria)) {
				$this->collAbsensis = AbsensiPeer::doSelectJoinKelasparalel($criteria, $con);
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

				$criteria->add(KelasparalelHasDosenPeer::DOSEN_ID, $this->getId());

				KelasparalelHasDosenPeer::addSelectColumns($criteria);
				$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasparalelHasDosenPeer::DOSEN_ID, $this->getId());

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

		$criteria->add(KelasparalelHasDosenPeer::DOSEN_ID, $this->getId());

		return KelasparalelHasDosenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasparalelHasDosen(KelasparalelHasDosen $l)
	{
		$this->collKelasparalelHasDosens[] = $l;
		$l->setDosen($this);
	}


	
	public function getKelasparalelHasDosensJoinKelasparalel($criteria = null, $con = null)
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

				$criteria->add(KelasparalelHasDosenPeer::DOSEN_ID, $this->getId());

				$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelectJoinKelasparalel($criteria, $con);
			}
		} else {
									
			$criteria->add(KelasparalelHasDosenPeer::DOSEN_ID, $this->getId());

			if (!isset($this->lastKelasparalelHasDosenCriteria) || !$this->lastKelasparalelHasDosenCriteria->equals($criteria)) {
				$this->collKelasparalelHasDosens = KelasparalelHasDosenPeer::doSelectJoinKelasparalel($criteria, $con);
			}
		}
		$this->lastKelasparalelHasDosenCriteria = $criteria;

		return $this->collKelasparalelHasDosens;
	}

} 