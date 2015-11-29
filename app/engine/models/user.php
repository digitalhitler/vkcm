<?php
namespace VKCM\Models;
use VKCM\Modules\ORM\Model as Model;

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
