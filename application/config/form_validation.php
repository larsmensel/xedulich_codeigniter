<?php
$config = array(
	'signup' => array(
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
							'rules' => 'required|valid_email|xss_clean|is_unique[khachhang.Email]' //user->database | email->field
						 ),
					array(
							'field' => 'captcha',
							'label' => 'Mã xác nhận',
							'rules' => 'required|xss_clean'
						)
					),
	'signin' => array(
					array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'valid_email|required|xss_clean'
						 ),
					array(
							'field' => 'password',
							'label' => 'Mật khẩu',
							'rules' => 'required'
						 )
					),	
	'admin_signin' => array(
					array(
							'field' => 'user_name',
							'label' => 'User Name',
							'rules' => 'required|xss_clean'
						 ),
					array(
							'field' => 'password',
							'label' => 'Mật khẩu',
							'rules' => 'required|xss_clean'
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
						 ),	 	 
					array(
							'field' => 'captcha',
							'label' => 'Mã xác nhận',
							'rules' => 'required|xss_clean'
						)
					),	
	'datxe_form' => array(
					array(
							'field' => 'kh_name',
							'label' => 'Tên khách hàng',
							'rules' => 'required|xss_clean'
						 ),
					array(
							'field' => 'kh_phone',
							'label' => 'Số điện thoại',
							'rules' => 'required|xss_clean'
						 ),
					array(
							'field' => 'kh_email',
							'label' => 'Email',
							'rules' => 'required|xss_clean|valid_email'
						 ),
					array(
							'field' => 'infromdate',
							'label' => 'Ngày bắt đầu thuê',
							'rules' => 'required|xss_clean'
						 ),	 
					array(
							'field' => 'qty',
							'label' => 'Số ngày thuê',
							'rules' => 'required|xss_clean'
						 ),	 
					array(
							'field' => 'infrom',
							'label' => 'Đi từ',
							'rules' => 'required|xss_clean'
						 ),		 
					array(
							'field' => 'into',
							'label' => 'Đi đến',
							'rules' => 'required|xss_clean'
						)
					),	
	'xacnhan_giohang' => array( 	 
					array(
							'field' => 'captcha',
							'label' => 'Mã xác nhận',
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