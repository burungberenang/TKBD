<?php


abstract class BaseJurusan extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $fakultas_id;

	
	protected $aFakultas;

	
	protected $collMataKuliahs;

	
	protected $lastMataKuliahCriteria = null;

	
	protected $collMahasiswas;

	
	protected $lastMahasiswaCriteria = null;

	
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

	
	public function getFakultasId()
	{

		return $this->fakultas_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = JurusanPeer::ID;
		}

	} 
	
	public function setNama($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = JurusanPeer::NAMA;
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
			$this->modifiedColumns[] = JurusanPeer::CREATED_AT;
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
			$this->modifiedColumns[] = JurusanPeer::UPDATED_AT;
		}

	} 
	
	public function setFakultasId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fakultas_id !== $v) {
			$this->fakultas_id = $v;
			$this->modifiedColumns[] = JurusanPeer::FAKULTAS_ID;
		}

		if ($this->aFakultas !== null && $this->aFakultas->getId() !== $v) {
			$this->aFakultas = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nama = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->fakultas_id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Jurusan object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JurusanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			JurusanPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(JurusanPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(JurusanPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JurusanPeer::DATABASE_NAME);
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


												
			if ($this->aFakultas !== null) {
				if ($this->aFakultas->isModified()) {
					$affectedRows += $this->aFakultas->save($con);
				}
				$this->setFakultas($this->aFakultas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = JurusanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += JurusanPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMataKuliahs !== null) {
				foreach($this->collMataKuliahs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMahasiswas !== null) {
				foreach($this->collMahasiswas as $referrerFK) {
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


												
			if ($this->aFakultas !== null) {
				if (!$this->aFakultas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFakultas->getValidationFailures());
				}
			}


			if (($retval = JurusanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMataKuliahs !== null) {
					foreach($this->collMataKuliahs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMahasiswas !== null) {
					foreach($this->collMahasiswas as $referrerFK) {
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
		$pos = JurusanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCreatedAt();
				break;
			case 3:
				return $this->getUpdatedAt();
				break;
			case 4:
				return $this->getFakultasId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JurusanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
			$keys[4] => $this->getFakultasId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = JurusanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCreatedAt($value);
				break;
			case 3:
				$this->setUpdatedAt($value);
				break;
			case 4:
				$this->setFakultasId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JurusanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFakultasId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(JurusanPeer::DATABASE_NAME);

		if ($this->isColumnModified(JurusanPeer::ID)) $criteria->add(JurusanPeer::ID, $this->id);
		if ($this->isColumnModified(JurusanPeer::NAMA)) $criteria->add(JurusanPeer::NAMA, $this->nama);
		if ($this->isColumnModified(JurusanPeer::CREATED_AT)) $criteria->add(JurusanPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(JurusanPeer::UPDATED_AT)) $criteria->add(JurusanPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(JurusanPeer::FAKULTAS_ID)) $criteria->add(JurusanPeer::FAKULTAS_ID, $this->fakultas_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(JurusanPeer::DATABASE_NAME);

		$criteria->add(JurusanPeer::ID, $this->id);

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

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setFakultasId($this->fakultas_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMataKuliahs() as $relObj) {
				$copyObj->addMataKuliah($relObj->copy($deepCopy));
			}

			foreach($this->getMahasiswas() as $relObj) {
				$copyObj->addMahasiswa($relObj->copy($deepCopy));
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
			self::$peer = new JurusanPeer();
		}
		return self::$peer;
	}

	
	public function setFakultas($v)
	{


		if ($v === null) {
			$this->setFakultasId(NULL);
		} else {
			$this->setFakultasId($v->getId());
		}


		$this->aFakultas = $v;
	}


	
	public function getFakultas($con = null)
	{
		if ($this->aFakultas === null && ($this->fakultas_id !== null)) {
						include_once 'lib/model/om/BaseFakultasPeer.php';

			$this->aFakultas = FakultasPeer::retrieveByPK($this->fakultas_id, $con);

			
		}
		return $this->aFakultas;
	}

	
	public function initMataKuliahs()
	{
		if ($this->collMataKuliahs === null) {
			$this->collMataKuliahs = array();
		}
	}

	
	public function getMataKuliahs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMataKuliahPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMataKuliahs === null) {
			if ($this->isNew()) {
			   $this->collMataKuliahs = array();
			} else {

				$criteria->add(MataKuliahPeer::JURUSAN_ID, $this->getId());

				MataKuliahPeer::addSelectColumns($criteria);
				$this->collMataKuliahs = MataKuliahPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MataKuliahPeer::JURUSAN_ID, $this->getId());

				MataKuliahPeer::addSelectColumns($criteria);
				if (!isset($this->lastMataKuliahCriteria) || !$this->lastMataKuliahCriteria->equals($criteria)) {
					$this->collMataKuliahs = MataKuliahPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMataKuliahCriteria = $criteria;
		return $this->collMataKuliahs;
	}

	
	public function countMataKuliahs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMataKuliahPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MataKuliahPeer::JURUSAN_ID, $this->getId());

		return MataKuliahPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMataKuliah(MataKuliah $l)
	{
		$this->collMataKuliahs[] = $l;
		$l->setJurusan($this);
	}

	
	public function initMahasiswas()
	{
		if ($this->collMahasiswas === null) {
			$this->collMahasiswas = array();
		}
	}

	
	public function getMahasiswas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswas === null) {
			if ($this->isNew()) {
			   $this->collMahasiswas = array();
			} else {

				$criteria->add(MahasiswaPeer::JURUSAN_ID, $this->getId());

				MahasiswaPeer::addSelectColumns($criteria);
				$this->collMahasiswas = MahasiswaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MahasiswaPeer::JURUSAN_ID, $this->getId());

				MahasiswaPeer::addSelectColumns($criteria);
				if (!isset($this->lastMahasiswaCriteria) || !$this->lastMahasiswaCriteria->equals($criteria)) {
					$this->collMahasiswas = MahasiswaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMahasiswaCriteria = $criteria;
		return $this->collMahasiswas;
	}

	
	public function countMahasiswas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MahasiswaPeer::JURUSAN_ID, $this->getId());

		return MahasiswaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMahasiswa(Mahasiswa $l)
	{
		$this->collMahasiswas[] = $l;
		$l->setJurusan($this);
	}

} 