<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn,'utf8mb4');
	$update=false;
	$id="";
	$name="";
	$id_ncc="";
	$gia="";
	$id_loaits="";
    $baohanh="";
	$mota="";
	$tinhtrang="";
	$photo="";

	if(isset($_POST['add'])){

		$id=$_POST['id'];
	    $name=$_POST['name'];
	    $id_ncc=$_POST['id_ncc'];
	    $gia=$_POST['gia'];
	    $id_loaits=$_POST['id_loaits'];
        $baohanh=$_POST['baohanh'];
	    $mota=$_POST['mota'];
	    $tinhtrang=$_POST['tinhtrang'];

		$photo=$_FILES['image']['name'];
		$upload="images/".$photo;

		$query="INSERT INTO SANPHAM(ID_TS,TENTS,ID_NCC,GIA, ID_LOAITS, BAOHANH, MOTA, TINHTRANG, ANH )VALUES(?,?,?,?, ?, ?, ?, ?, ?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssss",$id,$name,$id_ncc,$gia, $id_loaits, $baohanh,$mota, $tinhtrang ,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		header('location:sanpham.php');

		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";

	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT ANH FROM SANPHAM WHERE ID_TS=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("s",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['ANH'];//chú ý
		unlink($imagepath);

		$query="DELETE FROM SANPHAM WHERE ID_TS=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("s",$id);
		$stmt->execute();

		header('location:sanpham.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM SANPHAM WHERE ID_TS=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['ID_TS'];
		$name=$row['TENTS'];
		$id_ncc=$row['ID_NCC'];
		$gia=$row['GIA'];
        $id_loaits= $row['ID_LOAITS'];
        $baohanh= $row['BAOHANH'];
        $mota= $row['MOTA'];
        $tinhtrang= $row['TINHTRANG'];
		$photo=$row['ANH'];

		$update=true;
	}
	if(isset($_POST['update'])){

		$id=$_POST['id'];
		$name=$_POST['name'];
		$id_ncc=$_POST['id_ncc'];
		$gia=$_POST['gia'];
        $id_loaits= $_POST['id_loaits'];
        $baohanh= $_POST['baohanh'];
        $mota= $_POST['mota'];
        $tinhtrang= $_POST['tinhtrang'];
        $oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE SANPHAM SET TENTS=?,ID_NCC =?,GIA=?,ID_LOAITS =?,BAOHANH=?,
        MOTA=?,TINHTRANG=?,ANH=? WHERE ID_TS=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssss",$name,$id_ncc,$gia,$id_loaits,$baohanh,$mota,$tinhtrang,$newimage,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:sanpham.php');

	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM SANPHAM WHERE ID_TS=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['ID_TS'];
		$vname=$row['TENTS'];
		$vid_ncc=$row['ID_NCC'];
		$vgia=$row['GIA'];
        $vid_loaits=$row['ID_LOAITS'];
		$vbaohanh=$row['BAOHANH'];
		$vmota=$row['MOTA'];
		$vtinhtrang=$row['TINHTRANG'];
		$vphoto=$row['ANH'];
	}
?>
