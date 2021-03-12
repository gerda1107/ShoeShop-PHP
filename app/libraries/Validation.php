<?php

namespace app\libraries;

class Validation
{
    private $password;

    public function validateName($field)
    {
        if (empty($field)) return 'Please enter your Name.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Name must only contain name Chars.';

        return '';
    }

    public function validateLastame($field)
    {
        if (empty($field)) return 'Please enter your Lastname.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Lastname must only contain name Chars.';

        return '';
    }

    public function validateEmail($field, &$userModel)
    {
        if (empty($field)) return "Please enter your email";

        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return "Please check your email.";

        if ($userModel->findUserByEmail($field)) return "Email already taken.";

        return '';
    }

    public function validatePassword($passField, $min, $max)
    {
        if (empty($passField)) return "Please enter Password.";

        $this->password = $passField;

        if (strlen($passField) < $min) return "Password must be more than $min chars.";

        if (strlen($passField) > $max) return "Password cannot be more than $max chars.";

        if (!preg_match("#[0-9]+#", $passField)) return "Password must contain atleast one number.";
        if (!preg_match("#[a-z]+#", $passField)) return "Password must include at least one letter!";
        if (!preg_match("#[A-Z]+#", $passField)) return "Password must include at least one Capital letter!";
        if (!preg_match("#\W+#", $passField)) return "Password must include at least one symbol!";

        return '';
    }

    public function confirmPassword($repeatField)
    {
        if (empty($repeatField)) return "Please repeat Password.";

        if (!$this->password) return 'No pass found';

        if ($repeatField !== $this->password) return "Passwords must match.";
    }

    public function validatePhone($field)
    {
        if (empty($field)) return 'Please enter your Phone Number.';

        if (!preg_match("{9}", $field)) return 'Phone Number must only contain numbers and be 9 digits.';

        return '';
    }

    public function ifEmptyArr($arr)
    {
        foreach ($arr as $var) {
            if (!empty($var)) return false;
        }
        return true;
    }
}
