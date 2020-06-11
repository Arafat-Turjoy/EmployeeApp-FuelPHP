<?php
class Controller_Employee extends Controller
{
	public function action_index()
	{
		return Response::forge(View::forge('employee/index.html'));
    }
   

}