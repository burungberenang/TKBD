<?php


abstract class BaseKelasParalelHasDosen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $kelas_paralel_id;


	
	protected $dosen_id;


	
	protected $id;

	
	protected $aKelasPalalel;

	
	protected $aDosen;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getKelasParalelId()
	{

		return $this->kelas_paralel_id;
	}

	
	public function getDosenId()
	{

		return $this->dosen_id;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setKelasParalelId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->kelas_paralel_id !== $v) {
			$this->kelas_paralel_id = $v;
			$this->modifiedColumns[] = KelasParalelHasDosenPeer::KELAS_PARALEL_ID;
		}

		if ($this->aKelasPalalel !== null && $this->aKelasPalalel->getId() !== $v) {
			$this->aKelasPalalel = null;
		}

	} 
	
	public function setDosenId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dosen_id !== $v) {
			$this->dosen_id = $v;
			$this->modifiedColumns[] = KelasParalelHasDosenPeer::DOSEN_ID;
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
			$this->modifiedColumns[] = KelasParalelHasDosenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->kelas_paralel_id = $rs->getInt($startcol + 0);

			$this->dosen_id = $rs->getInt($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating KelasParalelHasDosen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(KelasParalelHasDosenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			KelasParalelHasDosenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(KelasParalelHasDosenPeer::DATABASE_NAME);
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


												
			if ($this->aKelasPalalel !== null) {
				if ($this->aKelasPalalel->isModified()) {
					$affectedRows += $this->aKelasPalalel->save($con);
				}
				$this->setKelasPalalel($this->aKelasPalalel);
			}

			if ($this->aDosen !== null) {
				if ($this->aDosen->isModified()) {
					$affectedRows += $this->aDosen->save($con);
				}
				$this->setDosen($this->aDosen);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = KelasParalelHasDosenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += KelasParalelHasDosenPeer::doUpdate($this, $con);
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


												
			if ($this->aKelasPalalel !== null) {
				if (!$this->aKelasPalalel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKelasPalalel->getValidationFailures());
				}
			}

			if ($this->aDosen !== null) {
				if (!$this->aDosen->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDosen->getValidationFailures());
				}
			}


			if (($retval = KelasParalelHasDosenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasParalelHasDosenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getKelasParalelId();
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
		$keys = KelasParalelHasDosenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getKelasParalelId(),
			$keys[1] => $this->getDosenId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = KelasParalelHasDosenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setKelasParalelId($value);
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
		$keys = KelasParalelHasDosenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setKelasParalelId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDosenId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(KelasParalelHasDosenPeer::DATABASE_NAME);

		if ($this->isColumnModified(KelasParalelHasDosenPeer::KELAS_PARALEL_ID)) $criteria->add(KelasParalelHasDosenPeer::KELAS_PARALEL_ID, $this->kelas_paralel_id);
		if ($this->isColumnModified(KelasParalelHasDosenPeer::DOSEN_ID)) $criteria->add(KelasParalelHasDosenPeer::DOSEN_ID, $this->dosen_id);
		if ($this->isColumnModified(KelasParalelHasDosenPeer::ID)) $criteria->add(KelasParalelHasDosenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(KelasParalelHasDosenPeer::DATABASE_NAME);

		$criteria->add(KelasParalelHasDosenPeer::ID, $this->id);

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

		$copyObj->setKelasParalelId($this->kelas_paralel_id);

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
			self::$peer = new KelasParalelHasDosenPeer();
		}
		return self::$peer;
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