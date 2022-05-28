<?php
use Concrete\Core\Multilingual\Page\Section\Section;

$currentVersion = \Core::make('config')->get('concrete.version');
$isVersion9 = version_compare($currentVersion , '8.9.9', '>');

$form = Core::make('helper/form');
$pageSelector = Core::make('helper/form/page_selector');
$languageSections = Section::getList();
$pkg = Package::getByID($this->c->getPackageID());
$config = $pkg->getConfig();

echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Cookie Consent'), false, false, false, false, false, false); ?>

<div class="ccm-pane-body">
    <?php
    $tabs = array(
        array('tab-consent-content', t('Content'), true),
        array('tab-styles', t('Styles')),
        array('tab-scripts', t('Cookies and scripts')),
    );
    echo Core::make('helper/concrete/ui')->tabs($tabs);
    ?>

    <div class="tab-content">
        <div id="<?php echo $isVersion9 ? 'tab-consent-content' : 'ccm-tab-content-tab-consent-content';?>" 
             class="<?php echo $isVersion9 ? 'tab-pane active' : 'ccm-tab-content';?>">

            <fieldset>
                <form method="post" action="<?php echo $view->action("saveSettings"); ?>">

                    <legend style="margin-top: 30px;"><?php echo t('Content for different languages') ?></legend>
                    <?php foreach ($languageSections as $languageSection){
                        $locale = $languageSection->getLocale();?>
                        <hr>
                        <div class="form-group" style="margin-bottom: 10px; margin-top: 30px;">
                            <label for="<?php echo $locale ?>-enabled"><?= $locale . " - " . t('Enabled'); ?></label><br>
                            <?= $form->checkbox($locale .'-enabled', 'true', $config->get('cookies.consent_'.$locale.'_enabled') === 'true'); ?>
                        </div>

                        <div class="form-group">
                            <label for="<?php echo $locale ?>-description"><?= $locale . " - " . t('Message'); ?></label>
                            <?= $form->textarea($locale .'-message', $config->get('cookies.consent_'.$locale.'_message'), array('style' => 'height: 100px;')); ?>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="<?php echo $locale ?>-button-text"><?= $locale . " - " . t('Accept button text'); ?></label>
                                <?= $form->text($locale .'-accept-button-text', $config->get('cookies.consent_'.$locale.'_accept-button-text')); ?>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="<?php echo $locale ?>-button-text"><?= $locale . " - " . t('Decline button text'); ?></label>
                                <?= $form->text($locale .'-decline-button-text', $config->get('cookies.consent_'.$locale.'_decline-button-text')); ?>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="<?php echo $locale ?>-button-text"><?= $locale . " - " . t('Save button text'); ?></label>
                                <?= $form->text($locale .'-save-button-text', $config->get('cookies.consent_'.$locale.'save-button-text')); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="<?php echo $locale ?>-more-info-page"><?= $locale . " - " . t('Cookies page link'); ?></label>
                                <?= $pageSelector->selectPage($locale . '-more-info-page',  $config->get('cookies.consent_'.$locale.'_more-info-page')); ?>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="<?php echo $locale ?>-more-info-page-text"><?= $locale . " - " . t('Cookies page link text'); ?></label>
                                <?= $form->text($locale .'-more-info-page-text', $config->get('cookies.consent_'.$locale.'_more-info-page-text')); ?>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="<?php echo $locale ?>-button-text"><?= $locale . " - " . t('Show More Info -button text'); ?></label>
                                <?= $form->text($locale .'-more-info-button-text', $config->get('cookies.consent_'.$locale.'_more-info-button-text')); ?>
                                <span class="text-muted small">(<?= t('If empty, custom choices won\'t be shown');?>)</span>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label for="<?php echo $locale ?>-custom-choice-title"><?= $locale . " - " . t('Custom cookies title'); ?></label>
                                <?= $form->text($locale .'-custom-choice-title', $config->get('cookies.consent_'.$locale.'_custom-choice-title')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="<?php echo $locale ?>-long-description"><?= $locale . " - " . t('More Info'); ?></label>
                            <?= $form->textarea($locale .'-long-description', $config->get('cookies.consent_'.$locale.'_long-description'), array('style' => 'height: 150px;')); ?>
                        </div>
                    <?php } ?>
                    <input class="btn btn-primary" type="submit" style="margin-top: 40px;" value="<?= t('Save'); ?>">
                </form>
            </fieldset>
        </div>

        <div id="<?php echo $isVersion9 ? 'tab-styles' : 'ccm-tab-content-tab-styles';?>" 
             class="<?php echo $isVersion9 ? 'tab-pane' : 'ccm-tab-content';?>">

            <form method="post" action="<?php echo $view->action("saveStyleSettings"); ?>">
                <legend style="margin-top: 30px;"><?php echo t('Style') ?></legend>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="consentDialogLayout"><?= t('Consent dialog style'); ?></label><br>
                        <?= $form->select('consentDialogLayout', array('box' => t('Box'), 'cloud' => t('Wide box'), 'bar' => t('Bar')), $config->get('cookies.consentDialogLayout')); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="consentDialogPosition"><?= t('Consent dialog position'); ?></label><br>
                        <?= $form->select('consentDialogPosition', array('bottom right' => t('Bottom Right'), 'bottom left' => t('Bottom Left'), 'bottom center' => t('Bottom Center'),
                                                                         'middle center' => t('Centered'), 'top center' => t('Top Center'),
                                                                        ), $config->get('cookies.consentDialogPosition')); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="consentSettingsLayout"><?= t('Consent settings style'); ?></label><br>
                        <?= $form->select('consentSettingsLayout', array('bar' => t('Bar'), 'box' => t('Box')), $config->get('cookies.consentSettingsLayout')); ?>
                    </div>
                </div>

                <legend style="margin-top: 30px;"><?php echo t('Colors') ?></legend>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="bannerBg"><?= t('Banner background'); ?></label><br>
                        <?= $form->text('bannerBg', $config->get('cookies.consent_bannerBg')); ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bannerColor"><?= t('Banner text color'); ?></label><br>
                        <?= $form->text('bannerColor', $config->get('cookies.consent_bannerColor')); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="accBtnBg"><?= t('Accept Button Background'); ?></label><br>
                        <?= $form->text('accBtnBg', $config->get('cookies.consent_accBtnBg')); ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="accBtnColor"><?= t('Accept Button Color'); ?></label><br>
                        <?= $form->text('accBtnColor', $config->get('cookies.consent_accBtnColor')); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="declineBtnBg"><?= t('Decline Button Background'); ?></label><br>
                        <?= $form->text('declineBtnBg', $config->get('cookies.consent_declineBtnBg')); ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="declineBtnColor"><?= t('Decline Button Color'); ?></label><br>
                        <?= $form->text('declineBtnColor', $config->get('cookies.consent_declineBtnColor')); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="linkColor"><?= t('Link color'); ?></label><br>
                        <?= $form->text('linkColor', $config->get('cookies.consent_linkColor')); ?>
                    </div>
                    <div class="form-group col-sm-6">

                    </div>
                </div>

                <input class="btn btn-primary" type="submit" style="margin-top: 40px;" value="<?= t('Save'); ?>">
            </form>
        </div>

        <div id="<?php echo $isVersion9 ? 'tab-scripts' : 'ccm-tab-content-tab-scripts';?>" 
             class="<?php echo $isVersion9 ? 'tab-pane' : 'ccm-tab-content';?>">

            <form method="post" action="<?php echo $view->action("saveScriptSettings"); ?>">
                <legend style="margin-top: 30px;"><?php echo t('Tags'); ?></legend>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="gaID"><?= t('Google Analytics ID'); ?></label>
                        <?= $form->text('gaID', $config->get('cookies.consent_gaID'), array('placeholder' => 'UA-')); ?>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="gtmID"><?= t('Google Tag Manager ID'); ?></label>
                        <?= $form->text('gtmID', $config->get('cookies.consent_gtmID'), array('placeholder' => 'GTM-')); ?>

                        <div class="form-group" style="margin: 10px 0;">
                            <?= $form->checkbox('gtmGA', 'true', $config->get('cookies.consent_gtmGA') === 'true'); ?>
                            <label for="gtmGA"><?= t('Google Analytics'); ?></label>
                        </div>
                        <div class="form-group" style="margin: 10px 0;">
                            <?= $form->checkbox('gtmFBP', 'true', $config->get('cookies.consent_gtmFBP') === 'true'); ?>
                            <label for="gtmFBP"><?= t('Facebook Pixel'); ?></label>
                        </div>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="fbpID"><?= t('Facebook Pixel ID'); ?></label>
                        <?= $form->text('fbpID', $config->get('cookies.consent_fbpID'), array('placeholder' => '1234...')); ?>
                    </div> 
                </div>
                
                <legend style="margin-top: 30px;"><?php echo t('Head'); ?></legend>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="necessaryScriptsHead"><?= t('Necessary (always allowed)'); ?></label>
                        <?= $form->textarea('necessaryScriptsHead', $config->get('cookies.consent_necessaryScriptsHead'), array('style' => 'height: 100px;')); ?>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="analyticsScriptsHead"><?= t('Analytics scripts'); ?></label>
                        <?= $form->textarea('analyticsScriptsHead', $config->get('cookies.consent_analyticsScriptsHead'), array('style' => 'height: 100px;')); ?>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="marketingScriptsHead"><?= t('Marketing scripts'); ?></label>
                        <?= $form->textarea('marketingScriptsHead', $config->get('cookies.consent_marketingScriptsHead'), array('style' => 'height: 100px;')); ?>
                    </div> 
                </div>

                <legend style="margin-top: 30px;"><?php echo t('Footer'); ?></legend>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="necessaryScriptsFooter"><?= t('Necessary (always allowed)'); ?></label>
                        <?= $form->textarea('necessaryScriptsFooter', $config->get('cookies.consent_necessaryScriptsFooter'), array('style' => 'height: 100px;')); ?>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="analyticsScriptsFooter"><?= t('Analytics scripts'); ?></label>
                        <?= $form->textarea('analyticsScriptsFooter', $config->get('cookies.consent_analyticsScriptsFooter'), array('style' => 'height: 100px;')); ?>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="marketingScriptsFooter"><?= t('Marketing scripts'); ?></label>
                        <?= $form->textarea('marketingScriptsFooter', $config->get('cookies.consent_marketingScriptsFooter'), array('style' => 'height: 100px;')); ?>
                    </div> 
                </div>
                
                <input class="btn btn-primary" type="submit" style="margin-top: 40px;" value="<?= t('Save'); ?>">
            </form>
        </div>

    </div>
</div>

<style>
    .form-group {
        margin-bottom: 20px;
    }
</style>

<?php   echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false);?>

