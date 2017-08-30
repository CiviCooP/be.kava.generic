<?php

/**
 * Class CRM_KavaGeneric_Installer.
 * This class contains (existing) functions to create
 * default settings, contact types and relationship types.
 *
 * @author Kevin Levie <kevin.levie@civicoop.org>
 * @package be.kava.generic
 * @license AGPL-3.0
 */
class CRM_KavaGeneric_Installer {

  /**
   * @var static $instance
   */
  private static $instance;

  /**
   * Get instance.
   * @return static
   */
  public static function singleton() {
    if (!isset(static::$instance)) {
      static::$instance = new static;
    }

    return static::$instance;
  }

  /**
   * Run installer (on enable).
   * Hier voegen we een aantal contacttypes e.d. toe.
   * Deze code is geleend van https://github.com/SPnl/nl.sp.generic/blob/master/spgeneric.php.
   * Verder laadt de Civix-upgrader automatisch alle xml/*_install.xml bestanden in, met velden en profielen.
   */
  public function run() {

    $this->addContactType('Apotheker', 1);
    $this->addContactType('Apotheekassistent', 1);
    $this->addContactType('Zorgverlener', 1);

    $this->addContactType('Bedrijf', 3);
    $this->addContactType('Apotheekuitbating', 3);
    $this->addContactType('Apotheeklocatie', 3);
    $this->addContactType('Tariferingsdienst KAVA', 3);
    $this->addContactType('Beroepsvereniging', 3);
    $this->addContactType('Onderwijsinstelling', 3);
    $this->addContactType('Bedrijfsonderdeel', 3);

    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_titularis_a',
      'name_b_a'       => 'kavarel_titularis_b',
      'label_a_b'      => 'Titularis van',
      'label_b_a'      => 'Titularis is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_cotitularis_a',
      'name_b_a'       => 'kavarel_cotitularis_b',
      'label_a_b'      => 'Co-titularis van',
      'label_b_a'      => 'Co-titularis is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_directeur_a',
      'name_b_a'       => 'kavarel_directeur_b',
      'label_a_b'      => 'Directeur van',
      'label_b_a'      => 'Directeur is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_eigenaar_a',
      'name_b_a'       => 'kavarel_eigenaar_b',
      'label_a_b'      => 'Eigenaar van',
      'label_b_a'      => 'Eigenaar is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_medeeigenaar_a',
      'name_b_a'       => 'kavarel_medeeigenaar_b',
      'label_a_b'      => 'Mede-eigenaar van',
      'label_b_a'      => 'Mede-eigenaar is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_tariferingsdienst_a',
      'name_b_a'       => 'kavarel_tariferingsdienst_b',
      'label_a_b'      => 'Tariferingsdienst van',
      'label_b_a'      => 'Tariferingsdienst is',
      'contact_type_a' => 'organization',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_student_a',
      'name_b_a'       => 'kavarel_student_b',
      'label_a_b'      => 'Studeert/heeft gestudeerd bij',
      'label_b_a'      => 'Is/was onderwijsinstelling van',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_lid1jrafg_a',
      'name_b_a'       => 'kavarel_lid1jrafg_b',
      'label_a_b'      => '1 jaar afgestudeerd lid van',
      'label_b_a'      => '1 jaar afgestudeerd lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_lidafg_a',
      'name_b_a'       => 'kavarel_lidafg_b',
      'label_a_b'      => 'Afgestudeerd lid van',
      'label_b_a'      => 'Afgestudeerd lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_corrlid_a',
      'name_b_a'       => 'kavarel_corrlid_b',
      'label_a_b'      => 'Corresponderend lid van',
      'label_b_a'      => 'Corresponderend lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_meewlid_a',
      'name_b_a'       => 'kavarel_meewlid_b',
      'label_a_b'      => 'Meewerkend lid van',
      'label_b_a'      => 'Meewerkend lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_werkendlid_a',
      'name_b_a'       => 'kavarel_werkendlid_b',
      'label_a_b'      => 'Werkend lid van',
      'label_b_a'      => 'Werkend lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_erelid_a',
      'name_b_a'       => 'kavarel_erelid_b',
      'label_a_b'      => 'Erelid van',
      'label_b_a'      => 'Erelid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_seniorlid_a',
      'name_b_a'       => 'kavarel_seniorlid_b',
      'label_a_b'      => 'Senior-lid van',
      'label_b_a'      => 'Senior-lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_ongedeflid_a',
      'name_b_a'       => 'kavarel_ongedeflid_a',
      'label_a_b'      => 'Ongedefinieerd lid van',
      'label_b_a'      => 'Ongedefinieerd lid is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_lidnkberoepsv_a',
      'name_b_a'       => 'kavarel_lidnkberoepsv_b',
      'label_a_b'      => 'Lid van beroepsvereniging (niet-KAVA)',
      'label_b_a'      => 'Lid beroepsvereniging (niet-KAVA) is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_lidnknietstem_a',
      'name_b_a'       => 'kavarel_lidnknietstem_b',
      'label_a_b'      => 'Niet-stemgerechtigd lid van (niet-KAVA)',
      'label_b_a'      => 'Niet-stemgerechtigd lid is (niet-KAVA)',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_lidnkstem_a',
      'name_b_a'       => 'kavarel_lidnkstem_b',
      'label_a_b'      => 'Stemgerechtigd lid van (niet-KAVA)',
      'label_b_a'      => 'Stemgerechtigd lid is (niet-KAVA)',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_klant_a',
      'name_b_a'       => 'kavarel_klant_b',
      'label_a_b'      => 'Klant van',
      'label_b_a'      => 'Klant is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_medewerker_a',
      'name_b_a'       => 'kavarel_medewerker_b',
      'label_a_b'      => 'Medewerker van',
      'label_b_a'      => 'Medewerker is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_provisor_a',
      'name_b_a'       => 'kavarel_provisor_b',
      'label_a_b'      => 'Provisor van',
      'label_b_a'      => 'Provisor is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_adjunctapotheker_a',
      'name_b_a'       => 'kavarel_adjunctapotheker_b',
      'label_a_b'      => 'Adjunct-apotheker van',
      'label_b_a'      => 'Adjunct-apotheker is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_plaatsvapotheker_a',
      'name_b_a'       => 'kavarel_plaatsvapotheker_b',
      'label_a_b'      => 'Plaatsvervangend apotheker van',
      'label_b_a'      => 'Plaatsvervangend apotheker is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
    $this->addRelationshipType(array(
      'name_a_b'       => 'kavarel_farmassistent_a',
      'name_b_a'       => 'kavarel_farmassistent_b',
      'label_a_b'      => 'Farmaceutisch-technisch assistent van',
      'label_b_a'      => 'Farmaceutisch-technisch assistent is',
      'contact_type_a' => 'individual',
      'contact_type_b' => 'organization',
    ));
  }

  /**
   * Add a contact type.
   * @param string $label Contact Type Label
   * @param int $parent_id Parent ID (1 = Individual, 2 = Household, 3 = Organization)
   * @return bool Success
   */
  protected function addContactType($label, $parent_id = 1) {

    $name = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $label));

    try {
      $ctCheck = civicrm_api3('ContactType', 'getsingle', array('name' => $name));
      return !$ctCheck['is_error'];
    } catch (\CiviCRM_API3_Exception $e) {
      $ctAdd = civicrm_api3('ContactType', 'create', array(
        'name'      => $name,
        'label'     => $label,
        'parent_id' => $parent_id,
      ));
      return !$ctAdd['is_error'];
    }
  }


  /**
   * Add a relationship type.
   * @param array $params API Parameters
   * @return bool Success
   */
  protected function addRelationshipType($params = array()) {

    try {
      $rtCheck = civicrm_api3('RelationshipType', 'getsingle', array('name_a_b' => $params['name_a_b']));
      return !$rtCheck['is_error'];
    } catch (\CiviCRM_API3_Exception $e) {
      $rtAdd = civicrm_api3('RelationshipType', 'create', $params);
      return !$rtAdd['is_error'];
    }
  }
}