<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth');

class CustomAuthenticate extends FormAuthenticate
{
/**
 * Settings for this object.
 *
 * - `fields` The fields to use to identify a user by.
 * - fields['username'] can be an array
 * - `userModel` The model name of the User, defaults to User.
 * - `scope` Additional conditions to use when looking up and authenticating users,
 *    i.e. `array('User.is_active' => 1).`
 *
 * @var array
 */
    public $settings = array(
        'fields' => array(
            'username' => array('username', 'email'),
            'password' => 'password'
        ),
        'userModel' => 'User',
        'scope' => array(
           /* 'deleted' => false,
            'enabled' => true,
			'status' => '1',*/
			'User.isactive'=>'1',
			'User.isdeleted'=>'0',
        ),
		'passwordHasher' =>	array(
						'className' => 'Simple',
						'hashType' => 'sha256'
					)
    );
    
    
/**
 * Authenticates the identity contained in a request.  Will use the `settings.userModel`, and `settings.fields`
 * to find POST data that is used to find a matching record in the `settings.userModel`.  Will return false if
 * there is no post data, either username or password is missing, of if the scope conditions have not been met.
 *
 * @param CakeRequest $request The request that contains login information.
 * @param CakeResponse $response Unused response object.
 * @return mixed.  False on login failure.  An array of User data on success.
 */
    public function authenticate(CakeRequest $request, CakeResponse $response)
    {
        $userModel = $this->settings['userModel'];
        list($plugin, $model) = pluginSplit($userModel);

        $fields = $this->settings['fields'];
        if (empty($request->data[$model])) {
            return false;
        }

        if (!is_array($fields['username']))
        {
            $fields['username'] = array($fields['username']);
        }
        
        if (empty($request->data[$model][$fields['password']]))
        {
            return false;
        }
        
        foreach ($fields['username'] as $usernameField)
        {
            if (!empty($request->data[$model][$usernameField]))
            {
                return $this->_findUser(
                    $request->data[$model][$usernameField],
                    $request->data[$model][$fields['password']]
                );
            }            
        }
        
        return false;
    }
    
/**
 * Find a user record using the standard options.
 *
 * @param string $username The username/identifier.
 * @param string $password The unhashed password.
 * @return Mixed Either false on failure, or an array of user data.
 */
    protected function _findUser($username, $password=NULL) {
        $userModel = $this->settings['userModel'];
        list($plugin, $model) = pluginSplit($userModel);
        $fields = $this->settings['fields'];

        if (!is_array($fields['username']))
        {
            $fields['username'] = array($fields['username']);
        }
        
        $conditions = array();
		
        foreach ($fields['username'] as $usernameField)
        {
            $conditions['OR'][] = array(
                $model . '.' . $usernameField => $username,
                $model . '.' . $fields['password'] => parent::passwordHasher()->hash($password), //$this->_password($password),
            );
            
        }
        
        if (!empty($this->settings['scope'])) {
            $conditions = array_merge($conditions, $this->settings['scope']);
			/*$conditions = array(
				'User.isactive'=>'1',
				'User.isdeleted'=>'0'
			);*/
			//$conditions = $this->settings['scope'];
        }
       	//ClassRegistry::init($userModel)->recursive = 1;
        $result = ClassRegistry::init($userModel)->find('first', array(
            'conditions' => $conditions,
            'recursive' => 2
        ));
        if (empty($result) || empty($result[$model])) {
            return false;
        }
        unset($result[$model][$fields['password']]);
        return $result[$model];
    }
}