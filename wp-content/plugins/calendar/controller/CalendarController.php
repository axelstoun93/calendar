<?php
include CALENDAR_DIR.'smarty/libs/Smarty.class.php';
include CALENDAR_DIR.'model/CalendarModel.php';
abstract class CalendarController
{
    protected $smarty;
    protected $db;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(CALENDAR_DIR . 'views/templates');
        $this->smarty->setCompileDir(CALENDAR_DIR . 'views/templates_c');
        $this->smarty->setCacheDir(CALENDAR_DIR . 'views/cache');
        $this->smarty->setConfigDir(CALENDAR_DIR . 'views/configs');
        $this->smarty->caching = false;
        $this->db = new CalendarModel();
    }

    function index()
    {

    }

    function create()
    {

    }

    function store($request)
    {

    }


    function show($id)
    {

    }

    function edit($id)
    {

    }

    function update($request)
    {

    }

    function destroy()
    {

    }

    function style()
    {

    }
}
