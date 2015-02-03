<?php 


class Validator {
	protected $regex = '';

	public function isValid($input) {
		if(strlen($this->regex) == 0) {
			throw new exception("Called empty regex.");
		}

		return preg_match($regex, $input);
	}
}


// each class could look like this. 
class EmailValidator extends Validator {
	protected $regex = '/email regex/';
}




// otherwise.. this would work, but it's more complex...
class Val2 {
	public function isValid($input) {
		throw new exception("should call a subclass");
	}
}

class Email2 extends Val2 {
	public function isValid($input) {
		return preg_match('/regex here/', $input);
		// if(!preg_match('/regex here', $input)) {
		// 	if(db_user_exists()) {
		// 		return false;
		// 	} else {
		// 		return true;
		// 	}
		// } return false;
	}
}


class ValidatorFactory {
	public function getValidator($type) {
		if($type === 'email') {
			return new EmailValiator();
		} else if($type === 'number') {
			return new NumberValidator();
		} else if ($type === 'phone') {
			return new PhoneValidator();
		} else {
			throw new exception('unknown validator type');
		}
	}
}
$inputs = [ //This might be how we can set up our project. (done on the client side/with the html)
	'email1' => [
		'type' => 'email',
		'error' => 'Email must contain "@".',
		'isValid' => false,
		'value' => ''
	],
	'num1' =>[
		'type' => 'number',
		'error' => 'Numbers must contian only digits',
		'isValid' => false,
		'value' => ''
	]
];

// This is a factory design pattern. Factory would have to get updated and in its own file. Validator would go in its own class, subclasses in a separate file, then factory in another file.
$vf = new ValidatorFactory();
$htmlInputs = [];

foreach($inputs as $input) {
	$name = $input['name'];
	if(isset($_GET[$name])) {
		$value = $_GET[$name];
		$validator = $vf->getValidator($input['type']);
		$input['value'] = $value;
		$input['isValid'] = $validator->isValid($value))
	} else {
		$input['error'] = "no input value";
	}
	$html = '<input type=\"text\" name=\"$name\" value='; 
	if ($input['isValid']) {
		$html .= 'value=\"' . $input['value'] . '\">';
	} else {
		$html .='class=\"not-valid\">';
	}
	$htmlInputs[] = $html;
}


$ev = $vf->getValidator('email');
if($ev->)






 ?>