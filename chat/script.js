(function () {
  var group = $(".out");
  var receivename;

  group.each(function () {
    var _group = new GroupTon(this);
  });

  function GroupTon(groupElement) {
    var box = $(groupElement).find(".cheting_list_d"); //chet_banner;

    box.each(function (idx) {
      var newBox = new RootBox(this);
    });
  }

  function RootBox(boxElement) {
    var _this = this;
    var boxEl = $(boxElement);
    var target = $(boxEl).find(".idfind");
    var targetname = $(boxEl).find(".chating_list_d_name");

    target.on("click", ClickEvent);

    function ClickEvent() {
      //reload();
      //receivename = target.val();
      //targetnameck = targetname.attr("value");

      window.localStorage.removeItem("receive");
      window.localStorage.removeItem("targetnameck");
      window.localStorage.setItem("receive", target.val());
      window.localStorage.setItem("targetnameck", targetname.attr("value"));
      reload();
    }
  }

  group.each(function () {
    var _group = new GroupFon(this);
  });

  function GroupFon(groupElement) {
    var square = $(groupElement).find(".cheting_list_d_c"); //chet_banner;

    square.each(function (idx) {
      var newSquare = new Rootsquare(this);
    });
  }

  function Rootsquare(squareElement) {
    var _this = this;
    var squareEl = $(squareElement);
    var target = $(squareEl).find(".idfind");
    var targetname = $(squareEl).find(".chating_list_d_name");
    target.on("click", ClickEvent);

    function ClickEvent() {
      window.localStorage.removeItem("receive");
      window.localStorage.removeItem("targetnameck");
      window.localStorage.setItem("receive", target.val());
      window.localStorage.setItem("targetnameck", targetname.attr("value"));
      reload();
      //receivename = target.val();
      //targetnameck = targetname.attr("value");
    }
  }

  var key1 = window.localStorage.key(1);
  var key2 = window.localStorage.key(0);

  receivename = window.localStorage.getItem(key1);
  var targetnameck = window.localStorage.getItem(key2);

  var chat_conf = { name: "Public Chat", server: "/chat/chat.php" };
  var curr_id = 0;
  var interval;

  function print_msg(msg) {
    var output = "";
    if (msg["text"].length === 0) return;
    if (msg["me"])
      output = "<li class='chat-d chat-me'>" + mescape(msg["text"]) + "</li>";
    else
      output =
        "<li class='chat-d chat-bot'>" +
        targetnameck +
        " : " +
        mescape(msg["text"]) +
        "</li>";
    $("#chat-ul").append(output);
    $("#chat-ul").scrollTop($("#chat-ul")[0].scrollHeight);
  }

  function mescape(text) {
    return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  function send_msg(msg) {
    $.ajax({
      type: "POST",
      url: chat_conf["server"],
      data: { q: "send", data: msg, receive: receivename },
      dataType: "json",
    }).fail(function (err) {
      console.log(JSON.stringify(err));
      print_msg("error: message can't be sent!", "he");
    });
  }

  function load_chat() {
    $.ajax({
      type: "POST",
      url: chat_conf["server"],
      data: { q: "load", data: curr_id, receive: receivename },
      success: function (retr) {
        curr_id = retr.id;
        var msgs = retr.data;
        for (msg in msgs) {
          print_msg(msgs[msg], "he");
        }
      },
      dataType: "json",
    }).fail(function () {
      print_msg("error: chat can't be loaded!", "he");
    });
  }

  function reload() {
    sessionStorage.setItem("reloading", "true");
    document.location.reload();
  }

  $(document).ready(function () {
    $("#chat-name").html(mescape(chat_conf["name"]));
    $("#chat-loader").hide();
    $("#chat-ul").show();
    $("#chat-input").keyup(function (e) {
      if (e.which == 13) {
        e.preventDefault();
        var say = $("#chat-input").val();
        if (say.length > 0) {
          $("#chat-input").val("");
          send_msg(say);
          load_chat();
        }
      }
    });
    $("#chat-button").click(function () {
      var say = $("#chat-input").val();
      if (say.length > 0) {
        $("#chat-input").val("");
        send_msg(say);
        load_chat();
      } else {
        $("#chat-input").focus();
      }
    });

    load_chat();

    interval = setInterval(load_chat, 1000);
  });
})();