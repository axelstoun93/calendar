<?php
class AdminController extends CalendarController
{

    function index()
    {
        $getYears = (!empty($_GET['years'])) ? $_GET['years'] : false;
        $getMonth = (!empty($_GET['month'])) ? $_GET['month'] : false;
        $month    = $this->db->renderingCalendar($getMonth,$getYears);
        $navigate = $this->db->getNavigate($getMonth,$getYears);
        $this->smarty->assign('navigate', $navigate);
        $this->smarty->assign('month', $month);
        $views = $this->smarty->display('index.tpl');
        return $views;

    }
    function create()
    {

    }
    function store($request)
    {
        if($this->db->saveDate($request))
        {
           return true;
        }
        else
        {
            return false;
        }
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