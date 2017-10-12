<?php

require_once 'kavageneric.civix.php';

/**
 * Implements hook_civicrm_install().
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 *
 * Run installer functions when the extension is first installed.
 */
function kavageneric_civicrm_install() {

  $installer = CRM_KavaGeneric_Installer::singleton();
  $installer->run();

  _kavageneric_civix_civicrm_install();
}

/** Default Civix hooks follow **/

function kavageneric_civicrm_enable() {
  _kavageneric_civix_civicrm_enable();
}

function kavageneric_civicrm_disable() {
  return _kavageneric_civix_civicrm_disable();
}

function kavageneric_civicrm_uninstall() {
  _kavageneric_civix_civicrm_uninstall();
}

function kavageneric_civicrm_config(&$config) {
  _kavageneric_civix_civicrm_config($config);
}

function kavageneric_civicrm_xmlMenu(&$files) {
  _kavageneric_civix_civicrm_xmlMenu($files);
}

function kavageneric_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _kavageneric_civix_civicrm_upgrade($op, $queue);
}

function kavageneric_civicrm_managed(&$entities) {
  _kavageneric_civix_civicrm_managed($entities);
}

function kavageneric_civicrm_caseTypes(&$caseTypes) {
  _kavageneric_civix_civicrm_caseTypes($caseTypes);
}

function kavageneric_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _kavageneric_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
