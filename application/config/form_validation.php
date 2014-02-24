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
							'rules' => 'required|valid_email|xss_clean|is_unique[user.email]'
						 )
					),
	'signin' => array(
					array(
							'field' => 'user_name',
							'label' => 'Tên đăng nhập',
							'rules' => 'trim|min_length[4]|required|xss_clean'
						 ),
					array(
							'field' => 'password',
							'label' => 'Mật khẩu',
							'rules' => 'required'
						 )
					),	
	'capnhat_thongtincanhan' => array(
					array(
							'field' => 'HoTen',
							'label' => 'Họ tên',
							'rules' => 'xss_clean'
						 ),
					array(
							'field' => 'DiaChi',
							'label' => 'Địa chỉ',
							'rules' => 'xss_clean'
						 ),
					array(
							'field' => 'SDT',
							'label' => 'Số điện thoại',
							'rules' => 'xss_clean|numeric'
						)
					),		
	'doimatkhau' => array(
					array(
							'field' => 'password_old',
							'label' => 'Mật khẩu cũ',
							'rules' => 'required|xss_clean'
						 ),
					array(
							'field' => 'password_new',
							'label' => 'Mật khẩu mới',
							'rules' => 'required|xss_clean'
						 ),
					array(
							'field' => 'password_newcof',
							'label' => 'Xác nhận mật khẩu',
							'rules' => 'required|xss_clean|matches[password_new]'
						)
					),
	'lienhe' => array(
					array(
							'field' => 'name',
							'label' => 'Tên',
							'rules' => 'required|xss_clean'
						 ),
					array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|xss_clean|valid_email'
						 ),
					array(
							'field' => 'tieude',
							'label' => 'Tiêu đề',
							'rules' => 'required|xss_clean'
						 ),	 
					array(
							'field' => 'noidung',
							'label' => 'Nội dung',
							'rules' => 'required|xss_clean'
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