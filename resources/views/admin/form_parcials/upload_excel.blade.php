
    <div class="form-group" style="float: left;width: 150px">
            {{--<a href="{{action('NewsLetterUsersController@export')}}" class="btn btn-primary from-control">Export</a>--}}
            <button type="button" class="btn btn-primary from-control"  id="import_excel" data-toggle="modal" data-target="#import_excel_modal">Import Excel Files</button>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="import_excel_modal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Excel File</h4>

        </div>
        <div class="modal-body">
            <div class="form-group">

                {!! Form::open(['url' => $url, 'method' => 'POST', 'files' => true]) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                     <div class="form-group">
                        <input name="file" type="file" />
                     </div>
                     <div class="form-group">
                        @include('Admin.form_parcials.submit_btn',['submit_btn_text'=>'Import'])
                     </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>

      </div>

    </div>
<script>
$(document).ready(function(){
    $("#import_excel").click(function(){
        $("#import_excel_modal").modal({backdrop: "static"});

    });

});
</script>
