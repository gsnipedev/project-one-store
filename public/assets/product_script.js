console.log("connected");
var commentingStatus = false;
var commentIds;
var tempReply;
var cmt_text;
$(document).ready(function () {
  $(".size-list").mouseenter(function () {
    $(this).children().css("cursor", "pointer");
    $(this)
      .children()
      .click(function (e) {
        e.preventDefault();
        console.log("clicked", $(this).html());
        $(this).parent().children().removeClass("bg-dark");
        $(this).parent().children().removeClass("text-light");
        $(this).parent().children().addClass("text-dark");
        $(this).parent().children().addClass("bg-light");
        //$(this).removeClass("bg-dark");
        $(this).removeClass("text-dark");
        $(this).addClass("bg-dark");
        $(this).addClass("text-light");
      });
  });

  $(".submit-comment.....DISABLE").click(function (e) {
    e.preventDefault();
    console.log($(this).html());
    $(".comments-section").prepend(`
    <div class="container mb-5">
            <div class="row">
                <div class="col-2 col-md-1">
                    <img src="https://picsum.photos/200/200" alt="" width="50" height="50"
                        class="border rounded-circle thumbnail">
                </div>
                <div class="col-10 col-md-5 d-flex align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <p class="font-rubik">Do you have the Yellow one?</p>

                        </div>

                        <div class="col-12 bg-light p-3 rounded-3">
                            <p class="roboto-condensed">Reply from seller</p>
                            <p class="font-rubik">Kamu tahu kenapa HP sekarang namanya smartphone? karena penggunanya
                                Stuppid</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    `);
  });
});

//https://imgflip.com/i/6dn4af

var total_comment;

$.ajax({
  type: "GET",
  url: "http://localhost:8080/commentapi",
  //dataType: "dataType",
  success: function (response) {
    data = response.respond;
    total_comment = Object.keys(data).length;
    try {
      rank = response.status[0].rank;
    } catch (error) {
      rank = "null";
    }
    comments = "";
    // $(".comment-counter").prepend(total_comment);
    $.each(data, function (indexInArray, valueOfElement) {
      comments += `
       
       

        <div class="container mb-5">
            <div class="row">
                <div class="col-2 col-md-1">
                    <img src="${valueOfElement.img_url}" alt="" width="50" height="50"
                        class="border rounded-circle thumbnail">
                </div>
                <div class="col-10 col-lg-5">
                    <div class="row">
                        <div class="col-10 col-md-11  comment-text-container-primary-${valueOfElement.comment_id}">
                            <p class="roboto-condensed fs-6">${valueOfElement.username}
                              ${
                                valueOfElement.rank == "admin"
                                  ? `<span class="badge rounded-pill bg-secondary font-rubik">${valueOfElement.rank}</span>`
                                  : ``
                              }
                              
                            </p>          
                            <p class="font-rubik text-break">${valueOfElement.comment_text}</p>
                        </div>

                        <div class="col-1" >
                            <div class="btn-group">
                                <button type="button" class="rounded dropdown-toggle-split" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="background-color: white; border:none">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>

                                </button>
                                <ul class="dropdown-menu">
                                    ${
                                      rank == "admin"
                                        ? `<li><a class="dropdown-item adminReplyComment" value="${valueOfElement.comment_id}" valueRly="${valueOfElement.reply_text}" href=""><i class="fa-solid fa-comment-dots"></i> Reply</a></li>`
                                        : ""
                                    }
                                    
                                    

                                    ${
                                      valueOfElement.username == response.username || rank == "admin"
                                        ? `<li><a class="dropdown-item delete-comment" value="${valueOfElement.comment_id}" href=""><i class="fa-solid fa-trash-can"></i> Delete</a></li>
                                        <li><a class="dropdown-item edit-comment" value="${valueOfElement.comment_id}" href=""><i class="fa-solid fa-pencil"></i> Edit</a></li>`
                                        : `<li><a class="dropdown-item" value="${valueOfElement.comment_id}" href="" ><i class="fa-solid fa-flag text-dark"></i> Report</a></li>`
                                    }

                                    


                                </ul>
                            </div>

                        </div>
                        <hr>

                        ${
                          valueOfElement.reply_id != null
                            ? `
                          <div class="col-12 for-comment-${
                            valueOfElement.comment_id
                          } bg-light p-3 rounded-3 reply-from-seller-box">
                              <p class="roboto-condensed">Reply from seller</p>
                              <p class="font-rubik uiCommentText-${valueOfElement.comment_id}">${
                                valueOfElement.reply_id != null
                                  ? valueOfElement.reply_text
                                  : "What you trying to find here mate?"
                              }</p>
                          </div>
                          
                          `
                            : `
                             <div class="col-12 for-comment-${valueOfElement.comment_id} bg-light p-3 rounded-3 reply-from-seller-box d-none">
                                
                             </div>
                             
                             `
                        }
                        

                        


                    </div>

                </div>
            </div>

        </div>
       
       `;
    });
    $(".comments-section").html(comments);
    $(".comment-counter").prepend(total_comment);
    $(".delete-comment").click(function (e) {
      e.preventDefault();
      commentId = $(this).attr("value");
      console.log($(this).parent().parent().parent().parent().parent().parent().parent().parent().remove());
      $.ajax({
        type: "DELETE",
        url: `http://localhost:8080/commentapi/${commentId}`,
        // data: {
        //   comment_id: commentId,
        // },
        //dataType: "dataType",
        success: function (response) {},
      });
    });
    $(".edit-comment").click(function (e) {
      e.preventDefault();
      if (commentingStatus === true) {
        return;
      }
      commentingStatus = true;
      commentIds = $(this).attr("value");
      $(`.comment-text-container-primary-${commentIds}`).append(`
      <div class="mb-3">
         <textarea type="text" class="form-control" rows="3" placeholder="Edit"></textarea>
      </div>
      <div class="mb-3">
        <button type="button" class="btn btn-light text-dark user-cancel-edit">Cancel</button>
        <button type="submit" class="btn btn-dark user-submit-edit">Submit</button>
      </div>

      `);
      $(".user-cancel-edit").click(function (e) {
        e.preventDefault();
        commentingStatus = false;
        $(`.comment-text-container-primary-${commentIds}`).children(":nth-child(4)").remove();
        $(`.comment-text-container-primary-${commentIds}`).children(":nth-child(3)").remove();
      });
      $(".user-submit-edit").click(function (e) {
        e.preventDefault();
        cmt_text = $(`.comment-text-container-primary-${commentIds}`)
          .children(":nth-child(3)")
          .children(":nth-child(1)")
          .val();
        console.log(cmt_text);
        $.ajax({
          type: "GET",
          url: `http://localhost:8080/commentapi/${commentIds}/edit
          `,
          data: {
            commentText: cmt_text,
          },
          //dataType: "dataType",
          success: function (response) {
            console.log("comment edited to " + cmt_text);
            window.location.reload();
          },
        });
      });
    });
    $(".adminReplyComment").click(function (e) {
      e.preventDefault();
      if (commentingStatus == true) {
        return;
      }
      commentingStatus = true;
      commentIds = $(this).attr("value");
      console.log(commentIds);
      tempReply = $(`.uiCommentText-${commentIds}`).html();
      console.log(tempReply);
      if (tempReply == undefined) {
        $(`.for-comment-${commentIds}`).removeClass("d-none");
      }
      $(`.for-comment-${commentIds}`).html(
        `
        <div class="temp-form-for-${commentIds}"> 
          <div class="input-group mb-3">
              <textarea type="text" class="form-control adminReplyText" placeholder="Reply" rows="5"></textarea>
          </div>
          <div class="input-group mb-3 roboto-condensed">
            <button type="button" class="btn btn-light text-dark adminCommentReplyCancel">Cancel</button>
            <button type="submit" class="btn btn-dark adminCommentReplySubmit">Submit</button>
          </div>
        </div>
          
        
        `
      );
      $(".adminCommentReplyCancel").click(function (e) {
        e.preventDefault();
        if (tempReply == undefined) {
          $(`.for-comment-${commentIds}`).addClass("d-none");
        }
        $(this)
          .parent()
          .parent()
          .parent()
          .html(`<p class="roboto-condensed">Reply from seller</p><p class="font-rubik">${tempReply}</p>`);
        commentingStatus = false;
        console.log(commentingStatus);
      });
      $(".adminCommentReplySubmit").click(function (e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "http://localhost:8080/commentapi",
          data: {
            commentId: commentIds,
            reply_text: $(".adminReplyText").val(),
            req: "reply",
          },
          //dataType: "dataType",
          success: function (response) {
            commentingStatus = false;
            $(`.temp-form-for-${commentIds}`).html(
              `
              
                  <p class="roboto-condensed">Reply from seller</p>
                  <p class="font-rubik uiCommentText-${commentIds}">${$(".adminReplyText").val()}</p>
              
              
              `
            );
            window.location.reload(true);
          },
          error: function () {
            commentingStatus = false;
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "That comment has been replied!",
            });
          },
        });
      });
    });
  },
});

$(document).ready(function () {
  var toastTrigger = document.getElementById("cart-button");
  var toastCartNotification = document.getElementById("cart-notification");
  if (toastTrigger) {
    toastTrigger.addEventListener("click", function () {
      var toast = new bootstrap.Toast(toastCartNotification);

      toast.show();
    });
  }
});
