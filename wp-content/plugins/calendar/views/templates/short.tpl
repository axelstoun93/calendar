<section class="panel" style="width: 100%">
    {if !empty($_SESSION['status'])}
        <div class="{{Session::get('alert')}}">
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>{$_SESSION['status']}</strong>
        </div>
    {/if}
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                <div id="calendar" class="fc fc-ltr">
                    <table class="fc-header width-max">
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
                                        <span class="btn btn-sm btn-default" id='data-next' data-next="{$navigate->nextDate}">
<span class="fc-icon fc-icon-right-single-arrow"></span>
</span>

                                    </div>
                                {/if}
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
                                {for $i = 0 to count($month)-1 step 1}
                                    <tr class="fc-week  {($i + 1 === count($month)) ? 'fc-last' : ''}">
                                        {for $j = 0 to 6 step 1}
                                        {if !empty($month[$i][$j]['day'])}
                                        {if $j == 6}
                                        <td class="fc-day  {(!empty($month[$i][$j]['events'])) ? 'action' : ''} fc-sun fc-widget-content fc-past fc-last">
                                            {else}
                                        <td class="fc-day  {(!empty($month[$i][$j]['events'])) ? 'action' : ''} fc-sun fc-widget-content fc-past">
                                            {/if}
                                            <div  class="cell-calendar" data-full-data="{$month[$i][$j]['fullDate']}">
                                                <div class="fc-day-number">{$month[$i][$j]['day']}</div>
                                                <!--{if !empty($month[$i][$j]['events'])}
                                                    {if is_array($month[$i][$j]['events'])}
                                                        {foreach from=$month[$i][$j]['events']  item=val}
                                                            <div class="fc-day-content">
                                                                <a href="#test">
                                                                    <div class="fc-event-container" data-id="{$val->id}" data-year="{$month[$i][$j]['fullDate']}">
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
                                                {/if}-->
                                            </div>
                                        </td>
                                        {else}
                                        {if $j == 6 }
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
                <div class="date-text">
                    {$dCount = ''}
                    {foreach from=$month key=k item=val}
                    {foreach from=$val key=j  item=v}
                        {if !empty($v["events"]) and $v["day"] >= date("j")}
                            {$dCount = 1}
                            <b>Ближайшая дата проведения экзамена:</b> {$v["day"]} {$navigate->month}я {$navigate->years} года.
                            {break}
                        {/if}
                    {/foreach}
                    {/foreach}
                    {if empty($dCount)}
                        <b>На текущий месяц экзаменов нет.</b>
                    {/if}
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
</section>