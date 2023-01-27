<?php

namespace App\Constants;


	/*
	出来ること
        - Blade,Controllerで多く使うので、可読性向上のため
          定数化にした
	*/

class Common
{
  const MALE_ARTIST = '1';
  const FEMALE_ARTIST = '2';

  const GROUP_LIST = [
    'male' => self::MALE_ARTIST,
    'female' => self::FEMALE_ARTIST,

  ];
}
