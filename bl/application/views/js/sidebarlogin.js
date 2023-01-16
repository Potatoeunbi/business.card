$(function () {
  $(document).ready(function () {
    var modalname = $(".modal");

    var group = $(".trade");

    group.each(function () {
      var _group = new GroupTon(this);
    });

    function GroupTon(groupElement) {
      var box = $(groupElement).find(".Menu");

      box.each(function (idx) {
        var newBox = new RootBox(this);
        if (idx > 0) {
          newBox.siblingsClose();
        }
      });

      function RootBox(boxElement) {
        var _this = this;
        var boxEl = $(boxElement);
        var target = $(boxEl).find(".createsite");

        var cont = $(group).find(modalname[0]);
        var Mclose = $(group).find(".close");

        target.on("click", ClickEvent);

        function ClickEvent() {
          if (cont.is(":hidden")) {
            _this.open();
            Mclose.on("click", ModalClickEvent);
          } else {
            _this.close();
          }
        }

        ModalClickEvent = function () {
          cont.css("display", "none");
        };
        _this.open = function () {
          cont.css("display", "block");
        };
      }
    }
  });
});
