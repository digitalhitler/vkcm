<?php
class UserSession extends Model {
  public static function 
}


// $user = Model::factory('User')->create();
// $user->email = 'spetrenko@me.com';
// $user->setPassword('tratata');
// $user->save();
// var_dump($user);
//
// $user = Model::factory('User')->find_one(1);
//var_dump($user->sessions()->find_one());
// http://vkcm.digitalhitler.ru/api/auth/asdsad/asdas/?key=323232&keykeykeykeyk=323121dw&var1[]=222&var1[]=223

class User extends Model {

  public static function get_banned($orm) {
    return $orm->where('is_banned', 'true');
  }

  public static function has_uuid($orm, $uuid) {
    return $orm->where('uuid', $uuid);
  }

  public function sessions() {
    return $this->has_many('UserSession');
  }

  public function setPassword($pwd) {
    $this->password = md5($pwd);
  }

  public function save() {
    if($this->is_new() === true) {
      $this->created_at = time();
      $uuid = new uuid;
      $this->uuid = $uuid->get();
    }
    $this->last_updated_at = time();
    parent::save();
  }
}
