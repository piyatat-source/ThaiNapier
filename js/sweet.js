function AlreadyUseUsername(){
  Swal.fire({
    position: 'center',
    icon: 'info',
    title: 'มีคนใช้แล้ว',
    showConfirmButton: false,
    timer: 3000
  })
}






function SweetAlert(){
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'ออกจากระบบสำเร็จ',
  showConfirmButton: false,
  timer: 3000
})
  }
  function Signout()
{
  window.open("sign_out.php","_self");
}
document.getElementById("btn-signout").addEventListener("click", function() {
  SweetAlert();
  setTimeout(function(){
   window.location.href = "sign_out.php";
},3000);




});