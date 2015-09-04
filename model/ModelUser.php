<?php


require_once 'User.php';
class ModelUser 
{
	private $db;

	public function __construct()
	{
        global $db;
		$this->db = $db;
	}
        
	public function checkAccount($username , $password)
        {
            $result = $this->db->select( 'user', '*', array(
            'username' => $username,
            'password' => $password,
            ));
            while ( $row = $result->fetch() ) 
            {
                //return $row['id'];
                //var_dump($row->id);
                return $row->id;
            }
            return false;
        }
	public function checkUsernameExits($username)
        {
            $result = $this->db->select( 'user', '*', array(
            'username' => $username,
            ));
            while ( $row = $result->fetch() ) 
            {
                return true;
            }
            return false;
        }
        public function insertUser($username,$password,$fullname,$birthday,$description,$linkimage)
        {
            $this->db->create( 'user', array( 'username' => $username,'password'=>$password,'fullname'=>$fullname,'birthday'=>$birthday,
                'description'=>$description,'linkimage'=>$linkimage ) );
            return $this->db->id();
        }
        public function updateUser($id,$username,$password,$fullname,$birthday,$description,$linkimage)
        {
            $data = array('username'=>$username,'password'=>$password,'fullname'=>$fullname,'birthday'=>$birthday,'description'=>$description,'linkimage'=>$linkimage);
            $this->db->update( 'user', $data, $id );
        }
        public function getUserById($id)
        {
            $user = null;
            $res = $this->db->read( 'user', $id );
            while ( $row = $res->fetch() ) // It's a row fetching method
            {
                $user = new User($row->username,$row->password,$row->fullname,date_mysql_to_string($row->birthday),$row->description,$row->linkimage);
            }
            return $user;
        }
        public function getAllPeople()
        {
            $query = $this->db->select( 'user' );
            //var_dump($query);
            $people = array();
            while ( $row = $query->fetch() ) // It's a row fetching method
            {
                $user = new User($row->username,$row->password,$row->fullname,$row->birthday,$row->description,$row->linkimage);
                $user->setId($row->id);
                array_push($people,$user);
            }
            return $people;
        }
}