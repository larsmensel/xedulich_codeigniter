<?php
$config = array(
 'signup' => array(
					array(
							'field' => 'user_name',
							'label' => 'Tên đăng nhập',
							'rules' => 'trim|min_length[4]|required|xss_clean|is_unique[user.username]' //user->database | username->field
						 ),
					array(
							'field' => 'password',
							'label' => 'Mật khẩu',
							'rules' => 'required'
						 ),
					array(
							'field' => 'passconf',
							'label' => 'Mật khẩu xác nhận',
							'rules' => 'required|matches[password]'
						 ),
					array(
							'field' => 'email_address',
							'label' => 'Email',
							'rules' => 'required|valid_email'
						 )
					),
 'email' => array(
					array(
							'field' => 'emailaddress',
							'label' => 'EmailAddress',
							'rules' => 'required|valid_email'
						 ),
					array(
							'field' => 'name',
							'label' => 'Name',
							'rules' => 'required|alpha'
						 ),
					array(
							'field' => 'title',
							'label' => 'Title',
							'rules' => 'required'
						 ),
					array(
							'field' => 'message',
							'label' => 'MessageBody',
							'rules' => 'required'
						 )
					)                          
);
?>