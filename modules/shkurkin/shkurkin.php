<?php
if (!defined('_PS_VERSION_'))
  exit;

class Shkurkin extends Module
{
  public function __construct()
  {
    $this->name = 'shkurkin';
    $this->tab = 'others';
    $this->version = '1.0';
    $this->author = 'Eli Shkurkin';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.5.6.2');
    $this->dependencies = array('blockcart');

    parent::__construct();

    $this->displayName = $this->l('Shkurkin');
    $this->description = $this->l('Learning about Prestashop modules');

    $this->confirmUninstall = $this->l('Are you sure?');

    if(!Configuration::get('SHKURKIN_NAME'))
      $this->warning = $this->l('No name provided');
  }


  public function install()
  {
    return (parent::install() &&
    $this->registerHook('leftColumn') &&
    $this->registerHook('header') &&
    Configuration::updateValue('SHKURKIN_NAME', 'Shkurkin'));
  }

  public function uninstall()
  {
    return parent::uninstall() && Configuration::deleteByName('SHKURKIN_NAME');
  }

  public function hookDisplayHome($params)
  {
    $this->context->smarty->assign(
        array(
            'shkurkin_name' => 'Shkurkin',
            'shkurkin_link' => $this->context->link->getModuleLink('shkurkin', 'display')
        )
    );
    return $this->display(__FILE__, 'shkurkin.tpl');
  }

  public function hookDisplayHeader()
  {
    $this->context->controller->addCSS($this->_path.'css/shkurkin.css', 'all');
  }
}
?>