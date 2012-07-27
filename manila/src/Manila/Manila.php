<? 

namespace Arch;

class Manila {

public static function validate($post, $title, &$errors, $validate) {
	$post = trim($post);
	if (in_array('empty', $validate) && empty($post)) {
		array_push($errors, "Please enter a $title");
	}
	if (in_array('date', $validate) && strtotime($post) < strtotime("1/1/2012") ) {
		array_push($errors, "Please enter a valid $title");
	}

	return $post;
}

public static function printField($data) {
	switch ($data['type']) {
		case 'text' :
			return self::textField($data);
			break;
		case 'signature' :
			return self::signatureField($data);
			break;
		case 'checkbox' :
			return self::checkBoxField($data);
			break;
		case 'textarea' :
			return self::textAreaField($data);
			break;
		case 'calendar' :
			return self::calendarField($data);
			break;
	}
}

public static function textField($data) {
	$label 	= $data['label'];
	$tag 	= $data['tag'];
	$value 	= $data['value'];
	$desc 	= $data['desc'];
	$css  = isset($data['css']) ? $data['css'] : 'input-xlarge';
	$field = <<<FIELD
<div class="control-group">
<label class="control-label" for="$tag">$label</label>
<div class="controls">
	<input name="$tag" type="text" class="text_field $css" title="$desc" id="$tag" value="$value">
	<p class="help-block"></p>
</div>
</div>
FIELD;
    return $field;
}

public static function signatureField($data) {
	$label 	= $data['label'];
	$tag 	= $data['tag'];
	$value 	= $data['value'];
	$desc 	= $data['desc'];
	$css  = isset($data['css']) ? $data['css'] : 'input-xlarge';
	$field = <<<FIELD
<div class="control-group">
<label class="control-label" for="$tag">$label</label>
<div class="controls">
	<div class="input-prepend input-append">
	<span class="add-on"><i class="icon-pencil"></i></span><input name="$tag" type="text" class="signature_field $css" title="$desc" id="$tag" value="$value">
	</div>
	<p class="help-block"></p>
</div>
</div>
FIELD;
    return $field;
}

public static function calendarField($data) {
	$label 	= $data['label'];
	$tag 	= $data['tag'];
	$value 	= $data['value'];
	$desc 	= $data['desc'];
	$field = <<<FIELD
<div class="control-group">
<label class="control-label" for="$tag">$label</label>
<div class="controls">
	<div class="input-prepend">
	<span class="add-on"><i class="icon-calendar"></i></span><input name="$tag" title="$desc" type="text" class="calendar_field input-medium" id="$tag" value="$value"  >
	</div>
	<p class="help-block"></p>
</div>
</div>
FIELD;
    return $field;
}

public static function textAreaField($data) {
	$label 	= $data['label'];
	$tag 	= $data['tag'];
	$value 	= $data['value'];
	$desc 	= $data['desc'];
	$field = <<<FIELD
<div class="control-group">
<label class="control-label" for="$tag">$label</label>
<div class="controls">
	<textarea name="$tag" type="text" title="$desc" class="text_area input-xlarge" id="$tag">$value</textarea> 
	<p class="help-block"></p>
</div>
</div>
FIELD;
    return $field;
}



public static function checkBoxField($data) {
	$label 	= $data['label'];
	$tag 	= $data['tag'];
	$value 	= $data['value'] == true ? 'checked' : '';
	$desc 	= $data['desc'];
	$field = <<<FIELD
<div class="control-group">
<label class="control-label" for="$tag">$label</label>
<div class="controls">
	<input name="$tag" type="checkbox" id="$tag" $value></input> 
	<p class="help-block">$desc</p>
</div>
</div>
FIELD;
    return $field;
}

