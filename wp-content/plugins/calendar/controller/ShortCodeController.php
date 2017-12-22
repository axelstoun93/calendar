<?php
class ShortCodeController extends CalendarController
{

    function index()
    {
        $getYears = (!empty($_GET['years'])) ? $_GET['years'] : false;
        $getMonth = (!empty($_GET['month'])) ? $_GET['month'] : false;
        $month    = $this->db->renderingCalendar($getMonth,$getYears);
        $navigate = $this->db->getNavigate($getMonth,$getYears);
        $this->smarty->assign('navigate', $navigate);
        $this->smarty->assign('month', $month);
        $views = $this->smarty->display('short.tpl');
        return $views;
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