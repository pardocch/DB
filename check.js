<script>
function checkform(){
	var route=document.getElementById("routeList").value;
	var name=document.getElementById("C_name").value;
	var tel=document.getElementById("C_tel").value;
	var mail=document.getElementById("C_mail").value;
	
	if(route !="" && name!="" && tel!="" && mail!=""){
		sendmail.php;
	}else{
		alert("請確認下列欄位是否都已填寫:\n1.預約路線\n2.姓名\n3.電話\n4.Eamil");
	}
}
</script>