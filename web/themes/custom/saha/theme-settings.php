<?php

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

function saha_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form['settings'] = array(
        '#type' => 'details',
        '#title' => t('Theme settings'),
        '#open' => TRUE,
    );
    $form['settings']['header'] = array(
        '#type' => 'details',
        '#title' => t('Header settings'),
        '#open' => FALSE,
    );


   $form['settings']['header']['page_header_bg_image'] = array(
        '#type'  => 'managed_file',
        '#title' => t('Upload Page Header bg image'),
        '#default_value'   => theme_get_setting('page_header_bg_image', 'saha'),
        '#upload_location' => 'public://image',
    );



    $form['settings']['general_setting'] = array(
        '#type' => 'details',
        '#title' => t('General Settings'),
        '#open' => FALSE,
    );

    $form['settings']['general_setting']['general_setting_tracking_code'] = array(
        '#type' => 'textarea',
        '#title' => t('Tracking Code'),
        '#default_value' => theme_get_setting('general_setting_tracking_code', 'saha'),
    );

  // Copyright information admin configuration.
  $form['settings']['copyright'] = array(
    '#type' => 'details',
    '#title' => t('Footer Copy Right'),
     '#open' => FALSE,
  );
  $form['settings']['copyright']['copyright_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Copyright Text'),
    '#default_value' => theme_get_setting('copyright_text','saha'),
  );

   // contact phone information admin configuration.
  $form['settings']['contact'] = array(
    '#type' => 'details',
    '#title' => t('Contact phone'),
     '#open' => FALSE,
  );
  $form['settings']['contact']['contact_phone'] = array(
    '#type' => 'textfield',
    '#title' => t('Contact phone'),
    '#default_value' => theme_get_setting('contact_phone','saha'),
  );
  // Social network information admin configuration.
  $form['settings']['social'] = array(
    '#type' => 'details',
    '#title' => t('Social network'),
     '#open' => FALSE,
  );
  $form['settings']['social']['social_network'] = array(
    '#type' => 'textarea',
    '#title' => t('Social network'),
    '#default_value' => theme_get_setting('social_network','saha'),
  );

    // Blog settings
    $form['settings']['blog'] = array(
        '#type' => 'details',
        '#title' => t('Blog settings'),
        '#open' => FALSE,
    );

    $form['settings']['blog']['hide_blog_page_header'] = array(
    '#type' => 'checkbox',
    '#title' => t('Hide page header'),
    '#default_value' => theme_get_setting('hide_blog_page_header', 'saha'),
    '#description'   => t("Show/Hide page header"),
  );
    $form['settings']['blog']['blog_subtitle'] = array(
    '#type' => 'textfield',
    '#title' => t('Blog page subtitle'),
    '#default_value' => theme_get_setting('blog_subtitle', 'saha'),
  );

  $form['settings']['blog']['blog_page_header_bg_image'] = array(
        '#type'  => 'managed_file',
        '#title' => t('Upload Page Header bg image'),
        '#default_value'   => theme_get_setting('blog_page_header_bg_image', 'saha'),
        '#upload_location' => 'public://image',
    );

    $form['settings']['blog']['blog_sidebar'] = array(
        '#type' => 'select',
        '#title' => t('Default sidebar'),
        '#options' => array(
            'left' => t('Left'),
            'right' => t('Right'),
			'none' =>t('No sidebar'),
           
           
        ),
        '#default_value' => theme_get_setting('blog_sidebar', 'saha'),
    );

    // Blog settings
    $form['settings']['contact_page'] = array(
        '#type' => 'details',
        '#title' => t('Contact page settings'),
        '#open' => FALSE,
    );

   
    $form['settings']['contact_page']['contact_layout'] = array(
        '#type' => 'select',
        '#title' => t('Contact page layout'),
        '#options' => array(
            'layout1' => t('Layout 1'),
            'layout2' => t('Layout 2'),
           
        ),
        '#default_value' => theme_get_setting('contact_layout', 'saha'),
    );
	$form['settings']['contact_page']['contact_address'] = array(

    '#type' => 'textfield',

    '#title' => t('Address'),

    '#default_value' => theme_get_setting('contact_address', 'saha'),
    
    '#description' => t('Enter the address to be displayed'),

  );


    /**
        Portfolio settings:

        portfolio_style to be checked in node--portfolios.html.twig
        portfolio_layout to be cheched in views-view.html.twig
    */

    $form['settings']['portfolio'] = array(
        '#type' => 'details',
        '#title' => t('Portfolios page settings'),
        '#open' => FALSE,
    );

   
    $form['settings']['portfolio']['por_subtitle'] = array(
    '#type' => 'textfield',
    '#title' => t('Portfolios page subtitle'),
    '#default_value' => theme_get_setting('por_subtitle', 'saha'),
  );

  $form['settings']['portfolio']['por_page_header_bg_image'] = array(
        '#type'  => 'managed_file',
        '#title' => t('Upload Page Header bg image'),
        '#default_value'   => theme_get_setting('por_page_header_bg_image', 'saha'),
        '#upload_location' => 'public://image',
    );

 $form['settings']['portfolio']['portfolio_style'] = array(
        '#type'    => 'select',
        '#title'   => t('Portfolios page style'),
        '#options' => array(
            'portfolio1' => t('Portfolio style 1'),
            'portfolio2' => t('Portfolio style 2'),
            'portfolio3' => t('Portfolio style 3'),
            'portfolio4' => t('Portfolio style 4')
        ),
        '#default_value' => theme_get_setting('portfolio_style', 'saha'),
    );

        $form['settings']['portfolio']['portfolio_layout'] = array(
        '#type'    => 'select',
        '#title'   => t('Layout'),
        '#options' => array(
            'full_width'    => t('Full width'),
            'boxed'    => t('Boxed'),
            'gut_boxed'    => t('Gutted boxed'),
            'gut_full_width'    => t('Gutted full width')
            
        ),
        '#default_value' => theme_get_setting('portfolio_layout', 'saha'),
    );

    // custom css
    $form['settings']['custom_css'] = array(
        '#type' => 'details',
        '#title' => t('Custom CSS'),
        '#open' => FALSE,
    );


    $form['settings']['custom_css']['custom_css'] = array(
        '#type' => 'textarea',
        '#title' => t('Custom CSS'),
        '#default_value' => theme_get_setting('custom_css', 'saha'),
        '#description' => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
    );

    //footer settings
   /* $form['settings']['footer'] = array(
        '#type' => 'details',
        '#title' => t('Footer settings'),
        '#open' => FALSE,
    );
        $form['settings']['footer']['copyright_text'] = array(
        '#type' => 'textarea',
        '#title' => t('Copyright text'),
        '#default_value' => theme_get_setting('copyright_text', 'saha'),
    );*/

    $theme_file = drupal_get_path('theme', 'saha') . '/theme-settings.php';
    $build_info = $form_state->getBuildInfo();
    if (!in_array($theme_file, $build_info['files'])) {
        $build_info['files'][] = $theme_file;
    }
    $form_state->setBuildInfo($build_info);

    // Custom submit to save the file permenant.
    $form['#submit'][] = 'saha_settings_form_submit';

}

/**
 * Custom submit handler for rainbow settings form.
 */
function saha_settings_form_submit(&$form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $account = \Drupal::currentUser();
    $values = $form_state->getValues();
  
 
 
if (isset($values['por_page_header_bg_image']) && !empty($values['por_page_header_bg_image'])) {
        // Load the file via file.fid.
        $file1 = file_load($values['por_page_header_bg_image'][0]);
        // Change status to permanent.
        $file1->setPermanent();
        $file1->save();
        $file_usage = \Drupal::service('file.usage');
        $file_usage->add($file1, 'user', 'user', $account->id());
    }

if (isset($values['page_header_bg_image']) && !empty($values['page_header_bg_image'])) {
        // Load the file via file.fid.
        $file = file_load($values['page_header_bg_image'][0]);
        // Change status to permanent.
        $file->setPermanent();
        $file->save();
        $file_usage = \Drupal::service('file.usage');
        $file_usage->add($file, 'user', 'user', $account->id());
    }  

if (isset($values['blog_page_header_bg_image']) && !empty($values['blog_page_header_bg_image'])) {
        // Load the file via file.fid.
        $file = file_load($values['blog_page_header_bg_image'][0]);
        // Change status to permanent.
        $file->setPermanent();
        $file->save();
        $file_usage = \Drupal::service('file.usage');
        $file_usage->add($file, 'user', 'user', $account->id());
    }      

}
?>