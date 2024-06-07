<?php 

class TemplateFitur_model extends CI_Model{


    public function get_many( $where = [] ){
        // $where itu adalah array associatif [ "nama_kolom" => "value" ]
        // Mengembalikan 2 dimensi dengan banyak data dengan method ->result_array()

        //Where disini bertindak sebagai filter dengan logika AND yang optional atau jika misalnya tidak ada where data tetap diambil tanpa filter
        foreach ($where as $key_kolom => $value) {
            $this->db->where($key_kolom, $value);
        }

        $this->db->order_by('waktu', 'DESC');  // Mengurutkan berdasarkan kolom waktu yang kolom waktunya terbaru

        $result = $this->db->get('data_template_fitur')->result_array();
        if ( $result == null ) {
            $result = [];
        }
        return $result; //Mengembalikan pasti array multi dimensi,
    }
    public function get_single( $where = []   ){
        // $where itu adalah array associatif [ "nama_kolom" => "value" ]
        // Jadi untuk mengambil single ini harus ada kondisi, gak boleh tidak ada 
        //Mengembalikan 1 dimensi dengan methode ->row_array()

        if ( count($where) > 0 ) {
                    //Jika ada kondisinya 
            foreach ($where as $key => $value) {
                $this->db->where( $key, $value );
            }

            $this->db->order_by('id_template_fitur', 'ASC');

            $result = $this->db->get('data_template_fitur')->row_array(); 
        }else{
            $result = [];
        }

        if ( $result == null ) {
            $result = [];
        }
        return $result; //Mengembalikan pasti array 1 dimensi,

    }
    public function tambah(){
        $response = [];
        $nama_template = $this->input->post('nama_template');
        
        //Cek dulu, apakah nama template sudah digunakan atau belum 
        $cek_nama = $this->get_single( ['nama_template' => $nama_template ] );

        if ( empty($cek_nama) ) {
            // Jika nama template belum digunakan, maka upload filenya
            $upload_file = $this->upload_template();
            if ( $upload_file['status'] ) {
                 //jika upload file berhasil, maka tambahkan ke database
                $file_template = $upload_file['nama_file'];
                $data = array(
                    'id_template_fitur' => null,
                    'file_template' =>  $file_template,
                    'nama_template' =>  $nama_template,
                    'waktu' => $this->Base_model->waktu(),
                    'status' => $this->Base_model->status(),
                );
                $tambah_data = $this->db->insert('data_template_fitur', $data);
                if ( $tambah_data == true ) {
                    $response['status'] = true ;
                    $response['msg'] = "Template berhasil ditambahkan";
                }else{
                    $response['status'] = false;
                    $response['msg'] = "Template gagal ditambahkan, masalah query!!";
                }

            }else{
                $response['status'] = false;
                $response['msg'] = "Gagal upload template <br> " . $upload_file['msg'];
            }
        }else{
            // Jika nama template sudah digunakan
            $response['status'] = false;
            $response['msg'] = "Nama template sudah digunakan";
        }



        return $response;
    }

    public function upload_template() {
        $config['upload_path'] = 'application/views/template_data/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 100; // maksimum ukuran file dalam KB

        $file_name = $_FILES["upload_file_template"]["name"]; //Nama file lengkap dengan eksistensi

        $nama_file_baru = uniqid() .  $file_name;
        $config['file_name'] = $nama_file_baru;

        $this->load->library('upload', $config);

        $response =  []; 
        if ( $this->upload->do_upload('upload_file_template') == true ) {
            $response['status'] = true;
            $response['msg'] = "Berhasil mengupload template fitur!!";
            $response['nama_file'] = $nama_file_baru;
        } else {
            $response['status'] = false;
            $response['msg'] = $this->upload->display_errors();
        }

        return $response;
    }

}