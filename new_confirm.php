<?PHP
	include 'lib.php';
	
		#-----전화번호를 형식에 맞게 만듭니다(000-0000-0000)-----#
		if (strlen($mem_tel1) < 3)
		$mem_telephone = "0" . $mem_tel1;
		else 
		$mem_telephone = $mem_tel1;
			
		if (strlen($mem_tel2) < 4)
			$mem_telephone .= "0" . $mem_tel2 . $mem_tel3;
		else 
			$mem_telephone .= $mem_tel2 . $mem_tel3;

		#-----우편번호를 형식에 맞게 만듭니다(000-000)-----#
		$mem_zipcode = $mem_zip1 . $mem_zip2;
	

		#-----현재날짜를 형식에 맞게 만듭니다(2000-00-00)-----#
		$cur_date = getdate();
		$mem_date = $cur_date['year'];
	
		if ($cur_date['mon'] < 10)
			$mem_date .= "-0" . $cur_date['mon'];
		else
			$mem_date .= "-" . $cur_date['mon'];
	
		if ($cur_date['mday'] < 10)
			$mem_date .= "-0" . $cur_date['mday'];
		else
			$mem_date .= "-" . $cur_date['mday'];

		$mem_pass = password_hash($mem_pass, PASSWORD_DEFAULT);
	
	#-----새로운 멤버를 삽입하는 질의-----#
	$stmt = "insert into member_tab SET mem_id=?, mem_password=?, mem_email=?, mem_name=?,mem_zipcode=?, mem_address=?, mem_telephone=?, mem_date=?";
	$stmt = mysqli_prepare($conn, $stmt);
	mysqli_stmt_bind_param($stmt, "ssssssss", $mem_id, $mem_pass, $mem_email, $mem_name, $mem_zipcode, $mem_address, $mem_telephone, $mem_date);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	
		#-----질의가 제대로 되었는지를 확인-----#
		if ($result == 0)
		{
			echo("
				<script>
					window.alert('다시한번 확인해 주세요');
					history.go(-1);
				</script>
			");
		}
		else
		{
			echo("
				<script>
					window.alert('회원가입이 완료되었습니다.');
					location.replace('./login.php');
				</script>
			");
		}
	?>
