<?php 

?>
<style>
    select[readonly].select2-hidden-accessible + .select2-container {
        pointer-events: none;
        touch-action: none;
        background: #eee;
        box-shadow: none;
    }

    select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h4 class="card-title"><?php echo isset($id) ? "Return Details - ".$return_code : 'Create New User' ?></h4>
    </div>
    <div class="card-body">
        <form action="add user.php" method="POST">
            <input type="hidden" name="id" value="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label text-info">UserName</label>
                        <input type="text" class="form-control form-control-sm rounded-0" value="" name="username">
                    </div>
                    <div class="col-md-4">
                        <label for="qty" class="control-label">Password</label>
                                <input type="text" class="form-control rounded-0" name="password">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label  class="control-label text-info">User-Type</label>
                            <select name="user_type" class="custom-select select2">
                            <option>Admin</option>
                            <option>MD</option>
                            <option>Technical Director </option>
                            <option>Draft Manager</option>
                            
                            
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <fieldset>
                    
                    <div class="row">
                            
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="item_id" class="control-label">F-Name</label>
                                <input type="text" class="form-control rounded-0" name="fname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit" class="control-label">M-Name</label>
                                <input type="text" class="form-control rounded-0" name="mname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="qty" class="control-label">L-Name</label>
                                <input type="text" class="form-control rounded-0" name="lname">
                            </div>
                        </div>
                        
                        <div class="col-md-2 text-center">
                            
                        </div>
                </fieldset>
                <hr>
                <div class="card-footer py-1 text-center">
        <button class="btn btn-flat btn-primary" type="submit" name="submit">Save</button>
        <a class="btn btn-flat btn-dark" href="<?php echo base_url.'/admin?page=return' ?>">Cancel</a>
    </div>
            </div>
        </form>
    </div>
    
</div>
<table id="clone_list" class="d-none">
    <tr>
        <td class="py-1 px-2 text-center">
            <button class="btn btn-outline-danger btn-sm rem_row" type="button"><i class="fa fa-times"></i></button>
        </td>
        <td class="py-1 px-2 text-center qty">
            <span class="visible"></span>
            <input type="hidden" name="item_id[]">
            <input type="hidden" name="unit[]">
            <input type="hidden" name="qty[]">
            <input type="hidden" name="price[]">
            <input type="hidden" name="total[]">
        </td>
        <td class="py-1 px-2 text-center unit">
        </td>
        <td class="py-1 px-2 item">
        </td>
        <td class="py-1 px-2 text-right cost">
        </td>
        <td class="py-1 px-2 text-right total">
        </td>
    </tr>
</table>
<script>
    var items = $.parseJSON('<?php echo json_encode($item_arr) ?>')
    var costs = $.parseJSON('<?php echo json_encode($cost_arr) ?>')
    
    $(function(){
        $('.select2').select2({
            placeholder:"Please select here",
            width:'resolve',
        })
        $('#item_id').select2({
            placeholder:"Please select supplier first",
            width:'resolve',
        })

        $('#supplier_id').change(function(){
            var supplier_id = $(this).val()
            $('#item_id').select2('destroy')
            if(!!items[supplier_id]){
                $('#item_id').html('')
                var list_item = new Promise(resolve=>{
                    Object.keys(items[supplier_id]).map(function(k){
                        var row = items[supplier_id][k]
                        var opt = $('<option>')
                            opt.attr('value',row.id)
                            opt.text(row.name)
                        $('#item_id').append(opt)
                    })
                    resolve()
                })
                list_item.then(function(){
                    $('#item_id').select2({
                        placeholder:"Please select item here",
                        width:'resolve',
                    })
                })
            }else{
                list_item.then(function(){
                    $('#item_id').select2({
                        placeholder:"No Items Listed yet",
                        width:'resolve',
                    })
                })
            }

        })

        $('#add_to_list').click(function(){
            var supplier = $('#supplier_id').val()
            var item = $('#item_id').val()
            var qty = $('#qty').val() > 0 ? $('#qty').val() : 0;
            var unit = $('#unit').val()
            var price = costs[item] || 0
            var total = parseFloat(qty) *parseFloat(price)
            // console.log(supplier,item)
            var item_name = items[supplier][item].name || 'N/A';
            var item_description = items[supplier][item].description || 'N/A';
            var tr = $('#clone_list tr').clone()
            if(item == '' || qty == '' || unit == '' ){
                alert_toast('Form Item textfields are required.','warning');
                return false;
            }
            if($('table#list tbody').find('tr[data-id="'+item+'"]').length > 0){
                alert_toast('Item is already exists on the list.','error');
                return false;
            }
            tr.find('[name="item_id[]"]').val(item)
            tr.find('[name="unit[]"]').val(unit)
            tr.find('[name="qty[]"]').val(qty)
            tr.find('[name="price[]"]').val(price)
            tr.find('[name="total[]"]').val(total)
            tr.attr('data-id',item)
            tr.find('.qty .visible').text(qty)
            tr.find('.unit').text(unit)
            tr.find('.item').html(item_name+'<br/>'+item_description)
            tr.find('.cost').text(parseFloat(price).toLocaleString('en-US'))
            tr.find('.total').text(parseFloat(total).toLocaleString('en-US'))
            $('table#list tbody').append(tr)
            calc()
            $('#item_id').val('').trigger('change')
            $('#qty').val('')
            $('#unit').val('')
            tr.find('.rem_row').click(function(){
                rem($(this))
            })
            
            $('[name="discount_perc"],[name="tax_perc"]').on('input',function(){
                calc()
            })
            $('#supplier_id').attr('readonly','readonly')
        })
        $('#return-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_return",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(resp.status == 'success'){
						location.replace(_base_url_+"admin/?page=return/view_return&id="+resp.id);
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
                    $('html,body').animate({scrollTop:0},'fast')
				}
			})
		})

        if('<?php echo isset($id) && $id > 0 ?>' == 1){
            calc()
            $('#supplier_id').trigger('change')
            $('#supplier_id').attr('readonly','readonly')
            $('table#list tbody tr .rem_row').click(function(){
                rem($(this))
            })
        }
    })
    function rem(_this){
        _this.closest('tr').remove()
        calc()
        if($('table#list tbody tr').length <= 0)
            $('#supplier_id').removeAttr('readonly')

    }
    function calc(){
        var grand_total = 0;
        $('table#list tbody input[name="total[]"]').each(function(){
            grand_total += parseFloat($(this).val())
            
        })
       
        $('table#list tfoot .grand-total').text(parseFloat(grand_total).toLocaleString('en-US',{style:'decimal',maximumFractionDigit:2}))
        $('[name="amount"]').val(parseFloat(grand_total))

    }
</script>