<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lokasi_model');
        $this->load->model('Proyek_model');
        $this->load->helper('url');
        $this->load->helper('form');
    }


    //======================== Lokasi ======================== 
    public function get_lokasi() {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {

            $response = $this->Lokasi_model->get_many();
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(201)
            ->set_output(json_encode($response));

        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode($response));
        }
    }

    public function tambah_lokasi() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = array(
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
            );

            $result = $this->Lokasi_model->tambah($data);
            if ($result['status'] == false) {
                $this->output->set_status_header(200);
            } else {
                $this->output->set_status_header(400);
            }

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));

        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode($response));
        }
    }

    public function update_lokasi($id_lokasi) {
        if ($this->input->server('REQUEST_METHOD') == 'PUT') {
            parse_str(file_get_contents("php://input"), $input);
            $data = array(
                'nama_lokasi' => isset($input['nama_lokasi']) ? $input['nama_lokasi'] : null,
                'negara' => isset($input['negara']) ? $input['negara'] : null,
                'provinsi' => isset($input['provinsi']) ? $input['provinsi'] : null,
                'kota' => isset($input['kota']) ? $input['kota'] : null,
            );

            $result = $this->Lokasi_model->update($id_lokasi, $data);
            if ($result['status'] == false) {
                $this->output->set_status_header(200);
            } else {
                $this->output->set_status_header(400);
            }

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));

        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode($response));
        }
    }

    public function delete_lokasi($id_lokasi) {
        if ($this->input->server('REQUEST_METHOD') == 'DELETE') {

            $response = $this->Lokasi_model->delete( $id_lokasi );
            if ($response['status']) {
                $this->output
                ->set_status_header(201);
            }else{
                $this->output
                ->set_status_header(400);
            }

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode($response));
        }
    }



    // ============= Proyek
    public function get_proyek() {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {

            $response = $this->Proyek_model->get_many();
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(201)
            ->set_output(json_encode($response));

        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode($response));
        }
    }

    public function tambah_proyek() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = array(
                'nama_proyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
                'keterangan' => $this->input->post('keterangan'),
                // Uncomment and set 'created_at' if needed
                // 'created_at' => date('Y-m-d H:i:s'),
            );

            $result = $this->Proyek_model->tambah($data);
            if ($result['status'] == true) {
                $this->output
                ->set_status_header(201) // Created
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
            } else {
                $this->output
                ->set_status_header(400) // Bad Request
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
            }
        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405) // Method Not Allowed
            ->set_output(json_encode($response));
        }
    }

    public function update_proyek($id_proyek) {
        if ($this->input->server('REQUEST_METHOD') == 'PUT') {
            parse_str(file_get_contents("php://input"), $input);
            $data = array(
                'nama_proyek' => isset($input['nama_proyek']) ? $input['nama_proyek'] : null,
                'client' => isset($input['client']) ? $input['client'] : null,
                'tgl_mulai' => isset($input['tgl_mulai']) ? $input['tgl_mulai'] : null,
                'tgl_selesai' => isset($input['tgl_selesai']) ? $input['tgl_selesai'] : null,
                'pimpinan_proyek' => isset($input['pimpinan_proyek']) ? $input['pimpinan_proyek'] : null,
                'keterangan' => isset($input['keterangan']) ? $input['keterangan'] : null,
                // Uncomment and set 'updated_at' if needed
                // 'updated_at' => date('Y-m-d H:i:s'),
            );

            $result = $this->Proyek_model->update($id_proyek, $data);
            if ($result['status'] == true) {
                $this->output
                ->set_status_header(200) // OK
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
            } else {
                $this->output
                ->set_status_header(400) // Bad Request
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
            }
        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405) // Method Not Allowed
            ->set_output(json_encode($response));
        }
    }

    public function delete_proyek($id_lokasi) {
        if ($this->input->server('REQUEST_METHOD') == 'DELETE') {

            $response = $this->Proyek_model->delete( $id_lokasi );
            if ($response['status']) {
                $this->output
                ->set_status_header(201);
            }else{
                $this->output
                ->set_status_header(400);
            }

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

        } else {
            $response = array('status' => 'Invalid request method.');
            $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode($response));
        }
    }








}



