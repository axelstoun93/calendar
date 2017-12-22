<?php
/* Smarty version 3.1.30, created on 2017-12-22 12:13:26
  from "C:\OSPanel\domains\cok\wp-content\plugins\calendar\views\templates\short.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3cf6e6ba0073_90457314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97c16291872e3a3972978e1db1834d82b7904b02' => 
    array (
      0 => 'C:\\OSPanel\\domains\\cok\\wp-content\\plugins\\calendar\\views\\templates\\short.tpl',
      1 => 1513944797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3cf6e6ba0073_90457314 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="panel" style="width: 100%">
    <?php if (!empty($_smarty_tpl->tpl_vars['_SESSION']->value['status'])) {?>
        <div class="<?php ob_start();
echo Session::get('alert');
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
">
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['status'];?>
</strong>
        </div>
    <?php }?>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                <div id="calendar" class="fc fc-ltr">
                    <table class="fc-header width-max">
                        <tbody>
                        <tr>
                            <td class="fc-header-left">
        <span class="fc-header-title">
        <?php if (!empty($_smarty_tpl->tpl_vars['navigate']->value) && is_object($_smarty_tpl->tpl_vars['navigate']->value)) {?>
            <h2><?php echo $_smarty_tpl->tpl_vars['navigate']->value->month;?>
 <?php echo $_smarty_tpl->tpl_vars['navigate']->value->years;?>
</h2>
        <?php }?>
        </span>
                            </td>
                            <td class="fc-header-right">
                                <?php if (!empty($_smarty_tpl->tpl_vars['navigate']->value) && is_object($_smarty_tpl->tpl_vars['navigate']->value)) {?>
                                    <div class="btn-group mt-sm mr-md mb-sm ml-sm">

<span class="btn btn-sm btn-default" id='data-prev' data-prev="<?php echo $_smarty_tpl->tpl_vars['navigate']->value->previousDate;?>
">
<span class="fc-icon fc-icon-left-single-arrow"></span>
</span>
                                        <span class="btn btn-sm btn-default" id="data-now" >Cегодня</span>
                                        <span class="btn btn-sm btn-default" id='data-next' data-next="<?php echo $_smarty_tpl->tpl_vars['navigate']->value->nextDate;?>
">
<span class="fc-icon fc-icon-right-single-arrow"></span>
</span>

                                    </div>
                                <?php }?>
                                <br class="hidden"/>
                                <!--
                                <div class="btn-group mb-sm mt-sm" id="add-event">
                                    <span class="btn btn-sm btn-default" >Добавить задание</span>
                                </div>
                                -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="fc-content">
                        <div class="fc-view fc-view-month fc-grid" unselectable="on">
                            <table class="fc-border-separate width-max"  cellspacing="0">
                                <thead>
                                <tr class="fc-first fc-last">
                                    <th class="fc-day-header fc-sun fc-widget-header fc-first">Пн</th>
                                    <th class="fc-day-header fc-mon fc-widget-header" >Вт</th>
                                    <th class="fc-day-header fc-tue fc-widget-header" >Ср</th>
                                    <th class="fc-day-header fc-wed fc-widget-header" >Чт</th>
                                    <th class="fc-day-header fc-thu fc-widget-header" >Пт</th>
                                    <th class="fc-day-header fc-fri fc-widget-header" >Сб</th>
                                    <th class="fc-day-header fc-sat fc-widget-header fc-last">Вс</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['month']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['month']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <tr class="fc-week  <?php echo $_smarty_tpl->tpl_vars['i']->value+1 === count($_smarty_tpl->tpl_vars['month']->value) ? 'fc-last' : '';?>
">
                                        <?php
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int) ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? 6+1 - (0) : 0-(6)+1)/abs($_smarty_tpl->tpl_vars['j']->step));
if ($_smarty_tpl->tpl_vars['j']->total > 0) {
for ($_smarty_tpl->tpl_vars['j']->value = 0, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++) {
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration == 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration == $_smarty_tpl->tpl_vars['j']->total;?>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['day'])) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['j']->value == 6) {?>
                                        <td class="fc-day  <?php echo !empty($_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['events']) ? 'action' : '';?>
 fc-sun fc-widget-content fc-past fc-last">
                                            <?php } else { ?>
                                        <td class="fc-day  <?php echo !empty($_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['events']) ? 'action' : '';?>
 fc-sun fc-widget-content fc-past">
                                            <?php }?>
                                            <div  class="cell-calendar" data-full-data="<?php echo $_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['fullDate'];?>
">
                                                <div class="fc-day-number"><?php echo $_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['day'];?>
</div>
                                                <!--<?php if (!empty($_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['events'])) {?>
                                                    <?php if (is_array($_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['events'])) {?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['events'], 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
                                                            <div class="fc-day-content">
                                                                <a href="#test">
                                                                    <div class="fc-event-container" data-id="<?php echo $_smarty_tpl->tpl_vars['val']->value->id;?>
" data-year="<?php echo $_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['fullDate'];?>
">
                                                                        <div class="fc-event <?php echo $_smarty_tpl->tpl_vars['val']->value->course_css;?>
 fc-event-hori  fc-event-start fc-event-end " >
                                                                            <div class="fc-event-inner">
                                                                                <span class="fc-event-time">2</span>
                                                                                <span class="fc-event-title">2</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    <?php } else { ?>
                                                        <div class="fc-day-content">
                                                            <a href="#test">
                                                                <div class="fc-event-container" data-id="<?php echo $_smarty_tpl->tpl_vars['val']->value->id;?>
"  data-year="<?php echo $_smarty_tpl->tpl_vars['month']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value]['fullDate'];?>
">
                                                                    <div class="fc-event <?php echo $_smarty_tpl->tpl_vars['val']->value->course_css;?>
 fc-event-hori  fc-event-start fc-event-end" >
                                                                        <div class="fc-event-inner">
                                                                            <span class="fc-event-time">2</span>
                                                                            <span class="fc-event-title">2</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php }?>
                                                <?php }?>-->
                                            </div>
                                        </td>
                                        <?php } else { ?>
                                        <?php if ($_smarty_tpl->tpl_vars['j']->value == 6) {?>
                                        <td class="fc-day fc-sun fc-widget-content fc-past fc-last">
                                        <?php } else { ?>
                                        <td class="fc-day fc-sun fc-widget-content fc-past">
                                        <?php }?>
                                        <?php }?>
                                        <?php }
}
?>

                                    </tr>
                                <?php }
}
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="date-text">
                    <?php $_smarty_tpl->_assignInScope('dCount', '');
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month']->value, 'val', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['val']->value, 'v', false, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['v']->value["events"]) && $_smarty_tpl->tpl_vars['v']->value["day"] >= date("j")) {?>
                            <?php $_smarty_tpl->_assignInScope('dCount', 1);
?>
                            <b>Ближайшая дата проведения экзамена:</b> <?php echo $_smarty_tpl->tpl_vars['v']->value["day"];?>
 <?php echo $_smarty_tpl->tpl_vars['navigate']->value->month;?>
я <?php echo $_smarty_tpl->tpl_vars['navigate']->value->years;?>
 года.
                            <?php break 1;?>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php if (empty($_smarty_tpl->tpl_vars['dCount']->value)) {?>
                        <b>На текущий месяц экзаменов нет.</b>
                    <?php }?>
                </div>
            </div>

            <!--  <div class="col-md-3">
                  <p class="h4 text-weight-light">Маркеры</p>
                  <hr>
                  <div id="external-events">
                      <div class="external-event label label-success"  data-event-class="fc-event-success" id="fc-event-success" style="position: relative;">Задача выполнена успешно</div>
                      <div class="external-event label label-info"  data-event-class="fc-event-info" id="fc-event-info" style="position: relative;">Задача в стадии выполнения</div>
                      <div class="external-event label label-warning"  data-event-class="fc-event-warning" id="fc-event-warning" style="position: relative;">Задача выполнена с ошибками</div>
                      <div class="external-event label label-primary"  data-event-class="fc-event-primary" id="fc-event-primary" style="position: relative;">Задача полностью не выполнена</div>
                      <hr />
                      <div>
                          <div class="checkbox-custom checkbox-default ib">
                              <input id="deleteEvents" type="checkbox"/>
                              <label for="deleteEvents"> Удалять по клику</label>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
           </div>
              -->
            <!-- modal windows add -->
</section><?php }
}
