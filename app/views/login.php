<div class="content">
	
	<p align="center">
		<button class="btn btn-lg btn-success register_button" type="button" data-toggle="modal" data-target="#registrationModal">Зарегистрироваться
		</button>
	</p>
	<br><br>

	<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="registrationModalLabel" align="center">Регистрация</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="/registration" id="form_add">
					  	<div class="form-group">
					        <label for="counter_id" class="col-form-label">Имя</label>
					        <input type="text" class="form-control" name="name">
					    </div>
					    <div class="form-group">
					        <label for="counter_id" class="col-form-label">Фамилия</label>
					        <input type="text" class="form-control" name="surname">
					    </div>
					    <div class="form-group">
							<label for="counter_data" class="col-form-label">Дата рождения</label>
							<input type="text" class="form-control" name="birthday" placeholder="ДД.ММ.ГГГГ">
					    </div>
					    <div class="form-group">
					        <label for="counter_id" class="col-form-label">Компания</label>
					        <input type="text" class="form-control" name="company">
					    </div>
					    <div class="form-group">
					        <label for="counter_id" class="col-form-label">Должность</label>
					        <input type="text" class="form-control" name="position">
					    </div>
					    <div class="form-group">
					        <label for="counter_id" class="col-form-label">Телефон</label>
					        <input type="text" class="form-control" name="phone" placeholder="+79999999999">
					    </div>   
					    <p align="center"><button type="submit" class="btn btn-primary btn-lg">Добавить</button><p>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark btn-lg" data-dismiss="modal">Отмена</button>
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

	};
</script>