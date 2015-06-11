<?php


abstract class BaseMahasiswa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nrp;


	
	protected $nama;


	
	protected $alamat;


	
	protected $tgl_lahir;


	
	protected $jurusan_id;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aJurusan;

	
	protected $collMahasiswaHasAbsensis;

	
	protected $lastMahasiswaHasAbsensiCriteria = null;

	
	protected $collMahasiswaHasKelasPalalels;

	
	protected $lastMahasiswaHasKelasPalalelCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNrp()
	{

		return $this->nrp;
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

	
	public function getJurusanId()
	{

		return $this->jurusan_id;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MahasiswaPeer::ID;
		}

	} 
	
	public function setNrp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nrp !== $v) {
			$this->nrp = $v;
			$this->modifiedColumns[] = MahasiswaPeer::NRP;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = MahasiswaPeer::NAMA;
		}

	} 
	
	public function setAlamat($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->alamat !== $v) {
			$this->alamat = $v;
			$this->modifiedColumns[] = MahasiswaPeer::ALAMAT;
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
			$this->modifiedColumns[] = MahasiswaPeer::TGL_LAHIR;
		}

	} 
	
	public function setJurusanId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->jurusan_id !== $v) {
			$this->jurusan_id = $v;
			$this->modifiedColumns[] = MahasiswaPeer::JURUSAN_ID;
		}

		if ($this->aJurusan !== null && $this->aJurusan->getId() !== $v) {
			$this->aJurusan = null;
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
			$this->modifiedColumns[] = MahasiswaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = MahasiswaPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nrp = $rs->getString($startcol + 1);

			$this->nama = $rs->getString($startcol + 2);

			$this->alamat = $rs->getString($startcol + 3);

			$this->tgl_lahir = $rs->getDate($startcol + 4, null);

			$this->jurusan_id = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Mahasiswa object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MahasiswaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MahasiswaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MahasiswaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MahasiswaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MahasiswaPeer::DATABASE_NAME);
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
					$pk = MahasiswaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MahasiswaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMahasiswaHasAbsensis !== null) {
				foreach($this->collMahasiswaHasAbsensis as $referrerFK) {
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


												
			if ($this->aJurusan !== null) {
				if (!$this->aJurusan->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJurusan->getValidationFailures());
				}
			}


			if (($retval = MahasiswaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMahasiswaHasAbsensis !== null) {
					foreach($this->collMahasiswaHasAbsensis as $referrerFK) {
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
		$pos = MahasiswaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNrp();
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
				return $this->getJurusanId();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MahasiswaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNrp(),
			$keys[2] => $this->getNama(),
			$keys[3] => $this->getAlamat(),
			$keys[4] => $this->getTglLahir(),
			$keys[5] => $this->getJurusanId(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MahasiswaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNrp($value);
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
				$this->setJurusanId($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MahasiswaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlamat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTglLahir($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setJurusanId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MahasiswaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MahasiswaPeer::ID)) $criteria->add(MahasiswaPeer::ID, $this->id);
		if ($this->isColumnModified(MahasiswaPeer::NRP)) $criteria->add(MahasiswaPeer::NRP, $this->nrp);
		if ($this->isColumnModified(MahasiswaPeer::NAMA)) $criteria->add(MahasiswaPeer::NAMA, $this->nama);
		if ($this->isColumnModified(MahasiswaPeer::ALAMAT)) $criteria->add(MahasiswaPeer::ALAMAT, $this->alamat);
		if ($this->isColumnModified(MahasiswaPeer::TGL_LAHIR)) $criteria->add(MahasiswaPeer::TGL_LAHIR, $this->tgl_lahir);
		if ($this->isColumnModified(MahasiswaPeer::JURUSAN_ID)) $criteria->add(MahasiswaPeer::JURUSAN_ID, $this->jurusan_id);
		if ($this->isColumnModified(MahasiswaPeer::CREATED_AT)) $criteria->add(MahasiswaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MahasiswaPeer::UPDATED_AT)) $criteria->add(MahasiswaPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MahasiswaPeer::DATABASE_NAME);

		$criteria->add(MahasiswaPeer::ID, $this->id);

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

		$copyObj->setNrp($this->nrp);

		$copyObj->setNama($this->nama);

		$copyObj->setAlamat($this->alamat);

		$copyObj->setTglLahir($this->tgl_lahir);

		$copyObj->setJurusanId($this->jurusan_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMahasiswaHasAbsensis() as $relObj) {
				$copyObj->addMahasiswaHasAbsensi($relObj->copy($deepCopy));
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
			self::$peer = new MahasiswaPeer();
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

	
	public function initMahasiswaHasAbsensis()
	{
		if ($this->collMahasiswaHasAbsensis === null) {
			$this->collMahasiswaHasAbsensis = array();
		}
	}

	
	public function getMahasiswaHasAbsensis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasAbsensiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswaHasAbsensis === null) {
			if ($this->isNew()) {
			   $this->collMahasiswaHasAbsensis = array();
			} else {

				$criteria->add(MahasiswaHasAbsensiPeer::MAHASISWA_ID, $this->getId());

				MahasiswaHasAbsensiPeer::addSelectColumns($criteria);
				$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MahasiswaHasAbsensiPeer::MAHASISWA_ID, $this->getId());

				MahasiswaHasAbsensiPeer::addSelectColumns($criteria);
				if (!isset($this->lastMahasiswaHasAbsensiCriteria) || !$this->lastMahasiswaHasAbsensiCriteria->equals($criteria)) {
					$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMahasiswaHasAbsensiCriteria = $criteria;
		return $this->collMahasiswaHasAbsensis;
	}

	
	public function countMahasiswaHasAbsensis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasAbsensiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MahasiswaHasAbsensiPeer::MAHASISWA_ID, $this->getId());

		return MahasiswaHasAbsensiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMahasiswaHasAbsensi(MahasiswaHasAbsensi $l)
	{
		$this->collMahasiswaHasAbsensis[] = $l;
		$l->setMahasiswa($this);
	}


	
	public function getMahasiswaHasAbsensisJoinAbsensi($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMahasiswaHasAbsensiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMahasiswaHasAbsensis === null) {
			if ($this->isNew()) {
				$this->collMahasiswaHasAbsensis = array();
			} else {

				$criteria->add(MahasiswaHasAbsensiPeer::MAHASISWA_ID, $this->getId());

				$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelectJoinAbsensi($criteria, $con);
			}
		} else {
									
			$criteria->add(MahasiswaHasAbsensiPeer::MAHASISWA_ID, $this->getId());

			if (!isset($this->lastMahasiswaHasAbsensiCriteria) || !$this->lastMahasiswaHasAbsensiCriteria->equals($criteria)) {
				$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelectJoinAbsensi($criteria, $con);
			}
		}
		$this->lastMahasiswaHasAbsensiCriteria = $criteria;

		return $this->collMahasiswaHasAbsensis;
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

				$criteria->add(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, $this->getId());

				MahasiswaHasKelasPalalelPeer::addSelectColumns($criteria);
				$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, $this->getId());

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

		$criteria->add(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, $this->getId());

		return MahasiswaHasKelasPalalelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMahasiswaHasKelasPalalel(MahasiswaHasKelasPalalel $l)
	{
		$this->collMahasiswaHasKelasPalalels[] = $l;
		$l->setMahasiswa($this);
	}


	
	public function getMahasiswaHasKelasPalalelsJoinKelasPalalel($criteria = null, $con = null)
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

				$criteria->add(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, $this->getId());

				$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelectJoinKelasPalalel($criteria, $con);
			}
		} else {
									
			$criteria->add(MahasiswaHasKelasPalalelPeer::MAHASISWA_ID, $this->getId());

			if (!isset($this->lastMahasiswaHasKelasPalalelCriteria) || !$this->lastMahasiswaHasKelasPalalelCriteria->equals($criteria)) {
				$this->collMahasiswaHasKelasPalalels = MahasiswaHasKelasPalalelPeer::doSelectJoinKelasPalalel($criteria, $con);
			}
		}
		$this->lastMahasiswaHasKelasPalalelCriteria = $criteria;

		return $this->collMahasiswaHasKelasPalalels;
	}

} 