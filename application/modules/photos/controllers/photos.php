<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller
{

    /**
     * @author Ado Pabianko
     *Create Module Photos
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
        $this->form_validation->set_rules('terbitkan', 'terbitkan', 'trim|required|xss_clean');
    }

	public function index()
    {
        $data = array(
            'title'    => 'Administrator - Foto',
            'subtitle' => 'Foto',
            'content'  => 'photos/view',
            'photos'  => $this->model_general->getAllDataFromTable('tbl_photos','','','id desc')
        );

        $this->load->view('template',$data);
    }

	public function add()
    {
        $data = array(
            'title'    => 'Administrator - Foto',
            'subtitle' => 'Tambah Foto',
            'content'  => 'photos/add',
            'error'    => ''
        );

        $this->load->view('template',$data);
    }

	public function save()
    {
        //Set Default Date
        date_default_timezone_set("Asia/Jakarta");

        //Set File Name
        $name = $_FILES['foto']['name'];

        //Upload Directory
        $dir                      = './public/images/';

        //Configuration Upload File
        $config = array(
            'upload_path'         => $dir,
            'allowed_types'       => 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG',
            'max_size'            => '2000',
            'file_name'           => $name
        );
        $this->upload->initialize($config);

        $judul                    = $this->input->post('judul');
        $deskripsi                = $this->input->post('deskripsi');
        $terbitkan                = $this->input->post('terbitkan');
        $tgl_buat                 = date('Y-m-d');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'    => 'Administrator - Foto',
                'subtitle' => 'Tambah Foto',
                'content'  => 'photos/add',
                'error'    => ''
            );

            $this->load->view('template',$data);
        } else {
            if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'title'    => 'Administrator - Foto',
                    'subtitle' => 'Tambah Foto',
                    'content'  => 'photos/add',
                    'error'    => $this->upload->display_errors()
                );

                $this->load->view('template',$data);
            } else {
                $get_name       = $this->upload->data('foto');
                $images_name    = $get_name['file_name'];

                $source         = $dir.$get_name['file_name'];
                chmod($source, 0777);

                //Configuration Resize Upload File
                $img_lib['image_library']   = 'gd2';
                $img_lib['source_image']	= './public/images/'.$images_name;
                $img_lib['new_image']       = './public/images/photos';
                $img_lib['maintain_ratio']  = TRUE;
                $img_lib['width']	        = 700;
                $img_lib['height']	        = 700;

                $this->load->library('image_lib', $img_lib);
                $this->image_lib->resize();

                $Dataphotos = array(
                    'user_id'       => $this->session->userdata('id'),
                    'photos_title' 	=> $judul,
                    'photos_file'  	=> $images_name,
                    'photos_desc'  	=> $deskripsi,
                    'publish'       => $terbitkan,
                    'date_created'  => $tgl_buat
                );

                $this->model_general->saveTable('tbl_photos',$Dataphotos);
                unlink('./public/images/'.$images_name);
                redirect('photos');
            }
        }
    }

	public function edit($id)
    {
        $data = array(
            'title'    => 'Administrator - Foto',
            'subtitle' => 'Edit Foto',
            'content'  => 'photos/edit',
            'edit'	   => $this->model_general->getRowDataFromTable('tbl_photos',array('id' => $id)),
            'error'    => ''
        );

        $this->load->view('template',$data);
    }

	public function update()
    {
        //Set Default Date
        date_default_timezone_set("Asia/Jakarta");

        //Set File Name
        $name = $_FILES['foto']['name'];

        //Upload Directory
        $dir                      = './public/images/';

        //Configuration Upload File
        $config = array(
            'upload_path'         => $dir,
            'allowed_types'       => 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG',
            'max_size'            => '2000',
            'file_name'           => $name
        );
        $this->upload->initialize($config);

        $id                       = $this->input->post('id');
        $judul                    = $this->input->post('judul');
        $deskripsi                = $this->input->post('deskripsi');
        $terbitkan                = $this->input->post('terbitkan');
        $tgl_ubah                 = date('Y-m-d');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'    => 'Administrator - Foto',
                'subtitle' => 'Tambah Foto',
                'content'  => 'photos/add',
                'error'    => ''
            );

            $this->load->view('template',$data);
        } else {
            if (empty($name)) {
                $Dataphotos = array(
                    'user_id'       => $this->session->userdata('id'),
                    'photos_title'  => $judul,
                    'photos_desc'   => $deskripsi,
                    'publish'       => $terbitkan,
                    'date_modified' => $tgl_ubah
                );

                $this->model_general->updateTable('tbl_photos',array('id' => $id),$Dataphotos);
                redirect('photos');
            } else {
                if (!$this->upload->do_upload('foto')) {
                    $data = array(
                        'title'    => 'Administrator - Foto',
                        'subtitle' => 'Tambah Foto',
                        'content'  => 'photos/edit',
                        'error'    => $this->upload->display_errors()
                    );

                    $this->load->view('template',$data);
                } else {
                    $get_name       = $this->upload->data('foto');
                    $images_name    = $get_name['file_name'];

                    $source         = $dir.$get_name['file_name'];
                    chmod($source, 0777);

                    //Configuration Resize Upload File
                    $img_lib['image_library']   = 'gd2';
                    $img_lib['source_image']	= './public/images/'.$images_name;
                    $img_lib['new_image']       = './public/images/photos';
                    $img_lib['maintain_ratio']  = TRUE;
                    $img_lib['width']	        = 700;
                    $img_lib['height']	        = 700;

                    $this->load->library('image_lib', $img_lib);
                    $this->image_lib->resize();

                    $Dataphotos = array(
                        'user_id'       => $this->session->userdata('id'),
                        'photos_title'  => $judul,
                        'photos_file'   => $images_name,
                        'photos_desc'   => $deskripsi,
                        'publish'       => $terbitkan,
                        'date_modified' => $tgl_ubah
                    );

                    $ImagesName = $this->model_general->getRowDataFromTable('tbl_photos',array('id' => $id));
                    unlink('./public/images/photos/'.$ImagesName->photos_file);

                    $this->model_general->updateTable('tbl_photos',array('id' => $id),$Dataphotos);
                    unlink('./public/images/'.$images_name);
                    redirect('photos');
                }
            }
        }
    }

	public function delete()
    {
        $array_id   = $this->input->post('array_id');
        $id         = $this->input->post('id');

        foreach ($array_id as $key => $value) {
            //Check File Name From Table
            $ImagesName = $this->model_general->getRowDataFromTable('tbl_photos',array('id' => $value));

            if(!empty($id[$value])) {
                if (empty($ImagesName->photos_file)) {
                    $this->model_general->deleteRowTable('tbl_photos',array('id' => $value));
                } else {
                    unlink('./public/images/photos/'.$ImagesName->photos_file);
                    $this->model_general->deleteRowTable('tbl_photos',array('id' => $value));
                }
            }
        }
        redirect('photos');
    }

}