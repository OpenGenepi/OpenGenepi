<?php

/**
 * ComputerOsFamily filter form base class.
 *
 * @package    GENEPI
 * @subpackage filter
 * @author     Pierre Boitel, Bastien Libersa, Paul Périé
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComputerOsFamilyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'family'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sort_order' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'family'     => new sfValidatorPass(array('required' => false)),
      'sort_order' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('computer_os_family_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComputerOsFamily';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'family'     => 'Text',
      'sort_order' => 'Number',
    );
  }
}
