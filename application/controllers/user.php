<?php
class User extends MY_Controller
{
	public function index()
	{
	$this->load->view('public/home');
	}
	public function all_users()
	{
		$this->load->model('usersmodel');
		$this->load->library('pagination');
		$config=[
		          'base_url'=>base_url('user/all_users'),
				  'per_page'=>3,
				  'total_rows'=>10,
				  'full_tag_open'=>'<ul class="pagination">',
				  'full_tag_close'=>'</ul>',
				  'attributes' =>['class' => 'page-link'],
                  'first_link' => false,
                  'last_link' => false,
				  'first_tag_open'=>'<li class="page-item">',
				  'first_tag_close'=>'</li>',
				  'last_tag_open'=>'<li class="page-item">',
				  'last_tag_close'=>'</li>',
				  'next_tag_open'=>'<li class="page-item">',
				  'next_tag_close'=>'</li>',
				  'prev_link' =>'&laquo',
				  'next_link' =>'&raquo',
				  'prev_tag_open'=>'<li class="page-item">',
				  'prev_tag_close'=>'</li>',
				  'num_tag_open'=>'<li class="page-item">',
				  'num_tag_close'=>'</li>',
				  'cur_tag_open'=>'<li class="page-item active"><a class="page-link">',
				  'cur_tag_close'=>'<span class="sr-only">(current)</span></a></li>',
				  ];
		$this->pagination->initialize($config);
		$users=$this->usersmodel->all_users_list($config['per_page'],$this->uri->segment(3));
		$this->load->helper('url');
	$this->load->view('public/users_list',['users'=>$users]);
	}
	public function select_users($id)
	{
		$this->load->model('usersmodel');
		$user= $this->usersmodel->find( $id );
		$this->load->library('session');
            $this->session->set_userdata(array('id'=>$id));
		$this->load->view('public/credit',compact('user'));
	}
	public function transfer()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('form_rules'))
		{
			$id=$_SESSION['id'];
			$name = $this->input->post('name');
           $amount = $this->input->post('amount');
			$this->load->model('usersmodel');
			$arr=$this->usersmodel->find_id($name);
		
			$id1=0;
			if(count($arr)>0){
				$id1=$arr[0]['ID'];
			}
			$this->usersmodel->transfer($id,$id1,$amount);
			$this->load->library('pagination');
			redirect(base_url().'index.php/user/all_users');
	}
	else
	{
		$this->load->view('public/error');
	}
}
}