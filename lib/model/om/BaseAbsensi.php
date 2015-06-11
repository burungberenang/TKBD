<?php


abstract class BaseAbsensi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $dosen_id;


	
	protected $materi;


	
	protected $minggu_ke;


	
	protected $tanggal;


	
	protected $sks_nyata;


	
	protected $status;


	
	protected $jam_hadir_dosen;


	
	protected $jam_keluar_dosen;


	
	protected $kelas_paralel_id;

	
	protected $aDosen;

	
	protected $aKelasPalalel;

	
	protected $collMahasiswaHasAbsensis;

	
	protected $lastMahasiswaHasAbsensiCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getDosenId()
	{

		return $this->dosen_id;
	}

	
	public function getMateri()
	{

		return $this->materi;
	}

	
	public function getMingguKe()
	{

		return $this->minggu_ke;
	}

	
	public function getTanggal($format = 'Y-m-d')
	{

		if ($this->tanggal === null || $this->tanggal === '') {
			return null;
		} elseif (!is_int($this->tanggal)) {
						$ts = strtotime($this->tanggal);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [tanggal] as date/time value: " . var_export($this->tanggal, true));
			}
		} else {
			$ts = $this->tanggal;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSksNyata()
	{

		return $this->sks_nyata;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getJamHadirDosen($format = 'H:i:s')
	{

		if ($this->jam_hadir_dosen === null || $this->jam_hadir_dosen === '') {
			return null;
		} elseif (!is_int($this->jam_hadir_dosen)) {
						$ts = strtotime($this->jam_hadir_dosen);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [jam_hadir_dosen] as date/time value: " . var_export($this->jam_hadir_dosen, true));
			}
		} else {
			$ts = $this->jam_hadir_dosen;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getJamKeluarDosen($format = 'H:i:s')
	{

		if ($this->jam_keluar_dosen === null || $this->jam_keluar_dosen === '') {
			return null;
		} elseif (!is_int($this->jam_keluar_dosen)) {
						$ts = strtotime($this->jam_keluar_dosen);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [jam_keluar_dosen] as date/time value: " . var_export($this->jam_keluar_dosen, true));
			}
		} else {
			$ts = $this->jam_keluar_dosen;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getKelasParalelId()
	{

		return $this->kelas_paralel_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AbsensiPeer::ID;
		}

	} 
	
	public function setDosenId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dosen_id !== $v) {
			$this->dosen_id = $v;
			$this->modifiedColumns[] = AbsensiPeer::DOSEN_ID;
		}

		if ($this->aDosen !== null && $this->aDosen->getId() !== $v) {
			$this->aDosen = null;
		}

	} 
	
	public function setMateri($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->materi !== $v) {
			$this->materi = $v;
			$this->modifiedColumns[] = AbsensiPeer::MATERI;
		}

	} 
	
	public function setMingguKe($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->minggu_ke !== $v) {
			$this->minggu_ke = $v;
			$this->modifiedColumns[] = AbsensiPeer::MINGGU_KE;
		}

	} 
	
	public function setTanggal($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [tanggal] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->tanggal !== $ts) {
			$this->tanggal = $ts;
			$this->modifiedColumns[] = AbsensiPeer::TANGGAL;
		}

	} 
	
	public function setSksNyata($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sks_nyata !== $v) {
			$this->sks_nyata = $v;
			$this->modifiedColumns[] = AbsensiPeer::SKS_NYATA;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = AbsensiPeer::STATUS;
		}

	} 
	
	public function setJamHadirDosen($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [jam_hadir_dosen] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->jam_hadir_dosen !== $ts) {
			$this->jam_hadir_dosen = $ts;
			$this->modifiedColumns[] = AbsensiPeer::JAM_HADIR_DOSEN;
		}

	} 
	
	public function setJamKeluarDosen($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [jam_keluar_dosen] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->jam_keluar_dosen !== $ts) {
			$this->jam_keluar_dosen = $ts;
			$this->modifiedColumns[] = AbsensiPeer::JAM_KELUAR_DOSEN;
		}

	} 
	
	public function setKelasParalelId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->kelas_paralel_id !== $v) {
			$this->kelas_paralel_id = $v;
			$this->modifiedColumns[] = AbsensiPeer::KELAS_PARALEL_ID;
		}

		if ($this->aKelasPalalel !== null && $this->aKelasPalalel->getId() !== $v) {
			$this->aKelasPalalel = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->dosen_id = $rs->getInt($startcol + 1);

			$this->materi = $rs->getString($startcol + 2);

			$this->minggu_ke = $rs->getInt($startcol + 3);

			$this->tanggal = $rs->getDate($startcol + 4, null);

			$this->sks_nyata = $rs->getInt($startcol + 5);

			$this->status = $rs->getInt($startcol + 6);

			$this->jam_hadir_dosen = $rs->getTime($startcol + 7, null);

			$this->jam_keluar_dosen = $rs->getTime($startcol + 8, null);

			$this->kelas_paralel_id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Absensi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbsensiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AbsensiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AbsensiPeer::DATABASE_NAME);
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

			if ($this->aKelasPalalel !== null) {
				if ($this->aKelasPalalel->isModified()) {
					$affectedRows += $this->aKelasPalalel->save($con);
				}
				$this->setKelasPalalel($this->aKelasPalalel);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AbsensiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AbsensiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMahasiswaHasAbsensis !== null) {
				foreach($this->collMahasiswaHasAbsensis as $referrerFK) {
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


												
			if ($this->aDosen !== null) {
				if (!$this->aDosen->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDosen->getValidationFailures());
				}
			}

			if ($this->aKelasPalalel !== null) {
				if (!$this->aKelasPalalel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aKelasPalalel->getValidationFailures());
				}
			}


			if (($retval = AbsensiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMahasiswaHasAbsensis !== null) {
					foreach($this->collMahasiswaHasAbsensis as $referrerFK) {
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
		$pos = AbsensiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDosenId();
				break;
			case 2:
				return $this->getMateri();
				break;
			case 3:
				return $this->getMingguKe();
				break;
			case 4:
				return $this->getTanggal();
				break;
			case 5:
				return $this->getSksNyata();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getJamHadirDosen();
				break;
			case 8:
				return $this->getJamKeluarDosen();
				break;
			case 9:
				return $this->getKelasParalelId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbsensiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDosenId(),
			$keys[2] => $this->getMateri(),
			$keys[3] => $this->getMingguKe(),
			$keys[4] => $this->getTanggal(),
			$keys[5] => $this->getSksNyata(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getJamHadirDosen(),
			$keys[8] => $this->getJamKeluarDosen(),
			$keys[9] => $this->getKelasParalelId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbsensiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDosenId($value);
				break;
			case 2:
				$this->setMateri($value);
				break;
			case 3:
				$this->setMingguKe($value);
				break;
			case 4:
				$this->setTanggal($value);
				break;
			case 5:
				$this->setSksNyata($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setJamHadirDosen($value);
				break;
			case 8:
				$this->setJamKeluarDosen($value);
				break;
			case 9:
				$this->setKelasParalelId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbsensiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDosenId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMateri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMingguKe($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTanggal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSksNyata($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setJamHadirDosen($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setJamKeluarDosen($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setKelasParalelId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AbsensiPeer::DATABASE_NAME);

		if ($this->isColumnModified(AbsensiPeer::ID)) $criteria->add(AbsensiPeer::ID, $this->id);
		if ($this->isColumnModified(AbsensiPeer::DOSEN_ID)) $criteria->add(AbsensiPeer::DOSEN_ID, $this->dosen_id);
		if ($this->isColumnModified(AbsensiPeer::MATERI)) $criteria->add(AbsensiPeer::MATERI, $this->materi);
		if ($this->isColumnModified(AbsensiPeer::MINGGU_KE)) $criteria->add(AbsensiPeer::MINGGU_KE, $this->minggu_ke);
		if ($this->isColumnModified(AbsensiPeer::TANGGAL)) $criteria->add(AbsensiPeer::TANGGAL, $this->tanggal);
		if ($this->isColumnModified(AbsensiPeer::SKS_NYATA)) $criteria->add(AbsensiPeer::SKS_NYATA, $this->sks_nyata);
		if ($this->isColumnModified(AbsensiPeer::STATUS)) $criteria->add(AbsensiPeer::STATUS, $this->status);
		if ($this->isColumnModified(AbsensiPeer::JAM_HADIR_DOSEN)) $criteria->add(AbsensiPeer::JAM_HADIR_DOSEN, $this->jam_hadir_dosen);
		if ($this->isColumnModified(AbsensiPeer::JAM_KELUAR_DOSEN)) $criteria->add(AbsensiPeer::JAM_KELUAR_DOSEN, $this->jam_keluar_dosen);
		if ($this->isColumnModified(AbsensiPeer::KELAS_PARALEL_ID)) $criteria->add(AbsensiPeer::KELAS_PARALEL_ID, $this->kelas_paralel_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AbsensiPeer::DATABASE_NAME);

		$criteria->add(AbsensiPeer::ID, $this->id);

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

		$copyObj->setDosenId($this->dosen_id);

		$copyObj->setMateri($this->materi);

		$copyObj->setMingguKe($this->minggu_ke);

		$copyObj->setTanggal($this->tanggal);

		$copyObj->setSksNyata($this->sks_nyata);

		$copyObj->setStatus($this->status);

		$copyObj->setJamHadirDosen($this->jam_hadir_dosen);

		$copyObj->setJamKeluarDosen($this->jam_keluar_dosen);

		$copyObj->setKelasParalelId($this->kelas_paralel_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMahasiswaHasAbsensis() as $relObj) {
				$copyObj->addMahasiswaHasAbsensi($relObj->copy($deepCopy));
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
			self::$peer = new AbsensiPeer();
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

				$criteria->add(MahasiswaHasAbsensiPeer::ABSENSI_ID, $this->getId());

				MahasiswaHasAbsensiPeer::addSelectColumns($criteria);
				$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MahasiswaHasAbsensiPeer::ABSENSI_ID, $this->getId());

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

		$criteria->add(MahasiswaHasAbsensiPeer::ABSENSI_ID, $this->getId());

		return MahasiswaHasAbsensiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMahasiswaHasAbsensi(MahasiswaHasAbsensi $l)
	{
		$this->collMahasiswaHasAbsensis[] = $l;
		$l->setAbsensi($this);
	}


	
	public function getMahasiswaHasAbsensisJoinMahasiswa($criteria = null, $con = null)
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

				$criteria->add(MahasiswaHasAbsensiPeer::ABSENSI_ID, $this->getId());

				$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelectJoinMahasiswa($criteria, $con);
			}
		} else {
									
			$criteria->add(MahasiswaHasAbsensiPeer::ABSENSI_ID, $this->getId());

			if (!isset($this->lastMahasiswaHasAbsensiCriteria) || !$this->lastMahasiswaHasAbsensiCriteria->equals($criteria)) {
				$this->collMahasiswaHasAbsensis = MahasiswaHasAbsensiPeer::doSelectJoinMahasiswa($criteria, $con);
			}
		}
		$this->lastMahasiswaHasAbsensiCriteria = $criteria;

		return $this->collMahasiswaHasAbsensis;
	}

} 