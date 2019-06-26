<div class="content">
	
	<p align="center">
		<button class="btn btn-lg btn-success register_button" type="button" data-toggle="modal" data-target="#registrationModal"><?=lang('user.register_button_title');?>
		</button>
	</p>
	<br><br>

	<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="registrationModalLabel" align="center"><?=lang('user.registration');?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="/registration" id="form_add">
					  	<div class="form-group">
					        <label for="name" class="col-form-label"><?=lang('user.name');?></label>
					        <input type="text" class="form-control" name="name">
					    </div>
					    <div class="form-group">
					        <label for="surname" class="col-form-label"><?=lang('user.surname');?></label>
					        <input type="text" class="form-control" name="surname">
					    </div>
					    <div class="form-group">
							<label for="birthday" class="col-form-label"><?=lang('user.birthday');?></label>
							<input type="text" class="form-control" name="birthday" placeholder="ДД.ММ.ГГГГ">
					    </div>
					    <div class="form-group">
					        <label for="company" class="col-form-label"><?=lang('user.company');?></label>
					        <input type="text" class="form-control" name="company">
					    </div>
					    <div class="form-group">
					        <label for="position" class="col-form-label"><?=lang('user.position');?></label>
					        <input type="text" class="form-control" name="position">
					    </div>
					    <div class="form-group">
					        <label for="phone" class="col-form-label"><?=lang('user.phone');?></label>
					        <input type="text" class="form-control" name="phone" placeholder="+79999999999">
					    </div>   
					    <p align="center"><button type="submit" class="btn btn-primary btn-lg"><?=lang('user.add_button_title');?></button><p>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark btn-lg" data-dismiss="modal"><?=lang('user.cancel_button_title');?></button>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	window.onload = function() {

		$("#registrationModal input[name=birthday]").mask("00.00.0000");

		$('input[name=phone]').on('keypress', function (e)
		{
			if (e.target.value.length == 0 && e.keyCode == 43)
			{
				return true;
			}
			if (e.target.value.length >= 12)
			{
				return false;
			}
			return (e.keyCode >= 48 && e.keyCode <= 57) ? true : false;
		});

		$("#form_add").on("submit", function () {

		    var data_for_send = {
		        'name': $(this).find('input[name=name]').val(),
                'surname': $(this).find('input[name=surname]').val(),
                'birthday': $(this).find('input[name=birthday]').val(),
                'company': $(this).find('input[name=company]').val(),
                'position': $(this).find('input[name=position]').val(),
                'phone': $(this).find('input[name=phone]').val(),
            };
		    var action = $(this).attr('action');

		    var context = $(this);

            $.ajax({
                url: action,
                type: "post",
                dataType: "json",
                data: data_for_send,
                success: function(request)
                {
                    if (request.error)
                    {
                        swal({
                            title: request.error,
                            icon: 'error',
                        });
                    }
                    else if (request.success)
                    {
                        context[0].reset();
                        swal({
                            title: request.success,
                            icon: 'success',
                        });
                        $("#registrationModal").modal('hide');
                    }
                },
                error: function (error)
                {
                    swal({
                        title: "<?php echo lang('errors.server_error')?>",
                        icon: 'error',
                    });
                }
            });

		    return false;
        });

	};
</script>