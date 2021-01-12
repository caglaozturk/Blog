<?php
namespace BigBear\Controller;

use BigBear\System\{AdminController,Loader};

class SettingController extends AdminController
{
    public function index(){
        $request = Loader::loadModel('Setting');
        $response = $request->getAllSettings();
        $this->render('listSettings', ['settings' => $response]);
    }

    public function create(){
        $this->render('addSetting');
    }

    public function edit($id)
    {
        $request = Loader::loadModel('Setting');
        $response = $request->getSetting($id);
        $this->render('updateSetting', ['setting' => $response]);
    }

    public function update(){
        $id = $this->input->get('id');
        $request = Loader::loadModel('Setting');
        $response = $request->update($_POST);
        $this->render('updateSetting', ['setting' => $response]);
    }
}
