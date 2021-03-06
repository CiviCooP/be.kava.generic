/* KAVA Custom Form Validation JS */

CRM.$(function ($) {

    var initKavaFormValidation = function () {
        $.validator.addMethod("vat_be",
            function (value, element) {
                if (value.length === 0) {
                    return true;
                }

                var matches = value.match(/^BE([0-9]{8})([0-9]{2})$/i);
                if (matches === null || matches.length === 0) {
                    return false;
                }

                return (97 - parseInt(matches[1]) % 97 === parseInt(matches[2]));
            },
            "Voer een geldig BTW-nummer in."
        );

        var crmForm = $(".page-civicrm form.CRM_Contact_Form_Contact, .page-civicrm form.CRM_Contact_Form_Inline_CustomData");
        if (crmForm.length > 0) {
            crmForm.crmValidate();
            crmForm.find('input[data-crm-custom="contact_organisation:BTW_nummer"]').rules('add', {
                vat_be: true
            });
        }

        var overnameForm = $(".page-civicrm form.CRM_KavaOvername_Form_Start");
        if (overnameForm.length > 0) {
            overnameForm.crmValidate();
            overnameForm.find('input[name=btw_no]').rules('add', {
                vat_be: true
            });
        }
    };

    $('body').on('crmLoad', function (ev) {
        if ($(ev.target).find('form').length > 0) {
            initKavaFormValidation();
        }
    });
});
