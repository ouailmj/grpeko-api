<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 6/25/18
 * Time: 17:50
 */

namespace Tests\_support\Page\Client;


class EntreRelation
{
    public static $URLADD ='/app/relation/add';
    public static $URLEDIT ='/app/relation/edit/5';
    public static $contributor = 'admin';
  //  public static $typemission =null;
    public static $societe_creer    = 'Non';
    public static $legalName    = 'societe33';
    public static $legalForm     = 'SARL';
    public static $capitalSocial     = 100;
    public static $integralite ='Non';
    public static $date_creation      = '12-12-2016';
    public static $date_cloture      = '12-12-2017';
    public static $irpp= 'Oui';
    public static $zone="Non";
    public static $date1text1      = '1';
    public static $date1text2      = '2';
    public static $date1text3      = '3';
    public static $date1text4      = '4';
    public static $date1text5     = '5';


    public static $contributorfield   = 'appbundle_EntreRelation[contributor]';
   // public static $typemissionfield   = 'appbundle_EntreRelation[typeMission]';
    public static $societe_creerfield = 'appbundle_EntreRelation[societe_creer]';
    public static $legalNamefield     = 'appbundle_EntreRelation[company][legalName]';
    public static $legalFormfield     = 'appbundle_EntreRelation[company][legalForm]';
    public static $capitalSocialfield ='appbundle_EntreRelation[company][capitalSocial]';
    public static $integralitefield ='appbundle_EntreRelation[integralite]';
    public static $date_creationfield = 'appbundle_EntreRelation[date_creation]';
    public static $date_cloturefield = 'appbundle_EntreRelation[date_cloture]';
    public static $irppfield= 'appbundle_EntreRelation[IRPP]';
    public static $zonefield= 'appbundle_EntreRelation[zone]';

    public static $date1text1field    = 'appbundle_EntreRelation[date1text1]';
    public static $date1text2field    = 'appbundle_EntreRelation[date1text2]';
    public static $date1text3field    = 'appbundle_EntreRelation[date1text3]';
    public static $date1text4field    = 'appbundle_EntreRelation[date1text4]';
    public static $date1text5field    = 'appbundle_EntreRelation[date1text5]';


    public static $submitButtonadd     = 'saveaddrelation';
    public static $submitButtonedit     = 'saveeditrelation';
    public static $successmessage     = 'Votre opération a été exécutée avec succès';
}