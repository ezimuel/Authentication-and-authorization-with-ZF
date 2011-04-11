<?php
/**
 * Login_Acl
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 */
class Login_Acl extends Zend_Acl {
	
    public function __construct($db,$role) {
        $this->loadRoles($db);
        $this->loadResources($db,$role);
        $this->loadPermissions($db,$role);
    }

    public function loadRoles($db) {
    	if (empty($db)) {
    		return false;
    	}
        $roles = new Login_Model_Roles($db);
        $allRoles = $roles->getRoles();
        foreach ($allRoles as $role) {
            if (!empty($role->id_parent)) {
                $this->addRole(new Zend_Acl_Role($role->id),$role->id_parent);
            } else {
                $this->addRole(new Zend_Acl_Role($role->id));
            }
        }
    }
    
    public function loadResources($db,$role) {
    	if (empty($db)) {
    		return false;
    	}
    	$resources= new Login_Model_Resources($db);
    	$allResources= $resources->getResources($role);
    	foreach ($allResources as $res) {
    		$this->addResource(new Zend_Acl_Resource($res['resource']));
    	}
    }
    
    public function loadPermissions($db,$role) {
    	if (empty($db)) {
    		return false;
    	}
    	$permissions= new Login_Model_Permissions($db);
    	$allPermissions= $permissions->getPermissions($role);
    	foreach ($allPermissions as $res) {
    		if ($res['permission']=='allow') {
    			$this->allow($res['id_role'],$res['resource']);
    		} else {
    			$this->deny($res['id_role'],$res['resource']);
    		}	
    	}
    }

}
