<?php

require_once 'kavageneric.civix.php';

/**
 * Implements hook_civicrm_install().
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 *
 * Run installer functions when the extension is first installed.
 */
function kavageneric_civicrm_install() {

  require __DIR__ . '/CRM/KavaGeneric/Installer.php';

  $installer = CRM_KavaGeneric_Installer::singleton();
  $installer->run();

  _kavageneric_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_coreResourceList.
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_coreResourceList
 *
 * Add custom JS.
 */
function kavageneric_civicrm_coreResourceList(&$list, $region) {
}

function kavageneric_civicrm_buildForm($formName, &$form) {
  if ($formName == 'CRM_Activity_Form_ActivityLinks') {
    $res = CRM_Core_Resources::singleton();
    $res->addScriptFile('be.kava.generic', 'js/validation.js', 1012, 'html-header', FALSE);
  }
}

function kavageneric_civicrm_validateForm($formName, &$fields, &$files, &$form, &$errors) {
  // sample implementation
  if ($formName == 'CRM_Contact_Form_Contact') {
    foreach ($fields as $fieldKey => $fieldValue) {
      // check VAT number
      $customFieldName = 'custom_9_';
      if (substr($fieldKey, 0, strlen($customFieldName)) == $customFieldName && $fieldValue) {
        $country = substr($fieldValue, 0, 2);
        if ($country == 'BE') {
          $cleanedVAT = str_replace('.', '', str_replace(' ', '', $fieldValue));
          if (strlen($cleanedVAT) !== 12) {
            $errors[$fieldKey] = 'Lengte BTW-nummer klopt niet. Formaat: BE123456789';
          }
          else {
            $firstPart = (int)substr($cleanedVAT, 2, 8);
            $secondPart = (int)substr($cleanedVAT, -2, 2);
            //Doe een modulus 97 op het eerste stuk en trek dit af van 97, deze uitkomst moet gelijk zijn aan het laatste stuk van 2 cijfers,
            if (97 - ($firstPart % 97) != $secondPart) {
              $errors[$fieldKey] = 'Geen geldig BTW-nummer.';
            }
          }
        }
        else {
          $errors[$fieldKey] = 'BTW-nummer moet met BE beginnen ipv ' . $country;
        }
      }
    }
  }
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
