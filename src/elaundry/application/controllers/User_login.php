<?php /** @noinspection ALL */
if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('date.timezone', 'Asia/jakarta');

class User_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_user_login', 'M_departemen', 'M_jabatan', 'M_group_user'));

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    function index()
    {
        $user_id    = $this->session->userdata('user_id');
        $group_user = $this->M_user_login->getDeptByUserID($user_id);
        if ($group_user == 'HRD/PMH - PIMPINAN') {
            $data['getUser'] = $this->M_user_login->selectLaundry();
        } else {
            $data['getUser'] = $this->M_user_login->select();
            // var_dump($data['getUser']);die;
        }
        // print_r($data['getUser']);
        // exit;
        $data['user_id'] = $this->session->userdata('user_id');
        $this->template->display('utility/user_login/index', $data);
    }

    function input()
    {
        $user_id = $this->session->userdata('user_id');
        $group_user = $this->M_user_login->getDeptByUserID($user_id);
        if ($group_user == 'PSN/PMH - PIMPINAN') {
            $data['getDept']  = $this->M_departemen->list_departemen_laundry();
            $data['getJab']   = $this->M_jabatan->list_jabatan();
            $data['getGroup'] = $this->M_group_user->select_laundry();
        } else {
            $data['getDept']  = $this->M_departemen->list_departemen();
            // var_dump($data['getDept']);die;
            $data['getJab']   = $this->M_jabatan->list_jabatan();
            $data['getGroup'] = $this->M_group_user->select();
        }

        $this->template->display('utility/user_login/input', $data);
    }

    function save()
    {
        $data = array(
            'LoginID'        => trim(strtolower($this->input->post('LoginID'))),
            'nik'            => strtoupper($this->input->post('NIK')),
            'NamaUser'       => strtoupper($this->input->post('Nama')),
            'LoginPassword'  => md5(sha1($this->input->post('Password'))),
            'DeptID'         => $this->input->post('DeptID'),
            'JabID'          => $this->input->post('JabID'),
            'GroupID'        => $this->input->post('GroupID'),
            'status_petugas' => $this->input->post('Petugas'),
            'NotActive'      => $this->input->post('InActive'),
            'CreatedBy'      => strtoupper($this->session->userdata('user_name')),
            'CreatedDate'    => date('Y-m-d H: i: s'),
            'personalid'    => strtoupper($this->input->post('RegFixNo')),
            'telegramid'    => strtoupper($this->input->post('telegramid')),
            'personalstatus'    => strtoupper($this->input->post('personalstatus'))
        );
        // print_r($data);
        // exit();
        $result = $this->M_user_login->save($data);

        if (!$result) {
            redirect('User_login/?msg=success');
        } else {
            redirect('User_login/?msg=failed');
        }
    }

    function update()
    {
        $id               = $this->uri->segment(3);
        $data['getUser']  = $this->M_user_login->get($id);

        $user_id = $this->session->userdata('user_id');
        $group_user = $this->M_user_login->getDeptByUserID($user_id);
        // if ($group_user == 'LAUNDRY-PIMPINAN' || $group_user == 'PSN/PMH - PIMPINAN') {
        if ($group_user == 'PSN/PMH - PIMPINAN') {
            $data['getDept']  = $this->M_departemen->list_departemen_laundry();
            $data['getJab']   = $this->M_jabatan->list_jabatan();
            $data['getGroup'] = $this->M_group_user->select_laundry();

            // print_r( $data['getGroup']); die()
        } else {
            $data['getDept']  = $this->M_departemen->list_departemen();
            $data['getJab']   = $this->M_jabatan->list_jabatan();
            $data['getGroup'] = $this->M_group_user->select();
        }

        $this->template->display('utility/user_login/update', $data);
    }

    function saveupdate()
    {
        $data = array(
            'NamaUser'       => strtoupper($this->input->post('NamaUser')),
            'DeptID'         => $this->input->post('DeptID'),
            'JabID'          => $this->input->post('JabID'),
            'GroupID'        => $this->input->post('GroupID'),
            'status_petugas' => $this->input->post('Petugas'),
            'NotActive'      => $this->input->post('InActive'),
            'UpdateBy'       => strtoupper($this->session->userdata('user_name')),
            'UpdateDate'     => date('Y-m-d H: i: s')
        );
        $userID = $this->input->post('LoginID');

        $result = $this->M_user_login->update($userID, $data);

        if (!$result) {
            redirect('User_login/?msg=success');
        } else {
            redirect('User_login/?msg=failed');
        }
    }

    function delete()
    {
        $id = $this->uri->segment(3);

        $result = $this->M_user_login->delete($id);

        if (!$result) {
            redirect('User_login/?msg=success');
        } else {
            redirect('User_login/?msg=failed');
        }
    }

    function ubahPassword()
    {

        $this->template->display('utility/user_login/ubahPassword');
    }

    function resetPassword()
    {
        $data = array(
            'LoginPassword' => md5(sha1(123)),
            'UpdateBy'     => strtoupper($this->session->userdata('user_id')),
            'UpdateDate'   => date('Y-m-d H:i:s')
        );
        $userID = $this->uri->segment(3);

        $result = $this->M_user_login->ubahPassword($userID, $data);
        if (!$result) {
            // echo $userID;
            redirect('user_login/?msg=success');
        } else {
            redirect('user_login/?msg=failed');
        }
    }

    function updatePassword()
    {

        $id = $this->input->post('LoginID');
        // echo $id;
        $getUser = $this->M_user_login->get($id);
        foreach ($getUser as $row) :
            // if($this->input->post('simpan')){
            $oldPass =  md5(sha1($this->input->post('OldPass')));

            if ($oldPass == $row->LoginPassword) {
                // echo $oldPass;
                $userID = strtoupper($this->session->userdata('user_id'));
                $data = array(
                    'LoginPassword' => md5(sha1($this->input->post('passnew'))),
                    'UpdateBy'      => strtoupper($this->session->userdata('user_id')),
                    'UpdateDate'    => date('Y-m-d H:i:s')
                );
                $this->M_user_login->updatePassword($userID, $data);

                // $this->session->set_flashdata('success', 'Berhasil disimpan');
                // redirect('user_login/ubahPassword');
                redirect('user_login/ubahPassword?msg=success');
                echo $oldPass;
            } else {
                echo "test";
                // echo $oldPass;
                redirect('user_login/ubahPassword?msg=failed');
            }
        // }else{
        //     echo "markona";
        // }
        endforeach;
    }

    function ChangePassword_old() {
        $id         = $this->input->post('LoginID');
        $personID   = $this->input->post('PersonalID');

        $data = $this->M_user_login->getUserChangePass($id, $personID);

        if ($data) {
            $personID   = $this->input->post('PersonalID');
            $change = array(
                'LoginPassword' => md5(sha1($_POST['PassBaru'])),
                'UpdateBy'      => strtoupper($this->session->userdata('user_id')),
                'UpdateDate'    => date('Y-m-d H:i:s')
            );
            $data = $this->M_user_login->UpdateChangePass($change, $personID);
            if($data){
				//ini password berhasil diganti
				echo 1;
			} else {
				//ini password gagal diganti
				echo 0;
			}
        } else {
            //ini password lama salah
			echo 0;
        }
    }

    function ChangePassword() {
        $LoginID    = $_POST['LoginID'];
        $Password   = md5(sha1($_POST['PassLama']));
        $personID   = $_POST['PersonalID'];

        $data = $this->M_user_login->checkUser($LoginID, $Password, $personID);

        if (count($data) > 0) {
            $personID   = $this->input->post('PersonalID');
            $id         = strtoupper($this->session->userdata('user_id'));
            // $LoginPassword = md5(sha1($_POST['PassBaru']));
            // $UpdateBy      = strtoupper($this->session->userdata('user_id'));
            // $UpdateDate    = date('Y-m-d H:i:s');

            $change = array(
                'LoginPassword' => md5(sha1($_POST['PassBaru'])),
                'UpdateBy'      => strtoupper($this->session->userdata('user_id')),
                'UpdateDate'    => date('Y-m-d H:i:s')
            );
            $result = $this->M_user_login->UpdatePasswordBy($id, $personID, $change);
            if(count($result) > 0){
				//ini password berhasil diganti
                $hasil = array(
                    'status'  => true,
                    'vstatus' => 'Success',
                    'pesan'   => "Berhasil Menganti password",
                    'data'    => $result,
                );
				// echo 1;
			} else {
				//ini password gagal diganti
                $hasil = array(
                    'status'  => false,
                    'vstatus' => 'gagal',
                    'pesan'   => "Password gagal diganti",
                );
				// echo 0;
			}
            echo json_encode($hasil);
        } else {
           //ini password lama salah
			echo 2;
        }
    }
}
