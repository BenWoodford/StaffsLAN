<?php

class ExtraValidation {
	public static function _validation_phone_number($val) {
		$pattern = "/^\s*\(?(020[78]?\)? ?[1-9][0-9]{2,3} ?[0-9]{4})$|^(0[1-8][0-9]{3}\)? ?[1-9][0-9]{2} ?[0-9]{3})\s*$/";

		$match = preg_match($pattern,$val);

		return $match != false;
	}
}