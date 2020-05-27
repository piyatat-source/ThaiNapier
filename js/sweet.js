function Signout() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "ออกจากระบบสำเร็จ",
    showConfirmButton: false,
    timer: 3000,
  });
}

function AlerdyUse() {
  Swal.fire({
    position: "center",
    icon: "error",
    title: "มีผู้ใช้งานบัญชีนี้แล้ว",
    showConfirmButton: false,
    timer: 3000,
  });
}

function warningtoSignin() {
  Swal.fire({
    icon: "error",
    title: "ผิดพลาด",
    text: "กรุณาลงชื่อเข้าใช้ก่อนลงทะเบียน",
    showConfirmButton: false,
    timer: 2500,
  });
}

document.getElementById("btn-reg").addEventListener("click", function () {
  if (sessionNum == "") {
    warningtoSignin();
  } else {
    window.location.href = "regis_farm.php";
  }
});

function signout() {
  // var btnsignout = document.getElementById("btn-btnsignout");
  // btnsignout.addEventListener("click", function () {
  Signout();
  setTimeout(function () {
    window.location.href = "sign_out.php";
  }, 3000);
}

function confirmation(ev) {
  ev.preventDefault();
  var urlToRedirect = ev.currentTarget.getAttribute("href");
  var name = ev.currentTarget.getAttribute("value");
  // console.log(urlToRedirect);
  // console.log(name); // verify if this is the right URL
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn-alert-condelete",
      cancelButton: "btn-alert-cancle",
    },
    buttonsStyling: false,
  });

  swalWithBootstrapButtons
    .fire({
      title: "ยืนยันการลบ",
      text: 'คุณต้องการลบ  "' + name + '"   ใช่หรือไม่?',
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "ยืนยัน",
      focusConfirm: false,
      cancelButtonText: "ยกเลิก",
      reverseButtons: false,
    })
    .then((result) => {
      if (result.value) {
        window.location.href = urlToRedirect;
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        //Canclced
      }
    });
}
