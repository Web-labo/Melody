<?php

namespace www\admin\controllers;

class Home extends \Core\Controller
{
	public function __melody_access()
	{
		// delete /private/cache/access/{namespace/class}.access.php to apply modifications in prod mode

		$this->setDefaultAccessRole(1);
		$this->setAccessRoleException('anyIndexAction', 1);
		$this->setAccessRoleException('anyDataAction', 0);
		$this->setAccessRoleException('anyTestHmvcAction', 0);
		$this->setAccessRoleException('anyXnxxAction', 0);
	}

	public function anyIndexAction($req, $res)
	{
		echo('Bienvenue sur l\'espace d\'administration');
		return $res->setView('blop');
	}

	public function anyDataAction($req, $res)
	{
		var_dump(\Core\Data::invoke('\www\models\User')->test());
		return $res->setView('blop', array());
	}

	public function anyTestHmvcAction($req, $res)
	{
		\www\controllers\Home::invoke('test', $req);
		var_dump($req);

		return $res->setView('blop', array());
	}

	public function anyXnxxAction($req, $res)
	{
		return $res;
	}
}