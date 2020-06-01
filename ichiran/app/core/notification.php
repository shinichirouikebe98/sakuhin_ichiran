<?php

/**
 * 
 */
class Notification
{
	
	public static function setNotif($data,$messege,$action,$type)
	{
		$_SESSION['notif'] = [
			'data' => $data,
			'messege' => $messege,
			'action' => $action,
			'type' => $type

		];
	}

	public static function notif(){
		if(isset($_SESSION['notif'])){
			echo'<div class="alert alert-'. $_SESSION['notif']['type'] .' alert-dismissible fade show" role="alert">' . $_SESSION['notif']['data'] . 'データの<strong>' . $_SESSION['notif']['action'] . '</strong>が
				  <strong>' . $_SESSION['notif']['messege'] . 'しました！</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';

			unset($_SESSION['notif']);
		}
	}
}

?>