<!-- function divPrinter($var_name,$value,name,$type="checkbox"){ -->
<?php foreach ($var as $key): ?>
	<label class="form-check-label" >
		<li style = "margin-left:30px;" class = "form-check">
			<input type=<?=$type?> class = "filled-in form-check-input" name="<?=$var_name?>" value="<?=$key['id']?>">
		</li>
		<?=$key['name']?>
	</label>
<?php endforeach;
