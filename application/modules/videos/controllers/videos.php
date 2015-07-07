<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller
{

    /**
     * @author Ado Pabianko
     *Create Module Videos
     **/

    public function __construct()
    {
        parent::__construct();
        //Redirect ke halaman login
        if ($this->session->userdata('logged_in') == FALSE){redirect('login');}

        //Set Form Validation
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|xss_clean');
        $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');
        $this->form_validation->set_rules('terbitkan', 'Terbitkan', 'trim|required|xss_clean');
    }

	public function index()
    {
        $data = array(
            'title'    => 'Administrator - Video',
            'subtitle' => 'Video',
            'content'  => 'videos/view',
            'videos'  => $this->model_general->getAllDataFromTable('tbl_videos','','','id desc')
        );

        $this->load->view('template',$data);
    }

	public function add()
    {
        $data = array(
            'title'    => 'Administrator - Video',
            'subtitle' => 'Tambah Video',
            'content'  => 'videos/add'
        );

        $this->load->view('template',$data);
    }

	public function save()
	{
		//Set Default Date
        date_default_timezone_set("Asia/Jakarta");

		$judul 		= $this->input->post('judul');
		$link 		= $this->input->post('link');
		$deskripsi	= $this->input->post('deskripsi');
		$terbitkan	= $this->input->post('terbitkan');
		$tgl_buat   = date('Y-m-d');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
		        'title'    => 'Administrator - Video',
		        'subtitle' => 'Tambah Video',
		        'content'  => 'videos/add'
		    );

		    $this->load->view('template',$data);
		} else {
			$Datavideos = array(
	            'user_id'       => $this->session->userdata('id'),
	            'videos_title' 	=> $judul,
	            'videos_link'  	=> $link,
	            'videos_desc'  	=> $deskripsi,
	            'publish'       => $terbitkan,
	            'date_created'  => $tgl_buat
	        );

	        $this->model_general->saveTable('tbl_videos',$Datavideos);
	        redirect('videos');
		}
	}

	public function edit($id)
	{
		$data = array(
			'title'    => 'Administrator - Video',
			'subtitle' => 'Ubah Video',
			'content'  => 'videos/edit',
			'edit'	   => $this->model_general->getRowDataFromTable('tbl_videos',array('id' => $id))
		);

		$this->load->view('template',$data);
	}

	public function update()
	{
		//Set Default Date
        date_default_timezone_set("Asia/Jakarta");

		$id			= $this->input->post('id');
		$judul 		= $this->input->post('judul');
		$link 		= $this->input->post('link');
		$deskripsi	= $this->input->post('deskripsi');
		$terbitkan	= $this->input->post('terbitkan');
		$tgl_buat   = date('Y-m-d');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
		        'title'    => 'Administrator - Video',
		        'subtitle' => 'Tambah Video',
		        'content'  => 'videos/add'
		    );

		    $this->load->view('template',$data);
		} else {
			$Datavideos = array(
	            'user_id'       => $this->session->userdata('id'),
	            'videos_title' 	=> $judul,
	            'videos_link'  	=> $link,
	            'videos_desc'  	=> $deskripsi,
	            'publish'       => $terbitkan,
	            'date_created'  => $tgl_buat
	        );

	        $this->model_general->updateTable('tbl_videos',array('id' => $id),$Datavideos);
	        redirect('videos');
		}
	}

	public function delete()
	{
        $array_id   = $this->input->post('array_id');
        $id         = $this->input->post('id');

        foreach ($array_id as $key => $value) {
            if(!empty($id[$value])) {
                $this->model_general->deleteRowTable('tbl_videos',array('id' => $value));
            }
        }
		redirect('videos');
	}

}