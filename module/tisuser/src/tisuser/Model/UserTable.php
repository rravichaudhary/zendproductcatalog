<?php
namespace tisuser\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;


class UserTable  extends AbstractTableGateway {

protected $table = 'sp_users';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new User());

        $this->initialize();
    }

	public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
	
	public function getUser($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
	
	public function checklogin($user){
	
	$data = array(
            'username' => $user->username,
            'password'  => $user->password,
        );
		$rowset = $this->select($data);
		$row = $rowset->current();
		if(!$row){
		return false;
		}else{
		return true;
		}
	
	}
	
	 public function saveUser($user)
    {
		
        $data = array(
            'username' => $user->username,
            'password'  => $user->password,
        );

        $id = (int)$user->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getUser($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }
	
	
}
