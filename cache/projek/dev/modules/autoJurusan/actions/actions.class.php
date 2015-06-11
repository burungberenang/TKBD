<?php
// auto-generated by sfPropelAdmin
// date: 2015/06/11 17:19:41
?>
<?php

/**
 * autoJurusan actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoJurusan
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9855 2008-06-25 11:26:01Z FabianLange $
 */
class autoJurusanActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('jurusan', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Jurusan', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/jurusan')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/jurusan');
    }
  }

  public function executeCreate()
  {
    return $this->forward('jurusan', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('jurusan', 'edit');
  }

  public function executeEdit()
  {
    $this->jurusan = $this->getJurusanOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateJurusanFromRequest();

      $this->saveJurusan($this->jurusan);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('jurusan/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('jurusan/list');
      }
      else
      {
        return $this->redirect('jurusan/edit?id='.$this->jurusan->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->jurusan = JurusanPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->jurusan);

    try
    {
      $this->deleteJurusan($this->jurusan);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Jurusan. Make sure it does not have any associated items.');
      return $this->forward('jurusan', 'list');
    }

    return $this->redirect('jurusan/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->jurusan = $this->getJurusanOrCreate();
    $this->updateJurusanFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveJurusan($jurusan)
  {
    $jurusan->save();

  }

  protected function deleteJurusan($jurusan)
  {
    $jurusan->delete();
  }

  protected function updateJurusanFromRequest()
  {
    $jurusan = $this->getRequestParameter('jurusan');

    if (isset($jurusan['nama']))
    {
      $this->jurusan->setNama($jurusan['nama']);
    }
    if (isset($jurusan['created_at']))
    {
      if ($jurusan['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($jurusan['created_at']))
          {
            $value = $dateFormat->format($jurusan['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $jurusan['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->jurusan->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->jurusan->setCreatedAt(null);
      }
    }
    if (isset($jurusan['updated_at']))
    {
      if ($jurusan['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($jurusan['updated_at']))
          {
            $value = $dateFormat->format($jurusan['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $jurusan['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->jurusan->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->jurusan->setUpdatedAt(null);
      }
    }
    if (isset($jurusan['fakultas_id']))
    {
    $this->jurusan->setFakultasId($jurusan['fakultas_id'] ? $jurusan['fakultas_id'] : null);
    }
  }

  protected function getJurusanOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $jurusan = new Jurusan();
    }
    else
    {
      $jurusan = JurusanPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($jurusan);
    }

    return $jurusan;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/jurusan/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/jurusan/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/jurusan/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/jurusan/sort'))
    {
      $sort_column = JurusanPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/jurusan/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'jurusan{id}' => 'Id:',
      'jurusan{nama}' => 'Nama:',
      'jurusan{created_at}' => 'Created at:',
      'jurusan{updated_at}' => 'Updated at:',
      'jurusan{fakultas_id}' => 'Fakultas:',
    );
  }
}
