<?php


abstract class BaseMataKuliah extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $kodemk;


	
	protected $nama;


	
	protected $sks;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $jurusan_id;

	
	protected $aJurusan;

	
	protected $collKelasPalalels;

	
	protected $lastKelasPalalelCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getKodemk()
	{

		return $this->kodemk;
	}

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getSks()
	{

		return $this->sks;
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

	
	public function getJurusanId()
	{

		return $this->jurusan_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MataKuliahPeer::ID;
		}

	} 
	
	public function setKodemk($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kodemk !== $v) {
			$this->kodemk = $v;
			$this->modifiedColumns[] = MataKuliahPeer::KODEMK;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = MataKuliahPeer::NAMA;
		}

	} 
	
	public function setSks($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sks !== $v) {
			$this->sks = $v;
			$this->modifiedColumns[] = MataKuliahPeer::SKS;
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
			$this->modifiedColumns[] = MataKuliahPeer::CREATED_AT;
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
			$this->modifiedColumns[] = MataKuliahPeer::UPDATED_AT;
		}

	} 
	
	public function setJurusanId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->jurusan_id !== $v) {
			$this->jurusan_id = $v;
			$this->modifiedColumns[] = MataKuliahPeer::JURUSAN_ID;
		}

		if ($this->aJurusan !== null && $this->aJurusan->getId() !== $v) {
			$this->aJurusan = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->kodemk = $rs->getString($startcol + 1);

			$this->nama = $rs->getString($startcol + 2);

			$this->sks = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->jurusan_id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MataKuliah object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MataKuliahPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MataKuliahPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MataKuliahPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MataKuliahPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MataKuliahPeer::DATABASE_NAME);
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


												
			if ($this->aJurusan !== null) {
				if ($this->aJurusan->isModified()) {
					$affectedRows += $this->aJurusan->save($con);
				}
				$this->setJurusan($this->aJurusan);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MataKuliahPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MataKuliahPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collKelasPalalels !== null) {
				foreach($this->collKelasPalalels as $referrerFK) {
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


												
			if ($this->aJurusan !== null) {
				if (!$this->aJurusan->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJurusan->getValidationFailures());
				}
			}


			if (($retval = MataKuliahPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collKelasPalalels !== null) {
					foreach($this->collKelasPalalels as $referrerFK) {
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
		$pos = MataKuliahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getKodemk();
				break;
			case 2:
				return $this->getNama();
				break;
			case 3:
				return $this->getSks();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			case 6:
				return $this->getJurusanId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MataKuliahPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getKodemk(),
			$keys[2] => $this->getNama(),
			$keys[3] => $this->getSks(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
			$keys[6] => $this->getJurusanId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MataKuliahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setKodemk($value);
				break;
			case 2:
				$this->setNama($value);
				break;
			case 3:
				$this->setSks($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
			case 6:
				$this->setJurusanId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MataKuliahPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setKodemk($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSks($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setJurusanId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MataKuliahPeer::DATABASE_NAME);

		if ($this->isColumnModified(MataKuliahPeer::ID)) $criteria->add(MataKuliahPeer::ID, $this->id);
		if ($this->isColumnModified(MataKuliahPeer::KODEMK)) $criteria->add(MataKuliahPeer::KODEMK, $this->kodemk);
		if ($this->isColumnModified(MataKuliahPeer::NAMA)) $criteria->add(MataKuliahPeer::NAMA, $this->nama);
		if ($this->isColumnModified(MataKuliahPeer::SKS)) $criteria->add(MataKuliahPeer::SKS, $this->sks);
		if ($this->isColumnModified(MataKuliahPeer::CREATED_AT)) $criteria->add(MataKuliahPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MataKuliahPeer::UPDATED_AT)) $criteria->add(MataKuliahPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(MataKuliahPeer::JURUSAN_ID)) $criteria->add(MataKuliahPeer::JURUSAN_ID, $this->jurusan_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MataKuliahPeer::DATABASE_NAME);

		$criteria->add(MataKuliahPeer::ID, $this->id);

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

		$copyObj->setKodemk($this->kodemk);

		$copyObj->setNama($this->nama);

		$copyObj->setSks($this->sks);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setJurusanId($this->jurusan_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getKelasPalalels() as $relObj) {
				$copyObj->addKelasPalalel($relObj->copy($deepCopy));
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
			self::$peer = new MataKuliahPeer();
		}
		return self::$peer;
	}

	
	public function setJurusan($v)
	{


		if ($v === null) {
			$this->setJurusanId(NULL);
		} else {
			$this->setJurusanId($v->getId());
		}


		$this->aJurusan = $v;
	}


	
	public function getJurusan($con = null)
	{
		if ($this->aJurusan === null && ($this->jurusan_id !== null)) {
						include_once 'lib/model/om/BaseJurusanPeer.php';

			$this->aJurusan = JurusanPeer::retrieveByPK($this->jurusan_id, $con);

			
		}
		return $this->aJurusan;
	}

	
	public function initKelasPalalels()
	{
		if ($this->collKelasPalalels === null) {
			$this->collKelasPalalels = array();
		}
	}

	
	public function getKelasPalalels($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseKelasPalalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collKelasPalalels === null) {
			if ($this->isNew()) {
			   $this->collKelasPalalels = array();
			} else {

				$criteria->add(KelasPalalelPeer::MATA_KULIAH_ID, $this->getId());

				KelasPalalelPeer::addSelectColumns($criteria);
				$this->collKelasPalalels = KelasPalalelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(KelasPalalelPeer::MATA_KULIAH_ID, $this->getId());

				KelasPalalelPeer::addSelectColumns($criteria);
				if (!isset($this->lastKelasPalalelCriteria) || !$this->lastKelasPalalelCriteria->equals($criteria)) {
					$this->collKelasPalalels = KelasPalalelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastKelasPalalelCriteria = $criteria;
		return $this->collKelasPalalels;
	}

	
	public function countKelasPalalels($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseKelasPalalelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(KelasPalalelPeer::MATA_KULIAH_ID, $this->getId());

		return KelasPalalelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addKelasPalalel(KelasPalalel $l)
	{
		$this->collKelasPalalels[] = $l;
		$l->setMataKuliah($this);
	}

} 