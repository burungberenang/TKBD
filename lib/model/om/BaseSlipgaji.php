<?php


abstract class BaseSlipgaji extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $grand_total;


	
	protected $pajak;


	
	protected $created_at;


	
	protected $dosen_id;

	
	protected $aDosen;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getGrandTotal()
	{

		return $this->grand_total;
	}

	
	public function getPajak()
	{

		return $this->pajak;
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

	
	public function getDosenId()
	{

		return $this->dosen_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SlipgajiPeer::ID;
		}

	} 
	
	public function setGrandTotal($v)
	{

		if ($this->grand_total !== $v) {
			$this->grand_total = $v;
			$this->modifiedColumns[] = SlipgajiPeer::GRAND_TOTAL;
		}

	} 
	
	public function setPajak($v)
	{

		if ($this->pajak !== $v) {
			$this->pajak = $v;
			$this->modifiedColumns[] = SlipgajiPeer::PAJAK;
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
			$this->modifiedColumns[] = SlipgajiPeer::CREATED_AT;
		}

	} 
	
	public function setDosenId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dosen_id !== $v) {
			$this->dosen_id = $v;
			$this->modifiedColumns[] = SlipgajiPeer::DOSEN_ID;
		}

		if ($this->aDosen !== null && $this->aDosen->getId() !== $v) {
			$this->aDosen = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->grand_total = $rs->getFloat($startcol + 1);

			$this->pajak = $rs->getFloat($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->dosen_id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Slipgaji object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SlipgajiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SlipgajiPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(SlipgajiPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SlipgajiPeer::DATABASE_NAME);
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


												
			if ($this->aDosen !== null) {
				if ($this->aDosen->isModified()) {
					$affectedRows += $this->aDosen->save($con);
				}
				$this->setDosen($this->aDosen);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SlipgajiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SlipgajiPeer::doUpdate($this, $con);
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


												
			if ($this->aDosen !== null) {
				if (!$this->aDosen->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDosen->getValidationFailures());
				}
			}


			if (($retval = SlipgajiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SlipgajiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getGrandTotal();
				break;
			case 2:
				return $this->getPajak();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			case 4:
				return $this->getDosenId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SlipgajiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getGrandTotal(),
			$keys[2] => $this->getPajak(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getDosenId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SlipgajiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setGrandTotal($value);
				break;
			case 2:
				$this->setPajak($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
			case 4:
				$this->setDosenId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SlipgajiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGrandTotal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPajak($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDosenId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SlipgajiPeer::DATABASE_NAME);

		if ($this->isColumnModified(SlipgajiPeer::ID)) $criteria->add(SlipgajiPeer::ID, $this->id);
		if ($this->isColumnModified(SlipgajiPeer::GRAND_TOTAL)) $criteria->add(SlipgajiPeer::GRAND_TOTAL, $this->grand_total);
		if ($this->isColumnModified(SlipgajiPeer::PAJAK)) $criteria->add(SlipgajiPeer::PAJAK, $this->pajak);
		if ($this->isColumnModified(SlipgajiPeer::CREATED_AT)) $criteria->add(SlipgajiPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(SlipgajiPeer::DOSEN_ID)) $criteria->add(SlipgajiPeer::DOSEN_ID, $this->dosen_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SlipgajiPeer::DATABASE_NAME);

		$criteria->add(SlipgajiPeer::ID, $this->id);

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

		$copyObj->setGrandTotal($this->grand_total);

		$copyObj->setPajak($this->pajak);

		$copyObj->setCreatedAt($this->created_at);

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
			self::$peer = new SlipgajiPeer();
		}
		return self::$peer;
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