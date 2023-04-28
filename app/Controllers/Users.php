<?php



namespace App\Controllers;


// use \Myth\Auth\Entities\User;
use App\Entities\User;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class Users extends BaseController
{

    protected $auth;

    protected $config;

    public function __construct()
    {
        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->userModel = new UserModel();
        $this->group = new GroupModel();
        $this->users = model(UserModel::class);
        $this->authorize = $auth = service('authorization');
        $this->db = \Config\Database::connect();
        $this->users_update = $this->db->table('users');
        helper(['form', 'url', 'text']);
    }

    public function index()
    {
        // check the role user
        // if (in_groups('superadmin')) {
        $data['users'] =  $this->users->findAll();
        // } else {
        //     $data['users'] = $this->userModel->find(user_id());
        // };

        // $user = $data['users'];
        // echo $user->name;


        $groupModel = new GroupModel();
        foreach ($data['users'] as $key => $row) {
            if (in_groups('superadmin')||in_groups('qcdoc')) {
                $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
                $dataRow['row'] = $row;
                $dataRow['key'] = ++$key;
                $data['row' . $row->id] = view('settings/users/row', $dataRow);
            }  
            elseif ($row->id == user_id()) {
                $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
                $dataRow['row'] = $row;
                $dataRow['key'] = $key;
                $data['row' . $row->id] = view('settings/users/row', $dataRow);
            }
        }

        $data['groups'] = $groupModel->findAll();
        

        $data['title'] = 'List users';
        return view('settings/users/index', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'Add Users',
            'config' => $this->config,

        ];
        return view('settings/users/add', $data);
    }

    public function save()
    {

        $rules = [
            'fullname' => [
                'required',
                'label' => 'Fullname',
                'rules' => 'required|min_length[2]|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Please enter your {field}.',
                    'min_length' => '{field} must have at least {param} characters.'
                ]
            ],
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rules = [
            'password'     => 'required',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));
        

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $this->users = $this->users->withGroup($this->config->defaultUserGroup);
        }

        if (!$this->users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->to(base_url('/users/index'));
        }

        // Success!
        return redirect()->to(base_url('/users/index'));
    }


    public function show_edit($id)
    {
        $groupModel = new GroupModel();
        $id_admin = user_id();
        $data['group_superadmin'] = $groupModel->getGroupsForUser($id_admin);
        $data['group_subadmin'] = $groupModel->getGroupsForUser($id);

        $data['title'] = 'Edit';
        $data['users'] = $this->users->where([
            'id' => $id
        ])->first();

        if (!$data['users']) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ((user_id() === '1') &&  ($data['group_superadmin'][0]['name'] === 'superadmin')) {
            return view('settings/users/edit', $data);
        } else if (user_id()  === $id) {
            return view('settings/users/edit', $data);
        } else if (!(user_id() === '1')) {
            if ($data['group_superadmin'][0]['name'] === 'superadmin') {
                return view('settings/users/edit', $data);
            }
            return redirect()->route('users');
        } else {
            return redirect()->route('users');
        }
    }

    public function store_edit_profile($id_user)
    {
        $id_user = $this->request->getVar('id');

        $validation = \Config\Services::validation();
        $post = $this->request->getVar();
        $input = $this->validate([
            'fullname' => [
                'label' => 'Fullname',
                'rules' => 'required|min_length[2]|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Please enter your {field}.',
                    'min_length' => '{field} must have at least {param} characters.'
                ]
            ],
            'profile_image' => [
                'label' => 'Profil Image',
                'rules' => 'max_size[profile_image,2048]|ext_in[profile_image,png,jpg,gif,jpeg]',
                'errors' => [
                    'ext_in'   => 'Allowed type {param}',
                    'max_size'  => 'Max Size {param}'
                ]
            ],
        ]);
        if (!$input) {
            $msg = [
                'error' => [
                    'fullname'      => $validation->getError('fullname'),
                    'profile_image'     => $validation->getError('profile_image'),
                ]
            ];
            echo json_encode($msg);
        } else {
            $imageFile = $this->request->getFile('profile_image');
            if (empty($_FILES['profile_image']['name'])) {
                $img = $post['old_img'];
            } else {
                $img = $imageFile->getRandomName();

                $imageFile->move('uploads/', $img);
            }
            $data = [
                'fullname'         => $post['fullname'],
                'profile_image'     => $img,
            ];
            $this->users->update($id_user, $data);
            // var_dump($this->users->update($id_user, $data));
            // die();
            $msg = [
                'success' => 'Success Update Profile!'
            ];
            echo json_encode($msg);
        }
    }

    public function store_edit($id_user)
    {
        $validation = \Config\Services::validation();
        $post = $this->request->getVar();
        $id_user = $this->request->getVar('id');
        $rules = $this->validate([
            'username' => [
                'label' => 'username',
                'rules' => "required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,users.id,{$id_user}]",
                'errors' => [
                    'is_unique' => 'username has been taken, please use another username'
                ]
            ],

            'fullname' => [
                'label' => 'Fullname',
                'rules' => 'required|min_length[2]|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Please enter your {field}.',
                    'min_length' => '{field} must have at least {param} characters.'
                ]
            ],

            'email' => [
                'label' => 'email',
                'rules' => "required|valid_email|is_unique[users.email,users.id,{$id_user}]",
                'errors' => [
                    'is_unique' => 'email has been taken, please use another email'
                ]
            ],
        ]);

        if (!$rules) {
            // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $msg = [
                'error' => [
                    'username'      => $validation->getError('username'),
                    'fullname'      => $validation->getError('fullname'),
                    'email'         => $validation->getError('email'),
                ]
            ];
            echo json_encode($msg);
        } else {
            $datas = [
                'username' => $post['username'],
                'fullname' => $post['fullname'],
                'email'    => $post['email']
            ];

            // dd($datas);
            $this->users_update->where('id', $id_user);
            $this->users_update->update($datas);
            // return redirect('users')->with('success', 'success change profile user');

            // var_dump($this->users->update($id_user, $datas));
            // die();
            $msg = [
                'success' => 'Success Update User !',
                'data' => $datas
            ];
            echo json_encode($msg);
            // return redirect()->route('users')->with('info', 'User Updated Succesfully! ');
        }
    }

    public function changeGroup()
    {
        $userId = $this->request->getVar('id');
        $groupId = $this->request->getVar('group');

        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));

        $groupModel->addUserToGroup(intval($userId), intval($groupId));

        return redirect('users')->with('success', 'Success Change User Role');
    }

    public function changeActive()
    {
        $userId = $this->request->getVar('id');
        $user = [
            'active' => $this->request->getVar('is_active'),
        ];
        $is_active = ($user['active']);
        $this->users->update($userId, $user);

        if ($is_active == 1) {
            return redirect('users')->with('success', 'User Success set to Active!');
        } else {
            return redirect('users')->with('danger', 'User Success set to non Active!');
        }
    }

    public function show_password($id)
    {
        $data['title'] = 'Edit Password';
        $data['users'] = $this->users->where([
            'id' => $id
        ])->first();

        if (!$data['users']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('settings/users/password', $data);
    }
    public function change_password($id)
    {
        $rules = [
            'password'     => 'required',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));


        if (!$this->users->update($id, $user)) {
            return redirect()->back()->withInput()->with('errors', $this->users->errors());
        } else {
            return redirect()->route('users')->with('info', 'User Password Updated Succesfully ! ');
        }
        // Success!

    }

    // delete users 

    public function delete($id)
    {
        $this->userModel->delete(['id' => $id]);
        return redirect('users')->with('danger', 'User Deleted Successfully');
    }




    /**                    Function untuk roles                              */

    public function roles()
    {
        $data['groups'] = $this->group->findAll();
        $data['title'] = "Halaman data roles";



        $groups = $this->authorize->group('administrator');
        // dd($groups);
        // dd($this->authorize->hasPermission('pemohon', user_id()));
        // dd($this->authorize->inGroup(2, user()->id));
        return view('settings/roles/index', $data);
    }
    public function permissions($menu_id)
    {
        $data['title'] = "Permission group";
        $data['permissions'] = $this->users->dataPermissions()->getResultArray();
        return view('settings/roles/permission', $data);
    }
    public function add_permissions()
    {
        $post = $this->request->getVar();

        $value = $post['permission'];
        $group_id = $post['group_id'];

        for ($i = 0; $i < count($value); $i++) {
            $name = $value[$i];
            $this->authorize->addPermissionToGroup($name, $group_id);
        }
        return redirect()->to('users/roles')->with('success', 'Permissions Added Successfully');
    }
}
