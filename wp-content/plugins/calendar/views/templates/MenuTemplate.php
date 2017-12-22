<section class="panel">
    {if !empty($_SESSION['status'])}
    <div class="{{Session::get('alert')}}">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>{$_SESSION['status']}</strong>
    </div>
    {/if}
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div id="calendar" class="fc fc-ltr">
                    <table class="fc-header" style="width: 100%;">
                        <tbody>
                        <tr>
                            <td class="fc-header-left">
        <span class="fc-header-title">
        {if !empty($navigate) && is_object($navigate)}
            <h2>{$navigate->month} {$navigate->years}</h2>
        {/if}
        </span>
                            </td>
                            <td class="fc-header-right">
                                {if !empty($navigate) && is_object($navigate)}
                                <div class="btn-group mt-sm mr-md mb-sm ml-sm">

<span class="btn btn-sm btn-default" id='data-prev' data-prev="{$navigate->previousDate}">
<span class="fc-icon fc-icon-left-single-arrow"></span>
</span>
                                    <span class="btn btn-sm btn-default" id="data-now" >Cегодня</span>
                                    <span class="btn btn-sm btn-default" id='data-next' data-next="{{$navigate->nextDate}}">
<span class="fc-icon fc-icon-right-single-arrow"></span>
</span>

                                </div>
                                {/if}
                                <br class="hidden"/>
                                <div class="btn-group mb-sm mt-sm" id="add-event">
                                    <span class="btn btn-sm btn-default" >Добавить задание</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="fc-content" style="">
                        <div class="fc-view fc-view-month fc-grid" unselectable="on">
                            <table class="fc-border-separate" style="width: 100%;" cellspacing="0">
                                <thead>
                                <tr class="fc-first fc-last">
                                    <th class="fc-day-header fc-sun fc-widget-header fc-first" style="width: 167px;">Пн</th>
                                    <th class="fc-day-header fc-mon fc-widget-header" style="width: 167px;">Вт</th>
                                    <th class="fc-day-header fc-tue fc-widget-header" style="width: 167px;">Ср</th>
                                    <th class="fc-day-header fc-wed fc-widget-header" style="width: 167px;">Чт</th>
                                    <th class="fc-day-header fc-thu fc-widget-header" style="width: 167px;">Пт</th>
                                    <th class="fc-day-header fc-fri fc-widget-header" style="width: 167px;">Сб</th>
                                    <th class="fc-day-header fc-sat fc-widget-header fc-last" style="width: 167px;">Вс</th>
                                </tr>
                                </thead>
                                <tbody>
                                {for($i = 0; $i < count($this->array);++$i)}
                                <tr class="fc-week  { ($i + 1 === count($this->array) ) ? 'fc-last' : ''}">
                                    {for($j = 0; $j < 7; $j++)}
                                    {if(!empty($this->array[$i][$j]['day']))}
                                    {if($j == 6)}
                                    <td class="fc-day fc-sun fc-widget-content fc-past fc-last">
                                    {else}
                                    <td class="fc-day fc-sun fc-widget-content fc-past">
                                    {/if}
                                        <div style="min-height: 134px;" class="cell-calendar"  data-full-data="{$this->array[$i][$j]['fullDate']}">
                                            <div class="fc-day-number">{$this->array[$i][$j]['day']}</div>
                                    {if(!empty($this->array[$i][$j]['events']))}
                                    {if(is_array($this->array[$i][$j]['events']))}
                                    {foreach($this->array[$i][$j]['events'] as $val)}
                                            <div class="fc-day-content" >
                                                <a href="#test">
                                                    <div class="fc-event-container" data-id="{$val->id}" data-year="{$this->array[$i][$j]['fullDate']}">
                                                        <div class="fc-event {$val->course_css} fc-event-hori  fc-event-start fc-event-end " >
                                                            <div class="fc-event-inner">
                                                                <span class="fc-event-time">2</span>
                                                                <span class="fc-event-title">2</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    {/foreach}
                                    {else}
                                            <div class="fc-day-content">
                                                <a href="#test">
                                                    <div class="fc-event-container" data-id="{$val->id}"  data-year="{$month[$i][$j]['fullDate']}">
                                                        <div class="fc-event {$val->course_css} fc-event-hori  fc-event-start fc-event-end" >
                                                            <div class="fc-event-inner">
                                                                <span class="fc-event-time">2</span>
                                                                <span class="fc-event-title">2</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            {/if}
                                            {/if}
                                        </div>
                                    </td>
                                    {else}
                                    {if($j == 6)}
                                    <td class="fc-day fc-sun fc-widget-content fc-past fc-last">
                                    {else}
                                    <td class="fc-day fc-sun fc-widget-content fc-past">
                                        {/if}
                                        {/if}
                                        {/for}
                                </tr>
                                {/for}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-md-3">
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
</section>