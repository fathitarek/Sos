@include('public.layouts.header')
<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 last-visit-menu-background">
        <div class="container-fluid">
            <div class="row">
                <p class="rate-last-visit">{{trans('words.last_visits')}}</p>
            </div>
            <div class="row">
                <form action="post" class="doctor-form">
                    <div class="col-md-12 col-xs-12 table-content">
                        <table class="table-visit">
                            <tr class="table-header">
                                <th>{{trans('words.date')}}</th>
                                <th>{{trans('words.time')}}</th> 
                                <th>{{trans('words.patient')}}</th>
                                <th>{{trans('words.rate')}}</th>
                                <th>{{trans('words.payment')}}</th>
                            </tr>
                            <tr>
                                <td>11-11-2017</td>
                                <td>1:30 pm</td> 
                                <td>Abdallah</td>
                                <td>5</td>
                                <td>80 LE <span class="payment-margin">C.C</span>  </td>
                                <td class=" complain complain-btn"><button>{{trans('words.complain')}}</button></td>
                            </tr>
                             <tr>
                                <td>11-11-2017</td>
                                <td>1:30 pm</td> 
                                <td>Abdallah</td>
                                <td>5</td>
                                <td>80 LE <span class="payment-margin">SOS</span>  </td>
				<td class=" complain-btn"><button>{{trans('words.complain')}}</button></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('public.layouts.footer')
