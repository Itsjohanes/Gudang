<?php defined('BASEPATH') or exit('No direct script access allowed');

class RoleValidation
{

    protected $CI;

    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI = &get_instance();
    }

    public function check_role()
    {
        // Get the current user's role from session
        $user_role = $this->CI->session->userdata('role');

        // Redirect based on user role
        switch ($user_role) {
            case 1:
                redirect('admin');
                break;
            case 2:
                redirect('gudang');
                break;
            case 3:
                redirect('kantor');
                break;
            default:
                redirect('auth');
                break;
        }
    }
}
