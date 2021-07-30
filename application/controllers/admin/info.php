<?php 
class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda Belum Login!!! 
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
					  </button>
				</div>'
            );
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/info');
            $this->load->view('templates_admin/footer');
        } else {
            $id = $this->session->userdata('id');
            $role_id = $this->session->userdata('role_id');
            $password = $this->input->post('password');
            $this->model_auth->ubah_password($id, $role_id, $password);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Password telah diubah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
						  </button>
					</div>');

            redirect('admin/info');
        }
    }

    private function _rules()
    {
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]', [
            'required' => 'Confirm Password tidak boleh kosong!',
            'matches' => 'Confirm Password tidak sama dengan Password!'
        ]);
    }
}

?>