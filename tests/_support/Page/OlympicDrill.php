<?php
/**
 * Created by PhpStorm.
 * User: youness
 * Date: 2018-03-15
 * Time: 12:52 PM
 */

namespace Page;


class OlympicDrill
{

    //  url of current page
    public static $URL = '/admin/olympicdrill';


    //elements to see
    public static $see_list_page_title = 'OlympicDrills list';
    public static $see_add_title = 'OlympicDrill creation';
    public static $see_show_page_title="OlympicDrill";
    public static $see_edit_page_title="OlympicDrill edit";
    public static $see_delete_page_title="delete";


    //Action Links for list page of OlympicDrill
    public static $link_add_olympic_drill = "span[title='Create a new olympicDrill'] a";
    public static $link_edit_olympic_drill = "table.table tbody tr:nth-last-child(1) td:nth-last-child(1) a[title=Modifier]";
    public static $link_show_olympic_drill = "table.table tbody tr:nth-last-child(1) td:nth-last-child(1) a[title='Afficher les détails']";
    public static $link_delete_olympic_drill = "table.table tbody tr:nth-last-child(1) td:nth-last-child(1) a[title=Supprimer]";



    //inputs attribute name elements for form edit and create
    public static $nameField="appbundle_olympicdrill[name]";
    public static $descriptionField="appbundle_olympicdrill[description]";
    public static $background_imageField="input[type='file']";
    public static $skillsField="appbundle_olympicdrill[skills][]";
    public static $sectionField="appbundle_olympicdrill[section]";
    public static $background_full_screen="appbundle_olympicdrill[isFullScreen]";
    public static $btn_add_submite="form button[type=submit]";


    //create form field content
    public static $name="test name";
    public static $description="test description";
    public static $background_image="grid.png";
    public static $skills=array('value' => '3');
    public static $section=array('value' => '1');


    //edit form field content
    public static $name_edit="test name edit";
    public static $description_edit="test description edit";
    public static $background_image_edit="grid.png";
    public static $skills_edit=array('value' => '4');
    public static $section_edit=array('value' => '1');


    //show buttons elements
    public static $btn_delete_for_show_page="form button.btn-danger";
    public static $btn_edit_for_show_page="div.btn-group a.btn-primary";
    public static $btn_back_to_list_for_show_page="div.heading-elements a.btn-xs";
    public static $id_field_to_grab="table.table tbody tr:nth-child(1) td";
    public static $grab_id_from_show_page="table.table tbody tr:nth-child(1) td";


    //delete element
    public static $grab_id_from_list_page='table.table tbody tr:nth-last-child(1) td:nth-child(1) a'; //grab id of element to delete
    public static $grab_name_from_list_page='table.table tbody tr:nth-last-child(1) td:nth-child(2)'; //grab name of element to delete






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