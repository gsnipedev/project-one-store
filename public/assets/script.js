$(document).ready(function () {
  //dangerNotLoginShow();
});

$(".pp-button").click(function (e) {
  e.preventDefault();
  $(".profile-dd").slideToggle("slow");
});

$(".pp-button").mouseenter(function () {
  $(this).addClass("bg-info");
  $(this).addClass("text-light");
});

$(".pp-button").mouseleave(function () {
  $(this).removeClass("bg-info");
  $(this).removeClass("text-light");
  //$(".profile-dd").slideUp();
});
$($(".profile-dd-list-group").children()).mouseenter(function () {
  $(this).css("cursor", "pointer");
  $(this).mouseenter(function () {
    $(this).addClass("bg-info");
    $(this).addClass("text-light");
  });
  $(this).mouseleave(function () {
    $(this).removeClass("bg-info");
    $(this).removeClass("text-light");
  });
});

function onSuccess(googleUser) {
  var profile = googleUser.getBasicProfile();
  var id_token = googleUser.getAuthResponse().id_token;
  console.log("ID: " + profile.getId()); //jangan pakai ini untuk back-end
  console.log("Name: " + profile.getName());
  console.log("Image URL: " + profile.getImageUrl());
  console.log("Email: " + profile.getEmail()); // This is null if the 'email' scope is not present.
  console.log("id token: " + id_token);
  //successLoginNotification((profileName = profile.getName()));

  $.ajax({
    type: "POST",
    url: "/useraccountapi/tokensignin",
    data: {
      token: id_token,
      profileName: profile.getName(),
      profileImage: profile.getImageUrl(),
      profileEmail: profile.getEmail(),
    },

    success: function (response) {
      console.log("success ajax");
    },
    error: function () {
      console.log("error ajax");
    },
  });

  // $("#my-signin2").addClass("invisible");
  // $(`

  // <div class="user-profile-ui position-sticky">
  //                   <button type="button" class="btn font-rubik pp-button">
  //                       <img src="${profile.getImageUrl()}" alt="" class="rounded-circle" height="30" width="30" referrerpolicy="no-referrer">
  //                       ${profile.getName()}
  //                   </button>

  //                   <div class="profile-dd position-absolute mt-3 bg-dark text-light rounded-bottom font-rubik"
  //                       style="display: none; width:100%">
  //                       <ul class="list-group profile-dd-list-group">
  //                           <li class="list-group-item">Profile</li>
  //                           <li class="list-group-item">My Cart</li>
  //                           <li class="list-group-item">Setting</li>
  //                           <li class="list-group-item">Theme</li>
  //                           <li class="list-group-item" onclick="signOut()">Logout</li>
  //                       </ul>

  //                   </div>
  //               </div>

  // `).insertAfter(".target7781");
}

function onFailure(error) {
  console.log(error);
}
function renderButton() {
  gapi.signin2.render("my-signin2", {
    scope: "profile email",
    height: 40,
    width: 280,
    longtitle: true,
    theme: "light",
    onsuccess: onSuccess,
    onfailure: onFailure,
  });
}

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    console.log("User signed out.");
  });
}

function promotionShow() {
  $(document.body).prepend(`
  
    <div class="alert alert-info font-rubik " role="alert" style="display:none">
    <div class="container">
    <i class="fa-solid fa-circle-check"></i> Jangan sampai terlewat dengan diskon hari ini!, klik disini untuk menutup notifikasi.
    </div>  
  </div>
  `);

  $(".alert").slideDown("slow");

  $(".alert").click(function (e) {
    e.preventDefault();
    $(this).slideUp("slow");
  });

  setTimeout(() => {
    $(".alert").slideUp("slow");
  }, 10000);
}

function successLoginNotification() {
  $(document.body).prepend(`
  
    <div class="alert alert-success font-rubik fixed-top" role="alert" style="display:none">
    <div class="container">
      <i class="fa-solid fa-circle-check"></i> Selamat Datang ${profileName}!, klik disini untuk menutup notifikasi.
    </div>  
  </div>
  `);

  $(".alert").slideDown("slow");

  $(".alert").click(function (e) {
    e.preventDefault();
    $(this).slideUp("slow");
  });
}

function dangerNotLoginShow() {
  $(document.body).prepend(`
  
    <div class="alert alert-danger font-rubik" role="alert" style="">
    <div class="container">
        <i class="fa-solid fa-circle-exclamation"></i> Youre not login yet!, please login first.
    </div>  
  </div>
  `);

  //$(".alert").slideDown("slow");
}

function dangerxxxxx() {
  $(document.body).prepend(`
  
    <div class="alert alert-danger font-rubik" role="alert" style="">
    <div class="container">
        <i class="fa-solid fa-circle-exclamation"></i> Youre not login yet!, please login first.
    </div>  
  </div>
  `);
}
