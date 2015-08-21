<?php
/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-22
 * Time: 오전 12:45
 */
class SNS_Model
{
	public $name = "vim";
	public $host = "localhost";
	public $port = "3306";
	public $user = "root";
	public $password = "1q2w3e4r";
	public $db;
	function __construct() {
		try {
			$db = new PDO("mysql:host=".$this->host.";dbname=".$this->name.";charset=utf8", $this->user, $this->password);
			$db->exec("set session character_set_connection=utf8;");
			$db->exec("set session character_set_results=utf8;");
			$db->exec("set session character_set_client=utf8;");
			$db->exec("set names utf8;");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db = $db;
		}catch(Exception $e){
			throw new Exception("Failed to generating Database Class.".$e);
		}
	}
	//포스트 가져오는 함수 (남용하지 말 것, 귀찮아서 걍 다 가져오게 만들었음)
	function getAllPost() {
		$stmt = $this->db->prepare("select * from post");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	//포스트 추가 함수
	function addPost($post) {
		$author = $post["author"];
		$content = $post["content"];
		$img = $post["img"];
		$stmt = $this->db->prepare("insert into post (author, content, `time`, img) values (:author, :content, now(), :img)");
		$stmt->bindParam(":author", $author);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":img", $img);
		$stmt->execute();
	}
}