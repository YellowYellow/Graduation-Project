var initPagination = function() {
       if (GLOBAL.pagination.pageCount <= GLOBAL.pagination.currentPage) {
           GLOBAL.pagination.currentPage = GLOBAL.pagination.pageCount;
       };

       $("#pagination").empty();
       // 上一页
       $('<li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>').appendTo($("#pagination"));

       // 中间的数据GLOBAL.pagination.pageCount
       if (GLOBAL.pagination.currentPage < 6||GLOBAL.pagination.pageCount < 10 ){
           var allpages = Math.min(GLOBAL.pagination.pageCount,10);
           for (var i = 1; i <= allpages; i++) {
               if (i == GLOBAL.pagination.currentPage) {
                   $('<li class="active"><a href="#">' + i + '</a></li>').appendTo($("#pagination"));
               } else {
                   $('<li><a href="#">' + i + '</a></li>').appendTo($("#pagination"));
               }
            }
            if(GLOBAL.pagination.pageCount>10)
           {
               $('<li><a>...</a></li>').appendTo($("#pagination"));
               $('<li><a href="#">'+GLOBAL.pagination.pageCount+'</a></li>').appendTo($("#pagination"));
           }
       }
       else if (GLOBAL.pagination.pageCount - GLOBAL.pagination.currentPage < 5){
           $('<li><a href="#">1</a></li>').appendTo($("#pagination"));
           $('<li><a>...</a></li>').appendTo($("#pagination"));
           for (var i = GLOBAL.pagination.pageCount - 9; i <= GLOBAL.pagination.pageCount; i++) {
               if (i == GLOBAL.pagination.currentPage) {
                   $('<li class="active"><a href="#">' + i + '</a></li>').appendTo($("#pagination"));
               } else {
                   $('<li><a href="#">' + i + '</a></li>').appendTo($("#pagination"));
               }
           }
       }
       else{
           $('<li><a href="#">1</a></li>').appendTo($("#pagination"));
           $('<li><a>...</a></li>').appendTo($("#pagination"));
           for (var i = GLOBAL.pagination.currentPage - 5; i <= GLOBAL.pagination.currentPage + 4; i++) {
               if (i == GLOBAL.pagination.currentPage) {
                   $('<li class="active"><a href="#">' + i + '</a></li>').appendTo($("#pagination"));
               } else {
                   $('<li><a href="#">' + i + '</a></li>').appendTo($("#pagination"));
               }
           }
           $('<li><a>...</a></li>').appendTo($("#pagination"));
           $('<li><a href="#">'+GLOBAL.pagination.pageCount+'</a></li>').appendTo($("#pagination"));
       }

       // 下一页
       $('<li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>').appendTo($("#pagination"));

       $("#pagination li a").on('click', function(e) {
           // 首尾
           if (isNaN($(this).html())) {
               if ($(this).attr('aria-label') == "Next") {
                   if (GLOBAL.pagination.currentPage == GLOBAL.pagination.pageCount) {
                       alert("对不起，已经是最后一页");
                   } else {
                       GLOBAL.pagination.currentPage += 1;
                       doSearch();
                   }
               } else {
                   if (GLOBAL.pagination.currentPage == 1) {
                       alert("对不起，已经是第一页");
                   } else {
                       GLOBAL.pagination.currentPage -= 1;
                       doSearch();
                   }
               }
           } else {
               GLOBAL.pagination.currentPage = parseInt($(this).html());
               doSearch();
           }
       });
}

var generateTableInfo = function(data,data2) {

       $(".comment_list").empty();
       if(data!=null)
       {
           for (var i = 0; i < data.length; i++) {

               var list = template('list',{
                   id:  data[i]['comment_id'],
                   comment:data[i]['comment'],
                   time:data[i]['time']
               });
               $(list).appendTo($(".comment_list"));

              for(var j=0;j<data2.length;j++)
              {
                if(data[i]['comment_id'] == data2[j]['comment_id'])
                {
                  var reply = template('reply',{
                        id:  data2[j]['reply_id'],
                        comment:data2[j]['comment'],
                        time:data2[j]['time']
                    });
                  $(reply).appendTo($("#"+data[i]['comment_id']));
                }
              }

           };
       }


      $(":button[id^='replying']").each(function(){
         $(this).click(function(){
           var id = $(this).attr('id');

          comment_id = id.substring(8);
           $("#Modal").modal();
         });
      });
       // $(this).parent().children('.code-ho').show();
   }

   var doSearch = function () {

       var searchKey =  "&id=" + barid +"&pageSize=" + GLOBAL.pagination.pageSize + "&currentPage=" + GLOBAL.pagination.currentPage;

       $.ajax({
           data: searchKey,
           url: urlPath + "/getCommentForPagination",
           dataType: "json",
           method: "POST",
           success: function(data) {
               GLOBAL.pagination.pageCount = data.data.pageCount;
               initPagination();
               generateTableInfo(data.data.data,data.data.data2);
           }
       });
   }

   var insertReply = function () {

     var reply_content= $("#reply_content").serialize();

      $.ajax({
          data: reply_content,
          url: urlPath + "/replying?bar_id="+barid+"&comment_id="+comment_id,
          dataType: "json",
          method: "POST",
          success: function(data) {
              window.location.reload();
          }
      });
   }

$(document).ready(function() {

   var _init = function() {
       initPagination();
       GLOBAL.pagination.currentPage = 1;
       doSearch();
   }

   $("#ok").click(function(){
     insertReply();
   });

   _init();
});
