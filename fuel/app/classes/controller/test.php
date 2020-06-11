<?php

class Controller_Test extends Controller_Rest
{
    protected $format = 'json';

    public function get_index()
    {
        $projects = Model_Contact::find('all');
        return $this->response($projects);
    }

    public function post_add(){

        $flag = true;
        $error = [];
        

        $project = new Model_Contact();

        if(isset($_POST['name']) && !empty($_POST['name']))
        {
                $project->name = $_POST['name'];
                
        }else{
            $error['name'] = "Name value is not defined";
            $flag = false;
        }

        if(isset($_POST['mobile']) && !empty($_POST['mobile']))
        {
                $project->mobile = $_POST['mobile'];
        }else{
            $error['mobile'] = "Contact no  is not set";
            $flag = false;
        }


        if($flag===true){
            $project->save();
        }


        $data = array($flag, $error,$project);
       
        
        
        return $this->response($data);

    }

    public function post_edit($id){

        $flag = true;
        $error = [];

        $project = Model_Contact::find($id);

        // var_dump($project);
        // die();

        if(!empty($_POST['name'])){
            $project->name = $_POST['name'];
        }else{
            $error['name'] = "Name value is not defined";
            $flag = false;
        }
        if(!empty($_POST['mobile'])){
            $project->mobile = $_POST['mobile'];
        }else{
            $error['mobile'] = "Contact no  is not set";
            $flag = false;
        }

        if($flag===true){
            $project->save();
        }

        $data = array($flag, $error,$project);
       
        
        
        return $this->response($data);

    }

    public function post_delete($id){

        $project = Model_Contact::find($id);

        // var_dump($project);
        // die();

        if($project!==null){
            $project->delete();
        }
    }
}