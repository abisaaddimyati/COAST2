

        
<!-- Latest compiled and minified JavaScript -->
        <!-- <link rel="stylesheet" href="http://localhost/COAST2/assets/css/select2/select2.css"> -->
        <link rel="stylesheet" href="<?php echo js_url(); ?>plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo css_url(); ?>chosen/chosen.css">
        
<div class="box box-success">
    <!-- <div class="box-header">
        <h3 class="box-title">GANTI PASSWORD</h3>
    </div> -->
    <div class="box-body">


        <h3 style="display: inline-block">Form Timesheet</h3>
        <div class="requester-input form-section-container input-section new-employee-form" id="form-timesheet">
            <form method="post" id="timesheet_form">
                <div class="form-group">
                <label for="date_ts" class="col-sm-4">Periode<span id="spanId" style="color:red;font-size: 17px">*</span></label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input readonly="" style="text-align: left; width: 175px;height: 100%;background:none;border: none;" value="" class="form-control holo date_ts" name="date_ts">
                    <input type="hidden" name="holiday" id="holiday" />
                </div>
				<span id="spanId"style="color:red;"></span>
            </div>
                <div class="form-group">
                <label for="date_ts" class="col-sm-4">Experide Date<span id="spanId" style="color:red;font-size: 17px">*</span></label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input readonly="" style="text-align: left; width: 175px;height: 100%;background:none;border: none;" value="" class="form-control holo date_ts"  name="date_ts">
                    <input type="hidden" name="holiday" id="holiday" />
                </div>
				<span id="spanId"style="color:red;"></span>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    $('.date_ts').change(function(){
            $.ajax({
                    url:'<?php echo base_url(); ?>'+'c_resource_timesheet/holiday_status/',
                    type:'POST',
                    dataType:'json',
                    data:{
                    periode:$('#periode').val(),
                    date:$('#date_ts').val()
                    },
                    success:function(data){
                    $('#holiday').val(data[0].Holiday_Status);
                        
},
                  error: function(xhr, resp, text) {
                  console.log(xhr, resp, text);
                        }
                });
        });

            var firstDayOfMonth = function() {
    // your special logic...
    return 5;
};

var d = new Date();
var currMonth = d.getMonth();
var currYear = d.getFullYear();
var startDate = new Date(currYear,currMonth,firstDayOfMonth());   
        $('.date_ts').datepicker('setDate',startDate);
            

            });
            
</script>