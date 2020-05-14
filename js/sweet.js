
function Signout(){
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'ออกจากระบบสำเร็จ',
  showConfirmButton: false,
  timer: 3000
})
}
function warningtoSignin(){
  Swal.fire({
    icon: 'error',
    title: 'ผิดพลาด',
    text: 'กรุณาลงชื่อเข้าใช้ก่อนลงทะเบียน',
    showConfirmButton: false,
timer: 2500
})
}





document.getElementById("btn-reg").addEventListener("click", function() {

  if(sessionNum==""){
    warningtoSignin();
  }else{
    window.location.href = "regis_farm.php";
  }
  
  
  // SweetAlert();
  
});

document.getElementById("btn-signout").addEventListener("click", function() {
  Signout();
  setTimeout(function(){
   window.location.href = "sign_out.php";
},3000);
});