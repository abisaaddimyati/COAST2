<?php 
/************************************************************************************************
 * Program History :
*
* Project Name     : OAS
* Client Name      : CBI - Muhammad
* Program Id       : OAS049
* Program Name     : Setting biaya BT related CA
* Description      :
* Environment      : PHP 5.4.4
* Author           : Winni Oktaviani
* Version          : 01.00.00
* Creation Date    : 14-11-2014 21:45:00 ICT 2014
*
* Update history     Re-fix date       Person in charge      Description
* 
* 
*
* Copyright(C) [..]. All Rights Reserved
*************************************************************************************************/
$search = false;
if(isset($search_param)){
	$search = true;
}
?>


<div class="box-content no-padding">
	<div class="search-fields bs-callout list-title">
		<h2><b>
			<?php echo "Cost Bussiness Travel Related Cash Advance Management";
					 ?>
		</b></h2>
		<div style="height:100%;
					
					padding-top: 10px;
					padding-left: 15px;
					padding-bottom: 0px;">
			<table border="0" cellpadding="1" cellspacing="1">
				<colgroup>
					<col width="130px">
					<col width="150px">
					<col width="50px">
					<col width="130px">
					<col width="150px">
					<col width="50px">
					<col width="130px">
					<col width="150px">
				</colgroup>
				<tr>
					<td>
						Destination :
					</td>
					<td>
						<select id="destination-list-search-management">
							<option value=''>-- ALL --</option>
							<?php foreach ($destination_list as $key => $cost) {?>
								<option value='<?= $cost['id'] ?>'
									<?php if($search && $search_param['destination']==$cost['id'])echo 'selected' ?>><?= $cost['destination'] ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="5">
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<td colspan="2">
						<button type="submit" class="pull-right btn btn-danger btn-flat btn-slim" id="clear-btn" onclick="change_page(this, 'c_oas049/load_view');">Clear</button>
						<button type="button" class="pull-right btn btn-success btn-flat btn-slim" id="search-btn" onclick="doSearchCostDestination(this);">Search</button>
					</td>
				</tr>
				<tr height="5px">
					<td colspan="8">
						
					</td>
				</tr>
				<tr>
					<td colspan="5">
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<?php if (!isset($readonly)) { ?>
					<td colspan="2">
						
					</td>
					<?php } ?>
				</tr>
			</table>
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover table-heading no-border-bottom" data-toggle="table" data-height="10">
		<colgroup>
					<col width="5px">
					<col width="250px">
					<col width="125px">
					<col width="125px">
					<col width="125px">
					
				</colgroup>
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Destination</th>
				<th class="text-center"> Cost (IDR)</th>
				<th class="text-center"> Cost (USD) </th>
				<th class="text-center"> Cost (SGD) </th>
				
				<th class="text-center">.::.</th>
				
			</tr>
		</thead>
		
		<tbody style="height: 10px; overflow: scroll;">
				<?php $idx = 0; 
				if(isset($cost_list)){
				foreach ($cost_list as $key => $list) { 
					$idx++;?>
				<tr class="active">
					
					<td class="text-center"><?= $idx ?></td>
					<td class="postit form-number pk text-center" val="<?= $list['id'] ?>"><?= $list['destination'] ?></td>
					<td class="text-center"><?= number_format(  $list['cost'],0,',','.');  ?></td>
					<td class="text-center"><?= number_format( $list['usd'],0,',','.');  ?></td>
					<td class="text-center"><?= number_format( $list['sgd'],0,',','.');  ?></td>
					
					<td class="text-center">
						<?php if (!isset($readonly)) { ?>
						<a href="#" rel="detail" class="opt edit" title="Edit" onclick="form_dialog('Cost Settings', 'c_oas053/load_edit/<?= $list['id'] ?>')"></a>
						<?php }?>
					</td>
					
				</tr>
				<?php }
				}else{ ?>
					<tr>
						<td class="text-center" colspan="6">DATA NOT FOUND!</td>
					</tr>
				<?php } ?>
			
		</tbody>
		</div>
	</table>
</div><div><br>
<div class="box-footer clearfix">
                <button type="button" class="pull-left btn btn-default" id="back-btn" onclick="change_page(this, 'c_oas055/load_view')">Back...</button>
            </div></div>
<script type="text/javascript">
	function doSearchCostDestination(elm)
	{	
		var destination  = $('#destination-list-search-management').val();
		var url="c_oas049/search?";
		if(destination != ''){
			url += "destination="+destination+"&";
		}
		search_redirect(elm, encodeURI(host+url));
	}
</script>