<?php

/**
 * Tags Bundle for Contao Open Source CMS
 *
 * @author    Benny Born <benny.born@numero2.de>
 * @author    Michael Bösherz <michael.boesherz@numero2.de>
 * @license   LGPL-3.0-or-later
 * @copyright Copyright (c) 2023, numero2 - Agentur für digitales Marketing GbR
 */


namespace numero2\TagsBundle;

use Contao\BackendTemplate;
use Contao\ModuleNewsList;
use Contao\System;


class ModuleNewsListTags extends ModuleNewsList {


    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_newslist_tags';


    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate() {

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) ) {

            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . $GLOBALS['TL_LANG']['FMD']['newslist_tags'][0] . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }
}
