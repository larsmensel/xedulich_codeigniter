<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=reportdata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php 
	foreach($results as $result){
		$id_giohang		=	$result->id_giohang;
		$TenKH			=	$result->TenKH;
		$SDT			=	$result->SDT;
		$Email			=	$result->Email;
		$TenXe			=	$result->TenXe;
		$NgayThue		=	$result->NgayThue;
		$SoNgay			=	$result->SoNgay;
		$Tu				=	$result->Tu;
		$Den			=	$result->Den;
		$TongTien		=	$result->TongTien;
		$TinhTrang		=	$result->TinhTrang;
	}
?>
<table border='1'>
  <tr>
    <td>TenKH</td>
    <td>SDT</td>
    <td>Email</td>
    <td>TenXe</td>
    <td>NgayThue</td>
    <td>SoNgay</td>
    <td>Tu</td>
    <td>Den</td>
    <td>TongTien</td>
    <td>TinhTrang</td>
  </tr>
  <tr>
    <td><?php echo $TenKH; ?></td>
    <td><?php echo $SDT; ?></td>
    <td><?php echo $Email; ?></td>
    <td><?php echo $TenXe; ?></td>
    <td><?php echo $NgayThue; ?></td>
    <td><?php echo $SoNgay; ?></td>
    <td><?php echo $Tu; ?></td>
    <td><?php echo $Den; ?></td>
    <td><?php echo $TongTien; ?></td>
    <td><?php echo $TinhTrang; ?></td>
  </tr>
</table>