<?php


abstract class BaseKelasparalelHasDosen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $kelasparalel_id;


	
	protected $dosen_id;


	
	protected $id;

	
	protected $aKelasparalel;

	
	protected $aDosen;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getKelasparalelId()
	{

		return $this->kelasparalel_id;
	}

	
	public function getDosenId()
	{

		return $this->dosen_id;
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
			$this->modifiedColumns[] = KelasparalelHasDosenPeer::KELASPARALEL_ID;
		}

		if ($this->aKelasparalel !== null && $this->aKelasparalel->getId() !== $v) {
			$this->aKelasparalel = null;
		}

	} 
	
	public function setDosenId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dosen_id !== $v) {
			$this->dosen_id = $v;
			$this->modifiedColumns[] = KelasparalelHasDosenPeer::DOSEN_ID;
		}

		if ($this->aDosen !== null && $this->aDosen->getId() !== $v) {
			$this->aDosen = null;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = KelasparalelHasDosenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->kelasparalel_id = $rs->getInt($startcol + 0);

			$this->dosen_id = $rs->getInt($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating KelasparalelHasDosen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasparalelHasDosenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KelasparalelHasDosenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(KelasparalelHasDosenPeer::DATABASE_NAME);
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

			if ($this->aDosen !== null) {
				if ($this->aDosen->isModified()) {
					$affectedRows += $this->aDosen->save($con);
				}
				$this->setDosen($this->aDosen);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KelasparalelHasDosenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KelasparalelHasDosenPeer::doUpdate($this, $con);
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

			if ($this->aDosen !== null) {
				if (!$this->aDosen->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDosen->getValidationFailures());
				}
			}


			if (($retval = KelasparalelHasDosenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasparalelHasDosenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getKelasparalelId();
				break;
			case 1:
				return $this->getDosenId();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasparalelHasDosenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getKelasparalelId(),
			$keys[1] => $this->getDosenId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasparalelHasDosenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setKelasparalelId($value);
				break;
			case 1:
				$this->setDosenId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = KelasparalelHasDosenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setKelasparalelId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDosenId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KelasparalelHasDosenPeer::DATABASE_NAME);

		if ($this->isColumnModified(KelasparalelHasDosenPeer::KELASPARALEL_ID)) $criteria->add(KelasparalelHasDosenPeer::KELASPARALEL_ID, $this->kelasparalel_id);
		if ($this->isColumnModified(KelasparalelHasDosenPeer::DOSEN_ID)) $criteria->add(KelasparalelHasDosenPeer::DOSEN_ID, $this->dosen_id);
		if ($this->isColumnModified(KelasparalelHasDosenPeer::ID)) $criteria->add(KelasparalelHasDosenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KelasparalelHasDosenPeer::DATABASE_NAME);

		$criteria->add(KelasparalelHasDosenPeer::ID, $this->id);

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

		$copyObj->setDosenId($this->dosen_id);


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
			self::$peer = new KelasparalelHasDosenPeer();
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

	
	public function setDosen($v)
	{


		if ($v === null) {
			$this->setDosenId(NULL);
		} else {
			$this->setDosenId($v->getId());
		}


		$this->aDosen = $v;
	}


	
	public function getDosen($con = null)
	{
		if ($this->aDosen === null && ($this->dosen_id !== null)) {
						include_once 'lib/model/om/BaseDosenPeer.php';

			$this->aDosen = DosenPeer::retrieveByPK($this->dosen_id, $con);

			
		}
		return $this->aDosen;
	}

} 