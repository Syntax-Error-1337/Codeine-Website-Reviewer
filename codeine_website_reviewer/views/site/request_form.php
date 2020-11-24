<script type="text/javascript">
function papulateErrors (obj, errors) {
	for(var e in errors) {
		if(typeof(errors[e]) == 'object')
			papulateErrors(obj, errors[e])
		else
			obj.append(errors[e] + '<br/>');
	}
}

function request() {
    var domain = $("#domain");
    domain.val(domain.val().replace(/^https?:\/\//i,'').replace(/\/$/i, ''));
	var data = $("#website-form").serialize(),
			button = $("#submit"),
			errObj = $("#errors");
	errObj.hide();
	errObj.html('');
	button.attr("disabled", true);

    $("#progress-bar").toggleClass("hide");

    $.getJSON('<?php echo $this -> createUrl('parse/index') ?>', data, function(response) {
		button.attr("disabled", false);
        $("#progress-bar").toggleClass("hide");

		// If response's type is string then all is ok, redirect to statistics
		if(typeof(response) == 'string') {
			document.location.href = response;
			return true;
		}
		// If it's object, then display errors
		papulateErrors(errObj, response);
		errObj.show();
	}).error(function(xhr, ajaxOptions, thrownError) {
		/*console.log(
		'xhr.status = ' + xhr.status + '\n' +
		'thrown error = ' + thrownError + '\n' +
		'xhr.responseText = ' + xhr.responseText + '\n' +
		'xhr.statusText = '  + xhr.statusText
		);*/
	});
}

$(document).ready(function() {
	$("#submit").click(function() {
		request();
		return false;
	});

	$("#website-form input").keypress(function(e) {
		if (e.keyCode == 13) {
			e.preventDefault();
			request();
			return false;
		}
	});
});
</script>

<form id="website-form">
<div class="input-append control-group">
<input class="website-input" name="Website[domain]" id="domain" placeholder="example.com" type="text">
<button class="btn btn-large btn-success analyseBtn" id="submit" type="button"><?php echo Yii::t("app", "Analyze") ?></button>
<div id="progress-bar" class="hide">
    <br/>
    <div class="progress progress-striped active">
        <div class="bar" style="width: 100%;"></div>
    </div>
</div>
</div>

<span id="upd_help" class="help-inline"> &larr; <?php echo Yii::t("app", "Click to update") ?></span>
<div class="clearfix"></div>
<div class="error alert alert-error span4<?php echo isset($errorClass) ? " $errorClass" : null ?>" id="errors" style="display:none"></div>
</form>