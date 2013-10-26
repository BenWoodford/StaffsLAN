<?php

class ExtraValidation {
	public static function _validation_phone_number($val) {
		$pattern = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";

		$match = preg_match($pattern,$val);

		return $match != false;
	}
}