<?php

class ExtraValidation {
	public static function _validation_phone_number($val) {
		$pattern = "/^((\(?0\d{4}\)?\s?\d{3}\s?\d{3})|(\(?0\d{3}\)?\s?\d{3}\s?\d{4})|(\(?0\d{2}\)?\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/";

		$match = preg_match($pattern,$val);

		return $match != false;
	}
}