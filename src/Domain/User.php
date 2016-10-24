<?php
namespace FriendlySold\Domain;


/**
* 
*/
class User
{
/**
 * User id.
 *
 * @var integer
 */
private $id;

/**
 * User username.
 *
 * @var string
 */
private $username;

/**
 * User color.
 *
 * @var string
 */
private $color;

/**
 * User group.
 *
 * @var integer
 */
private $group;



	/*ici on recupere l'id*/
	public function getId(){


		return $this->id;
	}





	/*ici on recupere username*/
	public function getUsername(){


		return $this->username;
	}
	/*ici on definit ou redefinit username*/
	public function setUsername($username){


		$this->username=$username;

	}



	/*ici on recupere group*/
	public function getGroup(){


		return $this->group;
	}
	/*ici on definit ou redefinit group*/
	public function setGroup($group){


		$this->group=$group;

	}

	/*ici on recupere color*/
	public function getColor(){


		return $this->color;
	}



    public function setId($id) {
			$id = (int) $id;
			if ($id <= 0) return NULL;
			$this->id = $id;
			return $this;
		}
		public function setName($name) {
			$name = (string) $name;
			$length = strlen($name);
			if ($length = 0 || $length > 255) return NULL;
			$this->name = $name;
			return $this;
		}
		public function setColor($color) {
			$color = (string) $color;
			$length = strlen($color);
			if ($length = 0 || $length > 255) return NULL;
			$this->color = $color;
			return $this;
		}
}





