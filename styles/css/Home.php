<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
function __construct()
   {
      parent::__construct();
        $this->load->helper(array('form','url','security'));
        $this->load->library('session');
        $this->load->model('Home_m');
        $this->load->library('email');
   }
   function index()
   {
   $result['query']=$this->Home_m->select('clients');
       $this->load->view('index',$result);
   }
   function about()
   {
       $result['query']=$this->Home_m->select_order_id_desc('pdf');
       $this->load->view('aboutus',$result);
   }
   function Services()
   {
       $this->load->view('services');
   }
   function equip()
   {
       $result['query']=$this->Home_m->select('clients');
       $this->load->view('equipment',$result);
   }
   function equip1()
   {
       $this->load->view('equip1');
   }
   function equip2()
   {
       $this->load->view('equip2');
   }
   function equip3()
   {
       $this->load->view('equip3');
   }
   function equip4()
   {
       $this->load->view('equip4');
   }
   function certi()
   {
       $this->load->view('certificates');
   }
   function clients()
   {
       $result['query']=$this->Home_m->select('clients');

       $this->load->view('clients',$result);
   }
   function productsub($id)
   {
       $result['query']=$this->Home_m->select_id('products',$id);
       $this->load->view('productsub',$result);
   }
   function products()
   {
       $result['query']=$this->Home_m->select('products');
       $this->load->view('products',$result);
   }
   
   function gallery()
   {
       $result['query']=$this->Home_m->select('images');
       $this->load->view('gallery',$result);
   }
   function contact()
   {if($this->session->userdata('contact'))
   {
     $message = $this->session->userdata('contact');
     $result['contact'] = $message['message'];
     $this->load->view('contact',$result);
   }else{
       $this->load->view('contact');
       }
   }
   
   function mail()
   {
   $mobile=$this->input->post('mobile');
   $email=$this->input->post('email');
   $msg=$this->input->post('msg');
   $message="Mobile : " . $mobile. "  Email :". $email."   Message :". $msg;
       $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'smtp.routesnroots.com.',
     'smtp_port' => 465,
     'smtp_user' => 'admin@routesnroots.com', // change it to yours
     'smtp_pass' => '******', // change it to yours
     'mailtype' => 'html',
     'charset' => 'iso-8859-1',
     'wordwrap' => TRUE
  ); 
 
  $this->load->library('email', $config);
  $this->email->from('admin@routesnroots.com', "Galaxy Tours");
  $this->email->to("info@galaxyholidays.org");
  $this->email->cc("a4abyy@gmail.com");
  $this->email->subject("Request a CallBack");
  $this->email->message($message);
   
  $data['message'] = "Sorry Unable to send email..."; 
  if($this->email->send()){     
   $data['message'] = "We have received your message. We shall get back to you shortly";   
  } 
  $this->session->set_userdata('msg', $data);
       redirect('Home');
  // forward to index page
//  $this->load->view('index', $data); 
   }
   function contact_mail()
   {
   $name=$this->input->post('name');
   $mobile=$this->input->post('mobile');
   $email=$this->input->post('email');
   $msg=$this->input->post('msg');
   $message="Name : ".$name." Mobile : " . $mobile. "  Email :". $email."   Message :". $msg;
       $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'smtp.gogreensolvents.com.',
     'smtp_port' => 465,
     'smtp_user' => 'admin@gogreensolvents.com', // change it to yours
     'smtp_pass' => '******', // change it to yours
     'mailtype' => 'html',
     'charset' => 'iso-8859-1',
     'wordwrap' => TRUE
  ); 
 
  $this->load->library('email', $config);
  $this->email->from('admin@gogreensolvents.com', "GoGreenSalvents");
  $this->email->to("aby@routesnroots.com");
  $this->email->cc("info@gogreensolvents.com");
  $this->email->subject("Contact");
  $this->email->message($message);
   
  $data['message'] = "Sorry Unable to send email..."; 
  if($this->email->send()){  
  $msg_ret="We have received your message. We shall get back to you shortly";
mail($email,"Gogreensolvents.com",$msg_ret);  
   $data['message'] = "We have received your message. We shall get back to you shortly";
   
  } 
  $this->session->set_userdata('contact', $data);
       redirect('Home/contact');
  // forward to index page
//  $this->load->view('index', $data); 
   }
   
 
 
 }