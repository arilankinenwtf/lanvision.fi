<?php
namespace Concrete\Package\WtfCookieConsent\Controller\SinglePage\Dashboard\System\Basics;

use Core;
use Page;
use Package;
use Concrete\Core\Multilingual\Page\Section\Section;
use Concrete\Core\Page\Controller\DashboardPageController;

defined('C5_EXECUTE') or die("Access Denied.");

class CookieConsent extends DashboardPageController
{
    protected $colorProfiles;
    protected $languageSections;

    public function __construct(Page $c)
    {
        parent::__construct($c);
        $this->languageSections = Section::getList();
    }

    public function view()
    {
        $config = $this->getConfig();
        $debug = $config->get('cookies.consent_debug');
        $this->set('cookies.consent_debug', $config->get('cookies.consent_debug'));

        $this->set('cookies.consent_consentDialogLayout', $config->get('cookies.consent_consentDialogLayout'));
        $this->set('cookies.consent_consentDialogPosition', $config->get('cookies.consent_consentDialogPosition'));
        $this->set('cookies.consent_consentSettingsLayout', $config->get('cookies.consent_consentSettingsLayout'));

        $this->set('cookies.consent_bannerBg', $config->get('cookies.consent_bannerBg'));
        $this->set('cookies.consent_bannerColor', $config->get('cookies.consent_bannerColor'));
        $this->set('cookies.consent_accBtnBg', $config->get('cookies.consent_accBtnBg'));
        $this->set('cookies.consent_accBtnColor', $config->get('cookies.consent_accBtnColor'));
        $this->set('cookies.consent_declineBtnBg', $config->get('cookies.consent_declineBtnBg'));
        $this->set('cookies.consent_declineBtnColor', $config->get('cookies.consent_declineBtnColor'));
        $this->set('cookies.consent_linkColor', $config->get('cookies.consent_linkColor'));

        $this->set('cookies.consent_gaID', $config->get('cookies.consent_gaID'));
        $this->set('cookies.consent_fbpID', $config->get('cookies.consent_fbpID'));

        $this->set('cookies.consent_gtmID', $config->get('cookies.consent_gtmID'));
        $this->set('cookies.consent_gtmGA', $config->get('cookies.consent_gtmGA'));
        $this->set('cookies.consent_gtmFBP', $config->get('cookies.consent_gtmFBP'));

        $this->set('cookies.consent_necessaryScriptsHead', $config->get('cookies.consent_necessaryScriptsHead'));
        $this->set('cookies.consent_analyticsScriptsHead', $config->get('cookies.consent_analyticsScriptsHead'));
        $this->set('cookies.consent_marketingScriptsHead', $config->get('cookies.consent_marketingScriptsHead'));
        $this->set('cookies.consent_necessaryScriptsFooter', $config->get('cookies.consent_necessaryScriptsFooter'));
        $this->set('cookies.consent_analyticsScriptsFooter', $config->get('cookies.consent_analyticsScriptsFooter'));
        $this->set('cookies.consent_marketingScriptsFooter', $config->get('cookies.consent_marketingScriptsFooter'));

        foreach ($this->languageSections as $languageSection ) {
            $locale = $languageSection->getLocale();

            $enabled = $config->get('cookies.consent_'.$locale.'_enabled');
            $localeMesg = $config->get('cookies.consent_'.$locale.'_message');
            $localeMoreInfoPage = $config->get('cookies.consent_'.$locale.'_more-info-page');
            $localeMoreInfoPageText = $config->get('cookies.consent_'.$locale.'_more-info-page-text');
            $localeBtnTxt = $config->get('cookies.consent_'.$locale.'_more-info-button-text');
            $localeAcptBtnTxt = $config->get('cookies.consent_'.$locale.'_accept-button-text');
            $localeDeclineBtnTxt = $config->get('cookies.consent_'.$locale.'_decline-button-text');
            $localeSaveBtnTxt = $config->get('cookies.consent_'.$locale.'save-button-text');
            $localeLongDesc = $config->get('cookies.consent_'.$locale.'_long-description');
            $customTitle = $config->get('cookies.consent_'.$locale.'_custom-choice-title');

            $this->set($locale.'-enabled', $enabled);
            $this->set($locale.'-message', $localeMesg);
            $this->set($locale.'-more-info-page', $localeMoreInfoPage);
            $this->set($locale.'-more-info-page-text', $localeMoreInfoPageText);
            $this->set($locale.'-more-info-button-text', $localeBtnTxt);
            $this->set($locale.'-accept-button-text', $localeAcptBtnTxt);
            $this->set($locale.'-decline-button-text', $localeDeclineBtnTxt);
            $this->set($locale.'-save-button-text', $localeSaveBtnTxt);
            $this->set($locale.'-long-description', $localeLongDesc);
            $this->set($locale.'-custom-choice-title', $customTitle);
        }

        $this->set('has_multilingual', Core::make('multilingual/detector')->isEnabled());

    }


    public function saveSettings()
    {
        $config = $this->getConfig();
        $this->flash('success', t("Display settings successfully saved."));

        if ($this->post('debug') === 'true') {
            $config->save('cookies.consent_debug', 'true');
        } else {
            $config->save('cookies.consent_debug', 'false');
        }

        foreach ($this->languageSections as $languageSection){
            $locale = $languageSection->getLocale();

            if($this->post($locale.'-enabled') === 'true'){
                $enabled = 'true';
            } else {
                $enabled = 'false';
            }
            $message = $this->post($locale.'-message');
            $acptButtonTxt = $this->post($locale.'-accept-button-text');
            $declineButtonTxt = $this->post($locale.'-decline-button-text');
            $saveButtonTxt = $this->post($locale.'-save-button-text');
            $buttonTxt = $this->post($locale.'-more-info-button-text');
            $moreInfoPage = $this->post($locale.'-more-info-page');
            $moreInfoPageText = $this->post($locale.'-more-info-page-text');
            $longDesc = $this->post($locale.'-long-description');
            $customTitle = $this->post($locale.'-custom-choice-title');

            $config->save('cookies.consent_'.$locale.'_enabled', $enabled);
            $config->save('cookies.consent_'.$locale.'_message', $message);
            $config->save('cookies.consent_'.$locale.'_more-info-button-text', $buttonTxt);
            $config->save('cookies.consent_'.$locale.'_more-info-page', $moreInfoPage);
            $config->save('cookies.consent_'.$locale.'_more-info-page-text', $moreInfoPageText);
            $config->save('cookies.consent_'.$locale.'_accept-button-text', $acptButtonTxt);
            $config->save('cookies.consent_'.$locale.'_decline-button-text', $declineButtonTxt);
            $config->save('cookies.consent_'.$locale.'save-button-text', $saveButtonTxt);
            $config->save('cookies.consent_'.$locale.'_long-description', $longDesc);
            $config->save('cookies.consent_'.$locale.'_custom-choice-title', $customTitle);
        }

        if (is_object($page)) {
            $this->redirect('/dashboard/system/basics/cookie_consent');
        }
    }

    public function saveStyleSettings()
    {
        $config = $this->getConfig();
        $this->flash('success', t("Colors successfully saved."));

        $config->save('cookies.consent_consentDialogLayout', $this->post('consentDialogLayout'));
        $config->save('cookies.consent_consentDialogPosition', $this->post('consentDialogPosition'));
        $config->save('cookies.consent_consentSettingsLayout', $this->post('consentSettingsLayout'));

        $config->save('cookies.consent_bannerBg', $this->post('bannerBg'));
        $config->save('cookies.consent_bannerColor', $this->post('bannerColor'));

        $config->save('cookies.consent_accBtnBg', $this->post('accBtnBg'));
        $config->save('cookies.consent_accBtnColor', $this->post('accBtnColor'));

        $config->save('cookies.consent_declineBtnBg', $this->post('declineBtnBg'));
        $config->save('cookies.consent_declineBtnColor', $this->post('declineBtnColor'));

        $config->save('cookies.consent_linkColor', $this->post('linkColor'));

        if (is_object($page)) {
            $this->redirect('/dashboard/system/basics/cookie_consent');
        }
    }


    public function saveScriptSettings()
    {
        $config = $this->getConfig();
        $this->flash('success', t("Scripts successfully saved. Cookie consent will show again for users."));

        $config->save('cookies.consent_gaID', $this->post('gaID'));
        $config->save('cookies.consent_fbpID', $this->post('fbpID'));

        $config->save('cookies.consent_gtmID', $this->post('gtmID'));
        $config->save('cookies.consent_gtmGA', $this->post('gtmGA'));
        $config->save('cookies.consent_gtmFBP', $this->post('gtmFBP'));

        $config->save('cookies.consent_necessaryScriptsHead', $this->post('necessaryScriptsHead'));
        $config->save('cookies.consent_analyticsScriptsHead', $this->post('analyticsScriptsHead'));
        $config->save('cookies.consent_marketingScriptsHead', $this->post('marketingScriptsHead'));

        $config->save('cookies.consent_necessaryScriptsFooter', $this->post('necessaryScriptsFooter'));
        $config->save('cookies.consent_analyticsScriptsFooter', $this->post('analyticsScriptsFooter'));
        $config->save('cookies.consent_marketingScriptsFooter', $this->post('marketingScriptsFooter'));

        // Ask users to consent again after scripts changed.
        if($config->get('cookies.consent_revisionCount')) {
            $currentRevisions = $config->get('cookies.consent_revisionCount') + 1;
        } else { $currentRevisions = 1; }
        $config->save('cookies.consent_revisionCount', $currentRevisions);

        if (is_object($page)) {
            $this->redirect('/dashboard/system/basics/cookie_consent');
        }
    }

    protected function getConfig()
    {
        $pkg = Package::getByID($this->c->getPackageID());
        return $pkg->getConfig();
    }

}