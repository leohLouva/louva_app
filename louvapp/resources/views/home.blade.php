@extends('layouts.app')
    
@section('main_container')
    <div class="row">
        <div class="col-8">
            <!--<div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title">Calendar</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Hoy</a>
                            <a href="javascript:void(0);" class="dropdown-item">Ayer</a>
                            <a href="javascript:void(0);" class="dropdown-item">La semana pasada</a>
                            <a href="javascript:void(0);" class="dropdown-item">El mes pasado</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2 pb-2 pt-0 mt-n2">
                    <div data-provide="datepicker-inline" data-date-today-highlight="true" class="calendar-widget"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">October 2023</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1695513600000">24</td><td class="old day" data-date="1695600000000">25</td><td class="old day" data-date="1695686400000">26</td><td class="old day" data-date="1695772800000">27</td><td class="old day" data-date="1695859200000">28</td><td class="old day" data-date="1695945600000">29</td><td class="old day" data-date="1696032000000">30</td></tr><tr><td class="day" data-date="1696118400000">1</td><td class="day" data-date="1696204800000">2</td><td class="day" data-date="1696291200000">3</td><td class="today day" data-date="1696377600000">4</td><td class="day" data-date="1696464000000">5</td><td class="day" data-date="1696550400000">6</td><td class="day" data-date="1696636800000">7</td></tr><tr><td class="day" data-date="1696723200000">8</td><td class="day" data-date="1696809600000">9</td><td class="day" data-date="1696896000000">10</td><td class="day" data-date="1696982400000">11</td><td class="day" data-date="1697068800000">12</td><td class="day" data-date="1697155200000">13</td><td class="day" data-date="1697241600000">14</td></tr><tr><td class="day" data-date="1697328000000">15</td><td class="day" data-date="1697414400000">16</td><td class="day" data-date="1697500800000">17</td><td class="day" data-date="1697587200000">18</td><td class="day" data-date="1697673600000">19</td><td class="day" data-date="1697760000000">20</td><td class="day" data-date="1697846400000">21</td></tr><tr><td class="day" data-date="1697932800000">22</td><td class="day" data-date="1698019200000">23</td><td class="day" data-date="1698105600000">24</td><td class="day" data-date="1698192000000">25</td><td class="day" data-date="1698278400000">26</td><td class="day" data-date="1698364800000">27</td><td class="day" data-date="1698451200000">28</td></tr><tr><td class="day" data-date="1698537600000">29</td><td class="day" data-date="1698624000000">30</td><td class="day" data-date="1698710400000">31</td><td class="new day" data-date="1698796800000">1</td><td class="new day" data-date="1698883200000">2</td><td class="new day" data-date="1698969600000">3</td><td class="new day" data-date="1699056000000">4</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2023</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month focused">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2020-2029</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2019</span><span class="year">2020</span><span class="year">2021</span><span class="year">2022</span><span class="year focused">2023</span><span class="year">2024</span><span class="year">2025</span><span class="year">2026</span><span class="year">2027</span><span class="year">2028</span><span class="year">2029</span><span class="year new">2030</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade">2010</span><span class="decade focused">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
                </div>
            </div>-->
        </div>
    </div>
@endsection
