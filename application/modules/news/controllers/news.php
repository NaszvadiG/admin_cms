<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ado Pabianko
 * Email adopabianko@gmail.com
 * Class News
 */

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Redirect ke halaman login
        if ($this->session->userdata('logged_in') == FALSE){redirect('login');}

        //Load Model
        $this->load->model('news_model');

        //Set Form Validation
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|xss_clean');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required|xss_clean');
        $this->form_validation->set_rules('terbitkan', 'Terbitkan', 'trim|required|xss_clean');
    }

    public function index()
    {
        $data = array(
            'title'    => 'Administrator - Berita',
            'subtitle' => 'Berita',
            'content'  => 'news/view',
            'news'	   => $this->news_model->getAllDataNews()
        );

        $this->load->view('template',$data);
    }

    public function add()
    {
        $data = array(
            'title'    => 'Administrator - Berita',
            'subtitle' => 'Tambah Berita',
            'content'  => 'news/add',
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
        $isi_berita               = $this->input->post('isi_berita');
        $terbitkan                = $this->input->post('terbitkan');
        $tgl_buat                 = date('Y-m-d');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'    => 'Administrator - Berita',
                'subtitle' => 'Tambah Berita',
                'content'  => 'news/add',
                'error'    => ''
            );

            $this->load->view('template',$data);
        } else {
            if (empty($name)) {
                $DataNews = array(
                    'user_id'       => $this->session->userdata('id'),
                    'news_title'    => $judul,
                    'news_content'  => $isi_berita,
                    'publish'       => $terbitkan,
                    'date_created'  => $tgl_buat
                );

                $this->model_general->saveTable('tbl_news',$DataNews);
                redirect('news');
            } else {
                if (!$this->upload->do_upload('foto')) {
                    $data = array(
                        'title'    => 'Administrator - Berita',
                        'subtitle' => 'Tambah Berita',
                        'content'  => 'news/add',
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
                    $img_lib['new_image']       = './public/images/news';
                    $img_lib['maintain_ratio']  = TRUE;
                    $img_lib['width']	        = 700;
                    $img_lib['height']	        = 700;

                    $this->load->library('image_lib', $img_lib);
                    $this->image_lib->resize();

                    $DataNews = array(
                        'user_id'       => $this->session->userdata('id'),
                        'news_title'    => $judul,
                        'news_content'  => $isi_berita,
                        'news_file'     => $images_name,
                        'publish'       => $terbitkan,
                        'date_created'  => $tgl_buat
                    );

                    $this->model_general->saveTable('tbl_news',$DataNews);
                    unlink('./public/images/'.$images_name);
                    redirect('news');
                }
            }
        }
    }

    public function edit($id)
    {
        $data = array(
            'title'    => 'Administrator - Berita',
            'subtitle' => 'Edit Berita',
            'content'  => 'news/edit',
            'edit'	   => $this->model_general->getRowDataFromTable('tbl_news',array('id' => $id)),
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
        $isi_berita               = $this->input->post('isi_berita');
        $terbitkan                = $this->input->post('terbitkan');
        $tgl_ubah                 = date('Y-m-d');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'    => 'Administrator - Berita',
                'subtitle' => 'Tambah Berita',
                'content'  => 'news/edit',
                'edit'     => $this->model_general->getRowDataFromTable('tbl_news',array('id' => $id)),
                'error'    => ''
            );

            $this->load->view('template',$data);
        } else {
            if (empty($name)) {
                $DataNews = array(
                    'user_id'       => $this->session->userdata('id'),
                    'news_title'    => $judul,
                    'news_content'  => $isi_berita,
                    'publish'       => $terbitkan,
                    'date_modified' => $tgl_ubah
                );

                $this->model_general->updateTable('tbl_news',array('id' => $id),$DataNews);
                redirect('news');
            } else {
                if (!$this->upload->do_upload('foto')) {
                    $data = array(
                        'title'    => 'Administrator - Berita',
                        'subtitle' => 'Tambah Berita',
                        'content'  => 'news/edit',
                        'edit'     => $this->model_general->getRowDataFromTable('tbl_news',array('id' => $id)),
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
                    $img_lib['new_image']       = './public/images/news';
                    $img_lib['maintain_ratio']  = TRUE;
                    $img_lib['width']	        = 700;
                    $img_lib['height']	        = 700;

                    $this->load->library('image_lib', $img_lib);
                    $this->image_lib->resize();

                    $DataNews = array(
                        'user_id'       => $this->session->userdata('id'),
                        'news_title'    => $judul,
                        'news_content'  => $isi_berita,
                        'news_file'     => $images_name,
                        'publish'       => $terbitkan,
                        'date_modified' => $tgl_ubah
                    );

                    $ImagesName = $this->model_general->getRowDataFromTable('tbl_news',array('id' => $id));
                    unlink('./public/images/news/'.$ImagesName->news_file);

                    $this->model_general->updateTable('tbl_news',array('id' => $id),$DataNews);
                    unlink('./public/images/'.$images_name);
                    redirect('news');
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
            $ImagesName = $this->model_general->getRowDataFromTable('tbl_news',array('id' => $value));

            if(!empty($id[$value])) {
                if (empty($ImagesName->news_file)) {
                    $this->model_general->deleteRowTable('tbl_news',array('id' => $value));
                } else {
                    unlink('./public/images/news/'.$ImagesName->news_file);
                    $this->model_general->deleteRowTable('tbl_news',array('id' => $value));
                }
            }
        }
        redirect('news');
    }

}