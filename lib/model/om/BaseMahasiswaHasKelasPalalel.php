<?php


abstract class BaseMahasiswaHasKelasPalalel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $mahasiswa_id;


	
	protected $kelas_paralel_id;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $id;

	
	protected $aMahasiswa;

	
	protected $aKelasPalalel;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMahasiswaId()
	{

		return $this->mahasiswa_id;
	}

	
	public function getKelasParalelId()
	{

		return $this->kelas_paralel_id;
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

	
	public function setMahasiswaId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->mahasiswa_id !== $v) {
			$this->mahasiswa_id = $v;
			$this->modifiedColumns[] = MahasiswaHasKelasPalalelPeer::MAHASISWA_ID;
		}

		if ($this->aMahasiswa !== null && $this->aMahasiswa->getId() !== $v) {
			$this->aMahasiswa = null;
		}

	} 
	
	public function setKelasParalelId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->kelas_paralel_id !== $v) {
			$this->kelas_paralel_id = $v;
			$this->modifiedColumns[] = MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID;
		}

		if ($this->aKelasPalalel !== null && $this->aKelasPalalel->getId() !== $v) {
			$this->aKelasPalalel = null;
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
			$this->modifiedColumns[] = MahasiswaHasKelasPalalelPeer::CREATED_AT;
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
			$this->modifiedColumns[] = MahasiswaHasKelasPalalelPeer::UPDATED_AT;
		}

	} 
	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MahasiswaHasKelasPalalelPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->mahasiswa_id = $rs->getInt($startcol + 0);

			$this->kelas_paralel_id = $rs->getInt($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MahasiswaHasKelasPalalel object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MahasiswaHasKelasPalalelPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MahasiswaHasKelasPalalelPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MahasiswaHasKelasPalalelPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);
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


												
			if ($this->aMahasiswa !== null) {
				if ($this->aMahasiswa->isModified()) {
					$affectedRows += $this->aMahasiswa->save($con);
				}
				$this->setMahasiswa($this->aMahasiswa);
			}

			if ($this->aKelasPalalel !== null) {
				if ($this->aKelasPalalel->isModified()) {
					$affectedRows += $this->aKelasPalalel->save($con);
				}
				$this->setKelasPalalel($this->aKelasPalalel);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MahasiswaHasKelasPalalelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MahasiswaHasKelasPalalelPeer::doUpdate($this, $con);
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


												
			if ($this->aMahasiswa !== null) {
				if (!$this->aMahasiswa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMahasiswa->getValidationFailures());
				}
			}

			if ($this->aKelasPalalel !== null) {
				if (!$this->aKelasPalalel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKelasPalalel->getValidationFailures());
				}
			}


			if (($retval = MahasiswaHasKelasPalalelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MahasiswaHasKelasPalalelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMahasiswaId();
				break;
			case 1:
				return $this->getKelasParalelId();
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
		$keys = MahasiswaHasKelasPalalelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMahasiswaId(),
			$keys[1] => $this->getKelasParalelId(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MahasiswaHasKelasPalalelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMahasiswaId($value);
				break;
			case 1:
				$this->setKelasParalelId($value);
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
		$keys = MahasiswaHasKelasPalalelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMahasiswaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setKelasParalelId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);

		if ($this->isColumnModified(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID)) $criteria->add(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, $this->mahasiswa_id);
		if ($this->isColumnModified(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID)) $criteria->add(MahasiswaHasKelasPalalelPeer::KELAS_PARALEL_ID, $this->kelas_paralel_id);
		if ($this->isColumnModified(MahasiswaHasKelasPalalelPeer::CREATED_AT)) $criteria->add(MahasiswaHasKelasPalalelPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MahasiswaHasKelasPalalelPeer::UPDATED_AT)) $criteria->add(MahasiswaHasKelasPalalelPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(MahasiswaHasKelasPalalelPeer::ID)) $criteria->add(MahasiswaHasKelasPalalelPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MahasiswaHasKelasPalalelPeer::DATABASE_NAME);

		$criteria->add(MahasiswaHasKelasPalalelPeer::ID, $this->id);

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

		$copyObj->setMahasiswaId($this->mahasiswa_id);

		$copyObj->setKelasParalelId($this->kelas_paralel_id);

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
			self::$peer = new MahasiswaHasKelasPalalelPeer();
		}
		return self::$peer;
	}

	
	public function setMahasiswa($v)
	{


		if ($v === null) {
			$this->setMahasiswaId(NULL);
		} else {
			$this->setMahasiswaId($v->getId());
		}


		$this->aMahasiswa = $v;
	}


	
	public function getMahasiswa($con = null)
	{
		if ($this->aMahasiswa === null && ($this->mahasiswa_id !== null)) {
						include_once 'lib/model/om/BaseMahasiswaPeer.php';

			$this->aMahasiswa = MahasiswaPeer::retrieveByPK($this->mahasiswa_id, $con);

			
		}
		return $this->aMahasiswa;
	}

	
	public function setKelasPalalel($v)
	{


		if ($v === null) {
			$this->setKelasParalelId(NULL);
		} else {
			$this->setKelasParalelId($v->getId());
		}


		$this->aKelasPalalel = $v;
	}


	
	public function getKelasPalalel($con = null)
	{
		if ($this->aKelasPalalel === null && ($this->kelas_paralel_id !== null)) {
						include_once 'lib/model/om/BaseKelasPalalelPeer.php';

			$this->aKelasPalalel = KelasPalalelPeer::retrieveByPK($this->kelas_paralel_id, $con);

			
		}
		return $this->aKelasPalalel;
	}

} 