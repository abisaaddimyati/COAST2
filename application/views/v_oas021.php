<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
/************************************************************************************************
 * Program History :
*
* Project Name     : OAS
* Client Name      : CBI - Muhammad
* Program Id       : OAS021
* Program Name     : Informasi Pengajuan Klaim
* Description      :
* Environment      : PHP 5.4.4
* Author           : Winni Oktaviani
* Version          : 01.00.00
* Creation Date    : 21-09-2014 23:26:00 ICT 2014
*
* Update history     Re-fix date       Person in charge      Description
* 
*
* Copyright(C) [..]. All Rights Reserved
*************************************************************************************************/
?>

<h1>Prosedur Pengajuan Klaim</h1>
<img src="<?php echo img_url(); ?>alur_claim.png" style="max-height:500px"><br>

<div>
<input type="checkbox" id="expense-inform-setting"> Dont show this information again<br>
<button onclick="inform_setting(); change_page(this, 'c_oas024/load_view')" style="margin:1px 0;padding:3px;text-align:center">Submit Claim</button>
</div>

<script type="text/javascript">
	function inform_setting () {
		if($('#expense-inform-setting').is(':checked')){
			var form_data = {
                ajax : '1'
            };
            
            console.log(form_data);

            $.ajax({
                url: "<?php echo site_url('c_oas021/dont_show_again'); ?>",
                type: 'POST',
                async : false,
                data: form_data,
                timeout: 10000, //1000ms
                success: function(data) {
                	console.log("Success switched to don't show again. Status: "+data);
                },
                error: function(){                      
                    console.log("Error happen when ajax calling.");
                }
            });
		}
		return true;
	}
</script>