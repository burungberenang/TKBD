<?php
// auto-generated by sfPropelAdmin
// date: 2015/06/11 16:28:29
?>
<?php

/**
 * autoFakultas actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoFakultas
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9855 2008-06-25 11:26:01Z FabianLange $
 */
class autoFakultasActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('fakultas', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Fakultas', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/fakultas')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/fakultas');
    }
  }

  public function executeCreate()
  {
    return $this->forward('fakultas', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('fakultas', 'edit');
  }

  public function executeEdit()
  {
    $this->fakultas = $this->getFakultasOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFakultasFromRequest();

      $this->saveFakultas($this->fakultas);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fakultas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fakultas/list');
      }
      else
      {
        return $this->redirect('fakultas/edit?id='.$this->fakultas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->fakultas = FakultasPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->fakultas);

    try
    {
      $this->deleteFakultas($this->fakultas);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Fakultas. Make sure it does not have any associated items.');
      return $this->forward('fakultas', 'list');
    }

    return $this->redirect('fakultas/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fakultas = $this->getFakultasOrCreate();
    $this->updateFakultasFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveFakultas($fakultas)
  {
    $fakultas->save();

  }

  protected function deleteFakultas($fakultas)
  {
    $fakultas->delete();
  }

  protected function updateFakultasFromRequest()
  {
    $fakultas = $this->getRequestParameter('fakultas');

    if (isset($fakultas['nama']))
    {
      $this->fakultas->setNama($fakultas['nama']);
    }
    if (isset($fakultas['created_at']))
    {
      if ($fakultas['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fakultas['created_at']))
          {
            $value = $dateFormat->format($fakultas['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fakultas['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fakultas->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fakultas->setCreatedAt(null);
      }
    }
    if (isset($fakultas['updated_at']))
    {
      if ($fakultas['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fakultas['updated_at']))
          {
            $value = $dateFormat->format($fakultas['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fakultas['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fakultas->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fakultas->setUpdatedAt(null);
      }
    }
  }

  protected function getFakultasOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $fakultas = new Fakultas();
    }
    else
    {
      $fakultas = FakultasPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($fakultas);
    }

    return $fakultas;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/fakultas/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/fakultas/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/fakultas/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/fakultas/sort'))
    {
      $sort_column = FakultasPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/fakultas/sort') == 'asc')
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
      'fakultas{id}' => 'Id:',
      'fakultas{nama}' => 'Nama:',
      'fakultas{created_at}' => 'Created at:',
      'fakultas{updated_at}' => 'Updated at:',
    );
  }
}
