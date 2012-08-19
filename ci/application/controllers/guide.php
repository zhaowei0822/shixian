<?php

class Guide extends CI_Controller
{
	function design()
	{
		$this->load->view("design_view");
	}
	
    function travel()
	{
		$this->load->view("travel_view");
	}
	
	function tech()
	{
		$this->load->view("tech_view");
	}
	
	function video()
	{
		$this->load->view("video_view");
	}
	
    function photo()
	{
		$this->load->view("photo_view");
	}
	
    function music()
	{
		$this->load->view("music_view");
	}
	
	function game()
	{
		$this->load->view("game_view");
	}
	
    function publish()
	{
		$this->load->view("publish_view");
	}
	
    function other()
	{
		$this->load->view("other_view");
	}
}
?>