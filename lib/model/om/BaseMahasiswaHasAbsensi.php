<?php


abstract class BaseMahasiswaHasAbsensi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $mahasiswa_id;


	
	protected $absensi_id;


	
	protected $created_at;


	
	protected $id;

	
	protected $aMahasiswa;

	
	protected $aAbsensi;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMahasiswaId()
	{

		return $this->mahasiswa_id;
	}

	
	public function getAbsensiId()
	{

		return $this->absensi_id;
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
			$this->modifiedColumns[] = MahasiswaHasAbsensiPeer::MAHASISWA_ID;
		}

		if ($this->aMahasiswa !== null && $this->aMahasiswa->getId() !== $v) {
			$this->aMahasiswa = null;
		}

	} 
	
	public function setAbsensiId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->absensi_id !== $v) {
			$this->absensi_id = $v;
			$this->modifiedColumns[] = MahasiswaHasAbsensiPeer::ABSENSI_ID;
		}

		if ($this->aAbsensi !== null && $this->aAbsensi->getId() !== $v) {
			$this->aAbsensi = null;
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
			$this->modifiedColumns[] = MahasiswaHasAbsensiPeer::CREATED_AT;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MahasiswaHasAbsensiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->mahasiswa_id = $rs->getInt($startcol + 0);

			$this->absensi_id = $rs->getInt($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MahasiswaHasAbsensi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MahasiswaHasAbsensiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MahasiswaHasAbsensiPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MahasiswaHasAbsensiPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MahasiswaHasAbsensiPeer::DATABASE_NAME);
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

			if ($this->aAbsensi !== null) {
				if ($this->aAbsensi->isModified()) {
					$affectedRows += $this->aAbsensi->save($con);
				}
				$this->setAbsensi($this->aAbsensi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MahasiswaHasAbsensiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MahasiswaHasAbsensiPeer::doUpdate($this, $con);
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

			if ($this->aAbsensi !== null) {
				if (!$this->aAbsensi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAbsensi->getValidationFailures());
				}
			}


			if (($retval = MahasiswaHasAbsensiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MahasiswaHasAbsensiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMahasiswaId();
				break;
			case 1:
				return $this->getAbsensiId();
				break;
			case 2:
				return $this->getCreatedAt();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MahasiswaHasAbsensiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMahasiswaId(),
			$keys[1] => $this->getAbsensiId(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MahasiswaHasAbsensiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMahasiswaId($value);
				break;
			case 1:
				$this->setAbsensiId($value);
				break;
			case 2:
				$this->setCreatedAt($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MahasiswaHasAbsensiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMahasiswaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAbsensiId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MahasiswaHasAbsensiPeer::DATABASE_NAME);

		if ($this->isColumnModified(MahasiswaHasAbsensiPeer::MAHASISWA_ID)) $criteria->add(MahasiswaHasAbsensiPeer::MAHASISWA_ID, $this->mahasiswa_id);
		if ($this->isColumnModified(MahasiswaHasAbsensiPeer::ABSENSI_ID)) $criteria->add(MahasiswaHasAbsensiPeer::ABSENSI_ID, $this->absensi_id);
		if ($this->isColumnModified(MahasiswaHasAbsensiPeer::CREATED_AT)) $criteria->add(MahasiswaHasAbsensiPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MahasiswaHasAbsensiPeer::ID)) $criteria->add(MahasiswaHasAbsensiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MahasiswaHasAbsensiPeer::DATABASE_NAME);

		$criteria->add(MahasiswaHasAbsensiPeer::ID, $this->id);

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

		$copyObj->setAbsensiId($this->absensi_id);

		$copyObj->setCreatedAt($this->created_at);


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
			self::$peer = new MahasiswaHasAbsensiPeer();
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

	
	public function setAbsensi($v)
	{


		if ($v === null) {
			$this->setAbsensiId(NULL);
		} else {
			$this->setAbsensiId($v->getId());
		}


		$this->aAbsensi = $v;
	}


	
	public function getAbsensi($con = null)
	{
		if ($this->aAbsensi === null && ($this->absensi_id !== null)) {
						include_once 'lib/model/om/BaseAbsensiPeer.php';

			$this->aAbsensi = AbsensiPeer::retrieveByPK($this->absensi_id, $con);

			
		}
		return $this->aAbsensi;
	}

} 