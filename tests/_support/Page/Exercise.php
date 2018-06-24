<?php
/**
 * Created by PhpStorm.
 * User: youness
 * Date: 2018-03-09
 * Time: 9:37 AM
 */

namespace Page;


class Exercise
{

    //  url of current page
    public static $URL = '/admin/drill';



    // Elements need to see see
    public static $see_list_page_title="Liste des exercices";
    public static $see_edit_page_title="edit";
    public static $see_show_page_title="Drill";
    public static $see_config_page_title="Choisissez un type de niveau qui faudra configuré :";
    public static $see_message_success="Votre opération a été exécutée avec succès";


    //text to grab
    public static $grab_id_from_list_page='table.table tbody tr:nth-child(1) td:nth-child(1)';

    //Action Links
   public static $link_edit_exercise = "table.table tbody tr:nth-child(1) td:nth-last-child(1) a[title=Modifier]";
   public static $link_show_exercise = "table.table tbody tr:nth-child(1) td:nth-last-child(1) a[title='Afficher les détails']";
   public static $link_to_olympic_config = "table.table tbody tr:nth-child(1) td:nth-last-child(1) a[title=Configuration]";
   public static $link_to_braintracker_config = "table.table tbody tr:nth-child(3) td:nth-last-child(1) a[title=Configuration]";
   public static $link_to_rotator_config = "table.table tbody tr:nth-child(2) td:nth-last-child(1) a[title=Configuration]";
   public static $link_to_saccade_config = "table.table tbody tr:nth-child(4) td:nth-last-child(1) a[title=Configuration]";
   public static $link_to_tachistoscope_config = "table.table tbody tr:nth-child(5) td:nth-last-child(1) a[title=Configuration]";
   public static $go_to_olympicConfiguration = "/admin/olympic-config/new/1/1";
   public static $go_to_rotatorConfiguration = "/admin/rotator-config/new/2/1";
   public static $go_to_braintrackerConfiguration = "/admin/brain-tracker-config/new/3/1";
   public static $go_to_saccadeConfiguration = "/admin/saccade-configuration/new/4/1";
   public static $go_to_tachistoscopeConfiguration = "/admin/tachistoscope-config/new/5/2";


   //create form input elements for olympicDrill configuration
    public static $olympic_minPointsField="appbundle_olympicconfiguration[minPoints]";
    public static $olympic_timeDurationField="appbundle_olympicconfiguration[timeDuration]";
    public static $olympic_statusField="#appbundle_olympicconfiguration_status";

   //create form input elements for RotatorDrill configuration
    public static $rotator_speedRotateField="appbundle_rotatorconfiguration[speedRotate]";
    public static $rotator_nbChiffreField="appbundle_rotatorconfiguration[nbChiffre]";
    public static $rotator_minNbChiffreField="appbundle_rotatorconfiguration[minNbChiffre]";
    public static $rotator_minPointsField="appbundle_rotatorconfiguration[minPoints]";
    public static $rotator_timeDurationField="appbundle_rotatorconfiguration[timeDuration]";
    public static $rotator_statusField="#appbundle_rotatorconfiguration_status";


   //create form input elements for braintrackerDrill configuration
    public static $braintracker_speed="appbundle_braintrackerconfiguration[speed]";
    public static $braintracker_showCirclesDuration="appbundle_braintrackerconfiguration[showCirclesDuration]";
    public static $braintracker_movementDuration="appbundle_braintrackerconfiguration[movementDuration]";
    public static $braintracker_numberCirclesTotal="appbundle_braintrackerconfiguration[numberCirclesTotal]";
    public static $braintracker_circlesToTrack="appbundle_braintrackerconfiguration[circlesToTrack]";
    public static $braintracker_minPointsField="appbundle_braintrackerconfiguration[minPoints]";
    public static $braintracker_timeDurationField="appbundle_braintrackerconfiguration[timeDuration]";
    public static $braintracker_statusField="#appbundle_braintrackerconfiguration_status";

   //create form input elements for saccadeDrill configuration
    public static $saccade_timeReactionField="appbundle_saccadeconfiguration[timeReaction]";
    public static $saccade_minPointsField="appbundle_saccadeconfiguration[minPoints]";
    public static $saccade_timeDurationField="appbundle_saccadeconfiguration[timeDuration]";
    public static $saccade_leftRightField="#appbundle_saccadeconfiguration_leftRight";
    public static $saccade_downUpField="#appbundle_saccadeconfiguration_downUp";
    public static $saccade_statusField="#appbundle_saccadeconfiguration_status";

   //create form input elements for tachistoscopeDrill configuration
    public static $tachistoscope_maxNumbersField="appbundle_tachistoscopeconfiguration[maxNumbers]";
    public static $tachistoscope_minNumbersField="appbundle_tachistoscopeconfiguration[minNumbers]";
    public static $tachistoscope_timeShowField="appbundle_tachistoscopeconfiguration[timeShow]";
    public static $tachistoscope_minPointsField="appbundle_tachistoscopeconfiguration[minPoints]";
    public static $tachistoscope_timeDurationField="appbundle_tachistoscopeconfiguration[timeDuration]";
    public static $tachistoscope_statusField="#appbundle_tachistoscopeconfiguration_status";




   //edit form input elements
    public static $nameField="appbundle_olympicdrill[name]";
    public static $descriptionField="appbundle_olympicdrill[description]";
    public static $background_imageField="input[type='file']";
    public static $skillsField="appbundle_olympicdrill[skills][]";
    public static $sectionField="appbundle_olympicdrill[section]";
    public static $name="name edit";
    public static $description="desc edit";
    public static $background_image="grid.png";
    public static $skills=array('value' => '3');
    public static $section=array('value' => '1');
    public static $background_full_screen="#appbundle_olympicdrill_isFullScreen";

    //show elements
    public static $btn_back_to_list_exercise = "div.heading-elements a.btn-xs";
    public static $btn_edit_exercise = "form a.btn-primary";
    public static $name_element_in_show_page='table.table tbody tr:nth-child(2) td';


    public static $btn_submite="form button[type=submit]";



    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123');
     * @param $param
     * @return string
     */
    public static function route($param)
    {
        return static::$URL . $param;
    }
}